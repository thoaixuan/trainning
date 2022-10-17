import { Body, Controller, Get, Post, Res, Req, UnauthorizedException, Param } from '@nestjs/common';
import { CreateUserDto } from './dto/create-user.dto';
import { UsersService } from './users.service';
import { Response,Request } from 'express';
import { JwtService } from '@nestjs/jwt';
import * as bcrypt from 'bcrypt';

@Controller('users')
export class UsersController {
    constructor(
        private readonly userService: UsersService,
        private jwtService: JwtService
    ){}

    @Get('')
    async findAll(@Req() request: Request){
        const cookie = request.cookies['jwt'];
        const data = await this.jwtService.verifyAsync(cookie);
        if(!data){
            throw new UnauthorizedException();
        }
        return this.userService.findAll();
    }

    @Get(':account')
    async findOne(@Param('account') account: string, @Req() request: Request){
        const cookie = request.cookies['jwt'];
        const data = await this.jwtService.verifyAsync(cookie);
        if(!data){
            throw new UnauthorizedException();
        }
        return this.userService.findOne(account);
    }

    @Post('/signup')
    create(@Body() createUsersDto: CreateUserDto){
        return this.userService.signup(createUsersDto);
    }

    @Post('/signin')
    async signin(@Body() body, @Res({passthrough: true}) response: Response){
        const user = await this.userService.findOne(body.account)
        if(!user){
            return {message:'the account is not correct',status:404};
        }
        if(!await bcrypt.compare(body.password, user.password)){
            return {message:'the password is not correct',status:404};
        }
        const jwt = await this.jwtService.signAsync({id: user.id})

        response.cookie('jwt', jwt, {httpOnly: true});
        return  {message:'success'}
    }

    @Post('logout')
    async logout(@Res({passthrough: true}) response: Response){
        response.clearCookie('jwt');
        return {message: 'success'}
    }

}
