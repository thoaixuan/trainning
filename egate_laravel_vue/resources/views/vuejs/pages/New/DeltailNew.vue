<template>

  <div  v-loading="loading">
     <!-- main body area -->
    <div id="news" class="main page-content pt-2">
        <blockquote class="blockquote text-center bg-white">
            <h4 class="mb-0"><a href="/news">{{ $t('header.news') }}</a> &#187; {{model.title}}</h4>
          </blockquote>
        <div class="body d-flex py-lg-4 py-3">
            <div class="container">
                <div class="row g-2">
                    <div class="col-lg-8 col-md-12 col-sm-12">
                        <div class="card">
                            <div class="card-body p-4">
                                <div class="d-flex align-items-center flex-wrap flex-lg-row position-relative">
                                     <div class="position-absolute top-0 left-0 share_with" title="Share with">
                                        <div class="row">
                                                 <a :href="`http://www.facebook.com/sharer/sharer.php?u=${this.host}/${this.$route.fullPath}`" target="_blank">
                                                    <img class="image__size" src="/themes/assets/images/social/fb2.jpg" alt="">
                                                </a>
                                                 <a :href="`https://twitter.com/intent/tweet?text=${model.title}url=${this.host}/${this.$route.fullPath}&via=TWITTER-HANDLER`" target="_blank">
                                                      <img class="image__size" src="/themes/assets/images/social/twitter.png" alt="">
                                                 </a>
                                                 <a :href="`http://pinterest.com/pin/create/button/?url=${this.host}/${this.$route.fullPath}&description=${model.content}&media=${model.image}`" target="_blank">
                                                      <img class="image__size" src="/themes/assets/images/social/pinterest.png" alt="">
                                                 </a>
                                        </div>
                           
                                    </div>
                                    <img :src="model.image" alt="" class="rounded">
                                    <div class=" m-0 mt-4 mt-lg-4">
                                        <p class="text-end"><i class="fa fa-clock-o" aria-hidden="true"></i> {{moment(model.createdAt).format("DD/MM/YYYY")}}</p>
                                        <h2 class="fw-bold text-center">{{model.title}}</h2>
                                        <div class="h6">{{model.summary}}</div>
                                        <p class="font-serif m-8 text-break text-content--align" v-html="model.content"></p>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- .Card End -->
                    </div>
                    <div class=" col-lg-4 col-md-12 col-sm-12 mb-2">
                        <h4 class="fw-bold">Bài viết mới</h4>
                        <div class="card mb-2"  v-for="(item,index) in siderBar.slice(0,4).sort((p) => p.createdAt).reverse()" :key="index">
                            <div class="card-body p-4">
                                <div class="d-flex align-items-center">
                                    <img :src="item.image" alt="" class="rounded image__cover">
                                    <div class="ms-md-2 m-0 mt-4 mt-lg-0 text-lg-start text-center">
                                    <small><i class="fa fa-clock-o" aria-hidden="true"></i> {{moment(item.createdAt).format("DD/MM/YYYY")}}</small>
                                        <h6>
                                            <router-link :to="`/news/${item._id}`" class="text-dark">
                                                {{item.title}}
                                            </router-link>
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- .Card End -->
                    </div>
                </div> <!-- .row end -->

            </div>
        </div>
    </div>
  </div>
</template>

<script>
import api from '../../../../../api.json'
import moment from 'moment'
import preloader from '../../includes/preloader.vue'

export default {
     metaInfo() {
        return{
            title: `${this.model.title }`,
        }
    },

    components: {
      preloader,
    },
    data:function(){
      return{
        loading: true,
        model:[],
        siderBar:[],
        id:this.$route.params.id,
        moment: moment,
        host:"",
        checkpreloader:false,

      }
    },
    methods:{
        async getById(){
            var vm =this;
            vm.loading=true;
            let res = await vm.$store.dispatch("getByID",api.news.getByID+'/'+vm.id);
            if(res){
                vm.loading=false;
                 vm.model=res.data.result;
            }
        },
        async fetchData(){
        var vm =  this;
        vm.loading=true;
         let res = await vm.$store.dispatch("fetchData",api.news.getNews);
         if(res){
            vm.loading=false;
             vm.siderBar=res.data.data;
         }
      },
    },
    mounted(){
        var vm =this;
        vm.host=window.location.origin;
        vm.getById();
        vm.fetchData();
    },
    watch:{
        '$route'(to, from){
            this.id = to.params.id
            this.getById();
        }
    }
}
</script>
<style>
    .text-content--align{
        text-align: justify
    }
    .image__cover{
        max-width: 100px; object-fit: cover;
    }
    .image__size{
        width:48px !important;
        height: 48px !important;
    }
</style>