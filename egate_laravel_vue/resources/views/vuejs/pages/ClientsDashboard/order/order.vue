<template>
  <div>
      <section class="dashboard-order">       
        <div class="row" id="table-hover-row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Đơn hàng</h4>
                        <div>
                          <div class="block">
                            <el-date-picker
                              v-model="date"
                              type="date"
                              format="dd/MM/yyyy"
                              placeholder="Chọn ngày lọc" >
                            </el-date-picker>
                          </div>
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th>Ngày đặt</th>
                                        <th>Thông tin</th>
                                        <th>Tổng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(order,index) in model" :key="index" data-toggle="modal" data-backdrop="false" data-target="#backdrop" @click="modalOder(order)" class="cursor-pointer">
                                        <th>
                                          <div>
                                            {{moment(order.createdAt).format("DD-MM-YYYY")}}
                                            <span v-if="order.status.id===0" class="badge bg-light">{{order.status.text}}</span>
                                            <span v-if="order.status.id===1" class="badge bg-success">{{order.status.text}}</span>
                                            <span v-if="order.status.id===2" class="badge bg-danger">{{order.status.text}}</span>
                                          </div>
                                        </th>
                                        <th >
                                          <div >
                                              <span v-for="(product,index) in order.products" :key="'product-'+index" class="d-flex flex-column">
                                                  <div >
                                                      {{product.product_name}}
                                                  </div>
                                              </span>
                                              <span class="badge bg-secondary">{{order.payment_status.text}}</span>
                                          </div>
                                        
                                        </th>
                                        <td>{{format(order.total_amount)+"đ"}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                  <nav aria-label="d-flex flex-row-reverse Page navigation " v-if="pages">
                    <ul class="pagination">
                        <li class="page-item">
                            <span class="page-link cursor-pointer" @click="decreased" aria-label="Previous"><span aria-hidden="true">&laquo;</span></span>
                        </li>
                        <li class="page-item" v-for="index in pages" :key="index">
                          <span class="page-link cursor-pointer" @click="setPage(index)">{{index}}</span>
                        </li>
                        <li class="page-item">
                            <span class="page-link cursor-pointer" @click="advanced" aria-label="Next"><span aria-hidden="true">&raquo;</span></span>
                        </li>
                    </ul> 
                </nav>
            </div>
        </div>
      </section>


      <!-- Moddal -->
        <div class="modal fade text-left w-100" id="backdrop" tabindex="-1" role="dialog" aria-labelledby="myModalLabel4" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel4">Chi tiết đơn hàng</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                      <div v-if="selected.user">
                              <p><span class="badge badge-light-secondary" v-if="selected.ff_status">{{selected.ff_status.text}}</span></p>
                              <p><span class="font-weight-bold">Mã đơn hàng: </span><span>ORDER_{{selected.id}}</span></p>
                              <p><span class="font-weight-bold">Địa chỉ: </span>
                              <!-- <span v-if="selected.shipTo.address[0]"> {{selected.shipTo.address[0].address}},{{selected.shipTo.address[0].ward.ward_name}},{{selected.shipTo.address[0].district.district_name}},{{selected.shipTo.address[0].province.province_name}}  </span>  -->
                              <!-- <span v-else>Chưa có địa chỉ</span> -->
                              <span v-if="selected.shipTo.address"> {{selected.shipTo.address}},{{selected.shipTo.district_name}},{{selected.shipTo.province_name}}  </span> 
                              <span v-else>Chưa có địa chỉ</span>
                              <span class="badge badge-light-secondary" v-if="selected.status">{{selected.status.text}}</span>
                              </p>
                            </div>
                            <p><span class="font-weight-bold">Lưu ý giao hàng:</span>
                            <span v-if="selected.shipTo">{{selected.shipTo.note}}</span></p>
                            <p><span class="font-weight-bold">Ghi chú sản phẩm:</span>
                            <span v-if="selected.shipTo">{{selected.info}}</span></p>
                            <div class="table-responsive">
                              <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Giá tiền</th>
                                        <th>Số lượng</th>
                                        <th>Ghi chú</th>
                                    </tr>
                                </thead>
                                   <tbody>
                                    <tr v-for="(product,index) in selected.products" :key="index" class="w-100">
                                        <td>
                                            <span >{{index+1}} </span>
                                        </td>
                                        <td>
                                          <span>{{product.product_name}}</span> 
                                        </td>
                                        <td>
                                          <span>{{format(product.product_price)+"đ"}}</span>
                                        </td>
                                        <td>
                                          <span>{{product.qty}}</span>
                                        </td>
                                        <td>
                                          <span>{{product.note}}</span>
                                        </td>
                                  </tr>
                                   </tbody>
                              </table>
                            </div>
                            <p><span class="font-weight-bold">Tổng đơn hàng:</span> {{format(selected.total_amount) + 'đ'}} <span class="badge badge-light-secondary" v-if="selected.payment_status">{{selected.payment_status.text}}</span></p>
                            
                    </div>
                    
                </div>
            </div>
        </div>
  </div>
</template>

<script>
import load_api from '../../../../../../api.json'
import {formatCurrency} from '../../../../../../public/vuejs/utilities/helpers.js';
import moment from 'moment'

export default {
  data() {
    return {
      date:'',
      moment: moment,
      model:[],
      selected: {},
      pages:0,
      indexPages:1,
      total:0,
      currentPage:10,
      selected:{},
    };
  },
  methods: {
    fix(str) {
        return str.substring(0, (str.length-6)) ;
    },
    async asyncData(page) {
      var vm=this;
        let data = await vm.$store.dispatch("fetchData",load_api.cart.getOrder+"?page="+page);
        vm.model = data.data[0].data;
        vm.total=data.data[0].total.rows;
        vm.pages = Math.ceil(parseInt(vm.total) / vm.currentPage);
    },
    async filterData(page,date) {
      var vm=this;
        let data = await vm.$store.dispatch("fetchData",load_api.cart.getOrder+"?page="+page);
        vm.model = data.data[0].data.filter((item) => moment(item.createdAt).format("MM-DD-YYYY") === moment(date).format("MM-DD-YYYY"));
        vm.total=data.data[0].total.rows;
        vm.pages = Math.ceil(parseInt(vm.total) / vm.currentPage)
    },
    format(number) {
      return formatCurrency(number ? number : 0);
    },
    decreased() {
      this.indexPages--;
      if(this.indexPages<1){
        this.indexPages=1;
        this.checkIndex=false;
      }
        this.asyncData(this.indexPages);
        console.log(this.indexPages);
    },
    advanced() {
      this.indexPages++;
      if(this.indexPages>=this.pages){
        this.indexPages=this.pages;
        this.checkIndex=false;
      }
        this.asyncData(this.indexPages);
    },
    setPage(page){
      this.asyncData(page);
    },
    modalOder(order){
      var vm=this;
      vm.selected=order;
      console.log(vm.selected);
    },
    async fetchDate(){
      console.log(this.date);
    }
   
  },
  computed: {
    
  },
 mounted() {
    var vm = this;
    vm.asyncData();
  },
  watch:{
  date:{
      handler(){
          if(this.date !== null){
            this.filterData(1,this.date);
          }else {
            this.asyncData();
          }
      },deep:true
      }
  }
};
</script>


<style>

</style>