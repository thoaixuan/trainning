<template>
  <div>
    <h1 class="text-center mb-4">Góc nhìn</h1>
  <el-row type="flex" justify="center">
    <el-col :span="12">
      <Article/>
    </el-col>
    <el-col :span="6" :offset="1">
      <el-card shadow="never">
        <Topic/>
      </el-card>
      <h4 class="text-danger mt-4">Đọc nhiều</h4>
      <TopComment/>
      <TopComment/>
      <TopComment/>
      <TopComment/>
    </el-col>
  </el-row>
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
