<template>
    <div class="container">
      <div class="row">
        <div class="col-lg-2">
          
        </div>
        <div class="col-lg-7">
          <div class="news-wrapper">
            <div class="header">
              <div class="d-flex">
                <a href="/">Góc nhìn</a>
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                <a href="">Y tế sức khoẻ</a>
              </div>
              <span>Thứ bảy, 23/7/2022, 12:00 (GMT+7)</span>
            </div>
            <span class="h1 fw-bold">{{new_detail.title}}</span>
            <div class="avatar-wrapper mt-3">
              <div class="d-flex align-items-center">
                <img class="rounded-circle" :src="new_detail.image"/>
                <div class="ml-2">
                  <a class="text-decoration-none h4 fw-bold" href="#">Trần Hữu Hiệp</a>
                  <p>Tiến sĩ kinh tế</p>
                </div>
              </div>
              <div class="btn-follow">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                <span>Theo dõi</span>
              </div>
            </div>
            <div class="lh-base mt-3" v-html="new_detail.content">

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
  import { article } from '../../../api.json'
  export default {
    data(){
      return {
        new_detail: []
      }
    },
    methods:{
      async asyncData() {
        const id = this.$route.params.id;
        try {
          const res = await axios.get(`${process.env.BASEWEB}/${article.getByID}${id}`)

          const new_detail = res.data.result;
          this.new_detail = new_detail;
          console.log(new_detail)
        } catch (error) {
          return { error }
        }
      },
    },
    mounted(){
      this.asyncData()
        console.log(this.$route.params.id)
    }
  }
  </script>
  
  <style>
  .container{
    margin-top: 120px;
    margin-bottom: 20px;
  }
  .news-wrapper{
    padding: 10px;
  }
  .header{
    height: 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 10px;
  }
  .avatar-wrapper{
    display: flex;
    justify-content: space-between;
    align-items: center;
  }
  .avatar-wrapper img{
    width: 56px;
    height: 56px;
  }
  .btn-follow{
    display: flex;
    border: 1px solid #222;
    cursor: pointer;
    align-items: center;
    padding: 5px;
  }
  .btn-follow:hover{
    background-color: #ececec;
  }
  </style>