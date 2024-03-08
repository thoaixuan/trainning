<template>
    <div class="container  pt-3">
        
        <!-- Trường hợp chưa thanh toán -->
        <div class="row" v-if="order.id!==null">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row border-bottom border-lg-0">
                            <div class="col-lg-6">
                                <a href="/">
                                    <img src="/themes/assets/images/logo/logo.png" class="w-120px">
                                </a>
                                <div>
                                    <address class="pt-3">
                                        Công ty TNHH Tư Vấn Đầu Tư ING<br>
                                        {{setting.app_address}}<br>
                                        SĐT: {{setting.app_phone}}<br>
                                        MST: 3502437536 cấp ngày 02/10/2020 tại Cục thuế tỉnh Bà Rịa - Vũng Tàu
                                    </address>
                                </div>
                            </div>
                            <div class="col-lg-6 text-end">
                                <h3>#ID_00{{order.id}}</h3>
                                <h5>Ngày tạo: {{moment(order.createdAt).format("DD-MM-YYYY")}}</h5>
                            </div>
                        </div>
                        <div class="row pt-5">
                            <div class="col-lg-6">
                                <p class="h3">Thông tin khách hàng:</p>
                                <p class="fs-18 fw-semibold mb-0">Tên: {{order.user.fullname}}</p>
                                <p class="mb-0">SĐT: {{order.user.phone}}</p>
                                <address>
                                        Địa chỉ: {{order.shipTo.address}}, {{order.shipTo.district_name}}, {{order.shipTo.province.name}}<br>
                                </address>
                            </div>
                            <div class="col-lg-6 text-end">
                                <p class="h4 fw-semibold">Chi tiết thanh toán:</p>
                                <p class="mb-1">Tổng tiền: {{format(order.total_amount)+'đ'}}</p>
                                <p class="mb-1">Hình thức thanh toán: {{order.payment_type.text}}</p>
                            </div>
                        </div>
                        <div class="table-responsive push">
                            <table class="table table-bordered table-hover mb-0 text-nowrap">
                                <tbody>
                                    <tr>
                                        <th class="text-center"></th>
                                        <th>Sản phẩm</th>
                                        <th class="text-end">Giá</th>
                                        <th class="text-center">Số lượng</th>
                                        <th class="text-end">Tổng tiền</th>
                                    </tr>
                                    <tr v-for="(product,index) in order.products" :key="index">
                                        <td class="text-center">{{index+1}}</td>
                                        <td>
                                                <div class="content-break">{{product.product_name}}</div>
                                        </td>
                                        <td class="text-end">
                                            <div v-if="product.product_price_discount!=null"><del>{{format(product.product_price)}}đ</del>
                                                <strong>{{format(product.product_price_discount)}} đ</strong></div>
                                                <div v-else><strong>{{format(product.product_price)}} đ</strong></div>
                                        </td>
                                        <td class="text-center">{{product.qty}}</td>
                                        <td class="text-end">{{format((product.product_price_discount?product.product_price_discount:product.product_price) * product.qty)}}đ</td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" class="fw-bold text-uppercase text-end">Tổng hóa đơn</td>
                                        <td class="fw-bold text-end h4">{{format(order.total_amount)+'đ'}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
             <!-- Trường hợp chưa đã thanh toán thành công -->
        <div v-if="order.id!==null&&order.payment_status.id==0">
        
            <div class="col-md-12">
                <div class="text-end mt-3">
                    <button type="button" class="btn flex-fill me-1 btn-light-primary" @click="clickTransfer"><i class="fa fa-paper-plane-o"></i> Chuyển khoản</button>
                    <button type="button" class="btn flex-fill me-1 btn-light-primary"  v-if="order.payment_type.id==2" @click="paymentVNPAY"><i class="fa fa-credit-card"></i> Thanh toán VNPAY</button>
                </div>
                <div class="col-12"  v-if="order.payment_type.id==1 || showTransfer == true">
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
                                  <!-- <textarea class="form-control" placeholder="Leave a comment here" style="height: 100px"></textarea> -->
                                  <!-- <label>
                                      {{data.phone}} - ORDER_{{modelOrder.id}}
                                  </label> -->
                                  <!-- <span>Lưu ý: Nếu đã chuyển khoản, vui lòng xác thực thanh toán, chúng tôi sẽ sớm liên hệ bạn</span> -->

                              </div>

                      </div>
            </div>
            </div>
        </div>
          <!-- Trường hợp không tìm thấy đơn hàng đó -->
        <div class="row" v-if="order.id===null">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body pb-0">
                        <div class="alert alert-warning" role="alert">
                            Không tìm đây đơn hàng vui lòng kiểm tra lại !
                        </div>
                    </div>
                </div>
            </div>
        </div> 
</div>     
</template>
<script>
import load_api from '../../../../../api.json';
import {formatCurrency} from '../../../../../public/vuejs/utilities/helpers.js';
import moment from 'moment'

export default {
    data() {
      return {
        showTransfer: false,
        moment: moment,
        setting:{},
        returnUrl:window.location.href,
        order:{
            id:null,
            products:[],
            payment_type:2,
            total_amount:0,
            payment_status:0,
            user:{
                fullname:"",
                avatar:"",
                email:"",
            }
        },
      };
    },
    methods: {
        format(number) {
              return formatCurrency(number ? number : 0);
        },
        async clickTransfer() {
            this.showTransfer = true;
        },
        async fetchDataSetting() {
            this.$forceUpdate();
            let data= await this.$store.dispatch("fetchData",load_api.setting.setting+"?fields=config_banktranfer_fullname,config_banktranfer_number,config_banktranfer_branch,app_address app_phone");
            this.setting = data.data;
        },
        async fetchDataOrder() {
          this.$forceUpdate();
          let res = await this.$store.dispatch("fetchData",load_api.payment_online.orderByID+"?id="+this.$route.query.id_order);
          if(typeof(res.data)!=="string"){
            this.order = res.data;
          }
            let sum = 0;
            for (const product of this.order.products) {
                sum += (product.product_price_discount?product.product_price_discount:product.product_price) * product.qty;
                this.order.total_amount = sum;
            }
        },
        async paymentVNPAY(){
            let res= await this.$store.dispatch("fetchData",load_api.payment_online.paymentCreate+"?order="+this.$route.query.id_order);
              if(res.status==200){
                Vue.$toast.open({
                      message: 'Đang chuyển tới trang thanh toán',
                      type: 'success',
                      position: 'top-right'
                });
            }
            window.location.href = res.data;
        },
        async sendMail(){
        }
    },
    mounted() {
      this.$nextTick(async () => {
        await this.fetchDataSetting();
        await this.fetchDataOrder();
      });
    },
}
</script>
<style>
</style>
  