<template>
    <div v-loading="loading">
        <nav class="navbar navbar-expand-lg lp-menu fixed-top  bg-white">
            <div class="container  py-2 rounded px-3">
                <a href="/" class="navbar-brand fw-bold text-primary fs-3">
                    <img class="w-120px" src="/themes/assets/images/logo/logo.png">
                </a>
                <div class="dropdown notifications header-cart"> 
                        <a class="nav-link dropdown-toggle pulse position-relative" href="#" role="button" data-bs-toggle="dropdown">
                           <i class="fa fa-shopping-cart"></i>
                            <span class="pulse-ring"></span>
                            <span class="position-absolute top-0 right-0 cart__width">{{model.length}}</span>
                        </a>
                        <div id="NotificationsDiv" class="dropdown-menu rounded-lg shadow border-0 dropdown-animation dropdown-menu-end p-0 m-0">
                            <div class="card border-0 box-cart">
                                <div class="card-header border-0 p-3">
                                    <h5 class="mb-0 fw-light d-flex justify-content-between">
                                        <span>Giỏ hàng của bạn</span>
                                        <span class="badge text-muted">{{model.length}}</span>
                                    </h5>
                                </div>
                                <div class="tab-content card-body custom_scroll">
                                    <div class="tab-pane fade show active" id="Noti-tab-Message" role="tabpanel">
                                        <ul class="list-unstyled list mb-0" v-if="model">
                                            <li class="py-2 mb-1 border-bottom" v-for="(product,index) in model" :key="'cart-product-'+index">
                                                <a href="javascript:void(0);" class="d-flex" v-if="product.image[0]">
                                                    <img  class="avatar" :src="product.image[0]" alt="">
                                                    <div class="flex-fill ms-3">
                                                        <!-- <p class="d-flex justify-content-between mb-0 text-muted"><span class="fw-bold">{{product.product_name}}</span> <small @click="removeFromCart(product)"><svg viewBox="0 0 24 24" width="12" height="12" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></small></p> -->
                                                       <div class="row">
                                                           <span class="text-muted col-6"><span v-if="product.product_price_discount!=null">Giá: <del>{{format(product.product_price)}}đ</del></span> {{format((product.product_price_discount?product.product_price_discount:product.product_price) )}}đ</span>
                                                           <span class="text-muted col-6">Số lượng:{{product.qty}}</span>
                                                       </div>
                                                    </div>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                 <router-link v-if="model.length>0" to="/cart" class="card-footer text-center border-top-0">Xem giỏ hàng</router-link> 
                            </div>
                        </div>
                    </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-expanded="false">
                    <span class="navbar-toggler-icon"><i class="fa fa-bars"></i></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav  me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <router-link to="/product" class="nav-link me-2" @click.native="toggleMenu">
                                {{ $t('header.store') }}
                            </router-link>
                        </li>
                        <li class="nav-item">
                            <router-link to="/category/e-gate" class="nav-link me-2 position-relative" @click.native="toggleMenu">
                                e-Gate <span class="pulse-active"><span class="pulse-green"></span></span>
                            </router-link>
                        </li>
                        <li class="nav-item" v-for="(item,index) in dataCategory" :key="index">
                            <router-link :to="`/category/${item.slug}`" class="nav-link me-2" @click.native="toggleMenu">
                                {{ item.name }}
                            </router-link>
                        </li>
                         <li class="nav-item">
                            <router-link to="/news" class="nav-link me-2" @click.native="toggleMenu">
                                {{ $t('header.news') }}
                            </router-link>
                        </li>
                        <li class="nav-item">
                            <router-link to="/about-us" class="nav-link me-2" @click.native="toggleMenu">
                                {{ $t('header.aboutUs') }}
                            </router-link>
                        </li>
                         <li class="nav-item">
                            <router-link to="/contact" class="nav-link me-2" @click.native="toggleMenu">
                                {{ $t('header.contact') }}
                            </router-link>
                        </li>
                    </ul>
                        <div class="dropdown notifications cart-desktop"> 
                        <a class="nav-link dropdown-toggle pulse position-relative" href="#" role="button" data-bs-toggle="dropdown">
                           <i class="fa fa-shopping-cart"></i>
                            <span class="pulse-ring"></span>
                            <span class="position-absolute top-0 right-0 cart__width">{{model.length}}</span>
                        </a>
                        <div id="NotificationsDiv" class="dropdown-menu rounded-lg shadow border-0 dropdown-animation dropdown-menu-end p-0 m-0">
                            <div class="card border-0 w380">
                                <div class="card-header border-0 p-3">
                                    <h5 class="mb-0 fw-light d-flex justify-content-between">
                                        <span>Giỏ hàng của bạn</span>
                                        <!-- <span class="badge text-muted">{{model.length}}</span> -->
                                        <span class="badge text-muted">{{model.length}}</span>
                                    </h5>
                                </div>
                                <div class="tab-content card-body custom_scroll">
                                    <div class="tab-pane fade show active" id="Noti-tab-Message" role="tabpanel">
                                        <ul class="list-unstyled list mb-0" v-if="model">
                                            <li class="py-2 mb-1 border-bottom" v-for="(product,index) in model" :key="'cart-product-'+index">
                                                <a href="javascript:void(0);" class="d-flex" v-if="product.image[0]">
                                                    <img  class="avatar rounded" :src="product.image[0]" alt="">
                                                    <div class="flex-fill ms-3">
                                                        <!-- <p class="d-flex justify-content-between mb-0 text-muted"><span class="fw-bold">{{product.product_name}}</span> <small @click="removeFromCart(product)"><svg viewBox="0 0 24 24" width="12" height="12" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></small></p> -->
                                                       <div class="row">
                                                           <span class="text-muted col-8">{{product.product_name}} <span v-if="product.product_price_discount!=null">Giá: <del>{{format(product.product_price)}}đ</del></span> {{format((product.product_price_discount?product.product_price_discount:product.product_price) )}}đ</span>
                                                           <span class="text-muted col-4">SL: {{product.qty}}</span>
                                                       </div>
                                                    </div>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div v-if="auth&&user" class="text-center">
                                    <router-link v-if="model.length>0" to="/cart" class="card-footer text-center border-top-0">Xem giỏ hàng</router-link> 
                                </div>
                                <div v-else class="text-center">
                                    <router-link v-if="model.length>0" to="/cart" class="card-footer text-center border-top-0">Cập nhật thông tin</router-link> 
                                </div>
                            </div>
                        </div>
                    </div>
                    <form class="d-flex">
                        <div class="dropdown Language">
                            <a class="nav-link text-primary dropdown-toggle pulse mx-3" href="#" role="button" data-bs-toggle="dropdown">
                                <i class="fa fa-language"></i>
                            </a>
                            
                            <div class="dropdown-menu rounded-lg shadow border-0 dropdown-animation dropdown-menu-end p-0" data-bs-popper="none">
                                <div class="card border-0">
                                    <div class="card-body">
                                        <ul class="list-unstyled menu-grid d-flex flex-wrap mb-0 rounded mx-auto">
                                            <li @click="lang_vi"><a class="m-link" href="#">
                                                <svg class="avatar mb-2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" zoomAndPan="magnify" viewBox="0 0 30 30.000001" preserveAspectRatio="xMidYMid meet" version="1.0"><defs><clipPath id="id1"><path d="M 2.449219 5.457031 L 26.402344 5.457031 L 26.402344 22.878906 L 2.449219 22.878906 Z M 2.449219 5.457031 " clip-rule="nonzero"/></clipPath></defs><g clip-path="url(#id1)"><path fill="rgb(85.488892%, 14.509583%, 11.369324%)" d="M 23.734375 5.457031 L 5.121094 5.457031 C 3.652344 5.457031 2.460938 6.65625 2.460938 8.136719 L 2.460938 20.195312 C 2.460938 21.675781 3.652344 22.878906 5.121094 22.878906 L 23.734375 22.878906 C 25.203125 22.878906 26.390625 21.675781 26.390625 20.195312 L 26.390625 8.136719 C 26.390625 6.65625 25.203125 5.457031 23.734375 5.457031 Z M 23.734375 5.457031 " fill-opacity="1" fill-rule="nonzero"/></g><path fill="rgb(100%, 100%, 0%)" d="M 15.589844 12.851562 L 14.425781 9.238281 L 13.261719 12.851562 L 9.492188 12.851562 L 12.542969 15.085938 L 11.375 18.699219 L 14.425781 16.464844 L 17.476562 18.699219 L 16.3125 15.085938 L 19.363281 12.851562 Z M 15.589844 12.851562 " fill-opacity="1" fill-rule="nonzero"/></svg>
                                                <span>Tiếng việt</span></a>
                                            </li>
                                            <li @click="lang_en"><a class="m-link" href="#">
                                                <svg class="avatar mb-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" xml:space="preserve">
                                                    <circle style="fill:#f0f0f0" cx="256" cy="256" r="256"/>
                                                    <path style="fill:#d80027" d="M244.87 256H512c0-23.106-3.08-45.49-8.819-66.783H244.87V256zm0-133.565h229.556a257.35 257.35 0 0 0-59.07-66.783H244.87v66.783zM256 512c60.249 0 115.626-20.824 159.356-55.652H96.644C140.374 491.176 195.751 512 256 512zM37.574 389.565h436.852a254.474 254.474 0 0 0 28.755-66.783H8.819a254.474 254.474 0 0 0 28.755 66.783z"/>
                                                    <path style="fill:#0052b4" d="M118.584 39.978h23.329l-21.7 15.765 8.289 25.509-21.699-15.765-21.699 15.765 7.16-22.037a257.407 257.407 0 0 0-49.652 55.337h7.475l-13.813 10.035a255.58 255.58 0 0 0-6.194 10.938l6.596 20.301-12.306-8.941a253.567 253.567 0 0 0-8.372 19.873l7.267 22.368h26.822l-21.7 15.765 8.289 25.509-21.699-15.765-12.998 9.444A258.468 258.468 0 0 0 0 256h256V0c-50.572 0-97.715 14.67-137.416 39.978zm9.918 190.422-21.699-15.765L85.104 230.4l8.289-25.509-21.7-15.765h26.822l8.288-25.509 8.288 25.509h26.822l-21.7 15.765 8.289 25.509zm-8.289-100.083 8.289 25.509-21.699-15.765-21.699 15.765 8.289-25.509-21.7-15.765h26.822l8.288-25.509 8.288 25.509h26.822l-21.7 15.765zM220.328 230.4l-21.699-15.765L176.93 230.4l8.289-25.509-21.7-15.765h26.822l8.288-25.509 8.288 25.509h26.822l-21.7 15.765 8.289 25.509zm-8.289-100.083 8.289 25.509-21.699-15.765-21.699 15.765 8.289-25.509-21.7-15.765h26.822l8.288-25.509 8.288 25.509h26.822l-21.7 15.765zm0-74.574 8.289 25.509-21.699-15.765-21.699 15.765 8.289-25.509-21.7-15.765h26.822l8.288-25.509 8.288 25.509h26.822l-21.7 15.765z"/>
                                                </svg>
                                                <span>USA</span></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div v-if="auth&&user">
                        <div class="dropdown">
                            <a href="/clients-dashboard" class="text-primary nav-link me-2 dropdown-toggle" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                {{user.fullname}}
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <li><a class="dropdown-item" href="/clients-dashboard/egate"><svg viewBox="0 0 24 24" width="12" height="12" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M21 2l-2 2m-7.61 7.61a5.5 5.5 0 1 1-7.778 7.778 5.5 5.5 0 0 1 7.777-7.777zm0 0L15.5 7.5m0 0l3 3L22 7l-3-3m-3.5 3.5L19 4"></path></svg> e-Gate</a></li>
                                <li><a class="dropdown-item" href="/clients-dashboard/profile"><svg viewBox="0 0 24 24" width="12" height="12" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg> Hồ sơ</a></li>
                                <li><a class="dropdown-item" href="/clients-dashboard/order"><svg viewBox="0 0 24 24" width="12" height="12" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg> Đơn hàng</a></li>
                                <li><a class="dropdown-item" href="/clients-dashboard/wallet"><svg viewBox="0 0 24 24" width="12" height="12" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><circle cx="12" cy="12" r="10"></circle><polygon points="16.24 7.76 14.12 14.12 7.76 16.24 9.88 9.88 16.24 7.76"></polygon></svg> Nạp tiền</a></li>
                                <li><a class="dropdown-item" href="/clients-dashboard/ticket"><svg viewBox="0 0 24 24" width="12" height="12" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><line x1="22" y1="2" x2="11" y2="13"></line><polygon points="22 2 15 22 11 13 2 9 22 2"></polygon></svg> Gửi ticket</a></li>
                                <li><a class="dropdown-item cursor-pointer" @click="logout"><svg viewBox="0 0 24 24" width="12" height="12" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg> Đăng xuất</a></li>
                            </ul>
                        </div>
                        </div>
                        <div v-else>
                            <router-link to="/login" class="btn text-primary text-uppercase" @click.native="toggleMenu">
                                Login
                            </router-link>
                        </div>
                    </form>
                </div>
            </div>
        </nav>
    </div>
</template>

<script>
import {formatCurrency} from '../../../../public/vuejs/utilities/helpers.js';
import api from '../../../../api.json';

export default {
    data:function(){
      return{
        dataCategory:{},
        user:{},
        loading:true,
      }
    },
     computed:{
        totalSum() {
            let sum = 0;
            for (const product of this.model) {
                sum += product.product_price * product.qty;
                this.order.total_amount = sum;
            }
            return this.order.total_amount;
        },
        model() {
            return this.$store.state.cart;
        },
        auth() {
           return this.$store.state.auth;
        },
 
    },
    methods: {
            toggleMenu(){
                if(document.querySelector(".navbar-toggler") != null){
                    document.querySelector(".navbar-toggler").click();
                }
                // Scroll to top
                window.scrollTo(0, 0);
                // const el = document.getElementById("filters");
                // el.scrollIntoView();
                // let rect = el.getBoundingClientRect();
                // window.scrollTo(rect.left, rect.top);
                
                document.querySelector(".footer-top").style.cssText = 'display:block';
            },
            async fetchData(){
                var vm =  this;
                let res = await vm.$store.dispatch("fetchData",api.product.getCategory);
                if(res){
                    vm.loading=false;
                }
                var data = res.data[0].data;
                vm.dataCategory=data.splice(1, data.length); 
            },
            async fetchInfo(){
                var vm=this;
                try {
                    if(vm.auth){
                        let data= await vm.$store.dispatch("fetchData",api.auth.info);
                        vm.user=data.data.result;
                    }
                 
                } catch (error) {
                    localStorage.removeItem("auth");
                    location.reload();
                }
              
            },
            lang_vi() {
                localStorage.setItem('lang','vi');
                window.location.reload();
            },
            lang_en() {
                localStorage.setItem('lang','en');
                window.location.reload();
            },
             format(number) {
             return formatCurrency(number ? number : 0);
            },
            removeFromCart(product){
                const shoppingCart=this.model;
                const productIndex=shoppingCart.findIndex(item=>item._id===product._id);
                shoppingCart.splice(productIndex,1);
                localStorage.setItem('shoppingCart',JSON.stringify(shoppingCart));
                this.$store.dispatch("fetchCart");
            },
            logout() {
                window.location.href = "/login";
                localStorage.removeItem('auth');
            }
        },
    mounted(){
      var vm=this;
      vm.fetchData();
      vm.$store.dispatch("fetchAuth");
      vm.$store.dispatch("fetchCart");
      vm.fetchInfo();

    },
}
</script>

<style>
.cart__width{
    font-size: 13px;
}
</style>