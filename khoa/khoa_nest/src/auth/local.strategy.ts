import { UnauthorizedException } from "@nestjs/common";
import { PassportStrategy } from "@nestjs/passport";
import { Strategy } from "passport-local";
import { AuthService } from "./auth.service";

export class LocalStrategy extends PassportStrategy(Strategy){
    constructor(private authService: AuthService){
        super();
    }

    async validate(account: string, password: string): Promise<any>{
        const user = await this.authService.validateUser(account,password);
        console.log('user',user)
        if(!user){
            throw new UnauthorizedException();
        }
        return user;
    }
}