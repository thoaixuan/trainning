import { Module } from '@nestjs/common';
import { TypeOrmModule } from '@nestjs/typeorm';
import { Users } from './entities/users.entity';
import { UsersController } from './users.controller';
import { UsersService } from './users.service';
import { JwtModule } from '@nestjs/jwt';
import { APP_GUARD } from '@nestjs/core';
import { RolesGuard } from './role/roles.guard';
import { PermissionsModule } from 'src/permissions/permissions.module';
import { Permissions } from 'src/permissions/entities/permissions.entity';
import { PermissionsService } from 'src/permissions/permissions.service';

@Module({
    imports:[TypeOrmModule.forFeature([Users,Permissions]),
                
      JwtModule.register({
        secret: 'secret_key',
        signOptions: {expiresIn: '1d'}
      }), PermissionsModule],
    controllers:[UsersController], 
    providers:[UsersService, PermissionsService]})
export class UsersModule {}
