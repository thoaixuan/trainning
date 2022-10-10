<template>
  <div class="container">
    <p class="h1 text-center fw-bolder">Góc nhìn</p>
    <div class="row">
      <div class="col-lg-2">
        tác giả
      </div>
      <div class="col-lg-7">
        <div class="article" v-for="(item, x) in news" :key="x">
              <div class="article-top">
                <div class="content">
                  <p class="h3 fw-bold">{{item.title}}</p>
                  <p class="lh-base">{{item.summary}}</p>
                </div>
                <img class="rounded-circle" :src="item.image" />
              </div>
              <div class="article-bottom">
                <div class="d-flex align-items-center">
                  <span class="mr-4">Kinh doanh & quản trị</span>
                  <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path></svg>
                  <span class="ml-1 text-info">65</span>
                </div>
                
                <p>Hồ Quốc Tuấn</p>
              </div>
          </div>
      </div>
      <div class="col-lg-3">

      </div>
    </div>
  </div>
  
</template>

<script>

import axios from 'axios'
import {baseURL, article} from  '../api.json'
export default {
    async asyncData(){
      try{
        const news = await axios.get(`${baseURL}/${article.getAll}`).then((res)=>{
          console.log(res.data.result.table.rows)
          return res.data.result.table.rows
        })
        return {news}
      }catch(error){
        return {error}
      }
    }
}

</script>

<style>
  .row{
    width: 80%;
    margin: auto;
  }
  .article{
    padding: 20px;
    border-bottom: 1px solid #e5e5e5;
    color: #4f4f4f!important;
  }
  .article:hover{
    cursor: pointer;
  }
  .article-top{
    display: flex;
    justify-content: space-between;
  }
  .article-top .content{
    width: 80%;
  }
  .article-top img{
    width: 80px;
    height: 80px;
  }
  .article-bottom{
    margin-top: 10px;
    display: flex;
    justify-content: space-between;
    align-items: center;
  }
</style>