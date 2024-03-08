<template>
  <div id="deltail_product" v-loading="loading">
    <div class="section "> 
    <div class="container">
        <div class="row g-4">
            <div class="col-12">
                <div class="card p-4">
                    <div class="row align-items-center">
                        <div class="col-lg-4 col-md-12 " >
                            <VueSlickCarousel v-bind="settings"  v-if="model.image">
                                <div v-for="(item, index) in model.image" :key="index">
                                    <img :src="item" alt="" class="img-fluid img-fluid__max-height">
                                </div>
                            </VueSlickCarousel>
                        </div>
                        <div class="col-lg-8 col-md-12">
                            <h2 class="mt-4 mt-lg-0">{{model.product_name}}</h2>
                            <div class="my-3">
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <!-- <span class="text-muted ms-3">(49 người xem)</span> -->
                            </div>
                            <div v-if="model.product_price">
                                <p class="mb-0 text-primary fs-4 fw-bold" v-if="model.product_price_discount">{{format(model.product_price_discount)}}đ<span class="fs-6 text-muted fw-light ms-3 me-2"><del>{{format(model.product_price)}}đ</del></span> <span class="fs-6 fw-normal">{{percent(model)}} off</span></p>
                                <p class="mb-0 text-primary fs-4 fw-bold" v-else>{{format(model.product_price)}}đ</p>
                            </div>
                            <div v-else>
                                <span type="button" class="btn btn-outline-primary mt-2 mb-2" data-bs-toggle="modal" data-bs-target="#modalForgot">Liên hệ</span>
                                <!-- <button  type="button" class="btn btn-outline-primary mt-2 mb-2" data-toggle="modal" data-target="#exampleModalCenter">Liên hệ </button > -->
                            </div>
                            <div class="row" v-if="model.product_price">
                                <div class="col-md-4 d-flex align-items-center mt-2">
                                      <div class="pe-xl-5 pe-md-4 ps-md-0">
                                            <span class="flex justify-center items-center cusor-point" v-on:click="remove()">
                                                <svg viewBox="0 0 24 24" width="25" height="25" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                                            </span>
                                                <input v-model="qty"  min = "1" max = "1000" class="mx-2 border text-center w-8" type="text" readonly  style="width:45px"/>
                                            <span class="flex justify-center items-center cusor-point" v-on:click="add()">
                                                <svg viewBox="0 0 24 24" width="25" height="25" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                                            </span>
                                    </div>
                                </div>
                                <div class="col-md-8 mt-2">
                                <button class="btn btn-primary" v-on:click="addToCart(model)"><i class="fa fa-shopping-cart me-1" ></i> Thêm vào giỏ hàng</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- .row end -->
        <div v-if="model._category">
            <div class="col-12" v-if="model._category[0].name=='e-Timber'">
                <h5>Review</h5>
                <div class="card p-lg-2">   
                    <div class="card-body">
                        <ul class="list-group list-group-flush list-group-custom">
                            <li class="list-group-item d-flex px-0">
                                <img class="avatar rounded-circle" src="/themes/assets/images/xs/avatar11.jpg" alt="">
                                <div class="flex-fill ms-3">
                                    <h6 class="mb-0"><strong class="d-block">Xuân Thường</strong> </h6>
                                    <!-- Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. -->
                                    <i class="fa fa-star text-warning"></i>
                                    <i class="fa fa-star text-warning"></i>
                                    <i class="fa fa-star text-warning"></i>
                                    <i class="fa fa-star text-warning"></i>
                                    <i class="fa fa-star-half-empty text-warning"></i>
                                    <span class="float-end">9/12/2022</span> 
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
     
        <div class="row g-4 mt-2">
            <div class="col-12">
                <h5>Chi tiết sản phẩm</h5>
                <div class="card p-lg-2">
                    <div class="card-body">
                       <p class="my-4" v-html="model.product_detail"></p>
                    </div>
                </div>
            </div>
            <div v-if="model._category">
                <div  class="col-12" v-if="model._category[0].name=='e-Timber'">
                    <h5>Thông tin sản phẩm</h5>
                    <div class="card p-lg-2">
                        <div class="card-body">
                        <p>Gỗ tự nhiên ngoài trời e-Timber là loại gỗ tự nhiên được xử lý để khắc phục các vấn đề như: chống mục, nấm mốc, mối mọt, nâng cao độ bền của gỗ để chịu được khí hậu khắc nghiệt ngoài trời. Sản phẩm thân thiện với môi trường.<br/>
                         Thanh gỗ e-Timber có các loại gỗ như: Gỗ Thông (Pine), Gỗ Tần bì (ASH) và Gỗ Sồi (Oak),… các loại gỗ này đã xử lý theo công nghệ USA và đạt chuẩn của Hiệp hội chế biến gỗ Hoa Kỳ (AWPA) – American Wood Protection Association.</p>
                        </div>
                    </div>
                </div>
            </div>
           
        </div> <!-- .row end -->
    </div>
</div>
<ValidationObserver v-slot="{ invalid }">
        <form action="">
            <div class="modal fade" id="modalForgot" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Liên hệ</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                            <ValidationProvider rules="required|text" v-slot="{ errors }">
                                                <input v-model="data.title" type="text" class="form-control" maxlength="100" placeholder="Tiêu đề"/>
                                                <span class="text-validate">{{ errors[0] }}</span>
                                        </ValidationProvider>
                                </div>
                                <div class="col-md-4 mb-3">
                                            <ValidationProvider rules="email|minmax:1,200" v-slot="{ errors }">
                                                <input v-model="data.email" type="text" class="form-control" maxlength="100" placeholder="Email"/>
                                                <span class="text-validate">{{ errors[0] }}</span>
                                        </ValidationProvider>
                                </div>
                                <div class="col-md-4 mb-3">
                                            <ValidationProvider rules="required|phone" v-slot="{ errors }">
                                                <input v-model="data.phone" type="text" class="form-control" maxlength="100" placeholder="Số điện thoại"/>
                                                <span class="text-validate">{{ errors[0] }}</span>
                                        </ValidationProvider>
                                </div>
                                <div class="col-12 mt-3">
                                    <ValidationProvider name="confirm" rules="required|text" v-slot="{ errors }">
                                        <textarea v-model="data.content" class="form-control" id="content" rows="3" placeholder="Nội dung"></textarea>
                                        <span class="text-validate">{{ errors[0] }}</span>
                                    </ValidationProvider>
                                </div>
                            </div>   
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" @click="sendMail" data-bs-dismiss="modal" :disabled="invalid">Liên hệ</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </ValidationObserver> 
  </div>
</template>

<script>
import api from '../../../../../api.json'
import {formatCurrency} from '../../../../../public/vuejs/utilities/helpers.js';

import 'vue-slick-carousel/dist/vue-slick-carousel.css';
import VueSlickCarousel from 'vue-slick-carousel'

export default {
    components: {
        VueSlickCarousel
    },
    metaInfo() {
        return{
            title: `${this.model.product_name }`,
        }
    },
    data:function(){
        return{
            settings:{
                "dots": true,
                "dotsClass": "slick-dots custom-dot-class",
                "edgeFriction": 0.35,
                "infinite": false,
                "speed": 500,
                "slidesToShow": 1,
                "slidesToScroll": 1,
                "centerMode": true,
            },
            loading: true,
            model:[],
            shoppingCart:[],
            qty:0,
            siderBar:[],
            id:this.$route.params.id,
            host:"",
            data:{
                email:"",
                title:"",
                body:"",
                phone:"",
                content:"",
            },
            objectContact:{
                api:"",
                data:"",
            },
        }
    },
    methods:{
        async getById(){
            var vm =this;
            vm.loading=true;
            let res = await vm.$store.dispatch("getByID",api.product.getByID+'?_id='+vm.id);
            if(res){
                vm.loading=false;
            }
            vm.model= res.data.result[0];
        },
        async sendMail(e){
                e.preventDefault();
                var vm =this;
            try{
                vm.data.body=vm.data.content+' - '+'Số điện thoại:'+vm.data.phone + ' - ' + `Sản phẩm:<a href=${vm.host+vm.$route.fullPath}>`+ vm.model.product_name+'</a>';
                vm.objectContact.api=api.ticket.anonymous;
                vm.objectContact.data=vm.data;
                let res=  await vm.$store.dispatch("postData",vm.objectContact);
                if(res.status==200){
                    Vue.$toast.open({
                    message: 'Gửi liên hệ thành công',
                    type: 'success',
                    position: 'top-right'
                });
                vm.data.email="";
                vm.data.title="";
                vm.data.body="";
                vm.data.phone="";
                vm.data.content="";
            }
            }catch(e){
                console.log(e);
                Vue.$toast.open({
                    message: 'Gửi liên hệ lỗi',
                    type: 'error',
                    position: 'top-right'
                });
            }
        }, 
         format(number) {
            return formatCurrency(number ? number : 0);
        },
        percent(product) {
            if(product.product_price && product.product_price_discount){
                let num = ((product.product_price-product.product_price_discount)/product.product_price)*100;
                return ((Math.round((num + Number.EPSILON) * 100) / 100))+"%";
            }

        },
        addToCart(product){
            var vm=this;
            let exists=false;
            for(const cartItem of this.shoppingCart){
                if(cartItem._id === product._id){
                cartItem.qty=cartItem.qty+vm.qty;
                Vue.$toast.open({
                    message: 'Thêm giỏ hàng thành công',
                    type: 'success',
                    position: 'top-right'
                });   
                exists=true;
                break;
                }
            }
            if(!exists){
                this.shoppingCart.push({
                ...product,
                qty:vm.qty,
                })
            }
        }, 
        async remove(){
            var vm =this;
            vm.qty--;
            if(vm.qty<1){
                vm.qty=1;
            }

        },
        async add(){
            var vm=this;
            vm.qty++;
        }

    },
    mounted(){
        var vm =this;
        vm.shoppingCart=JSON.parse(localStorage.getItem('shoppingCart') ||"[]");
        vm.host=window.location.origin;
        vm.getById();
        vm.qty=vm.model.qty || 1;
    },
    watch:{
        '$route'(to, from){
            this.id = to.params.id
            this.getById();
        },
         title: function (val, old) {
            document.title = val
        },
        shoppingCart:{
            handler(newValue){
            localStorage.setItem('shoppingCart',JSON.stringify(newValue));
            this.$store.dispatch('fetchCart');
            },deep:true
        },
    }  
}
</script>

<style scoped>
.img-fluid__max-height{
    max-height: 240px;
}
</style>