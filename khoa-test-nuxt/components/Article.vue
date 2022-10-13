<template>
    <div class="col-lg-7 col-md-9 col-sm-auto">
        <div class="article" v-for="(item, x) in model" :key="x">
            <a :href="`/news/${item.id}`">
                <div class="article-top">
            <div class="content">
              <p class="h3 fw-bold">{{item.title}}</p>
              <p class="lh-base">{{item.desc}}</p>
            </div>
            <img class="rounded-circle" :src="item.image" />
          </div>
          <div class="article-bottom">
            <div class="d-flex align-items-center">
              <span class="mr-4">Kinh doanh & quản trị</span>
              <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z">
                </path>
              </svg>
              <span class="ml-1 text-info">65</span>
            </div>

            <p>Hồ Quốc Tuấn</p>
          </div>
            </a>
          
        </div>

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
import axios from 'axios';
import { news } from '../api.json'
import EventBus from '../EventBus';

export default {
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
    created(){
      EventBus.$on("txtSearch", this.getTextSearch)
    },
    destroyed(){
      EventBus.$off('newSearch',this.getTextSearch)
    },
    computed:{
    },
    methods:{
      getTextSearch(e){
        this.txtSearch = e
        console.log(this.txtSearch)
        this.fetchData(1)
      }, 
      async fetchData(page){
          var vm = this;
          let res = await axios.get(`${process.env.BASENEST}/${news.search.title}${vm.txtSearch}&${news.search.desc}${vm.txtSearch}&${news.search.page}${page}`);

         vm.total = res.data.total;
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
.article {
  padding: 20px;
  border-bottom: 1px solid #e5e5e5;
  color: #4f4f4f !important;
}

.article:hover {
  cursor: pointer;
}

.article-top {
  display: flex;
  justify-content: space-between;
}

.article-top .content {
  width: 80%;
}

.article-top img {
  width: 80px;
  height: 80px;
}

.article-bottom {
  margin-top: 10px;
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.author-wrapper {
  white-space: nowrap;
}
</style>