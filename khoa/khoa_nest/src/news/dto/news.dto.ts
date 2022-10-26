import { Optional } from "@nestjs/common";
import { IsOptional, IsString } from "class-validator";

export class CreateNewsDto{
    @IsString()
    @IsOptional()
    readonly title: string;
    @IsString()
    @IsOptional()
    readonly desc: string;
    @IsString()
    @IsOptional()
    readonly content: string;
    @IsString()
    @IsOptional()
    readonly image: string;
    @IsString()
    @IsOptional()
    readonly date: string;
}