<template>
<div>   
    <div class="main">
       <div id="layout-a" class="theme-blue">
        <!-- main body area -->
        <div class="main auth-div p-2 py-3 p-xl-5">
            
            <!-- Body: Body -->
            <div class="body d-flex p-0 p-xl-5">
                <div class="container-fluid">

                    <div class="row g-0">
                        <div class="col-lg-6 d-none d-lg-flex justify-content-center align-items-center rounded-lg auth-h100">
                            <div style="max-width: 25rem;">
                                <div class="text-center mb-5">
                                    <img src="/themes/assets/images/logo/logo.png" class="w-120px">
                                </div>
                    
                                <div class="mb-5">
                                    <h2 class="color-900">Đăng nhập với e-Gate</h2>
                                </div>
                                <ul class="mb-5">
                                    <li class="mb-4">
                                        <span class="d-block fw-bold mb-1">Make life easier</span>
                                        <span class="text-muted">Amazing Features to make your life easier & work efficient</span>
                                    </li>
                    
                                    <li>
                                        <span class="d-block fw-bold">Easily add &amp; manage your services</span>
                                    </li>
                                </ul>
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <a href="https://www.facebook.com/INGVIETNAM" class="me-2 text-muted"><i class="fa fa-facebook-square fa-lg"></i></a>
                                        <a href="https://www.youtube.com/channel/UCCHaUzCIKSJnG7-WfhrT55g" class="me-2 text-muted"><i class="fa fa-youtube-square fa-lg"></i></a>
                                        <a href="https://www.instagram.com/ing_viet_nam/" class="me-2 text-muted"><i class="fa fa-instagram fa-lg"></i></a>
                                    </div>
                                    <div>
                                        <a href="/" class="me-2 text-muted">Home</a>
                                        <a href="/about-us" class="me-2 text-muted">About Us</a>
                                        <a href="/policy" class="me-2 text-muted">FAQs</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                                <div class="col-lg-6 d-flex justify-content-center align-items-center border-0 rounded-lg auth-h100">
                                    <div class="w-100 p-4 p-md-5 card border-0" style="max-width: 32rem;">
                                             <ValidationObserver v-slot="{ invalid }">
                                                <form class="row g-1 p-0 p-md-4">
                                                    <div class="col-12 text-center mb-5">
                                                        <h1>Đăng nhập</h1>
                                                        <span>Free access to our dashboard.</span>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="mb-2">
                                                        <ValidationProvider rules="required|email|minmax:1,400" v-slot="{ errors }">
                                                            <label class="form-label">Email</label>
                                                            <input v-model="data.email" type="email" class="form-control form-control-lg" placeholder="name@gmail.com">
                                                            <span class="text-validate">{{ errors[0] }}</span>

                                                        </ValidationProvider>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="mb-2">
                                                            <ValidationProvider rules="required|password|minmax:1,400" v-slot="{ errors }">
                                                            <div class="form-label">
                                                            <span class="d-flex justify-content-between align-items-center">
                                                                    Mật khẩu
                                                                </span>
                                                            </div>
                                                            <input @keyup.enter="login" v-model="data.password" type="password" class="form-control form-control-lg" placeholder="***************">
                                                             <span class="text-validate">{{ errors[0] }}</span>
                                                            </ValidationProvider>

                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                            <label class="form-check-label" for="flexCheckDefault">
                                                                Remember me
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-6 mt-3">
                                                        <span class="btn btn-block btn-dark lift text-uppercase w-100" :disabled="invalid" @click="login">SIGN IN</span>
                                                    </div>
                                                    <div class="col-6 mt-3">
                                                        <div class="position-relative lift">
                                                            <a href="/auth/google" class="btn btn-primary btn-block text-uppercase w-100 ps-5">Login</a>
                                                            <div class="border border-primary position-absolute top-0 start-0 bg-white">
                                                                <a href="/auth/google"><img src="/themes/assets/images/google.png" width="38" height="37"></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 text-center mt-4">
                                                        <span class="text-primary cursor-pointer" data-bs-toggle="modal" data-bs-target="#modalForgot">Forgot Password?</span>
                                                        <br>
                                                        <span class="text-muted" >Don't have an account yet?   <router-link to="/signup">Sign up here </router-link> </span>
                                                    </div>
                                                     
                                                </form>
                                            </ValidationObserver>

                                        <!-- End Form -->
                                    </div>
                                </div>
     
                    </div> <!-- End Row -->
                    
                </div>
            </div>

            <div class="animate_lines">
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
            </div>

        </div>
    </div>
    </div>
    <!-- Modal -->
        <ValidationObserver v-slot="{ invalid }">
        <form action="">
            <div class="modal fade" id="modalForgot" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Đổi mật khẩu</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <ValidationProvider rules="required|email" v-slot="{ errors }">
                                        <input type="text" class="form-control" v-model="dataForgetEmail.email" maxlength="100" placeholder="Địa chỉ email"/>
                                        <span class="tex-gray-400 text-sm italic">{{ errors[0] }}</span>
                                </ValidationProvider>
                        </div>
                        <div class="col-9">
                            <ValidationProvider rules="required|number|minmax:1,200" v-slot="{ errors }">
                                <input type="text" class="form-control" v-model="dataForgetEmail.remember_code"
                                                placeholder="Mã"
                                                maxlength="100"/>
                                <span class="tex-gray-400 text-sm italic">{{ errors[0] }}</span>
                            </ValidationProvider> 
                        </div>
                        <div class="col-3">
                            <button type="button" class="btn btn-primary btn-sm" @click="sendEmail()">Gửi mã</button>
                        </div>
                        <div class="col-12 mt-3">
                            <ValidationProvider name="confirm" rules="required|password|minmax:1,100" v-slot="{ errors }">
                                <input type="password" class="form-control" v-model="dataForgetEmail.new_password" maxlength="100" placeholder="Mật khẩu mới"/>
                                <span class="tex-gray-400 text-sm italic">{{ errors[0] }}</span>
                            </ValidationProvider>
                        </div>
                        </div>   
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" @click="submitChangePassword" :disabled="invalid">Cập nhật mật khẩu</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </ValidationObserver> 
</div>
</template>

<script>
import load_api from '../../../../../api.json'
import axios from "axios";
export default {
    layout:"login",
    metaInfo() {
        return {
        title: "Login to e-Gate"
        }
    },
  data() {
    return {
    object:{
        api:"",
        data:"",
    },
    data: {
        email: "",
        password: "",
        },
    dataForgetEmail:{
        email:"",
        remember_code:"",
        new_password:"",
      },
    };
  },
  methods: {
    async login(){
        var vm= this;
        vm.object.api= load_api.auth.login;
        vm.object.data=vm.data;
        try {
            let res = await vm.$store.dispatch("postData",vm.object);
            if(res.status==200){
                    Vue.$toast.open({
                    message: 'Đăng nhập thành công',
                    type: 'success',
                    position: 'top-right'
                });   
                localStorage.setItem('auth',res.data.result.token);
                if(this.$route.query.link == "e-gate-gpt-chat"){
                    window.location.href = "/e-gate-gpt-chat";
                }else {
                    window.location.href = "/";
                }
                // this.$router.push('/');
            }
      
        } catch (error) {
              Vue.$toast.open({
                message: 'Tên tài khoản hoặc mật khẩu bị sai',
                type: 'error',
                position: 'top-right'
            });  
        }

      
    },
    async sendEmail(){
      var vm = this;
      console.log(load_api.auth.forgotPass);
      console.log(vm.dataForgetEmail.email);
        try {
             let res = await axios.post(load_api.auth.forgotPass,{email:vm.dataForgetEmail.email});
             console.log(res);
            if(res.status==200){
                Vue.$toast.open({
                    message: 'Gửi mã thành công',
                    type: 'success',
                    position: 'top-right'
                });  
        }
        } catch (error) {
            Vue.$toast.open({
                message: 'Gửi mã thất bại',
                type: 'error',
                position: 'top-right'
            });
        }
      
      
    },
    async submitChangePassword(){
      var vm = this;
      vm.object.api= load_api.auth.changePass;
      vm.object.data=vm.dataForgetEmail;
      vm.$nextTick(async ()=>{
      try {
        let res = await vm.$store.dispatch("postData",vm.object);
        if(res.status==200){
            Vue.$toast.open({
                    message: 'Thay đổi mật khẩu thành công',
                    type: 'success',
                    position: 'top-right'
            });
            window.location.href = "/login";
        }
      } catch (error) {
            Vue.$toast.open({
                message: 'Đã xảy ra lỗi, vui lòng thử lại',
                type: 'error',
                position: 'top-right'
            });
      }
      });
    },
  },
  mounted() {
    var vm = this;
    vm.$nextTick(async () => {
    });
  },
};
</script>
<style>

</style>