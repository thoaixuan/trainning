<template>
  <div>
    <div class="main" v-loading="loading">
      <div class="page-content pt-2"> 
            <blockquote class="blockquote text-center bg-white">
            <h1 class="mb-0">Tin tức</h1>
          </blockquote>
              <!-- Policy -->
              <div id="policy" class="py-5 section">
                <div class="container">
                      <div class="row">
                        <div v-for="(item,index) in model" :key="index" class="col-sm-3 col-news mt-2" >
                          <router-link :to="`/news/${item._id}`" class="text-light">
                            <div class="widget single-news">
                              <div class="image">
                                <img class="img-responsive img-bg-responsive" :src="item.image"/>  
                                <span class="gradient"></span>
                              </div>
                              <div class="details">
                                    <h3>{{fix3(item.title)}}</h3>
                                <time>{{moment(item.createdAt).format("DD-MM-YYYY")}}</time>
                              </div>
                            </div>
                          </router-link>
                        </div>
                    </div>
                    <nav aria-label="d-flex flex-row-reverse Page navigation ">
                      <ul class="pagination">
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
              </div>
      </div>
     
    </div>
  </div>
</template>

<script>
import api from '../../../../../api.json'
import preloader from '../../includes/preloader.vue'
import moment from 'moment'
 
export default {
    metaInfo: {
      title: 'Tin tức e-Gate',
      meta: [
      {
        name: "description",
        content: "Tin tức cập nhật về công nghệ e-Gate",
      },
      {
        property: "og:title",
        content: "Tin tức e-Gate",
      },
      {
        property: "og:type",
        content: "website",
      },
      {
        name: "robots",
        content: "index,follow",
      },
    ],
    },
   components: {
      preloader,
    },
    data:function(){
      return{
        model:[],
        total:0,
        currentPage:10,
        moment: moment,
        pages:0,
        indexPages:1,
        checkIndex:true,
        loading: true,
      }
    },
    computed:{
      numberOfPages() {
          if (
            !this.collection ||
            Number.isNaN(parseInt(this.total)) ||
            Number.isNaN(parseInt(this.currentPage)) ||
            this.currentPage <= 0
          ) {
            return 0;
          }

          const result = Math.ceil(this.total / this.currentPage)
          return (result < 1) ? 1 : result
        }
    },
    methods:{
      async fetchData(page){
        var vm =  this;
        vm.loading=true;
         let res = await vm.$store.dispatch("fetchData",api.news.getNews+"?page="+page);
          if(res){
            vm.loading=false;

          }
          vm.model=res.data.data;
          vm.total=res.data.total.rows;
          vm.pages = Math.ceil(parseInt(vm.total) / vm.currentPage)
      },
      fix3(str) {
        if (str.length > 40) {
          return str.substring(0, 40) + "...";
        }
        return str;
      },
       decreased() {
        this.indexPages--;
        if(this.indexPages<1){
          this.indexPages=1;
          this.checkIndex=false;
        }
          this.fetchData(this.indexPages);
          console.log(this.indexPages);
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
      var vm=this;
      vm.setPage(1);
    },
}
</script>
<style scoped>

</style>
