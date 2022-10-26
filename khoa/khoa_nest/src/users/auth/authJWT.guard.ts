import { CanActivate, ExecutionContext, Injectable } from "@nestjs/common";
import { Observable } from "rxjs";

// @Injectable()
// export class AuthJWTGuard implements CanActivate{
//     canActivate(context: ExecutionContext): boolean | Promise<boolean> | Observable<boolean> {
//         throw new Error("Method not implemented.");
//         const requireRoles = this.reflector.get<string[]>('roles',context.getHandler())
//         //return true;
//     }
// }
    