<template>
  <div>
    <div class="section best-selling">
        <div class="container">
            <div class="row mb-5 align-items-center">
                <div class="col-md-12">
                    <h2 class="text-uppercase">Best SELLING</h2>
                    <p class="lead">Best Selling Ever From ALUI</p>
                </div>
            </div>
            <div class="row g-3"> 
               
           <VueSlickCarousel v-bind="settings" v-if="model.length">
           <div class="card" style="width: 18rem;" v-for="(item,index) in model" :key="index">
                    <div class="card product-card border-0">
                          <div class="product-img text-center">
                            <img class="card-img-top" :src="item.image" alt="" />
                            <div class="btn-hover text-center">
                                <span class="btn btn-primary me-1" @click="addToCart(item)"><i class="fa fa-plus"></i></span>
                                <span class="btn btn-primary cart-btn" ><i class="fa fa-shopping-cart"></i></span>
                            </div>
                        </div>
                    </div>
                    <router-link :to="`/product/${item._id}`">
                        <div class="card-body">
                            <h5 class="card-title">{{fixTitle(item.product_name)}}</h5>
                            <div  v-if="item.product_price_discount">
                                </div>
                                <div>
                                    <div v-if="item.product_price">
                                            <div v-if="item.product_price_discount">
                                        <div class="d-flex justify-content-between">
                                            <div>{{format(item.product_price_discount)}}đ</div>
                                            <div class="btn-outline-sale-product rounded-0 lh-0">-{{percent(item)}}</div>
                                        </div>
                                        </div>
                                    <div v-else>
                                            {{format(item.product_price)}}đ 
                                        </div>
                                    </div>
                                    <div v-else>
                                        Liên hệ
                                    </div>
                            
                                </div>
                        </div>  
                    </router-link>
            </div>
           
            </VueSlickCarousel> 
            
            </div>
        </div>
       
    </div>

  </div>
</template>

<script>    
import load_api from '../../../../../../api.json'
import VueSlickCarousel from "vue-slick-carousel";

import 'vue-slick-carousel/dist/vue-slick-carousel.css'
import 'vue-slick-carousel/dist/vue-slick-carousel-theme.css'
import {formatCurrency} from '../../../../../../public/vuejs/utilities/helpers.js';
export default {
        components: {
            VueSlickCarousel
        },
    data:function(){
      return{
        settings:{
                "dots": true,
                "infinite": false,
                "speed": 500,
                "slidesToShow": 4,
                "slidesToScroll": 4,
                "initialSlide": 0,
                "responsive": [
                    {
                    "breakpoint": 1024,
                    "settings": {
                        "slidesToShow": 3,
                        "slidesToScroll": 3,
                        "infinite": true,
                        "dots": true
                    }
                    },
                    {
                    "breakpoint": 600,
                    "settings": {
                        "slidesToShow": 2,
                        "slidesToScroll": 2,
                        "initialSlide": 2
                    }
                    },
                    {
                    "breakpoint": 480,
                    "settings": {
                        "slidesToShow": 1,
                        "slidesToScroll": 1
                    }
                    }
                ]
},
        checkPercent:true,
        checkPrice:false,
        model:{},
        shoppingCart:[],
      }
    },
     computed:{
  

    },
    methods:{
        next() {
                this.$refs.slick.next()
        },
        prev() {
                this.$refs.slick.prev()
        },
        reInit() {
                this.$refs.slick.reSlick()
        },
        percent(product) {
            if(product.product_price && product.product_price_discount){
                return (((product.product_price-product.product_price_discount)/product.product_price)*100).toFixed(2)+"%";
            }

        },
        handlerShowPrice(product){
            if(product.product_price){
                return true;
            }
        },
        async fetchData(page=1){
        var vm =  this;
            let res = await vm.$store.dispatch("fetchData",load_api.product.getAll+'?page='+page);
            vm.model=res.data.data;
            console.log(vm.model);
        },   
        async addToCart(product){
        var vm=this;
        let exists=false;
        for(const cartItem of this.shoppingCart){
            if(cartItem._id === product._id){
            cartItem.qty=cartItem.qty+1;
            exists=true;
            break;
            }
        }
        if(!exists){
            this.shoppingCart.push({
            ...product,
            qty:1,
            })
            await vm.$store.dispatch("fetchCart");
        }
        },   
        fixTitle(str){
            if (str.length > 20) {
                return str.substring(0,20) + "...";
            }
            return str;
        },
       
        format(number) {
            return formatCurrency(number ? number : 0);
        },


    },
    mounted(){
      var vm=this;
      vm.shoppingCart=JSON.parse(localStorage.getItem('shoppingCart') ||"[]");
      vm.fetchData();
    },
    watch:{
    shoppingCart:{
    handler(newValue){
        localStorage.setItem('shoppingCart',JSON.stringify(newValue));
        this.$store.dispatch("fetchCart");
    },deep:true
    }
},
}
</script>

<style scoped>
.card_border--margin{
   width: 480px;
}
.margin {
    margin-right: 15px;
    margin-left: 15px;
}
.best-selling img {
    max-height: 280px !important;
    object-fit: cover;
}
.card-body--image{
    min-height: 440px;
}
</style>