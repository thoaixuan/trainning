import { Body, Controller, Get, Param, Post, Patch, Delete, Query } from '@nestjs/common';
import { CreateNewsDto } from './dto/create-news.dto';
import { UpdateNewsDto } from './dto/update-news.dto';
import { NewsService } from './news.service';

@Controller('news')
export class NewsController {

    constructor(private readonly newsService: NewsService){}

    @Get('page')
    findAll(@Query() {take, skip}){
        return this.newsService.findAll(take, skip);
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
    update(@Param('id') id: number, @Body() updateNewsDto: UpdateNewsDto){
        return this.newsService.update(id,updateNewsDto);
    }
    @Delete(':id')
    remove(@Param('id') id:number){
        return this.newsService.remove(id);
    }
    @Get('search/search')
    search(@Query('title') title: string, @Query('desc') desc: string){
        return this.newsService.search(title,desc);
    }
}
