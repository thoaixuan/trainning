import { HttpException, HttpStatus, Injectable } from '@nestjs/common';
import { InjectRepository } from '@nestjs/typeorm';
import { Repository } from 'typeorm';
import { CreateUserDto } from './dto/create-user.dto';
import { Users } from './entities/users.entity';
import * as bcrypt from 'bcrypt';

@Injectable()
export class UsersService {
    constructor(
        @InjectRepository(Users)
        private readonly userRepository: Repository<Users>
    ){}

    findAll(){
        return this.userRepository.find();
    }

    async findOne(account:string){
        const user = await this.userRepository.findOne({
            where:{
                account
            }
        });
        if(!user){
            throw new HttpException(`user #${account} not found`, HttpStatus.NOT_FOUND);
        }
        return user;
    }

    async signup(createUserDto: CreateUserDto){
        const user = await this.userRepository.findOne({
            where:{
                account: createUserDto.account
            }
        });
        if(!user){
            const hash = await bcrypt.hash(createUserDto.password, 10);
            createUserDto.password = hash
            this.userRepository.save(createUserDto)
            return {message:'success', status: 200}
        }
        
        //const user = this.userRepository.create(createUserDto);
        return {message:'account have been already',status:404};
    }

    async signin(body, response){
        
        return;
        //return {message:'wrong account or password',status:404};
    }
}
