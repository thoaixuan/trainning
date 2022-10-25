import { Users } from "src/users/entities/users.entity";
import { Column, Entity, OneToMany, PrimaryGeneratedColumn } from "typeorm";

@Entity()
export class Permissions{
    @PrimaryGeneratedColumn()
    id: number;
    @Column({unique: true})
    name: string;
    @Column()
    description: string;
    @Column()
    roles_module: string;
    @OneToMany(
        type => Users,
        user => user.permission)
    users: Users[]
}