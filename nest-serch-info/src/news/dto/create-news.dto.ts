import { IsString } from "class-validator";

export class CreateNewsDto{
    @IsString()
    readonly title: string;
    @IsString()
    readonly desc: string;
    @IsString()
    readonly content: string;
    @IsString()
    readonly image: string;
    @IsString()
    readonly date: string;
}