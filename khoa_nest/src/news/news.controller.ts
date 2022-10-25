import { Body, Controller, Get, Param, Post, Patch, Delete, Query } from '@nestjs/common';
import { Roles } from 'src/users/role/roles.decorator';
import { CreateNewsDto } from './dto/news.dto';
import { NewsService } from './news.service';

@Controller('news')
export class NewsController {

    constructor(private readonly newsService: NewsService){}

    @Get('')
    findAll(@Query() {page,txtSearch}){
        return this.newsService.findAll(page,txtSearch);
    }
    @Get(':id')
    findOne(@Param('id') id: number){
        return this.newsService.findOne(id);
    }
    @Post()
    @Roles('news-add')
    create(@Body() createNewsDto: CreateNewsDto){
        return this.newsService.create(createNewsDto);
    }
    
    @Patch(':id')
    @Roles('news-edit')
    update(@Param('id') id: number, @Body() updateNewsDto: CreateNewsDto){
        return this.newsService.update(id,updateNewsDto);
    }
    
    @Delete(':id')
    @Roles('news-delete')
    remove(@Param('id') id:number){
        return this.newsService.remove(id);
    }
    
}
