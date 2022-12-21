import { Module } from '@nestjs/common';
import { JwtModule } from '@nestjs/jwt';
import { PassportModule } from '@nestjs/passport';
import { TypeOrmModule } from '@nestjs/typeorm';
import { Permissions } from 'src/permissions/entities/permissions.entity';
import { PermissionsService } from 'src/permissions/permissions.service';
import { Users } from 'src/users/entities/users.entity';
import { UsersModule } from 'src/users/users.module';
import { UsersService } from 'src/users/users.service';
import { AuthService } from './auth.service';
import { JwtStrategy } from './jwt.strategy';

@Module({
  imports: [TypeOrmModule.forFeature([Users,Permissions]),
    UsersModule,
    PassportModule,
    JwtModule.register({
      secret: 'secret_key',
      signOptions: { expiresIn: '60s' },
    }),
  ],
  providers: [AuthService, JwtStrategy, UsersService, PermissionsService],
  exports: [AuthService],
})
export class AuthModule {}
