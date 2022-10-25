import { IsOptional, IsString, Length } from "class-validator";
import { Permissions } from "src/permissions/entities/permissions.entity";

export class CreateUserDto{
    @IsString()
    @IsOptional()
    @Length(6)
    readonly account: string;
    @IsString()
    @IsOptional()
    @Length(6)
    password: string;
    @IsOptional()
    permission: Permissions
    @IsOptional()
    firstname: string;
    @IsOptional()
    lastname: string;
    @IsOptional()
    image: string;
    @IsOptional()
    date: string;
}