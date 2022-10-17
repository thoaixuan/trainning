<template>
    <div>
        <el-card class="mb-3" shadow="hover" v-for="m in model" :key="m._id" >
            <a class="text-muted" :href="`/news/${m._id}`">
                <el-row type="flex" justify="space-between">
                    <el-col :span="16" :offset="1">
                        <h4>{{m.title}}</h4>
                        <p>{{m.summary}}</p>
                    </el-col>
                    <el-col :span="5" :offset="1">
                        <img class="rounded-circle" :src="m.image"/>
                    </el-col>
                </el-row>
                <el-row type="flex">
                    <el-col :span="16" :offset="1">
                        <span>Y tế và sức khoẻ</span>
                        <el-button size="mini" type="text" icon="el-icon-chat-square">17</el-button>
                    </el-col>
                    <el-col :span="5" :offset="1">
                        <span class="text-nowrap">Nguyễn Kiều Hưng</span>
                    </el-col>
                </el-row>
            </a>
        </el-card>
        <nav aria-label="d-flex flex-row-reverse navigation">
            <ul class="pagination justify-content-center mt-3">
                <li class="page-item">
                    <span class="page-link" @click="decreased" aria-label="Previous"><span aria-hidden="true">&laquo;</span></span>
                </li>
                <li class="page-item"  v-for="index in pages" :key="index" :class="{ active: index == indexPages }">
                  <span class="page-link" @click="setPage(index)">{{index}}</span>
                </li>
                <li class="page-item">
                    <span class="page-link" @click="advanced" aria-label="Next"><span aria-hidden="true">&raquo;</span></span>
                </li>
            </ul> 
        </nav>
    </div>
</template>

<script>
export default {
    //props:["model"],
    data:function(){
      return{
        model:[],
        total:0,
        currentPage:10,
        pages:0,
        indexPages:1,
        checkIndex: true,
        txtSearch: ''
      }
    },
    computed:{
        news(){
            //console.log(this.$store.state.news.model)
            this.model = this.$store.state.news.model
            console.log("model", this.model)
            return this.$store.state.news.model;
        }
    },
    methods:{
      getTextSearch(e){
        this.txtSearch = e
        console.log(this.txtSearch)
        this.fetchData(1)
      }, 
      async fetchData(page){
          var vm = this;
          let res = await this.$store.dispatch("news/getNews",page)
            console.log("res",res.data.total.rows)
         vm.total = res.data.total.rows;
         vm.pages = Math.ceil(parseInt(vm.total) / vm.currentPage);
         vm.model = res.data.data
          
        //  vm.total = res.data.total.rows;
        //  vm.pages = Math.ceil(parseInt(vm.total) / vm.currentPage);
        //  vm.model = res.data.data;

      },
      decreased() {
        this.indexPages--;
        if(this.indexPages<1){
          this.indexPages=1;
          this.checkIndex=false;
        }
          this.fetchData(this.indexPages);
      },
      advanced() {
        this.indexPages++;
        if(this.indexPages>=this.pages){
          this.indexPages=this.pages;
          this.checkIndex=false;
        }
          this.fetchData(this.indexPages);
      },
      setPage(page){
        this.indexPages=page;
        this.fetchData(page);
      },
    },
    mounted(){
      var vm = this;
      vm.setPage(1);
    },
}
</script>

<style>
.rounded-circle{
    width: 90px !important;
    height: 90px !important;
}
</style>