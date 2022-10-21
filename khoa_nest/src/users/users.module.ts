import { Module } from '@nestjs/common';
import { TypeOrmModule } from '@nestjs/typeorm';
import { Users } from './entities/users.entity';
import { UsersController } from './users.controller';
import { UsersService } from './users.service';
import { JwtModule } from '@nestjs/jwt';
import { APP_GUARD } from '@nestjs/core';
import { RoleGuard } from './role/role.guard';

@Module({
    imports:[TypeOrmModule.forFeature([Users]),
                
      JwtModule.register({
        secret: 'secret_key',
        signOptions: {expiresIn: '1d'}
      })],
    controllers:[UsersController], 
    providers:[UsersService]})
export class UsersModule {}
