import { PartialType } from "@nestjs/mapped-types";
import { IsString } from "class-validator";
import { CreateUserDto } from "./create-user.dto";

export class UpdateUserDto extends PartialType(CreateUserDto){
    // @IsString()
    // password?: string;
    // @IsString()
    // role?: string
    // @IsString()
    // firstname?: string;
    // @IsString()
    // lastname?: string;
    // @IsString()
    // image?: string;
    // @IsString()
    // date?: string;
}