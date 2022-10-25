
import { CanActivate, ExecutionContext, Injectable} from '@nestjs/common';
import { Reflector } from "@nestjs/core";
import { rejects } from 'assert';
import { resolve } from 'path';
import { Observable } from 'rxjs';
import { Users } from '../entities/users.entity';
import { UsersService } from '../users.service';

@Injectable()
export class RolesGuard implements CanActivate{
    constructor(
        private userService: UsersService,
        private reflector: Reflector){}
    canActivate(context: ExecutionContext): boolean | Promise<boolean> | Observable<boolean> {
        const requireRoles = this.reflector.get<string[]>('roles',context.getHandler())
        console.log(requireRoles)
        if(!requireRoles){
            return true;
        }
        const request = context.switchToHttp().getRequest();

        // truy vấn user từ tên trên cookies
        
        return this.userService.findOne(request.cookies.user)
            .then((res)=>{
                var flag=true;
                var arrayRoles = res.data.permission.roles_module.split(",");
                requireRoles.forEach(requireRole => {
                    if(arrayRoles.includes(requireRole)===false){
                        flag=false
                    }
                });
                return flag;
            }).catch((error)=>{
                return false;
            })
    }
}