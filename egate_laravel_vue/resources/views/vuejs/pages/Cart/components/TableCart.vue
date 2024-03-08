<template>
  <div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 col-12">
            <div class="card bg-transparent border-0" v-for="(product,index) in modelValue" :key="index">
                <div class="card border-0 mb-1">
                    <div class="form-check form-switch position-absolute top-0 end-0 py-3 px-3 cusor-point" v-on:click="removeFromCart(product)">
                        <svg viewBox="0 0 24 24" width="20" height="20" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                    </div>
                    <div class="card-body d-flex align-items-center flex-column flex-md-row" >
                        <img class="w120 rounded img-fluid" :src="product.image" alt="">
                        <div class="ms-md-4 m-0 mt-4 mt-md-0 text-md-start text-center w-100" >
                            <h6 class="mb-3">{{product.product_name}}</h6>
                            <div class="d-flex flex-row flex-wrap align-items-center justify-content-center justify-content-md-start">
                                <div class="pe-xl-5 pe-md-4 ps-md-0 px-3 mb-2">
                                    <div class="text-muted small">Giá</div>
                                    <div>
                                    <div v-if="product.product_price_discount!=null"><del>{{format(product.product_price)}}đ</del>
                                    <div><strong>{{format(product.product_price_discount)}} đ</strong></div>
                                    </div>
                                    <div v-else><strong>{{format(product.product_price)}} đ</strong></div>
                                    </div>
                                </div>
                                <div class="pe-xl-5 pe-md-4 ps-md-0 px-3 mb-2">
                                    <div class="text-muted small flex justify-center mx-3">Số lượng</div>
                                        <span class="flex justify-center items-center cusor-point" v-on:click="remove(product)">
                                            <svg viewBox="0 0 24 24" width="25" height="25" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                                        </span>
                                            <input v-model="product.qty"  min = "1" max = "1000" class="mx-2 border text-center" type="text" readonly  style="width:45px"/>
                                        <span class="flex justify-center items-center cusor-point" v-on:click="add(product)">
                                            <svg viewBox="0 0 24 24" width="25" height="25" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                                        </span>
                                </div>
                                <div class="pe-xl-5 pe-md-4 ps-md-0 px-3 mb-2">
                                    <div class="text-muted small">Tổng tiền</div>
                                    <strong>{{format((product.product_price_discount?product.product_price_discount:product.product_price) * product.qty)}}đ</strong>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="form-floating">
                    <input v-model="order.info" type="text" class="form-control">
                    <label>Ghi chú đơn hàng</label>
                </div>
            </div>
            </div>
            <div class="col-lg-4 col-md-12 col-12">
                <div class="card mb-3">
                    <div class="card-body py-4 text-center">
                        <h6 class="text-uppercase">Đơn hàng</h6>
                    </div>
                    <div class="card-footer border-top-0 px-5">
                        <p class="d-flex justify-content-between py-1"><span><i class="fa fa-check-circle"></i> Tổng hóa đơn:</span> <span>{{format(totalSum)+'đ'}}</span></p>
                       
                    </div>
                     <div class="form-floating">
                        <textarea v-model="order.shipTo.note" class="form-control" placeholder="Leave a comment here" style="height: 100px"></textarea>
                        <label>Ghi chú giao hàng</label>
                    </div>
                     <p class="d-flex justify-content-between py-1 px-2"><span class="mt-2" style="min-width: 125px;"><i class="fa fa-check-circle"></i> Địa chỉ:</span> 
                        <!-- <span>
                            <div>
                                <div class="lg:px-4  m-2 text-[12px] text-gray-900"  v-for="(data, index) of addressValue" :key="index" >
                                    <p v-if="data" class="leading-8 w-full">{{data.address}},{{data.district.district_name}},{{data.province.province_name}}</p>
                            
                                </div>
                            </div>
                            
                        </span> -->

                        <span>
                            <div>
                                <div class="lg:px-4  m-2 text-[12px] text-gray-900"  >
                                    <p v-if="order.shipTo.address" class="leading-8 w-full">{{order.shipTo.address}},{{order.shipTo.district_name}},{{order.shipTo.province_name}}</p>
                                    <p v-else>Chưa có địa chỉ</p>
                                </div>
                            </div>
                            
                        </span>
                     </p>
                        
                    <div class="card-body text-center">
                         <span class="btn btn-success border lift" @click="handelSubmit">Đặt hàng </span>
                    </div>
                </div>
                 <div>
                    <p>
                    <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                      <i class="fa fa-location-arrow" aria-hidden="true"></i>
                    </button>
                    </p>
                    <div class="collapse" id="collapseExample">
                    <div class="card card-body">
                       <Adreess :model="model" :order="order" :addressValue="addressValue" v-on="address"></Adreess>
                    </div>
                    </div>
              
            </div>
            </div>
        </div>
        
    </div>

  </div>
</template>

<script>
import {formatCurrency} from '../../../../../../public/vuejs/utilities/helpers.js';
import Adreess from './Adreess.vue'
import load_api from '../../../../../../api.json'
export default {
    data() {
        return {
            object:{
                api:"",
                data:{},
            },
            model: [],
            modelValue: [],
            addressValue: {},
            order: {
                total_amount: "",
                info: "",
                products: [],
                shipTo:{
                    note:"",
                },
                // shipTo: {
                //     address: [],
                //     phone: "",
                //     name: "",
                //     note: "",
                //     price: "",
                //     exptectedDeliveryDate: "",
                //     status: {
                //         id: 0,
                //         text: "Chua hoan thanh"
                //     }
                // }
            },
        };
    },
    methods: {
        format(number) {
            return formatCurrency(number ? number : 0);
        },
        remove(product) {
            const shoppingCart = this.modelValue;
            const productIndex = shoppingCart.findIndex(item => item._id === product._id);
            shoppingCart[productIndex].qty = parseInt(shoppingCart[productIndex].qty) - 1;
            if (shoppingCart[productIndex].qty < 1) {
                shoppingCart.splice(productIndex, 1);
                window.location.reload();
            }
            localStorage.setItem("shoppingCart", JSON.stringify(shoppingCart));
            this.$store.dispatch("fetchCart");
            
        },
        add(product) {
            const shoppingCart = this.modelValue;
            const productIndex = shoppingCart.findIndex(item => item._id === product._id);
            shoppingCart[productIndex].qty = parseInt(shoppingCart[productIndex].qty) + 1;
            localStorage.setItem("shoppingCart", JSON.stringify(shoppingCart));
            console.log(shoppingCart[productIndex].qty);
            this.$store.dispatch("fetchCart");
        },
        removeFromCart(product) {
            const shoppingCart = this.modelValue;
            const productIndex = shoppingCart.findIndex(item => item._id === product._id);
            shoppingCart.splice(productIndex, 1);
            localStorage.setItem("shoppingCart", JSON.stringify(shoppingCart));
            window.location.reload();

        },
        async fetchData() {
            var vm = this;
            vm.$nextTick(async () => {
                let data= await vm.$store.dispatch("fetchData",load_api.auth.info);
                vm.model=data.data.result;
                vm.order.shipTo.address.push(vm.model.addresses[0]);
                this.addressValue=this.order.shipTo.address;
            });
        },
        async fetchDataOld(){
            var vm=this;
            vm.$nextTick(async()=>{
                let user= await vm.$store.dispatch("fetchData",load_api.auth.info);
                let data= await vm.$store.dispatch("getByID",load_api.location.getByIdCustommer+'/'+user.data.result._id);
                vm.order.shipTo=data.data.result.table.rows[0];
                vm.model=data.data.result.table.rows;
                vm.addressValue=vm.order.shipTo;
                console.log("model",vm.addressValue);
            });
        },
        async handelSubmit(){
            var vm =this;
            if(typeof(vm.addressValue) == "undefined"){
                 Vue.$toast.open({
                    message: 'Bạn chưa có địa chỉ',
                    type: 'error',
                    position: 'top-right'
                });
            }else{
                 console.log(vm.addressValue);
                vm.order.products=vm.modelValue;
                vm.object.api=load_api.cart.order;
                vm.object.data=vm.order;
                let data= await vm.$store.dispatch("postData",vm.object);
                    if(data.status==200){
                        Vue.$toast.open({
                            message: 'Gửi thông tin thành công',
                            type: 'success',
                            position: 'top-right'
                        });
                    }
                    vm.$router.push('/payment');
            }
           
            
        }

        // async handelSubmit(){
        //     var vm =this;
        //     if(typeof(vm.addressValue[0]) == "undefined"){
        //          Vue.$toast.open({
        //             message: 'Bạn chưa có địa chỉ',
        //             type: 'error',
        //             position: 'top-right'
        //         });
        //     }else{
        //          console.log(vm.addressValue[0]);
        //         vm.order.products=vm.modelValue;
        //         vm.object.api=load_api.cart.order;
        //         vm.object.data=vm.order;
        //         let data= await vm.$store.dispatch("postData",vm.object);
        //             if(data.status==200){
        //                 Vue.$toast.open({
        //                     message: 'Gửi thông tin thành công',
        //                     type: 'success',
        //                     position: 'top-right'
        //                 });
        //             }
        //             vm.$router.push('/payment');
        //     }
           
            
        // }
        
    },
    computed: {
        totalSum() {
            let sum = 0;
            for (const product of this.modelValue) {
                sum += (product.product_price_discount?product.product_price_discount:product.product_price) * product.qty;
                this.order.total_amount = sum;
            }
            return this.order.total_amount;
        },
        address(){
                this.addressValue=this.order.shipTo.address;
                this.openAdrress=false;
        },
    },
    mounted() {
        var vm= this;
        vm.$nextTick(async()=>{
            vm.modelValue = JSON.parse(localStorage.getItem("shoppingCart") || "[]");
            // Lấy data address theo người dùng
            // vm.fetchData();
            vm.fetchDataOld();
            vm.$store.dispatch("fetchCart");
        });

    },
    components: { Adreess }
}
</script>

<style>
.cusor-point{
    cursor: pointer;
}
.text__height{
    height: 120px;
}
</style>