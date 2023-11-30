<template>
  <div>
    <div class="container">
        <div class="row">
                   <div class="col-lg-8 col-md-12 col-12">
                        <div class="card bg-transparent border-0" v-for="(product,index) in modelValue" :key="index">
                            <div class="card border-0 mb-1">
                                <div class="card-body d-flex align-items-center flex-column flex-md-row" >
                                    <img class="w120 rounded img-fluid" :src="product.image" alt="">
                                    <div class="ms-md-4 m-0 mt-4 mt-md-0 text-md-start text-center w-100" >
                                        <h6 class="mb-3">{{product.product_name}}</h6>
                                        <div class="d-flex flex-row flex-wrap align-items-center justify-content-center justify-content-md-start">
                                            <div class="pe-xl-5 pe-md-4 ps-md-0 px-3 mb-2">
                                                <div class="text-muted small">Giá</div>
                                                <div v-if="product.product_price_discount!=null"><del>{{format(product.product_price)}}đ</del>
                                                <strong>{{format(product.product_price_discount)}} đ</strong></div>
                                                <div v-else><strong>{{format(product.product_price)}} đ</strong></div>
                                            </div>
                                              <div class="pe-xl-5 pe-md-4 ps-md-0 px-3 mb-2">
                                                <div class="text-muted small">SL</div>
                                                <strong>{{product.qty}}</strong>
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
                        <div>
                        </div>
                        </div>
             <div class="col-xl-4 col-lg-4 col-md-12 col-12">
                <div class="card border-0 mb-3">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col text-truncate">
                                <div class="d-flex align-items-center">
                                    <img :src="model.avatar||`/themes/assets/images/logo_admin/user.png`" data-bs-toggle="tooltip" title="" alt="Avatar" class="rounded-circle avatar" data-original-title="Avatar Name" data-bs-original-title="">
                                    <div class="ms-3">
                                        <a href="#" title="">{{model.fullname}}</a>
                                        <p class="mb-0">{{model.email}}</p>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="row g-2 mb-3 mt-4">
                             <p class="d-flex justify-content-between py-1"><span><i class="fa fa-check-circle"></i> Tổng hóa đơn:</span> <span>{{format(totalSum)+'đ'}}</span></p>
                        </div>
                        <div class="row g-2 mb-3 mt-4">

                            <div class="col-12">
                                <div class="form-floating">
                                    <select class="form-select" aria-label="Floating label select example" v-model="checkPayment">
                                        <option value="1">Chuyển khoản</option>
                                        <option value="2">VNPAY</option>
                                    </select>
                                    <label>Phương thức thanh toán</label>   
                                </div>
                            </div>
                            <div class="col-12"  v-if="checkPayment==1">
                                   <ul class="resume-box ps-0 pb-0 mb-0">
                                        <li>
                                            <div class="icon text-center">
                                                <i class="fa fa-address-card-o  "></i>
                                            </div>
                                            <div class="fw-bold mb-0">Chủ tài khoản</div>
                                            <span>{{setting.config_banktranfer_fullname}}</span>
                                        </li>
                                        <li>
                                            <div class="icon text-center">
                                                <i class="fa fa-credit-card-alt"></i>
                                            </div>
                                            <div class="fw-bold mb-0">Số tài khoản</div>
                                            <span>{{setting.config_banktranfer_number}}</span>
                                        </li>
                                        <li>
                                            <div class="icon text-center">
                                                <i class="fa fa-id-card"></i>
                                            </div>
                                            <div class="fw-bold mb-0">Chi nhánh</div>
                                            <span>{{setting.config_banktranfer_branch}}</span>
                                        </li>
                                    </ul>   
                                    <div class="form-floating mt-2">
                                        <textarea class="form-control" placeholder="Leave a comment here" style="height: 100px"></textarea>
                                        <label>
                                            {{data.phone}} - ORDER_{{modelOrder.id}}
                                        </label>
                                        <span>Lưu ý: Nếu đã chuyển khoản, vui lòng xác thực thanh toán, chúng tôi sẽ sớm liên hệ bạn</span>

                                    </div>
                            </div>
                            <div class="col-12 d-flex text-center">
                                <button type="button" class="btn flex-fill me-1 btn-light-primary"  v-if="checkPayment==1" @click="sendMail">Đặt hàng</button>
                                <button type="button" class="btn flex-fill me-1 btn-light-primary"  v-if="checkPayment==2" @click="paymentVNPAY">Thanh toán VNPAY</button>
                            </div>
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
import load_api from '../../../../../../api.json'

export default {
    data() {
        return {
            object:{
                "api":"",
                "data":{},
            },
            objectSendMail:{
                "api":"",
                "data":{},
            },
            checkPayment:2,
            setting:{},
            modelOrder: {},
            model:{},
            modelValue: [],
            addressValue: {},
            payment:{
                payType: 1,
                amount: '',
                orderID: '',
                info: ""
            },
            order: {
                total_amount: "",
                info: "",
                products: [],
                shipTo: {
                    address: [],
                    phone: "",
                    name: "",
                    note: "",
                    price: "",
                    exptectedDeliveryDate: "",
                    status: {
                        id: 0,
                        text: "Chua hoan thanh"
                    }
                }
            },
              data:{
                email:"",
                title:"",
                body:"",
                phone:"",
                content:"",
            },
        };
    },
    methods: {
        format(number) {
            return formatCurrency(number ? number : 0);
        },
        async fetchOrder(){
                var vm =this;
                 let data = await vm.$store.dispatch("fetchData",load_api.cart.getOrder+"?page=1");
                vm.modelOrder=data.data[0].data[0];
                vm.payment.orderID=vm.modelOrder.id;
                vm.payment.info=vm.modelOrder.info;
                vm.data.email=vm.modelOrder.user.email;
                vm.data.phone=vm.modelOrder.user.phone;
                vm.data.title=`"${vm.modelOrder.user.fullname} đã chuyển khoản."`;
                vm.data.content="";
                console.log("fetchOrder",vm.modelOrder);
        },
        async fetchSetting() {
                var vm = this;
                vm.$nextTick(async () => {
                let data= await vm.$store.dispatch("fetchData",load_api.setting.setting+"?fields=config_banktranfer_fullname,config_banktranfer_number,config_banktranfer_branch");
                // this.setting = data.data.result;
                this.setting = data.data;
            });
        },
         async fetchData() {
            var vm = this;
            vm.$nextTick(async () => {
                let data= await vm.$store.dispatch("fetchData",load_api.auth.info);
                vm.model=data.data.result;
                console.log(vm.model);
                vm.order.shipTo.address.push(vm.model.addresses[0]);
            });
        },
        async paymentVNPAY(){
            var vm =this;
            vm.payment.amount=vm.totalSum;
            vm.object.api=load_api.cart.payment;
            vm.object.data=vm.payment;
            console.log("data211231",vm.object.data);
            let res= await vm.$store.dispatch("postData",vm.object);
            if(res.status==200){
            localStorage.removeItem("shoppingCart");
            Vue.$toast.open({
                    message: 'Đang chuyển tới trang thanh toán',
                    type: 'success',
                    position: 'top-right'
                });
            }
            window.location.href = res.data;
        },
        async sendMail(){
            try {
                var vm =this;
                var modelContent=[];
                vm.modelOrder.products.forEach(function(p){
                    modelContent.push(`<a href="${ vm.host}/product/${p._id}">${p.product_name}<a/>`)
                });
                this.data.body=this.data.content+'<br>'+'Số điện thoại:'+this.data.phone 
                +'<br>'+ 'sản phẩm:' + modelContent+'<br>'+ vm.format(vm.totalSum) + 'đ';
                    vm.objectSendMail.api=load_api.ticket.anonymous;
                    vm.objectSendMail.data=vm.data;
                    console.log("products",vm.modelOrder);
                    let res = await vm.$store.dispatch("postData",vm.objectSendMail)
                    if(res.status==200){
                        Vue.$toast.open({
                            message: 'Gửi thông tin thành công',
                            type: 'success',
                            position: 'top-right'
                        });
                        localStorage.removeItem("shoppingCart");
                        setTimeout(() => {
                            vm.$router.push('/payment/success');
                        }, 2000);
                    }
            } catch (error) {
                if(res.status==200){
                    Vue.$toast.open({
                        message: 'Gửi thông tin thất bại',
                        type: 'success',
                        position: 'top-right'
                    });
                }
            }
    
    
        },

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
                vm.fetchData();
                vm.fetchSetting();
                vm.fetchOrder();
                vm.$store.dispatch("fetchCart");
            });

         },
}
</script>

<style>
.resume-box li {
    margin: 0 0 8px;
}
.cusor-point{
    cursor: pointer;
}
</style>