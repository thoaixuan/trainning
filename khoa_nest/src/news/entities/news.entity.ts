import { Column, Entity, PrimaryGeneratedColumn } from "typeorm";

@Entity()
export class News{
    @PrimaryGeneratedColumn()
    id: number;
    @Column()
    title: string;
    @Column()
    desc: string;
    @Column()
    content: string;
    @Column()
    image: string;
    @Column()
    date: string;
}