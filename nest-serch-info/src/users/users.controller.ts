import { Body, Controller, Get, Post } from '@nestjs/common';
import { CreateUserDto } from './dto/create-user.dto';
import { UsersService } from './users.service';

@Controller('users')
export class UsersController {
    constructor(private readonly userService: UsersService){}

    @Get('')
    findAll(){
        return this.userService.findAll();
    }

    @Post('/signup')
    create(@Body() createUsersDto: CreateUserDto){
        return this.userService.signup(createUsersDto);
    }

    @Post('/signin')
    signin(@Body() body){
        console.log(body)
        return this.userService.signin(body);
    }
}
