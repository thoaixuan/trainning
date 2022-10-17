import { Length } from "class-validator";
import { Column, Entity, PrimaryGeneratedColumn } from "typeorm";

@Entity()
export class Users{
    @PrimaryGeneratedColumn()
    id: number;
    @Column({unique: true})
    @Length(6)
    account: string;
    @Column()
    @Length(6)
    password: string;
    @Column({default:'user'})
    role: string
    @Column({default:''})
    @Length(6)
    firstname: string;
    @Column({default:''})
    @Length(6)
    lastname: string;
    @Column({default:''})
    image: string;
    @Column({default:''})
    date: string;
}