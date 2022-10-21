import { Length } from "class-validator";
import { Column, Entity, PrimaryGeneratedColumn } from "typeorm";
import { Role } from "../role/Role.enum";


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
    @Column({default:Role.User})
    roles: Role;
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

