import { Injectable } from '@nestjs/common';
import { InjectRepository } from '@nestjs/typeorm';
import { MysqlHelper } from 'src/common/MysqlHelper';
import { CreatePermissionDto } from 'src/permissions/dto/permissions.dto';
import { Permissions } from 'src/permissions/entities/permissions.entity';
import { Repository } from 'typeorm';

@Injectable()
export class PermissionsService {
    constructor(
        @InjectRepository(Permissions)
        private readonly permissionRepository: Repository<Permissions>,
    ){}
    async findAll(){
        return await new MysqlHelper(this.permissionRepository).all();
    }
    async create(createDto: CreatePermissionDto){
        var model = await new MysqlHelper(this.permissionRepository).create(createDto)
        return {data: model, message: 'Create success', status: 200};
    }
    async update(id:number, updatePerDto: any){
        var model = await this.findOne(id);
        var updateDto = await new MysqlHelper(this.permissionRepository).update(model,updatePerDto);
        return {data: updateDto, message: 'Update success', status: 200};
    }
    async findOne(id:number){
        var model = await new MysqlHelper(this.permissionRepository).byID(id)
        if(!model){
            return {message: `permission #${id} not found`, status: 404}
        }
        return model;
    }
}
