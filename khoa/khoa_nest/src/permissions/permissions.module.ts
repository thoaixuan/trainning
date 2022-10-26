import { Module } from '@nestjs/common';
import { TypeOrmModule } from '@nestjs/typeorm';
import { PermissionsService } from './permissions.service';
import { Permissions } from './entities/permissions.entity';
import { PermissionsController } from './permissions.controller';

@Module({
  imports:[TypeOrmModule.forFeature([Permissions])],
  controllers: [PermissionsController],
  providers: [PermissionsService]
})
export class PermissionsModule {}
