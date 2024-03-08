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
                                    <h2 class="color-900">Cập nhật thông tin đặt hàng</h2>
                                </div>
                    
                                <!-- List Checked -->
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
                                <!-- Form -->
                                <ValidationObserver v-slot="{ invalid }">
                                <form class="row g-1 p-0 p-md-4">
                                    <div class="col-12 text-center mb-5">
                                        <h1>Cập nhật</h1>
                                    </div>
                                      <div class="col-12">
                                            <div class="mb-2">
                                                <ValidationProvider rules="required|text" v-slot="{ errors }">
                                                <label class="form-label">Họ tên </label>
                                                <input v-model="dataRegister.fullname" type="text" class="form-control form-control-lg" placeholder="Họ tên">
                                                <span class="text-validate text-danger">{{ errors[0] }}</span>
                                                </ValidationProvider>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-2">
                                                <ValidationProvider rules="required|phone" v-slot="{ errors }">
                                                <label class="form-label">Số điện thoại </label>
                                                <input v-model="dataRegister.phone" type="text" class="form-control form-control-lg" placeholder="Số điện thoại">
                                                <span class="text-validate text-danger">{{ errors[0] }}</span>
                                                </ValidationProvider>
                                            </div>
                                        </div>
                                    <div class="col-12">
                                        <div class="mb-2">
                                            <ValidationProvider rules="required|email" v-slot="{ errors }">
                                            <label class="form-label">Email</label>
                                            <input v-model="dataRegister.email" type="email" class="form-control form-control-lg" placeholder="name@example.com">
                                            <span class="text-validate text-danger">{{ errors[0] }}</span>
                                            </ValidationProvider>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex align-items-end flex-column">
                                        <p class="text-validate">Mật khẩu mặc định: {{dataRegister.password}}</p>
                                    </div>
                                    <div class="col-12 text-center mt-4">
                                        <button class="btn btn-lg btn-block btn-dark lift text-uppercase " @click="submitRegister" :disabled="invalid"><span v-if="checkLogin" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>Cập nhật</button>
                                    </div>
                                      <div class="col-12 text-center mt-4">
                                            <span class="text-muted" >Bạn đã có tài khoản?   <router-link to="/login">Đăng nhập</router-link> </span>
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
</div>
</template>

<script>
import api from '../../../../../api.json';
import axios from "axios";

export default {
metaInfo() {
    return {
    title: "Sign up e-Gate"
    }
},
  data() {
    return {
      dataRegister:{
        email:"",
        password:"egate123456",
        fullname:"",
        phone:"",
      },
      object:{
        api:"",
        data:{},
      },
      checkLogin:false,

    };
  },
  methods: {
   async submitRegister(e){
          e.preventDefault();
          var vm =this;
         vm.checkLogin=true;
          vm.$nextTick(async()=>{
               try{
                let res = await axios.post(api.auth.register,vm.dataRegister);
                if(res.status==200){
                      Vue.$toast.open({
                        message: 'Đang được điều hướng',
                        type: 'success',
                        position: 'bottom-right'
                    });
                    vm.checkLogin=true;
                    vm.login();
                }
              } catch (error) {
                    Vue.$toast.open({
                        message: error.response.data.errors[0].param +" "+ "đã tồn tại",
                        type: 'error',
                        position: 'bottom-right'
                    });
                    vm.checkLogin=false;

             }
         });
       },
    async login(){
        var vm= this;
        vm.object.api= api.auth.login;
        vm.object.data=vm.dataRegister;
        try {
            vm.checkLogin=true;
            let res = await vm.$store.dispatch("postData",vm.object);
            if(res.status==200){
                    Vue.$toast.open({
                    message: 'Đăng nhập thành công',
                    type: 'success',
                    position: 'bottom-right'
                });   
                vm.checkLogin=true;
                localStorage.setItem('auth',res.data.result.token);
                window.location.href = "/cart";
            }
        
        } catch (error) {
                Vue.$toast.open({
                message: 'Tên tài khoản hoặc mật khẩu bị sai',
                type: 'error',
                position: 'bottom-right'
            });  
        }

        vm.checkLogin=false;
        
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