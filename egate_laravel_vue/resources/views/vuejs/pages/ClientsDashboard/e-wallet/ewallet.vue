<template>
  <div>
      <section class="dashboard-order">       
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title"><span class="h4">e-Wallet</span>
                    </div>
                    </div>
                    <div class="card-body">
                        <div class="font-weight-bold mb-0 p-05">
                        <div class="row">
                        <div class="col-6 balance-text">
                            <span class="h5" v-if="isShowMoney">Số dư: {{this.accountBalance}}</span>
                            <span class="h5" v-else>Số dư: ******</span>
                            <i @click="showMoney" :class="{ 'fa fa-eye': isShowMoney,'fa fa-eye-slash': !isShowMoney  }"></i>
                        </div>
                        <div class="col-6 text-right font-italic maintain-text">
                            Duy trì 50.000đ
                        </div>
                        </div>
                        </div>
                        
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="bg-white nav-link active" id="home-tab" data-toggle="tab" data-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Nạp tiền</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="bg-white nav-link" id="profile-tab" data-toggle="tab" data-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Rút tiền</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="bg-white nav-link" id="transfer-tab" data-toggle="tab" data-target="#transfer" type="button" role="tab" aria-controls="transfer" aria-selected="false">Chuyển tiền</button>
                    </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <input type="text" class="form-control inputDeposit" v-model="balance" placeholder="Số tiền" inputmode="numeric" pattern="[0-9]*" @change="inputMoney"/>
                        <button type="button" class="btn btn-primary mt-1" @click="deposit">Nạp tiền</button>

                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="cardMaster rounded border p-2 mb-1">
                                                <div class="d-flex justify-content-between flex-sm-row flex-column">
                                                    <div class="card-information">
                                                        <h5 class="mb-50">Tài khoản ngân hàng</h5>
                                                        <div class="d-flex align-items-center">
                                                            <h6 class="mb-0">{{bankInfo.bankAccountUsername}}</h6>
                                                        </div>
                                                        <div>Ngân hàng: {{bankInfo.bankAccountName}}</div>
                                                        <span class="card-number">STK: {{bankInfo.bankAccountNumber}}</span>
                                                    </div>
                                                    <div class="d-flex flex-column text-start text-lg-end">
                                                        <div class="d-flex order-sm-0 order-1 mt-1 mt-sm-0">
                                                            <router-link to="/clients-dashboard/profile?tab=bankinfo">
                                                            <button class="btn btn-outline-primary waves-effect" data-bs-toggle="modal" data-bs-target="#editCard">
                                                                Sửa
                                                            </button>
                                                            </router-link>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                        <input type="text" class="form-control inputWithdraw" v-model="balance" placeholder="Số tiền" inputmode="numeric" pattern="[0-9]*" @change="inputMoney"/>
                        <button type="button" class="btn btn-primary mt-1" @click="withdraw">Rút tiền</button>
                    </div>
                    <div class="tab-pane fade" id="transfer" role="tabpanel" aria-labelledby="transfer-tab">
                        <div class="form-group mb-1">
                            <label for="">Email hoặc số điện thoại người nhận</label>
                            <input type="text" class="form-control" v-model="email_or_phone" @change="checkInfoTransfer" />
                        </div>
                        <div class="form-group mb-1" v-if="fullname">
                            Tên người nhận: {{fullname}}
                        </div>
                        <div class="form-group mb-1">
                            <label for="">Số tiền</label>
                            <input type="text" class="form-control inputTransfer" v-model="transfer_amount" placeholder="" inputmode="numeric" pattern="[0-9]*" @change="inputMoney"/>
                        </div>
                        <button type="button" class="btn btn-primary" @click="transfer">Chuyển tiền</button>

                    </div>
                    </div>

                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Phương thức thanh toán</h4>
                    </div>
                    <div class="card-body">
                    <div class="custom-controls-stacked d-flex justify-content-start align-items-center">
                    <div class="w-50">
                    <img src="/themes/assets/images/payment-vnpay.webp" width="100px" height="40px"/>
                    
                    <label class="custom-control custom-radio" @click="bankChecked = false;paymentmethod = 2;inputMoney()">
                            <input type="radio" class="custom-control-input" name="method" value="0" checked="">
                            <span class="custom-control-label">VNPAY</span>
                        </label>
                        </div>
                        <div class="w-50">
                            <img src="/themes/assets/images/payment-banktransfer.png" width="100px" height="40px"/>
                    <label class="custom-control custom-radio" @click="bankChecked = true;paymentmethod = 1;inputMoney()">
                            <input type="radio" class="custom-control-input" name="method" value="1">
                            <span class="custom-control-label">Chuyển khoản</span>
                        </label>
                        </div>
                    </div>
                    <div class="mt-1" v-if="bankChecked">
                        <div class="h5 mb-0">Chủ tài khoản</div>
                        <span>{{setting.config_banktranfer_fullname}}</span>

                        <div class="h5 mb-0">Số tài khoản</div>
                        <span>{{setting.config_banktranfer_number}}</span>

                        <div class="h5 mb-0">Chi nhánh</div>
                        <span>{{setting.config_banktranfer_branch}}</span>
                    </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-content p-2">
                    <ul class="nav nav-tabs" id="myTabWaiting" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="bg-white nav-link active" id="history-tab" data-toggle="tab" data-target="#history" type="button" role="tab" aria-controls="history" aria-selected="true">Lịch sử</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="bg-white nav-link" id="pending-tab" data-toggle="tab" data-target="#pending" type="button" role="tab" aria-controls="pending" aria-selected="false">Chờ duyệt <span class="badge bg-light">{{countPending}}</span></button>
                    </li>
                    </ul>
                    <div class="tab-content" id="myTabContentWaiting">
                    <div class="tab-pane fade show active" role="tabpanel" aria-labelledby="history-tab" id="history">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Trạng thái</th>
                                            <th>Phương thức TT</th>
                                            <th>Giao dịch</th>
                                            <th>Ngày</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(item,index) in getHistory" :key="index">
                                            <td>{{item.content}}</td>
                                            <td>
                                                <span v-if="item.paymentmethod===0">Hệ thống</span>
                                                <span v-if="item.paymentmethod===1">Chuyển khoản</span>
                                                <span v-if="item.paymentmethod===2">VNPAY</span>
                                            </td>
                                            <td>
                                                <span class="text-primary" v-if="item.type=='Deposit'">+{{formatMoney(item.balance_history)}}</span>
                                                <span class="text-primary" v-if="item.type=='Transfer'">{{formatMoney(item.balance_history)}}</span>
                                                <span class="text-primary" v-if="item.type=='Withdraw'">-{{formatMoney(item.balance_history)}}</span>
                                            </td>
                                            <td>{{moment(item.createdAt).format("DD-MM-YYYY HH:mm")}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                        </div>

                        <nav class="mb-2">
                        <v-pagination v-model="currentPageHistory"
                                        :page-count="totalPageHistory"
                                        :classes="bootstrapPaginationClasses"
                                        :labels="customLabels"
                                        @change="onChangeHistory"></v-pagination>
                        </nav>

                    </div>
                    <div class="tab-pane fade" role="tabpanel" aria-labelledby="pending-tab" id="pending">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Trạng thái</th>
                                            <th>Giao dịch</th>
                                            <th>Ngày</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(itemPending,index) in getPending" :key="index">
                                            <td>{{itemPending.content}} <span class="badge bg-light">Chờ duyệt</span></td>
                                            <td>
                                                <span class="text-primary">{{formatMoney(itemPending.balance_history)}}</span>
                                            </td>
                                            <td>{{moment(itemPending.createdAt).format("DD-MM-YYYY HH:mm")}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                        </div>

                        <nav class="mb-2">
                        <v-pagination v-if="totalPagePending"
                                        v-model="currentPagePending"
                                        :page-count="totalPagePending"
                                        :classes="bootstrapPaginationClasses"
                                        :labels="customLabels"
                                        @change="onChangePending"></v-pagination>
                        </nav>

                    </div>
                    </div>
                        
                    </div>
                </div>
                 
            </div>
        </div>
      </section>


  </div>
</template>

<script>
import api from '../../../../../../api.json';
import {formatCurrency} from '../../../../../../public/vuejs/utilities/helpers.js';
import moment from 'moment'
import vPagination from 'vue-plain-pagination'

export default {
    components: { vPagination },
    data() {
        return {
                currentPageHistory: 1,
                totalPageHistory: 1,
                currentPagePending: 1,
                totalPagePending: 1,
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
                accountBalance: "",
                objectDeposit: [],
                objectWithdraw: [],
                objectTransfer: [],
                balance: "",
                transfer_amount: "",
                email_or_phone: "",
                userID: "",
                paymentmethod: 2,
                isShowMoney: true,
                bankChecked: false,
                setting: "",
                getHistory: [],
                getPending: [],
                countPending: "",
                moment: moment,
                isInputActive: false,
                bankInfo: {
                    bankAccountUsername: "",
                    bankAccountName: "",
                    bankAccountNumber: ""
                },
                objectInfoTransfer: [],
                fullname: ""
            }
    },
    methods: {
        async getAuth() {
            var vm = this;
            let data = await vm.$store.dispatch("fetchData",api.auth.info);
            if(data.status==200){
            vm.userID=data.data.result._id;
            vm.bankInfo = {
                bankAccountUsername: data.data.result.bankAccountUsername,
                bankAccountName: data.data.result.bankAccountName,
                bankAccountNumber: data.data.result.bankAccountNumber
            }
            }
        },
        async getBalance() {
            var vm = this;
            vm.$nextTick(async () => {
                let data = await vm.$store.dispatch("fetchData",api.wallet.getBalance);
                if(data.status==200){
                vm.accountBalance=vm.formatMoney(data.data.balance);
                }
            });
        },
        async deposit() {
            var vm = this;
            this.replaceBalance();
            if(vm.balance < 100000){
                return Vue.$toast.open({
                message: 'Số tiền nạp ít nhất 100.000đ',
                type: 'error',
                position: 'top-right'
                });
            }
            vm.$nextTick(async () => {
            vm.objectDeposit.api=api.wallet.deposit;
            vm.objectDeposit.data= {
                balance: vm.balance,
                paymentmethod: vm.paymentmethod
            };
            console.log("paymentmethod",vm.paymentmethod);
            let response = await vm.$store.dispatch("postData",vm.objectDeposit);
            if(vm.paymentmethod == 2){
                window.location.href = response.data;
                Vue.$toast.open({
                message: 'Đang chuyển hướng thanh toán VNPAY',
                type: 'success',
                position: 'top-right'
                });
            }else {
                Vue.$toast.open({
                message: 'Nạp tiền thành công và đang chờ duyệt',
                type: 'success',
                position: 'top-right',
                duration: 7000
                });
            }
            if(response.status != 200){
                Vue.$toast.open({
                message: 'Nạp tiền thất bại',
                type: 'error',
                position: 'top-right'
                });
            }
            });
        },
        async withdraw() {
            var vm = this;
            this.replaceBalance();
            vm.$nextTick(async () => {
            vm.objectWithdraw.api=api.wallet.withdraw;
            vm.objectWithdraw.data= {
                balance: vm.balance,
                bankAccountNumber:vm.bankInfo.bankAccountNumber,
                bankAccountName:vm.bankInfo.bankAccountName,
                bankAccountUsername:vm.bankInfo.bankAccountUsername
            };
            let response = await vm.$store.dispatch("postData",vm.objectWithdraw);
            if(response.status == 200){
                Vue.$toast.open({
                message: 'Đã yêu cầu rút tiền và chờ duyệt',
                type: 'success',
                position: 'top-right',
                duration: 7000
                });
                // this.$router.go();
            }else{
                Vue.$toast.open({
                message: 'Rút tiền thất bại',
                type: 'error',
                position: 'top-right'
                });
            }
            });
        },
        async transfer() {
            var vm = this;
            
            this.transfer_amount = this.transfer_amount.replace(',','');
            vm.$nextTick(async () => {
            vm.objectTransfer.api=api.wallet.transfer;
            vm.objectTransfer.data= {
                email_or_phone: vm.email_or_phone,
                transfer_amount:vm.transfer_amount
            };
            try {
            let response = await vm.$store.dispatch("postData",vm.objectTransfer);
            if(response.status == 200){
                Vue.$toast.open({
                message: 'Đã chuyển tiền thành công',
                type: 'success',
                position: 'top-right',
                duration: 7000
                });
                this.$router.go();
            }
            }
            catch(err){
                Vue.$toast.open({
                message: 'Chuyển tiền thất bại',
                type: 'error',
                position: 'top-right'
                });
            } 
            });
            
        },
        async fetchSetting() {
            var vm = this;
            vm.$nextTick(async () => {
            let data= await vm.$store.dispatch("fetchData",api.setting.setting+"?fields=config_banktranfer_fullname,config_banktranfer_number,config_banktranfer_branch");
            this.setting = data.data;
        });
        },
        async fetchHistory(page) {
            var vm = this;
            // let dataAuth = await this.$store.dispatch("fetchData",api.auth.info);
            // if(dataAuth.status==200){
            //     this.userID=dataAuth.data.result._id;
            // }
            let data = await this.$store.dispatch("fetchData",api.wallet.getHistory+"?pageSize=10&page="+page);
            this.getHistory = data.data.data;
            vm.totalPageHistory = data.data.total.pages;
        },
        async fetchPending(page) {
            let dataAuth = await this.$store.dispatch("fetchData",api.auth.info);
            if(dataAuth.status==200){
                this.userID=dataAuth.data.result._id;
            }
            let data = await this.$store.dispatch("fetchWaiting",api.wallet.getWaiting+'?walletStatus=0&page='+page);
            // const asArray = Object.entries(data.data.data);
            // const filtered = asArray.filter(([key, value]) => value.walletStatus == 0);
            // const dataPending = Object.fromEntries(filtered);
            this.getPending = data.data.data;
            this.totalPagePending = data.data.total.pages;
            this.countPending = data.data.total.rows;
        },
        formatMoney(number) {
             return formatCurrency(number ? number : 0)+"đ";
        },
        inputMoney(){
            // Nạp tiền
            var e = document.querySelector(".inputDeposit");
            e.value = e.value.replace(/\D/gm, "");
            var val = e.value.split(",").join("");
            e.value = val
            .toString()
            .split(/(?=(?:\d{3})+(?:\.|$))/g)
            .join(",");
            // Rút tiền
            var w = document.querySelector(".inputWithdraw");
            w.value = w.value.replace(/\D/gm, "");
            var valw = w.value.split(",").join("");
            w.value = valw
            .toString()
            .split(/(?=(?:\d{3})+(?:\.|$))/g)
            .join(",");
            // Chuyển tiền
            var t = document.querySelector(".inputTransfer");
            t.value = t.value.replace(/\D/gm, "");
            var valt = t.value.split(",").join("");
            t.value = valt
            .toString()
            .split(/(?=(?:\d{3})+(?:\.|$))/g)
            .join(",");
        },
        replaceBalance(){
            this.balance = this.balance.replace(',','');
        },
        showMoney(){
            this.isShowMoney = !this.isShowMoney;
        },
        async checkInfoTransfer() {
            try {
            this.objectInfoTransfer.api=api.wallet.checkInfoTransfer,
            this.objectInfoTransfer.data= {
                email_or_phone: this.email_or_phone,
            };
            let data = await this.$store.dispatch("postData",this.objectInfoTransfer);
            this.fullname = data.data.fullname;
            }catch {
                this.fullname = "Không tồn tại";
            }
        },
        onChangeHistory: function () {
            var vm=this;
            vm.fetchHistory(this.currentPageHistory);
            // vm.$router.go();
        },
        onChangePending: function () {
            var vm=this;
            vm.fetchPending(this.currentPagePending);
        }
    },
    mounted() {
        this.getAuth();
        this.getBalance();
        this.showMoney();
        this.fetchSetting();
        this.fetchHistory(1);
        this.fetchPending(1);
    }

};
</script>

<style>
.p-05 {
    padding: 0.5rem;
}
.balance-text {
    font-size: 16px;
}
.maintain-text {
    font-size: 12px;
}
</style>