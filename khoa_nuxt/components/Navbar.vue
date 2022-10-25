<template>
    <nav class="navbar navbar-expand-lg justify-content-center">
        <div class="container-fluid">
            <el-button size="small" icon="el-icon-s-fold" class="navbar-toggler" data-bs-toggle="navbarNavDropdown" data-bs-target="#navbarNavDropdown"></el-button>
            <a class="navbar-brand" href="#">
                <img class="img-thumbnail border-0"
                                src="https://s1.vnecdn.net/vnexpress/restruct/i/v654/v2_2019/pc/graphics/logo.svg"
                                alt="VnExpress - Bao tieng Viet nhieu nguoi xem nhat">
            </a>
            <div></div>
            <div class="collapse navbar-collapse justify-content-between" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <span>Thứ tư, 5/10/2022</span>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item me-2">
                        <el-button size="mini" icon="el-icon-time" round>Mới nhất</el-button>
                    </li>
                    <li class="nav-item me-2">
                        <el-button size="mini" icon="el-icon-warning-outline" round>International</el-button>
                    </li>
                    <li class="nav-item me-2">
                        <el-input @keyup.enter.native="fetchNewsBySearch(txtSearch)" v-model="txtSearch" size="mini" placeholder="Type something" prefix-icon="el-icon-search">
                        </el-input>
                    </li>
                    <li class="nav-item me-2">
                        <el-button v-if="!this.user" @click="toSignIn()" size="mini" icon="el-icon-user" round>Đăng nhập</el-button>
                    </li>
                    <li class="nav-item me-2">
                        <el-button v-if="this.user" size="mini" icon="el-icon-user" round>{{this.user}}</el-button>
                    </li>
                </ul>
            </div>
                
        </div>
    </nav>
</template>

<script>
import EventBus from '../EvenBus'
export default {
    data(){
        return{
            user : '',
            txtSearch: ''
        }
    },
    methods: {
        async fetchNewsBySearch(txtSearch){
            console.log(txtSearch)
            EventBus.$emit('txtSearch', txtSearch);
        },
        toSignIn(){
            this.$router.push('/login')
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
