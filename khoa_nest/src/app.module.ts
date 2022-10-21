import { Module } from '@nestjs/common';
import { AppController } from './app.controller';
import { AppService } from './app.service';
import { NewsModule } from './news/news.module';
import { TypeOrmModule } from '@nestjs/typeorm';
import { UsersController } from './users/users.controller';
import { UsersService } from './users/users.service';
import { UsersModule } from './users/users.module';
import { APP_GUARD } from '@nestjs/core';
import { RoleGuard } from './users/role/role.guard';

@Module({
  imports: [NewsModule, 
    TypeOrmModule.forRoot({
      type: 'mysql',
      host: 'localhost',
      port: 3306,
      username: 'root',
      password: 'khoa2703',
      database: 'my_sql_nest',
      autoLoadEntities: true,
      synchronize: true,
  }), UsersModule],
  controllers: [AppController],
  providers: [AppService,
    {
      provide: APP_GUARD,
      useClass: RoleGuard
    }],
})
export class AppModule {}
