<template>
  <div >
    <section name="info">
        <div >
            <WidgetFormInput class="col-span-3">
                <template #title>
                    <div class="flex flex-wrap w-full items-center">
                        <span class="flex mr-4">
                            Địa chỉ
                        </span>
                        <span>
                            <el-button size="mini" @click="dialogAddressFormVisible = true" type="primary" icon="el-icon-plus" circle></el-button>
                        </span>
                    </div>
                </template>
                <template>
                    <section name="address" >
                        <div class="font-sans">
                            <div class="w-full">
                                <!-- <div v-if="model.addresses">
                                <div v-for="(data, index) in model.addresses" :key="index" @click="handelChange(data)">
                                <div class="d-flex">
                                    <div class="doctor-detail order-1 order-md-0 cusor-point">
                                        <ul class="resume-box ps-0 pb-0 mb-0 resume-box__padding">
                                            <li>
                                                <div class="icon text-center">
                                                    <i class="fa fa-map-marker"></i>
                                                </div>
                                                <span>{{data.address}},{{data.ward.ward_name}},{{data.district.district_name}},{{data.province.province_name}}</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                    </div>
                                </div> -->
                                   <div v-if="model">
                                    <div v-for="(data, index) in model" :key="index" @click="handelChange(data)">
                                    <div class="d-flex">
                                        <div class="doctor-detail order-1 order-md-0 cusor-point">
                                            <ul class="resume-box ps-0 pb-0 mb-0 resume-box__padding">
                                                <li>
                                                    <div class="icon text-center">
                                                        <i class="fa fa-map-marker"></i>
                                                    </div>
                                                    <span>{{data.address}},{{data.district_name}},{{data.province_name}}</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                            
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </section>
                </template>
            </WidgetFormInput>
        <el-dialog ref="addDialog" :close-on-click-modal="false" @close="addressModelClose()" :destroy-on-close="true" width="800px" title="Thêm địa điểm mới" :visible.sync="dialogAddressFormVisible">
            <span>
                <!-- <AddressModel v-model="model.addresses" :selectedAddress="selectedAddress" ></AddressModel> -->
                <AddressModelOld v-model="model" :selectedAddress="selectedAddress" ></AddressModelOld>
            </span>
        </el-dialog>
        <!-- <button class="btn btn-primary mt-4" v-on:click="save()">Lưu</button> -->
        </div>
    </section>
  </div>
</template>

<script>
import load_api from '../../../../../../api.json';
import WidgetFormInput from './WidgetFormInput'
import AddressModel from './AddressModel.vue';
import AddressModelOld from './AddressModelOld.vue';

export default {
     components: {
            WidgetFormInput,
            AddressModel,
            AddressModelOld
        },
  layout:"blank",
     props: {
           model: {
        },
    order:{
        type:Object,
        default:{},
    },
    openAdrress:{
        type:Boolean
    },
    addressValue:{
    }
    },
    data() {
        return {
            checked: false,
            dialogAddressFormVisible: false,
            selectedAddress: null,
             update:{
                api:"",
                data:"",
            },
            create:{
                api:"",
                data:"",
            }
        }
    },
  
    computed: {
        provinces(){
            return this.$store.state.provinces;
        }
    },
    methods: {
        handelChange(item){
            var vm =this;
            // vm.order.shipTo.address=[];
            vm.checkBox=true;
            // vm.order.shipTo.address.push(item);
            vm.order.shipTo=item;
            Vue.$toast.open({
                message: 'Thay đổi địa chỉ thành công',
                type: 'success',
                position: 'top-right'
            });
        },
        editAddress(item){
            this.selectedAddress = item;
            this.dialogAddressFormVisible = true;
            this.openAdrress=false;
        },
        removeAddress(index){
            this.model.addresses.splice(index,1)
        },
        addressModelClose(){
            this.selectedAddress = null;
        },
        async fetchInfo(){
            var vm=this;
            try {
                let data= await vm.$store.dispatch("fetchData",api.auth.info);
                vm.model=data.data.result;
            } catch (error) {
                
            }
            
        },
        async save(){
           var vm =this;
            try {
                if(this.model._id )
                {
                   console.log("update");
                    vm.update.api=load_api.auth.update;
                    vm.update.data=this.model;
                    console.log(vm.update);
                    let res = await this.$store.dispatch('postData', vm.update);
                    console.log(res);
                    if(res.status == 200){
                        Vue.$toast.open({
                            message: 'Đã update thành công',
                            type: 'success',
                            position: 'top-right'
                        });
                    }
                }
            }
            catch (e) {
                console.log(e);
                vm.$message({
                    type: 'error',
                    message: `${e.response.data.message}`
                });
            }
        },
      
    },
    mounted() {
        var vm = this;
        vm.$nextTick(()=> {
            vm.fetchInfo();
            vm.$store.dispatch("fetchProvinces",load_api.address.provinces);
        })
    }
}
</script>

<style>

</style>