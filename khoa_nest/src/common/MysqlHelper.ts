export class MysqlHelper{
    Document: any;
    Aggregate: Array<any>
    constructor(document : any){
        this.Document = document;
    }

    async all(){
        var data = await this.Document.find();
        return data;
    }
    async byID(id){
        var data = await this.Document.findOne({
            where:{
                id
            }
        });
        return data;
    }

    async searchNews(txtSearch, take, skip){
        var dataSearch = await this.Document.createQueryBuilder("news")
            .where("news.title like :title", {title: `%${txtSearch}%`})
            .orWhere("news.desc like :desc", {desc: `%${txtSearch}%`})
            .take(take)
            .skip(skip)
            .getMany();
        var totalSearch = await this.Document.createQueryBuilder("news")
            .where("news.title like :title", {title: `%${txtSearch}%`})
            .orWhere("news.desc like :desc", {desc: `%${txtSearch}%`})
            .take(take)
            .skip(skip)
            .getCount();
        return [dataSearch,totalSearch];
    }

    async byAccount(account){
        var data = await this.Document.findOne({
            where:{
                account
            }
        });
        return data;
    }
    async create(dto){
        const document = this.Document.create(dto);
        return this.Document.save(document);
    }
    async update(oldDto, updateDto){
        return this.Document.save({...oldDto, ...updateDto})
    }
    async remove(dto){
        return this.Document.remove(dto)
    }

    async paging(take, skip){
        return this.Document.findAndCount({take,skip})
    }
}