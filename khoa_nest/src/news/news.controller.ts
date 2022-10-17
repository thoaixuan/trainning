import { Body, Controller, Get, Param, Post, Patch, Delete, Query } from '@nestjs/common';
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
    create(@Body() createNewsDto: CreateNewsDto){
        return this.newsService.create(createNewsDto);
    }
    @Patch(':id')
    update(@Param('id') id: number, @Body() updateNewsDto: CreateNewsDto){
        return this.newsService.update(id,updateNewsDto);
    }
    @Delete(':id')
    remove(@Param('id') id:number){
        return this.newsService.remove(id);
    }
    
}
