<template>
  <div v-loading="loading">
    <div id="contact" class="py-5 contact section">
    <div class="container-fluid">
        <div class="row g-3">
            <div class="col-12 col-lg-12 col-xl-9 order-2 order-xl-1">
                <div class="contact-inner">
                    <div class="row g-4 row-cols-1 row-cols-lg-1 row-cols-xl-3 mb-3">
                        <div class="col d-flex">
                            <div class="avatar lg rounded bg-primary text-light no-thumbnail">
                                <i class="fa fa-map-marker fa-lg"></i>
                            </div>
                            <ul class="list-unstyled ms-3">
                                <li class="small text-muted">Location</li>
                                <li><a href="https://goo.gl/maps/iddsbAcCKWZQ8mjZ8" target="_blank">{{model.app_address}}</a></li>
                            </ul>
                        </div>
                        <div class="col d-flex">
                            <div class="avatar lg rounded bg-primary text-light no-thumbnail">
                                <i class="fa fa-phone fa-lg"></i>
                            </div>
                            <ul class="list-unstyled ms-3">
                                <li class="small text-muted">Call Us</li>
                                <li><a :href="`tel:${model.app_phone}`">{{model.app_phone}}</a></li>
                            </ul>
                        </div>
                        <div class="col d-flex">
                            <div class="avatar lg rounded bg-primary text-light no-thumbnail">
                                <i class="fa fa-envelope fa-lg"></i>
                            </div>
                            <ul class="list-unstyled ms-3">
                                <li class="small text-muted">Mail Us</li>
                                <li><a href="mailto:info@ing.vn" target="_top" rel="noopener"><span>info@ing.vn</span></a></li>
                            </ul>
                        </div>
                    </div>
                    <ValidationObserver v-slot="{ invalid }">
                    <form class="row g-3">
                        <div class="col-md-4 col-sm-6">
                            <ValidationProvider rules="required|text" v-slot="{ errors }">
                            <div class="form-floating">
                                <input type="text" class="form-control rounded-0" placeholder="Tiêu đề" v-model="data.title">
                                <label>Tiêu đề</label>
                                <span class="text-validate">{{ errors[0] }}</span>
                            </div>
                            </ValidationProvider>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <ValidationProvider rules="email|minmax:1,200" v-slot="{ errors }">
                            <div class="form-floating">
                                <input type="text" class="form-control rounded-0" placeholder="Email" v-model="data.email">
                                <label>Email</label>
                            <span class="text-validate">{{ errors[0] }}</span>
                            </div>
                            </ValidationProvider>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <ValidationProvider rules="required|phone" v-slot="{ errors }">
                            <div class="form-floating">
                                <input type="number" class="form-control rounded-0" placeholder="Số điện thoại" v-model="data.phone">
                                <label>Số điện thoại</label>
                            <span class="text-validate">{{ errors[0] }}</span>
                            </div>
                            </ValidationProvider>
                        </div>
                        <div class="col-12">
                            <ValidationProvider rules="required|text" v-slot="{ errors }">
                            <div class="form-floating">
                                <textarea class="form-control rounded-0" placeholder="Nhập mội dung" style="height: 160px" spellcheck="false" v-model="data.content"></textarea>
                                <label>Nội dung</label>
                            <span class="text-validate">{{ errors[0] }}</span>
                            </div>
                            </ValidationProvider>
                        </div>
                        <div class="col-12 mt-3">
                            <button @click="sendMail" type="submit" class="btn btn-lg btn-light-primary text-uppercase rounded-0 fs-6" :disabled="invalid">Liên hệ</button>
                        </div>
                    </form>
                    </ValidationObserver>
                </div>
            </div>
            <div class="col-12 col-lg-12 col-xl-3 d-flex flex-column justify-content-between order-1 order-xl-2">
                <div class="contact-heading">
                    <h3 class="fw-bold">Interested?<br>
                    Let's Get In Touch</h3>
                </div>
            </div>
        </div>

    </div>
    </div>
  </div>
</template>

<script>
import load_api from '../../../../../../api.json';

export default {
    data:function(){
      return{   
        data:{
            email:"",
            title:"",
            body:"",
            phone:"",
            content:"",
        },
        model:[],
        loading:true,

      }
    },
    methods:{
      async fetchData(){
        var vm =  this;
        vm.loading=true;
         let res = await vm.$store.dispatch("fetchData",load_api.setting.settingByKey+"?fields=app_address,app_phone");
        //   vm.model=res.data.result;
        if(res){
            vm.loading=false;
        }
          vm.model=res.data;
        },
        async sendMail(e){
            e.preventDefault();
            console.log(this.data);
        var vm =this;
        try{
        this.data.body=this.data.content+' - '+'Số điện thoại:'+this.data.phone;
        let res=  await vm.$store.dispatch("postSendData",load_api.ticket.anonymous,this.data);
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
        }else {
            Vue.$toast.open({
            message: 'Gửi liên hệ lỗi',
            type: 'error',
            position: 'top-right'
        });
        }
        }catch(e){
           Vue.$toast.open({
            message: 'Gửi liên hệ lỗi',
            type: 'error',
            position: 'top-right'
        });
        }
    }      
    },
    mounted(){
      var vm=this;
      vm.fetchData();
    },
}
</script>

<style>

</style>