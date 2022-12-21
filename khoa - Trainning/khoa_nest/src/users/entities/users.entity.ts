import { Length } from "class-validator";
import { type } from "os";
import { Permissions } from "src/permissions/entities/permissions.entity";

import { Column, Entity, JoinColumn, ManyToOne, OneToOne, PrimaryGeneratedColumn } from "typeorm";


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
    @ManyToOne(
        type => Permissions, 
        permission => permission.users)
    @JoinColumn({
        name: 'permission_id'
    })
    permission: Permissions;
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

