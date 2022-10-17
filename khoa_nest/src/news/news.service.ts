import { HttpException, HttpStatus, Injectable, NotFoundException } from '@nestjs/common';
import { InjectRepository } from '@nestjs/typeorm';
import { Repository } from 'typeorm';
import { CreateNewsDto } from './dto/create-news.dto';
import { News } from './entities/news.entity';

@Injectable()
export class NewsService {
    constructor(
        @InjectRepository(News)
        private readonly newsRepository: Repository<News>
    ){}
    
    async findAll(title: string, desc: string, page: number=1){
        let skip;
        if(page===1 || page===0){
            skip = 0
        }
        else{
            skip = (page-1)*10;
        }
        const take = 10;

        if(title){
            const news = await this.newsRepository.createQueryBuilder("news")
            .where("news.title like :title", {title: `%${title}%`})
            .orWhere("news.desc like :desc", {desc: `%${desc}%`})
            .take(take)
            .skip(skip)
            .getMany()

            const total = await this.newsRepository.createQueryBuilder("news")
            .where("news.title like :title", {title: `%${title}%`})
            .orWhere("news.desc like :desc", {desc: `%${desc}%`})
            .take(take)
            .skip(skip)
            .getCount()

            return {data:news, total};
        }
        const [data, total] = await this.newsRepository.findAndCount({take, skip});
        return {data, total};
    }

    async findOne(id:number){
        const news = await this.newsRepository.findOne({
            where:{
                id: id
            }
        });
        if(!news){
            throw new HttpException(`news #${id} not found`, HttpStatus.NOT_FOUND);
        }
        return news;
    }

    create(createNewsDto: CreateNewsDto){
        const news = this.newsRepository.create(createNewsDto);
        return this.newsRepository.save(news);
    }

    async update(id: number, updateNewsDto: any){
        // const news = await this.newsRepository.preload({
        //     id: id,
        //     ...updateNewsDto,
        // });
        const news = await this.newsRepository.findOne({
            where:{id}
        })
        if(!news){
            throw new NotFoundException(`News #${id} not found`);
        }
        return this.newsRepository.save({...news, ...updateNewsDto});
    }

    async remove(id:number){
        const newsIndex = await this.newsRepository.findOne({
            where:{
                id: id
            }
        });
        return this.newsRepository.remove(newsIndex)
    }

    async search(title: string, desc: string, page: number = 1){
        let skip;
        if(page===1 || page===0){
            skip = 0
        }
        else{
            skip = (page-1)*10;
        }
        const take = 10;
        const news = await this.newsRepository.createQueryBuilder("news")
        .where("news.title like :title", {title: `%${title}%`})
        .orWhere("news.desc like :desc", {desc: `%${desc}%`})
        .take(take)
        .skip(skip)
        .getMany()


        const total = await this.newsRepository.createQueryBuilder("news")
        .where("news.title like :title", {title: `%${title}%`})
        .orWhere("news.desc like :desc", {desc: `%${desc}%`})
        .take(take)
        .skip(skip)
        .getCount()
        
        return {data:news, total};
    }
}
