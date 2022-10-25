import { Body, Controller, Get, Param, Patch, Post } from '@nestjs/common';
import { CreatePermissionDto } from 'src/permissions/dto/permissions.dto';
import { PermissionsService } from 'src/permissions/permissions.service';

@Controller('permissions')
export class PermissionsController {
    constructor(private readonly permissionsService: PermissionsService){}
    @Get('')
    async findAll(){
        //await this.checkAccessToken(request);
        return this.permissionsService.findAll();
    }
    @Get(':id')
    async findOne(@Param('id') id: number){
        return this.permissionsService.findOne(id);
    }
    @Post()
    create(@Body() createDto: CreatePermissionDto){
        return this.permissionsService.create(createDto);
    }
    @Patch(':id')
    update(@Param('id') id: number, @Body() updatePerDto: CreatePermissionDto){
        return this.permissionsService.update(id,updatePerDto);
    }
}
