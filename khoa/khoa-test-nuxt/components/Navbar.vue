<template>
    <nav class="navbar">
        <div class="navbar-container">
            <div class="navbar-right">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <Collapse/>
                </div>
                <img src="https://s1.vnecdn.net/vnexpress/restruct/i/v654/v2_2019/pc/graphics/logo.svg"
                alt="VnExpress - Bao tieng Viet nhieu nguoi xem nhat">
                <div class="line-vertical"></div>
                <span class="timenow">Thứ tư, 5/10/2022</span>
            </div>

            <div class="navbar-left">
                <button class="btnWrapper">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <p> Mới nhất</p>
                </button>
                <button class="btnWrapper">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path></svg>
                    <p> International</p>
                </button>
                <div class="line-vertical"></div>
                <div class="searchWrapper">
                    <input placeholder="Tìm kiếm" v-model="txtSearch"/>
                    <svg @click="fetchNewsBySearch(txtSearch)" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </div>
                
                    <a v-if="this.user===''" class="btnWrapper login" :href="`/signin`">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        <p> Đăng nhập</p>
                    </a>
                    <a v-if="this.user!==''" class="btnWrapper login" :href="`/signin`">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        <p> {{this.user}}</p>
                    </a>
            </div>
        </div>
        
       <div class="line-horizontal"></div>
        <Dropdown/>
       
       <div class="line-horizontal"></div>
    </nav>
    

</template>

<script>
import EventBus from '../EventBus'
import Dropdown from './Dropdown.vue';
import Collapse from './Collapse.vue';
import axios from 'axios';
import { news } from '../api.json'
export default {
    name: "Navbar",
    components: { Dropdown, Collapse },
    data(){
        return{
            user : '',
            txtSearch: "",
            page: 1
        }
    },
    
    methods: {
        async fetchNewsBySearch(txtSearch){
            EventBus.$emit('txtSearch', txtSearch);
        },
        getUser(){
         this.user = localStorage.getItem("user");
         console.log(this.user)
       } 
    }, 
    mounted(){
        this.getUser()
    },
}
</script>


<style>
    .navbar{
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        background-color: white;
    }
    .navbar-container{
        display: flex;
        justify-content: space-between;
        align-items: center;
        height: 50px;
        max-width: 1400px;
        width: 80%;
        margin: auto;
    }
    .navbar-right{
        display: flex;
        align-items: center;
    }
    .navbar-right img{
        margin-left: 10px;
        margin-right: 20px;
        width: 128px;
    }
    .line-vertical{
        height: 30px;
        border: 0.5px solid #e5e5e5;
    }
    .timenow{
        color: #757575;
        margin-left: 20px;
    }
    .navbar-left{
        display: flex;
        align-items: center;
    }
    .btnWrapper{
        display: flex;
        align-items: center;
        color: #757575;
        border: 1px solid #e5e5e5;
        border-radius: 5px;
        padding: 0 10px;
        height: 32px;
        font-size: 12px;
        margin-right: 20px;
    }
    .btnWrapper:hover{
        background-color: #f2f2f2;
        cursor: pointer;
    }
    .searchWrapper{
        display: flex;
        align-items: center;
        border: 1px solid #e5e5e5;
        border-radius: 16px;
        font-size: 12px;
        color: #757575;
        margin-left: 20px;
        padding: 0 5px;
        width: 160px;
        height: 32px;
    }
    .searchWrapper input{
        border: none;
        width: 80%;
        padding: 0 0 0 5px;
    }
    .searchWrapper svg{
        padding: 0 5px 0 5px;
    }
    .login{
        border: none;
    }
    .login:hover{
        background-color: white;
        color: #087cce;
    }
    .line-horizontal{
        width: 100%;
        border: 0.5px solid #e5e5e5;
    }
    @media screen and (max-width: 800px) {
        .author-wrapper{display: none;}
        .category-wrapper{display: none;}
    }
    @media screen and (max-width: 1000px) {
        .menu{display: none;}
        .news-wrapper .header span{display: none;}
    }
    @media screen and (max-width: 1150px) {
        .timenow{display: none;}
        .line-vertical{display: none;}
        .navbar-left .btnWrapper{display: none;}
    }
    
</style>