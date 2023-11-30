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
                                        <h1>Đăng ký</h1>
                                    </div>
                                    <!-- <div class="col-12 text-center mb-4">
                                        <a class="btn btn-lg btn-outline-secondary btn-block" href="#">
                                            <span class="d-flex justify-content-center align-items-center">
                                                <img class="avatar xs me-2" src="{{asset('themes/assets/images/google.svg')}}" alt="Image Description">
                                                Sign in with Google
                                            </span>
                                        </a>
                                        <span class="dividers text-muted mt-4">OR</span>
                                    </div> -->
                                      <div class="col-6">
                                            <div class="mb-2">
                                                <ValidationProvider rules="required|text" v-slot="{ errors }">
                                                <label class="form-label">Họ tên </label>
                                                <input v-model="dataRegister.fullname" type="text" class="form-control form-control-lg" placeholder="Họ tên">
                                                <span class="text-validate">{{ errors[0] }}</span>
                                                </ValidationProvider>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="mb-2">
                                                <ValidationProvider rules="required|phone" v-slot="{ errors }">
                                                <label class="form-label">Số điện thoại </label>
                                                <input v-model="dataRegister.phone" type="text" class="form-control form-control-lg" placeholder="Số điện thoại">
                                                <span class="text-validate">{{ errors[0] }}</span>
                                                </ValidationProvider>
                                            </div>
                                        </div>
                                    <div class="col-12">
                                        <div class="mb-2">
                                            <ValidationProvider rules="required|email" v-slot="{ errors }">
                                            <label class="form-label">Email</label>
                                            <input v-model="dataRegister.email" type="email" class="form-control form-control-lg" placeholder="name@example.com">
                                            <span class="text-validate">{{ errors[0] }}</span>
                                            </ValidationProvider>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-2">
                                            <ValidationProvider rules="required|password" v-slot="{ errors }">
                                            <label class="form-label">Mật khẩu</label>
                                            <input v-model="dataRegister.password" type="password" class="form-control form-control-lg" placeholder="***************">
                                            <span class="text-validate">{{ errors[0] }}</span>
                                            </ValidationProvider>
                                        </div>
                                    </div>
                                    <div class="col-12 text-center mt-4">
                                        <button class="btn btn-lg btn-block btn-dark lift text-uppercase" @click="submitRegister" :disabled="invalid">Đăng ký</button>
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
        password:"",
        fullname:"",
        phone:"",
      }
    };
  },
  methods: {
   async submitRegister(e){
          e.preventDefault();
          var vm =this;
          console.log(vm.dataRegister);
          vm.$nextTick(async()=>{
               try{
                let res = await axios.post(api.auth.register,vm.dataRegister);
                console.log(res);
                if(res.status==200){
                   Vue.$toast.open({
                    message: 'Đăng ký thành công',
                    type: 'success',
                    position: 'top-right'
                    });
                if(this.$route.query.link == "e-gate-gpt-chat"){
                    window.location.href = "/login?link=e-gate-gpt-chat";
                }else {
                    window.location.href = "/";
                }
                }
              } catch (error) {
                Vue.$toast.open({
                    message: error.response.data.errors[0].param +" "+ "đã tồn tại",
                    type: 'error',
                    position: 'top-right'
                });
             }
         });
       }
 
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