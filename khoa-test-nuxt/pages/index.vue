<template>
  <div class="container">
    <p class="h1 text-center fw-bolder">Góc nhìn</p>
    <div class="row">
      <div class="col-lg-2 col-md-3">
        <div class="author-wrapper">
          <div class="mb-4">
            <a class="text-danger h3 " href="#">Tác giả</a>
          </div>
          <div class="mb-4">
            <a class="h5" href="#">Nguyễn Mai</a>
          </div>
          <div class="mb-4">
            <a class="h5" href="#">Nguyễn Mai</a>
          </div>
          <div class="mb-4">
            <a class="h5" href="#">Nguyễn Mai</a>
          </div>
          <div class="mb-4">
            <a class="h5" href="#">Nguyễn Mai</a>
          </div>
          <div class="mb-4">
            <a class="h5" href="#">Nguyễn Mai</a>
          </div>
          <div class="mb-4">
            <a class="h5" href="#">Nguyễn Mai</a>
          </div>

        </div>
      </div>
      <Article :news="news"/>
      <div class="col-lg-3">
        <Category />
      </div>
    </div>
  </div>

</template>

<script>

import axios from 'axios'
import { article } from '../api.json'
import Category from '../components/Category.vue';
import Article from '../components/Article.vue';


export default {
  components: { Category, Article },
  data(){
    return {
      news: []
    }
  },
  methods: {
    async asyncData() {
      try {
        const res = await axios.get(`${process.env.BASEWEB}/${article.getAll}`)

        const news = res.data.data;
        this.news = news;
      } catch (error) {
        return { error }
      }
  },
},
mounted(){
  this.asyncData();
},

}

</script>

<style>
.row {
  width: 80%;
  margin: auto;
}
.container{
  margin-top: 120px;
  margin-bottom: 40px;
}
</style>