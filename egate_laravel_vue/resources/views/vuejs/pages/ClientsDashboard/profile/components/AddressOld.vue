<template>
  <div >
    <section name="info">
        <div >
            <WidgetFormInput class="col-span-3">
                <template #title>
                    <div class="flex flex-wrap w-full items-center">
                        <span class="flex mr-4">
                            {{ $t('admin.address') }}
                        </span>
                        <span>
                            <el-button size="mini" @click="dialogAddressFormVisible = true" type="primary" icon="el-icon-plus" circle></el-button>
                        </span>
                    </div>
                </template>
                <template>
                    <section name="address" >
                        <div class="font-sans">
                            <!-- <div class="w-full">
                                <div v-if="model.addresses">
                                <div v-for="(data, index) in model.addresses" :key="index">
                                <div>
                                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                                    <span>{{data.address}}, {{data.ward.ward_name}}, {{data.district.district_name}}, {{data.province.province_name}}</span>
                                    <span class="ml-2 mr-1 text-primary cursor-pointer" @click="editAddress(index)" slot="actions"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i></span>
                                    <span class="text-primary cursor-pointer" @click="removeAddress(index)" slot="actions"> <i class="fa fa-trash-o" aria-hidden="true"></i></span>
                                </div>
                                    </div>
                                </div>
                            </div> -->
                              <div class="w-full">
                                <div v-if="model">
                                <div v-for="(data, index) in model" :key="index">
                                <div>
                                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                                    <span>{{data.address}}, {{data.district_name}}, {{data.province_name}}</span>
                                    <span class="ml-2 mr-1 text-primary cursor-pointer" @click="editAddress(index)" slot="actions"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i></span>
                                    <span class="text-primary cursor-pointer" @click="removeAddress(index)" slot="actions"> <i class="fa fa-trash-o" aria-hidden="true"></i></span>
                                </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </template>
            </WidgetFormInput>
        <el-dialog ref="addDialog" :close-on-click-modal="false" @close="addressModelClose()" :destroy-on-close="true" width="700px" title="Thêm địa điểm mới" :visible.sync="dialogAddressFormVisible">
            <span>
                <AddressModelOld v-model="model" :selectedAddress="selectedAddress"></AddressModelOld>
            </span>
        </el-dialog>
        <!-- <button class="btn btn-primary mt-4" v-on:click="save()">Lưu</button> -->
        </div>
    </section>
  </div>
</template>

<script>
import load_api from '../../../../../../../api.json';
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
        },
        openAdrress:{
            type:Boolean
        },
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
            },
            location:{
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
        editAddress(item){
            this.selectedAddress = item;
            this.dialogAddressFormVisible = true;
            this.openAdrress=false;
        },
        async removeAddress(index){
            var vm =this;
            vm.location.api=load_api.location.deletes;
            vm.location.data={_id:vm.model[index]._id};
             let res = await vm.$store.dispatch("postData",vm.location);
             console.log(vm.model[index]._id);

                if(res.status==200){
                        Vue.$toast.open({
                        message: 'Đã xóa địa chỉ',
                        type: 'success',
                        position: 'top-right'
                    });
                }   
            vm.model.splice(index,1)

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
                console.log(error);
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
                    let res = await this.$store.dispatch('postData',vm.update);
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