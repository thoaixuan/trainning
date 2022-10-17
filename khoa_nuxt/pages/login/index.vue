<template>
    <div class="d-flex justify-content-center mt-5">
        <el-card>
            <el-tabs v-model="activeName">
                <el-tab-pane label="Đăng nhập" name="login">
                    <el-form ref="form">
                        <el-form-item label="Tài khoản">
                            <el-input v-model="account"></el-input>
                        </el-form-item>
                        <el-form-item label="Mật khẩu">
                            <el-input v-model="password"></el-input>
                        </el-form-item>
                        <el-form-item v-if="this.message!==''">{{this.message}}</el-form-item>
                        <el-form-item class="text-center">
                            <el-button @click="login()" type="primary">Đăng nhập</el-button>
                        </el-form-item>
                    </el-form>
                </el-tab-pane>
                <el-tab-pane label="Đăng ký" name="signup">
                    <el-form ref="form">
                        <el-form-item label="Tài khoản">
                            <el-input v-model="account"></el-input>
                        </el-form-item>
                        <el-form-item label="Mật khẩu">
                            <el-input v-model="password"></el-input>
                        </el-form-item>
                        <el-form-item label="Họ">
                            <el-input v-model="firstname"></el-input>
                        </el-form-item>
                        <el-form-item label="Tên">
                            <el-input v-model="lastname"></el-input>
                        </el-form-item>
                        <el-form-item v-if="this.message!==''">{{this.message}}</el-form-item>
                        <el-form-item class="text-center">
                            <el-button  @click="signup()" type="primary">Đăng ký</el-button>
                        </el-form-item>
                    </el-form>
                </el-tab-pane>
            </el-tabs>
            
        </el-card>
    </div>
    
    
</template>

<script>
export default {
    layout: "empty",
    data() {
      return {
        activeName: 'login',
        account: "",
        password: "",
        firstname: "",
        lastname: "",
        message: "",
      };
    },
    methods: {
        async login(){
            let account = this.account;
            let password = this.password;
            let data = {account, password}
            let res = await this.$store.dispatch("user/signIn", data)

            if(res.data.status===404){
                this.message = res.data.message;
                return;
            }
            if(res.data.message==='success'){
                localStorage.setItem("user", res.data.data.account)
                this.$router.push('/')
            }
        },
        async signup(){
            let account = this.account;
            let password = this.password;
            let firstname = this.firstname;
            let lastname = this.lastname;
            let data = {account, password,firstname,lastname}
            let res = await this.$store.dispatch("user/signUp", data)
            console.log(res);
            if(!res.data){
                this.message = res.data.message;
                return;
            }
            if(res.data.status==200){
                this.message = 'Đăng ký thành công';
                this.$router.push('/login')
            }
        }
    },
}
</script>

<style>
.el-tabs__nav-wrap{
    display: flex;
    justify-content: center;
}
.el-form-item{
    margin-bottom: 10px;
}
</style>