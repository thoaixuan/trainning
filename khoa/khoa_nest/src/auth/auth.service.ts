import { Injectable } from '@nestjs/common';
import { JwtService } from '@nestjs/jwt';
import { UsersService } from 'src/users/users.service';

@Injectable()
export class AuthService {
    constructor(
        private usersService: UsersService,
        private jwtService: JwtService
      ) {}
    
      async validateUser(account: string, password: string): Promise<any> {
        const user = await this.usersService.findOne(account);
        if (user) {
          return user;
        }
        return null;
      }
    
      async login(user: any) {
        const payload = { account: user.account, sub: user.id };
        return {
          access_token: this.jwtService.sign(payload),
        };
      }
}
