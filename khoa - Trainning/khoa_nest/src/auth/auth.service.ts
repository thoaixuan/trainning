import { Injectable } from '@nestjs/common';
import { JwtService } from '@nestjs/jwt';
import { UsersService } from 'src/users/users.service';
import * as bcrypt from 'bcrypt';

@Injectable()
export class AuthService {
    constructor(
        private usersService: UsersService,
        private jwtService: JwtService
      ) {}
    
      async validateUser(account: string, password: string): Promise<any> {
        const user = await this.usersService.findOne(account);
        if(user.status!==200){
            return {message:'the account is not correct',status:404};
        }
        if(!await bcrypt.compare(password, user.data.password)){
            return {message:'the password is not correct',status:404};
        }
        if (user) {
          return {status:200, user: user};
        }
        return {message:'the account not found',status:404};
      }
    
      async login(user: any, response) {
        const payload = { account: user.account, sub: user.id };
        response.cookie('user', user.account, {httpOnly: true});
        return {
          status: 200,
          access_token: this.jwtService.sign(payload),
        };
      }
}
