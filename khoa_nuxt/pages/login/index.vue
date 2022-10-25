<template>
    <div class="d-flex justify-content-center mt-5">
        <el-card>
            <el-tabs v-model="activeName">
                <el-tab-pane label="Đăng nhập" name="login">
                    <el-form ref="form">
                        <el-form-item label="Tài khoản">
                            <el-input v-model="account"></el-input>
                        </el-form-item>
                        <span v-if="msg.account">{{msg.account}}</span>
                        <el-form-item label="Mật khẩu">
                            <el-input v-model="password"></el-input>
                        </el-form-item>
                        <span v-if="msg.password">{{msg.password}}</span>
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
                        <span v-if="msg.account">{{msg.account}}</span>
                        <el-form-item label="Mật khẩu">
                            <el-input v-model="password"></el-input>
                        </el-form-item>
                        <span v-if="msg.password">{{msg.password}}</span>
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
        msg: []
      };
    },
    watch:{
        account(value){
            this.account=value;
            this.validateAccount(value)
        },
        password(value){
            this.password=value;
            this.validatePassword(value)
        }
    },
    methods: {
        validateAccount(value){
            var regAccount = new RegExp('^(?=.*[0-9])(?=.*[a-zA-Z])([a-zA-Z0-9]+){6,}$')
            this.msg['account'] = 'ít nhất 6 kí tự, không ký tự đặc biệt';
            if(regAccount.test(value)){
                return true;
            }
            return false;
        },
        validatePassword(value){
            var regPass = new RegExp('^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9]).{6,}$')
            this.msg['password'] = 'ít nhất 6 kí tự, 1 kí tự viết hoa, 1 ký tự số';
            if(regPass.test(value)){
                return true;
            }
            return false;
        },
        async login(){
            let account = this.account;
            let password = this.password;
            if(this.validateAccount(account)===false || this.validatePassword(password)===false){
                return;
            }
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
            if(this.validateAccount(account)===false || this.validatePassword(password)===false){
                return;
            }
            let data = {account, password,firstname,lastname}
            let res = await this.$store.dispatch("user/signUp", data)
            console.log(res.data)
            if(res.data.status==404){
                
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