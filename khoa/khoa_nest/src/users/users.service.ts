import { HttpException, HttpStatus, Injectable } from '@nestjs/common';
import { InjectRepository } from '@nestjs/typeorm';
import { Repository } from 'typeorm';
import { CreateUserDto } from './dto/user.dto';
import { Users } from './entities/users.entity';
import * as bcrypt from 'bcrypt';
import { MysqlHelper } from 'src/common/MysqlHelper';
import { JwtService } from '@nestjs/jwt';
import { PermissionsService } from 'src/permissions/permissions.service';

@Injectable()
export class UsersService {
    constructor(
        @InjectRepository(Users)
        private readonly userRepository: Repository<Users>,
        private readonly permissionsService: PermissionsService,
        private jwtService: JwtService
    ){}

    async findAll(){
        return await this.userRepository
        .createQueryBuilder('user')
        .leftJoinAndSelect('user.permission', "permissions")
        .getMany()
        //return this.userRepository.find()
        //return await new MysqlHelper(this.userRepository).all();
    }

    async findOne(account:string){
        const model = await this.userRepository
        .createQueryBuilder('user')
        .where({account})
        .leftJoinAndSelect('user.permission', "permissions")
        .getOne()
        // var model = await new MysqlHelper(this.userRepository).byAccount(account)
        if(!model){
            return {message: `user #${account} not found`, status: 404}
        }
        return {data:model,status:200};
    }

    async signup(createUserDto: CreateUserDto){
        const user = await this.findOne(createUserDto.account)
        if(user.status!==200){
            const hash = await bcrypt.hash(createUserDto.password, 10);
            createUserDto.password = hash
            createUserDto.permission = await this.permissionsService.findOne(1);
            console.log(createUserDto.permission)
            await new MysqlHelper(this.userRepository).create(createUserDto)
            
            return {message:'success', status: 200}
        }
        
        //const user = this.userRepository.create(createUserDto);
        return {message:'account have been already',status:404};
    }

    async signin(body, response){
        const user = await this.findOne(body.account)
        if(user.status!==200){
            return {message:'the account is not correct',status:404};
        }
        if(!await bcrypt.compare(body.password, user.data.password)){
            return {message:'the password is not correct',status:404};
        }

        response.cookie('user', user.data.account, {httpOnly: true});

        const accessToken = await this.generateAccessToken(user.data.id,response);
        const refreshToken = await this.generateRefreshToken(user.data.id,response);
        //request.user = user.data
        return  {message:'success', data: user.data, status: 200, accessToken: accessToken}
    }
    async generateAccessToken(id, response){
        const accessToken = await this.jwtService.signAsync({id: id},{expiresIn:'15s'})
        response.cookie('accessToken', accessToken, {httpOnly: true});
        return accessToken;
    }
    async generateRefreshToken(id, response){
        const refreshToken = await this.jwtService.signAsync({id: id},{expiresIn:'365d'})
        response.cookie('refreshToken', refreshToken, {httpOnly: true});
    }
}
