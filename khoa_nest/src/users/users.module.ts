import { Module } from '@nestjs/common';
import { TypeOrmModule } from '@nestjs/typeorm';
import { Users } from './entities/users.entity';
import { UsersController } from './users.controller';
import { UsersService } from './users.service';
import { JwtModule } from '@nestjs/jwt';

@Module({
    imports:[TypeOrmModule.forFeature([Users]),
                
      JwtModule.register({
        secret: 'secret_key',
        signOptions: {expiresIn: '1d'}
      })],
    controllers:[UsersController], 
    providers:[UsersService]})
export class UsersModule {}
