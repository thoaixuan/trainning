<template>
  <div>
    <h1 class="text-center mb-4">Góc nhìn</h1>
    <div class="row justify-content-center">
      <div class="col-12 col-lg-6 col-md-12">
        <Article/>
      </div>
      <div class="col-12 col-lg-4 col-md-12">
        <el-card shadow="never">
        <Topic/>
        </el-card>
        <h4 class="text-danger mt-4">Đọc nhiều</h4>
        <TopComment/>
        <TopComment/>
        <TopComment/>
        <TopComment/>
      </div>
    </div>
</div>
</template>

<script>
import Article from '../components/Article.vue';
import Topic from '../components/Topic.vue';
import TopComment from '../components/TopComment.vue';
export default {
    name: "IndexPage",
    components: { Article, Topic, TopComment },
    computed:{
      news(){
        //console.log(this.$store.state.news.model)
        return this.$store.state.news.model;
      }
    },
    mounted(){
      //this.$store.dispatch("news/getNews")
    }

}
</script>
