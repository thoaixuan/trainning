<template>
  <div>
    <div class="section pb-0 footer">
        <div class="footer-top py-5 bg-primary text-light mb-5">
            <div class="container">
                <div class="row g-3 align-items-center justify-content-center row-cols-xl-4 row-cols-lg-4 row-cols-md-2 row-cols-sm-2 row-cols-1">
                    <div class="col text-center">
                        <i class="fa fa-map-marker fa-2x" aria-hidden="true"></i>
                        <h4 class="mt-2">Free Shipping</h4>
                        <span>Order Over $200</span>
                    </div>
                    <div class="col text-center">
                        <i class="fa fa-money fa-2x" aria-hidden="true"></i>
                        <h4 class="mt-2">Best Price</h4>
                        <span>Guaranteed</span>
                    </div>
                    <div class="col text-center">
                        <i class="fa fa-lock fa-2x" aria-hidden="true"></i>
                        <h4 class="mt-2">100% Secure</h4>
                        <span>Payments</span>
                    </div>
                    <div class="col text-center">
                        <i class="fa fa-retweet fa-2x" aria-hidden="true"></i>
                        <h4 class="mt-2">Free Returns</h4>
                        <span>Within 25 Days</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="section footer-middle p-0">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-12">
                        <div class="d-flex align-items-center mb-2">
                            <h3 class="mb-0 fw-bold color-900"><img width="120px" src="/themes/assets/images/logo/logo.png"></h3>
                        </div>
                        <p class="lead">INGROUP</p>
                        <p class="fs-small">Địa chỉ : {{model.app_address}}
                        <span class="d-block">Điện thoại : {{model.app_phone}}</span>
                        <span class="d-block">Mã số thuế : 3502437536 cấp ngày 02/10/2020 tại Cục thuế tỉnh Bà Rịa - Vũng Tàu</span>
                        </p>
                        <div class="dowload-mobile_app mb-3 text-center">
                            <a href="https://play.google.com/store/apps/details?id=com.ing.vn"><img class="w-120px bg-dark p-1 rounded " src="/assets/background/googleplay.webp"></a>
                            <a href="https://apps.apple.com/vn/app/e-gate/id1590817074?l=vi"><img class="w-120px bg-dark p-1 rounded " src="/assets/background/appstore.webp"></a>
                        </div>
                    </div>
                    <div class="col-md-4 col-12">
                                <h5 class="mb-4">{{ $t('footer.Policies') }}</h5>
                                <ul class="footer-link">
                                    <li><a href="/terms-of-use">{{ $t('footer.terms') }}</a></li>
                                    <li><a href="/policy" target="_blank">{{ $t('footer.Policies') }}</a></li>
                                    <li><a href="https://support.e-gate.vn">{{ $t('footer.Supports') }}</a></li>
                                </ul>
                    </div>
                    <div class="col-md-4 col-12">
                                <h5 class="mb-4">{{ $t('footer.Infomation') }}</h5>
                            <ul class="footer-link">
                                <li><a href="/product">{{ $t('header.store') }}</a></li>
                                <li><a href="/about-us">{{ $t('header.aboutUs') }}</a></li>
                                <li><a href="/news">{{ $t('header.news') }}</a></li>
                            </ul>
                            <ul class="list-unstyled d-flex">
                                <li><a class="p-2 me-2 bg-white rounded-top" href="https://www.facebook.com/INGVIETNAM"><i class="fa fa-facebook"></i></a></li>
                                <li><a class="p-2 me-2 bg-white rounded-top" href="https://www.youtube.com/channel/UCCHaUzCIKSJnG7-WfhrT55g"><i class="fa fa-youtube"></i></a></li>
                                <li><a class="p-2 me-2 bg-white rounded-top" href="https://www.instagram.com/ing_viet_nam/"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-12">
                        <p>Copyright 2023<a href="https://ing.vn" rel="nofollow" target="_blank"> © INGROUP</a></p>
                    </div>
                    <div class="col-md-6 col-12">
                       <ul class="list-unstyled d-flex justify-content-md-end">
                            <router-link to="/terms-of-use" class="p-2 ms-2">
                                {{ $t('footer.terms') }}
                            </router-link>
                            
                            <router-link to="/policy" class="p-2 ms-2">
                                {{ $t('footer.Policies') }}
                            </router-link>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <a href="#" class="back-to-top d-flex align-items-center justify-content-center active"><i class="bi bi-arrow-up-short"></i></a>
        
    </div>

    <!-- Thông báo SSE -->
    <main class='toast-custom'>
    <div class='toast-notification'>
        <div class='toast-notification-container'>
        <h2 class='toast-notification-title'>Thông báo</h2>
        <p class='toast-notification-info'></p>
        </div>
        <button class='toast-notification-close'>x</button>
        <div class='toast-notification-timeline'></div>
    </div>
    <button class='toast-connect d-none'>connect</button>
    </main>
  </div>
</template>

<script>
import load_api from '../../../../api.json';

export default {
    data:function(){
      return{
        model:[],
      }
    },
    methods:{
      async fetchData(){
        var vm =  this;
         let res = await vm.$store.dispatch("fetchData",load_api.setting.settingByKey+"?fields=app_address,app_phone");
        //   vm.model=res.data.result;
          vm.model=res.data;
          },      
    },
    mounted(){
var vm=this;
vm.fetchData();

// const eventSource = new EventSource(load_api.api.crawlURL+'/notify/event');
// const notification = document.querySelector('.toast-notification');
// const title_notify = document.querySelector('.toast-notification-title');
// const info = document.querySelector('.toast-notification-info');
// const close = document.querySelector('.toast-notification-close');
// const timeline = document.querySelector('.toast-notification-timeline');
// const connect = document.querySelector('.toast-connect');
// let time = 15;
// let interval;

// function reset() {
//   time = 15;
// //   document.querySelector('.toast-custom').innerHTML = ``;
//   notification.classList.remove('active');
//   connect.classList.remove('ignore');
//   timeline.classList.remove('animate');
//   clearInterval(interval);
//   eventSource.close();
// }

// function countdown() {
//   interval = setInterval(() => {
//     time--; 
//     // info.textContent = `This message will be deleted in ${time} seconds`;
//     // time < 0 && reset();
//     !time && reset();
//   },1000); 
// }

// function activate() {
//   notification.classList.add('active');
//   connect.classList.add('ignore');
//   timeline.style.setProperty('--duration',`${time}s`);
//   timeline.classList.add('animate');
//   countdown();
// }
// eventSource.onmessage = ({data}) => {
//     data = JSON.parse(data);
//     title_notify.innerText = data.title;
//     info.textContent = data.description;
// }
// setTimeout(() => {
//     activate();
// }, 3900);

// // connect.addEventListener('click',activate,false);
// close.addEventListener('click',reset,false);

},

}
</script>

<style>
</style>