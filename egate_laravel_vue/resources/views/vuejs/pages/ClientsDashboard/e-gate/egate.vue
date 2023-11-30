<template>
  <div>
      <section class="dashboard-order" v-if="model.email=='thoaixuan@yahoo.com'">       
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Sản phẩm eGate</h4>
                    </div>
                    <div class="card-content p-2">
                              <section id="dashboard-analytics">
                                  <div class="row">
                                   <router-link v-for="(item,index) in model" :key="index" :to="`/clients-dashboard/egate/${item.code}`">
                                      <div class="col-12">
                                              <div class="d-flex flex-column align-items-start pb-0">
                                                <div class="shadow-lg p-3 mb-3 bg-body rounded">
                                                    <h5>
                                                        <i class="ficon feather icon-package"></i>  {{item.name}}
                                                    </h5>
                                                     <p class="mb-0">
                                                          {{item.description}}
                                                    </p>
                                                </div>
                                                 
                                              </div>
                                           
                                      </div>
                                   </router-link>
                                  </div>
                              </section>  
                        <h6 v-if="model.length == 0">
                            Bạn chưa sở hữu sản phẩm nào của e-Gate
                        </h6>
                    </div>
                </div>
                 
            </div>
            <div class="col-12" v-if="model.length != 0">
                <div class="card">
                <div class="card-header">
                        <h4 class="card-title">Nhật ký</h4>
                </div>
                    <div class="card-content p-2">
                       <!-- <div class="custom-controls-stacked d-flex justify-content-start align-items-center">
                        <label class="custom-control custom-radio mr-3" v-for="(item,index) in model" :key="item._id">
                            <input type="radio" class="custom-control-input" :id="item._id" name="checkproduct" :checked="index==0">
                            <span class="custom-control-label" @click="fetchLogEgate(item.code)">{{item.name}}</span>
                        </label>
                        </div> -->

                    <ul class="nav nav-tabs" id="myTabWaiting" role="tablist">
                    <li class="nav-item" role="presentation" v-for="(item,index) in model" :key="item._id">
                        <button :class="{'btn-type bg-white nav-link active':index==0, 'btn-type bg-white nav-link':index!=0}" id="egate-tab" data-toggle="tab" data-target="#egate" type="button" role="tab" aria-controls="egate" aria-selected="true" @click="fetchLogEgate(item.code)">{{item.name}}</button>
                    </li>
                    </ul>
                    <div class="custom-controls-stacked d-flex justify-content-start align-items-center">
                        <label class="mr-2">Lọc theo: </label>
                        <label class="custom-control custom-radio mr-3">
                            <input type="radio" class="custom-control-input type-checked" name="checkproduct">
                            <span class="custom-control-label" @click="fetchTypeLogEgate('EGate',selectProduct,1)">e-Gate</span>
                        </label>
                        <label class="custom-control custom-radio mr-3">
                            <input type="radio" class="custom-control-input type-checked" name="checkproduct">
                            <span class="custom-control-label" @click="fetchTypeLogEgate('Tiki',selectProduct,1)">Tiki</span>
                        </label>
                        <label class="custom-control custom-radio mr-3">
                            <input type="radio" class="custom-control-input type-checked" name="checkproduct">
                            <span class="custom-control-label" @click="fetchTypeLogEgate('Shopee',selectProduct,1)">Shopee</span>
                        </label>
                        <label class="custom-control custom-radio mr-3">
                            <input type="radio" class="custom-control-input type-checked" name="checkproduct">
                            <span class="custom-control-label" @click="fetchTypeLogEgate('Lazada',selectProduct,1)">Lazada</span>
                        </label>
                        </div>

                        <div class="table-responsive mt-1">
                            <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Sản phẩm</th>
                                            <th>Trạng thái</th>
                                            <th>Thời gian</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(item,index) in getLogEgate" :key="index">
                                            <td>{{item.product_name}}</td>
                                            <td>{{item.name}}</td>
                                            <td>
                                                {{moment(item.updatedAt).format("DD-MM-YYYY HH:mm")}}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                        </div>
                    <nav class="mb-2">
                        <v-pagination v-if="totalPage"
                         v-model="currentPage"
                                        :page-count="totalPage"
                                        :classes="bootstrapPaginationClasses"
                                        :labels="customLabels"
                                        @change="onChangePage"></v-pagination>
                        </nav>
                        
                    </div>
                </div>
                 
            </div>
        </div>
      </section>


  </div>
</template>


<script>
import vPagination from 'vue-plain-pagination'
import api from '../../../../../../api.json';
import moment from 'moment'
export default {
    components: { vPagination },
    data(){
        return {
            currentPage: 1,
                totalPage: 1,
                bootstrapPaginationClasses: {
                    ul: 'pagination',
                    li: 'page-item',
                    liActive: 'active',
                    liDisable: 'disabled',
                    button: 'page-link'
                },
                customLabels: {
                    first: 'First',
                    prev: 'Previous',
                    next: 'Next',
                    last: 'Last'
                },
            model: [],
            token: '',
            getLogEgate: [],
            firstItem: [],
            selectProduct: "",
            moment: moment,
            typeLog: "",
            queryLog: "",
            typeActive: "",
        }
    },
    methods: {
        async firstLogEgate() {
            let data = await this.$store.dispatch("fetchData",api.egate.get);
            this.firstItem = data.data[0].code;
            let res = await this.$store.dispatch("fetchData",api.egate.listLogDevice+"?query="+this.firstItem);
            this.getLogEgate = res.data.data;
            // this.selectProduct = res.data.data[0].egproductCode;
            console.log(res.data.data);
        },
        async fetchLogEgate(query,page) {
            let data = await this.$store.dispatch("fetchData",api.egate.listLogDevice+"?query="+query+"&page="+page);
            this.getLogEgate = data.data.data;
            // get code egproduct
            if(data.data.data[0]){
                this.selectProduct = data.data.data[0].egproductCode;
            }
            // phân trang
            this.totalPage = data.data.total.pages;
            // bỏ checked khi chuyển tab
            var ele = document.getElementsByClassName("type-checked");
            for(var i=0;i<ele.length;i++)
                ele[i].checked = false;
            // Gán type active cho phân trang
            this.typeActive = 0;
        },
        async fetchTypeLogEgate(type,query,page) {
            let data = await this.$store.dispatch("fetchData",api.egate.listLogDevice+"?query="+query+"&type="+type+"&page="+page);
            this.getLogEgate = data.data.data;
            // Lấy type
            this.typeLog = type;
            // Lấy query
            this.queryLog = query;
            // phân trang
            this.totalPage = data.data.total.pages;
            // Gán type active cho phân trang
            this.typeActive = 1;
        },
        onChangePage: function () {
            var vm=this;
            if(vm.typeActive){
                vm.fetchTypeLogEgate(this.typeLog, this.queryLog, this.currentPage)
            }else {
                vm.fetchLogEgate(this.selectProduct, this.currentPage);
            }
            // vm.$router.go();
        },
    },
    mounted(){
        var vm = this;
        vm.firstLogEgate();
        vm.$nextTick(async ()=> {
            let response = await vm.$store.dispatch("fetchData",api.egate.get);
            vm.model = response.data;
        })
    }
}
</script>

<style>
.notification {
    background-color: white;
    border-radius: 4px;
    position: relative;
    padding: 1.25rem 2.5rem 1.25rem 1.5rem;
}
</style>