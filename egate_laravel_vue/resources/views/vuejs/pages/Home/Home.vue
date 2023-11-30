<template>
  <div>
    <div class="main">
      <h1 class="d-none">e-Gate - Kết nối kỷ nguyên công nghệ</h1>
      <p class="d-none">Cung cấp các giải pháp về ứng dụng công nghệ tiên tiến nhất nhằm nâng cao trải nghiệm của người dùng trên hệ thống. Các sản phẩm chất lượng - Bảo vệ môi trường và các sản phẩm công nghệ tiện ích.</p>
      <!-- Hero home -->
      <Hero></Hero>
      <!-- About home-->
      <About></About>
      <!-- Porfolio home -->
      <Portfolio></Portfolio>
      <!-- Contact home -->
      <Contact></Contact>
    </div>
  </div>
</template>
<script>
import load_api from '../../../../../api.json'
import axios from "axios";
import Hero from './components/Hero.vue'
import About from './components/About.vue'
import Portfolio from './components/Portfolio.vue'
import Contact from './components/Contact.vue'
export default {
   components: {
      Hero,
      About,
      Portfolio,
      Contact
    },
    data:function(){
      return{
      
      }
    },
    methods:{
        async loginWithGoogle () {  
            if(typeof payload != "undefined"){
              const res = await axios.post(load_api.loginGoogle.url,payload);
              console.log(res.data);
              if(res.data.err==0){
                  this.$store.commit('setLoginUser',{
                      expiresIn:res.data.result.expiresIn,
                      user: res.data.result.user,
                      token: res.data.result.token
                  });
                // location.reload()
              }
            }
        },
    },
    mounted() {
      var vm = this;
      vm.$nextTick(async () => {
        vm.loginWithGoogle()
      });
    },
}
</script>
