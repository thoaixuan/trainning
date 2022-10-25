import { IsOptional, IsString, Length } from "class-validator";

export class CreatePermissionDto{
    @IsString()
    @IsOptional()
    name: string;
    @IsString()
    @IsOptional()
    description: string;
    @IsString()
    @IsOptional()
    roles_module: string;
}