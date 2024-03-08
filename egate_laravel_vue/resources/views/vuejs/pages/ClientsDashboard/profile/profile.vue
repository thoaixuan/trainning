<template>
  <div>
      <section id="page-account-settings">
                    <div class="row">
                        <!-- left menu section -->
                        <div class="col-md-3 mb-2 mb-md-0">
                            <ul class="nav nav-pills flex-column mt-md-0 mt-1">
                                <li class="nav-item">
                                    <a :class="this.$route.query.tab=='bankinfo'?'nav-link d-flex py-75':'nav-link d-flex py-75 active'" id="account-pill-general" data-toggle="pill" href="#account-vertical-general" aria-expanded="true">
                                        <i class="feather icon-globe mr-50 font-medium-3"></i>
                                        {{ $t('admin.generalSetting') }}
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link d-flex py-75" id="account-pill-password" data-toggle="pill" href="#account-vertical-password" aria-expanded="false">
                                        <i class="feather icon-lock mr-50 font-medium-3"></i>
                                        {{ $t('admin.changePassword') }}
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link d-flex py-75" id="account-pill-social" data-toggle="pill" href="#account-vertical-social" aria-expanded="false">
                                        <i class="feather icon-navigation mr-50 font-medium-3"></i>
                                        {{ $t('admin.addressManagement') }}
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a :class="this.$route.query.tab=='bankinfo'?'nav-link d-flex py-75 active':'nav-link d-flex py-75'" id="account-pill-social" data-toggle="pill" href="#account-vertical-bank" aria-expanded="false">
                                        <i class="feather icon-credit-card mr-50 font-medium-3"></i>
                                        {{ $t('admin.bankInfo') }}
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- right content section -->
                        <div class="col-md-9">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="tab-content">
                                            <div role="tabpanel" :class="this.$route.query.tab=='bankinfo'?'tab-pane':'tab-pane active'" id="account-vertical-general" aria-labelledby="account-pill-general" aria-expanded="true">
                                                <ValidationObserver v-slot="{ invalid }">
                                                <form>
                                                    <div class="row">
                                                    <div class="col-md-12">
                                                    <div class="form-group">
                                                    <div class="media">
                                                    <a href="javascript: void(0);">
                                                        <img id="image" src="" class="rounded mr-75" alt="profile image" height="64" width="64">
                                                    </a>
                                                    <div class="media-body mt-75">
                                                        <div class="col-12 px-0 d-flex flex-sm-row flex-column justify-content-start">
                                                            <label for="avatar" class="btn btn-sm btn-primary ml-50 mb-50 mb-sm-0 cursor-pointer waves-effect waves-light">Upload new photo</label>
                                                            <input type="file" @change="selectImage" id="avatar" hidden="" name="avatar" accept=".jpeg, .jpg, .png, .webp, .svg" ref="avatar">
                                                        </div>
                                                        <p class="text-muted ml-75 mt-50"><small>Allowed JPG, GIF or PNG. Max
                                                                size of
                                                                800kB</small></p>
                                                    </div>
                                                </div>
                                                    </div>
                                                    </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <ValidationProvider rules="required|text|minmax:1,200" v-slot="{ errors }">
                                                                    <label for="account-username">{{ $t('admin.fullName') }}</label>
                                                                    <input type="text" class="form-control" name="fullname" placeholder="Họ tên" v-model="user.fullname">
                                                                    <span class="text-validate">{{ errors[0] }}</span>
                                                                    </ValidationProvider>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <ValidationProvider rules="required|phone|minmax:1,200" v-slot="{ errors }">
                                                                    <label for="account-name">{{ $t('admin.phoneNumber') }}</label>
                                                                    <input type="text" class="form-control" id="account-name" placeholder="Số điện thoại" v-model="user.phone">
                                                                    <span class="text-validate">{{ errors[0] }}</span>
                                                                    </ValidationProvider>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <ValidationProvider rules="required|email" v-slot="{ errors }">
                                                                    <label for="account-e-mail">E-mail</label>
                                                                    <input type="email" class="form-control" id="account-e-mail" placeholder="Email" v-model="user.email">
                                                                    <span class="text-validate">{{ errors[0] }}</span>
                                                                    </ValidationProvider>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                            <button type="button" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0" :disabled="invalid" @click="onSubmit">Lưu</button>
                                                        </div>
                                                    </div>
                                                </form>
                                                </ValidationObserver>
                                            </div>
                                            <div class="tab-pane fade " id="account-vertical-password" role="tabpanel" aria-labelledby="account-pill-password" aria-expanded="false">
                                                <ValidationObserver v-slot="{ invalid }">
                                                <form>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <ValidationProvider rules="required|password|minmax:1,200" v-slot="{ errors }">
                                                                    <label for="account-old-password">{{ $t('admin.oldPassword') }}</label>
                                                                    <input type="password" class="form-control" id="account-old-password" v-model="dataPassword.old_password">
                                                                    <span class="text-validate">{{ errors[0] }}</span>
                                                                    </ValidationProvider>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                <ValidationProvider name="confirm" rules="required|password|minmax:1,200" v-slot="{ errors }">
                                                                    <label for="account-new-password">{{ $t('admin.newPassword') }}</label>
                                                                    <input type="password" id="account-new-password" class="form-control" v-model="dataPassword.new_password">
                                                                <span class="text-validate">{{ errors[0] }}</span>
                                                                </ValidationProvider>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <ValidationProvider rules="required|password|minmax:1,200|confirmPassword:@confirm" v-slot="{ errors }">
                                                                    <label for="account-retype-new-password">{{ $t('admin.rePassword') }}</label>
                                                                    <input type="password" class="form-control" id="account-retype-new-password" v-model="dataPassword.confirmation">
                                                                    <span class="text-validate">{{ errors[0] }}</span>
                                                                    </ValidationProvider>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                            <button @click="changePassword" type="button" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0" :disabled="invalid">Lưu</button>
                                                        </div>
                                                    </div>
                                                </form>
                                                </ValidationObserver>
                                            </div>
                                            <div class="tab-pane fade " id="account-vertical-social" role="tabpanel" aria-labelledby="account-pill-social" aria-expanded="false">
                                                <AddressOld :model="model" :order="order" :addressValue="addressValue"></AddressOld>
                                            </div>
                                            <div :class="this.$route.query.tab=='bankinfo'?'tab-pane fade active show':'tab-pane fade'" id="account-vertical-bank" role="tabpanel" aria-labelledby="account-pill-bank" aria-expanded="false">
                                                <form>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="bank-name">Tên chủ thẻ</label>
                                                                    <input type="text" class="form-control" id="bank-name" v-model="user.bankAccountUsername">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="bank-brand">Tên ngân hàng</label>
                                                                    <input type="text" class="form-control" id="bank-brand" v-model="user.bankAccountName">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="bank-number">Số tài khoản</label>
                                                                    <input type="text" class="form-control" id="bank-number" v-model="user.bankAccountNumber">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                            <button type="button" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0" @click="onSubmit">Lưu</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
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
import Adreess from './components/Address';
import AddressOld from './components/AddressOld';
export default {
components: { Adreess,AddressOld },
  data() {
    return {
      isImageModalActive: false,
      model: [],
      user: [],
            modelValue: [],
            addressValue: {},
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
        objectImage: {
            api: "",
            data: ""
        },
        objectProfile: {
            api: "",
            data: ""
        },
        objectChange:{
            api:"",
            data:"",
        },
        dataPassword:{
        "old_password":"",
        "new_password":"",
        "confirmation":"",
      },

    };
  },
    methods: {
    async fetchData() {
      var vm = this;
      vm.$nextTick(async () => {
        let image = document.querySelector("#image");
        let data = await vm.$store.dispatch("fetchData",api.auth.info);
        if(data.status==200){
          vm.model=data.data.result;
           image.src=data.data.result.avatar||"/themes/assets/images/logo_admin/user.png";
           vm.order.shipTo.address.push(vm.model.addresses[0]);
           // Thay avatar null
        //    if(vm.model.avatar==null){
        //     let image = document.getElementById("image");
        //     image.src = "/themes/assets/images/logo/logo.png";
        //     }
        }
      });
    },
    async fetchDataOld(){
        var vm=this;
        vm.$nextTick(async()=>{
            let image = document.querySelector("#image");
            let user= await vm.$store.dispatch("fetchData",api.auth.info);
            vm.user = user.data.result;
            let data= await vm.$store.dispatch("getByID",api.location.getByIdCustommer+'/'+user.data.result._id);
            vm.order.shipTo=data.data.result.table.rows[0];
            vm.model=data.data.result.table.rows;
            vm.addressValue=vm.order.shipTo;
            image.src=user.data.result.avatar||"/themes/assets/images/logo_admin/user.png";
        });
    },
    async onSubmit() {
          var vm=this;
          vm.$nextTick(async()=>{
          var data = vm.$refs.avatar.files[0];
          if(data){
            var formData = new FormData();
            formData.append("file", data);
            vm.objectImage.api=api.auth.uploadImage;
            vm.objectImage.data=formData;
            let res = await vm.$store.dispatch("postData",vm.objectImage);
            vm.model.avatar = res.data.name;
          }
          try {
            vm.objectProfile.api=api.auth.update;
            vm.objectProfile.data=vm.user;
            let response = await vm.$store.dispatch("postData",vm.objectProfile);
            if (response &&response.status==200) {
                Vue.$toast.open({
                message: 'Cập nhật dữ liệu thành công',
                type: 'success',
                position: 'top-right'
                });
            vm.fetchData();
            }
          } catch (error) {
                Vue.$toast.open({
                message: 'Đã xảy ra lỗi',
                type: 'error',
                position: 'top-right'
                });
          }
      });
    },
    async changePassword(event){
    event.stopPropagation();
    event.preventDefault();
      var vm =this;
        try {
        vm.objectChange.api=api.auth.changePassProfile;
        vm.objectChange.data=vm.dataPassword;
          let response = await vm.$store.dispatch("postData",vm.objectChange);
        if(response.status == 200){
            Vue.$toast.open({
            message: 'Cập nhật dữ liệu thành công',
            type: 'success',
            position: 'top-right'
            });
        }else{
            Vue.$toast.open({
            message: 'Cập nhật dữ liệu thất bại',
            type: 'error',
            position: 'top-right'
            });
        }
        } catch (error) {
            Vue.$toast.open({
            message: 'Cập nhật dữ liệu thất bại',
            type: 'error',
            position: 'top-right'
            });
        }
    },
    selectImage: function() {
      let image = document.querySelector("#image");
      var data = this.$refs.avatar.files[0]||"/themes/assets/images/logo_admin/user.png";
      image.src = URL.createObjectURL(data);
    }
    },
    
    mounted() {
    var vm = this;
    vm.$nextTick(async () => {
    //   vm.fetchData();
    vm.fetchDataOld();
    });
  },
}
</script>

<style>

</style>