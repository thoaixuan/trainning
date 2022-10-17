import { Body, Controller, Get, Post, Res, Req, UnauthorizedException, Param } from '@nestjs/common';
import { CreateUserDto } from './dto/user.dto';
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
        await this.checkJWT(request);
        return this.userService.findAll();
    }

    @Get(':account')
    async findOne(@Param('account') account: string, @Req() request: Request){
        await this.checkJWT(request);
        return this.userService.findOne(account);
    }

    @Post('/signup')
    create(@Body() createUsersDto: CreateUserDto){
        return this.userService.signup(createUsersDto);
    }

    @Post('/signin')
    async signin(@Body() body, @Res({passthrough: true}) response: Response){
        return this.userService.signin(body,response)
    }

    @Post('logout')
    async logout(@Res({passthrough: true}) response: Response){
        response.clearCookie('jwt');
        return {message: 'success'}
    }

    async checkJWT(request){
        const cookie = request.cookies['jwt'];
        const data = await this.jwtService.verifyAsync(cookie);
        if(!data){
            throw new UnauthorizedException();
        }
        return;
    }
}
