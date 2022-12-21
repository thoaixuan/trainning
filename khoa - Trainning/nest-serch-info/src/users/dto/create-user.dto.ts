import { IsOptional, IsString, Length } from "class-validator";

export class CreateUserDto{
    @IsString()
    @Length(6)
    readonly account: string;
    @IsString()
    @Length(6)
    password: string;
    @IsOptional()
    role: string
    @IsOptional()
    firstname: string;
    @IsOptional()
    lastname: string;
    @IsOptional()
    image: string;
    @IsOptional()
    date: string;
}