<template>
  <div class="container">
    <div class="d-flex justify-content-center mt-4">
        
        <div class="card text-center">
            <h1 class="card-header">Đăng ký</h1>
            <div class="card-body">
                <div class="input-group mb-3">
                    <span class="input-group-text">Tài khoản</span>
                    <input v-model="account" type="text" class="form-control" placeholder="" />
                </div>
                <span v-if="msg.account">{{msg.account}}</span>
                <div class="input-group mb-3">
                    <span class="input-group-text">Mật khẩu</span>
                    <input v-model="password" type="text" class="form-control" placeholder="" />
                </div>
                <span v-if="msg.password">{{msg.password}}</span>
                <div class="input-group mb-3">
                    <span class="input-group-text">Họ</span>
                    <input v-model="firstname" type="text" class="form-control" placeholder="" />
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text">Tên</span>
                    <input v-model="lastname" type="text" class="form-control" placeholder="" />
                </div>
                <div v-if="message!==''" class="alert alert-danger">{{message}}</div>
                <button @click="SignUp()" type="button" class="btn btn-primary">Đăng Ký</button>
            </div>
        </div>
        
    </div>
  </div>
</template>

<script>
import axios from 'axios';
import { users } from '../../api.json'
export default {
    layout: "empty",
    data(){
        return{
            account: "",
            password: "",
            firstname: "",
            lastname: "",
            message: "",
            msg:[]
        }
    },
    watch:{
        account(value){
            this.account = value;
            this.checkValidateAccount(value);
        },
        password(value){
            this.password = value;
            this.checkValidatePassword(value);
        }
    },
    methods:{
        async SignUp(){
            let account = this.account;
            let password = this.password;
            let firstname = this.firstname;
            let lastname = this.lastname;
            let data = {account, password,firstname, lastname}
            let user = await axios({
                method:'post',
                url:`${process.env.BASENEST}/${users.signup}`,
                data: data
            })
            if(user.data.status){
                this.message=user.data.message
            }else{
                this.$router.push('/signin')
            }
           
        },
        checkValidateAccount(value){
            if(value.length<6){
                this.msg['account'] = 'Must be 6 characters'
            }else{
                this.msg['account'] = ''
            }
        },
        checkValidatePassword(value){
            if(value.length<6){
                this.msg['password'] = 'Must be 6 characters'
            }else{
                this.msg['password'] = ''
            }
        }
    }
}
</script>

<style>

</style>