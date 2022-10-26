import { Body, Controller, Get, Post, Res, Req, UnauthorizedException, Param, SetMetadata, UseGuards } from '@nestjs/common';
import { CreateUserDto } from './dto/user.dto';
import { UsersService } from './users.service';
import { Response,Request } from 'express';
import { JwtService } from '@nestjs/jwt';
import * as bcrypt from 'bcrypt';
import { Roles } from './role/roles.decorator';

@Controller('users')
export class UsersController {
    constructor(
        private readonly userService: UsersService,
        private jwtService: JwtService
    ){}

    @Get('')
    @Roles('user-view')
    async findAll(@Req() request: Request){
        await this.checkAccessToken(request);
        return this.userService.findAll();
    }

    @Get(':account')
    @Roles('user-view')
    async findOne(@Param('account') account: string, @Req() request: Request){
        await this.checkAccessToken(request);
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
        response.clearCookie('accessToken');
        response.clearCookie('refreshToken');
        return {message: 'success'}
    }

    @Post('/refresh')
    async refreshToken(@Req() request: Request, @Res({passthrough: true}) response: Response){
        const refreshToken = request.cookies['refreshToken'];
        if(!refreshToken){
            return {message:'Chưa đăng nhập', status:404}
        }
        const data = await this.jwtService.verifyAsync(refreshToken);
        if(!data){
            return {message: 'Sai token', status:404}
        }
        const newAccessToken = await this.userService.generateAccessToken(data.id,response);
        //const newRefreshToken = await this.userService.generateRefreshToken(data.id,response);
        return {accessToken: newAccessToken}
    }

    async checkAccessToken(request){
        const accessToken = request.cookies['accessToken'];
        const data = await this.jwtService.verifyAsync(accessToken);
        if(!data){
            await this.checkRefreshToken(request);
            throw new UnauthorizedException();
        }
        return;
    }
    async checkRefreshToken(request){
        const refreshToken = request.cookies['refreshToken'];
        const data = await this.jwtService.verifyAsync(refreshToken)
        console.log(data)
    }
}
