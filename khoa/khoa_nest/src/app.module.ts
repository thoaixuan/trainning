import { Module } from '@nestjs/common';
import { AppController } from './app.controller';
import { AppService } from './app.service';
import { NewsModule } from './news/news.module';
import { TypeOrmModule } from '@nestjs/typeorm';
import { UsersController } from './users/users.controller';
import { UsersService } from './users/users.service';
import { UsersModule } from './users/users.module';
import { APP_GUARD } from '@nestjs/core';
import { RolesGuard } from './users/role/roles.guard';
import { PermissionsModule } from './permissions/permissions.module';
import { Users } from './users/entities/users.entity';
import { Permissions } from './permissions/entities/permissions.entity';
import { PermissionsService } from './permissions/permissions.service';
import { JwtModule } from '@nestjs/jwt';
import { AuthModule } from './auth/auth.module';

@Module({
  imports: [NewsModule, 
    TypeOrmModule.forFeature([Users,Permissions]),
    TypeOrmModule.forRoot({
      type: 'mysql',
      host: 'localhost',
      port: 3306,
      username: 'root',
      password: 'khoa2703',
      database: 'my_sql_nest',
      autoLoadEntities: true,
      synchronize: true,
  }), JwtModule.register({
    secret: 'secret_key',
    signOptions: {expiresIn: '1d'}
  }),
  UsersModule, PermissionsModule, AuthModule],
  controllers: [AppController],
  providers: [AppService, UsersService, PermissionsService,
    {
      provide: APP_GUARD,
      useClass: RolesGuard
    }],
})
export class AppModule {}
