
import { CanActivate, ExecutionContext, Injectable} from '@nestjs/common';
import { Reflector } from "@nestjs/core";
import { Observable } from 'rxjs';
import { Users } from '../entities/users.entity';
import { Role } from './Role.enum';

@Injectable()
export class RoleGuard implements CanActivate{
    constructor(private reflector: Reflector){}
    canActivate(context: ExecutionContext): boolean | Promise<boolean> | Observable<boolean> {
        const requireRoles = this.reflector.get<Role>('roles',context.getHandler())

        console.log("require:",requireRoles)
        if(!requireRoles){
            return true
        }
        const request = context.switchToHttp().getRequest<Request>();
        //const user = request.user;
        // const user:Users={
        //     id: 1,
        //     account: "testing1",
        //     password: "$2b$10$8FlLjcJySCrxzaG5C65ev.uwZ2WDn/Q6UoYUiKTXVLhFaJcMz0SPa",
        //     roles: Role.User,
        //     firstname: "123",
        //     lastname: "123",
        //     image: "",
        //     date: ""
        // }
        //console.log(user)
        
        const { user } = context.switchToHttp().getRequest();
        console.log(request)
        return requireRoles == user.roles;
    }
}