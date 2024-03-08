<template>
  <div>
    <blockquote class="blockquote text-center bg-white">
        <h1 class="mb-0">{{ $t('header.aboutUs') }}</h1>
    </blockquote>
      <div class="container about-us">
        <div class="bg-white p-3 rounded">
          <div class="row">
            <div class="col-md-6 text-center">
              <img src="/themes/assets/images/agency-portfolio/gioi-thieu.png" class="img-fluid"/>
            </div>
            <div class="col-md-6" v-html="setting.app_about">
            </div>
          </div>
        </div>
      </div>
  </div>
</template>
<script>
import api from '../../../../../api.json';

export default {
    metaInfo: {
      title: 'About e-Gate',
    },
    data:function(){
      return{
        setting:[],
      }
    },
    methods:{
      async fetchData(){
        var vm =  this;
         let res = await vm.$store.dispatch("fetchData",api.setting.setting+"?fields=app_about");
          // vm.setting=res.data.result;
          vm.setting=res.data;
          },  
    },
    mounted(){
      var vm=this;
      vm.fetchData();
    },
}
</script>
