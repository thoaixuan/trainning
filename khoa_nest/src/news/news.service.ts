import { HttpException, HttpStatus, Injectable, NotFoundException } from '@nestjs/common';
import { InjectRepository } from '@nestjs/typeorm';
import { MysqlHelper } from 'src/common/MysqlHelper';
import { Repository } from 'typeorm';
import { CreateNewsDto } from './dto/news.dto';
import { News } from './entities/news.entity';

@Injectable()
export class NewsService {
    constructor(
        @InjectRepository(News)
        private newsRepository: Repository<News>
    ){}
    
    async findOne(id:number){
        var model = await new MysqlHelper(this.newsRepository).byID(id)
        if(!model){
            return {message: `news #${id} not found`, status: 404}
        }
        return model;
    }

    async create(createDto: CreateNewsDto){
        var model = await new MysqlHelper(this.newsRepository).create(createDto)
        return {data: model, message: 'Create success', status: 200};
    }

    async update(id:number, updateNewsDto: any){
        var model = await this.findOne(id);
        var updateDto = await new MysqlHelper(this.newsRepository).update(model,updateNewsDto);
        return {data: updateDto, message: 'Update success', status: 200};
    }
    
    async remove(id:number){
        const newIndex = await this.findOne(id);
        const removeNews = await new MysqlHelper(this.newsRepository).remove(newIndex);
        return {data: removeNews, message: 'Delete success', status: 200};
    }

    async findAll(page: number, txtSearch: string){
        let skip;
        if(page===1 || page===0){
            skip = 0
        }
        else{
            skip = (page-1)*10;
        }
        const take = 10;
        let [data, total] = await new MysqlHelper(this.newsRepository).paging(take, skip);
        if(txtSearch){
            [data, total] = await new MysqlHelper(this.newsRepository).searchNews(txtSearch,take,skip);
        }
        return {data, total};
    }
}
