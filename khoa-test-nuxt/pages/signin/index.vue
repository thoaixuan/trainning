<template>
  <div class="container">
    <div class="d-flex justify-content-center mt-4">
        
        <div class="card text-center">
            <h1 class="card-header">Đăng nhập</h1>
            <div class="card-body">
                <div class="input-group mb-3">
                    <span class="input-group-text">Tài khoản</span>
                    <input v-model="account" type="text" class="form-control" placeholder="" />
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text">Mật khẩu</span>
                    <input v-model="password" type="text" class="form-control" placeholder="" />
                </div>
                <div v-if="message!==''" class="alert alert-danger">{{message}}</div>
                <button @click="SignIn()" type="button" class="btn btn-primary">Đăng nhập</button>
                <div class="d-flex justify-content-center m-auto">
                    <p>Chưa có tài khoản</p>
                    <a :href="`/signup`" class="ml-2 text-primary">Đăng ký</a>
                </div>
            </div>
        </div>
        
    </div>
  </div>
</template>

<script>
import axios from 'axios';
import { users } from '../../api.json'
import EventBus from '../../EventBus'

export default {
    layout: "empty",
    data(){
        return{
            account: "",
            password: "",
            message: "",
        }
    },
    methods:{
        async SignIn(){
            let account = this.account;
            let password = this.password;
            let data = {account, password}
            let user = await axios({
                method:'post',
                url:`${process.env.BASENEST}/${users.signin}`,
                data: data
            })
            if(user.data.status){
                this.message=user.data.message
            }else{
                localStorage.setItem("user", user.data.account)
                this.$router.push('/')
            }
           
            
        }
    }

}
</script>

<style>

</style>