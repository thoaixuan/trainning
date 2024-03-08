<template>
  <div class="row">
    <WidgetFormInput class="col-md-4">
        <template #title>
            Địa chỉ
        </template>
        <template>
            <el-input v-model="model.address" size="large" placeholder="Nhập địa chỉ"/>
        </template>
    </WidgetFormInput>
    <WidgetFormInput class="col-md-4">
        <template #title>
            Tỉnh/Thành Phố
        </template>
        <template>
            <el-select v-model="model.province" class="w-100" filterable placeholder="Chọn">
                <el-option
                v-for="item in provinces"
                :key="item.code"
                :label="item.name"
                :value="item.code">
                </el-option>
            </el-select>
        </template>
    </WidgetFormInput>
    <WidgetFormInput class="col-md-4">
        <template #title>
            Quận
        </template>
        <template>
            <el-select v-model="model.district" class="w-100" filterable placeholder="Chọn">
                <el-option
                v-for="item in districts"
                :key="item.code"
                :label="item.name"
                :value="item.code">
                </el-option>
            </el-select>
        </template>
    </WidgetFormInput>

    <div class="w-100 d-flex py-2 ml-1">
        <span class="btn btn-success" @click="ok()">{{ $t('admin.save') }}</span>
        <span class="btn btn-danger ml-2" @click="close()">{{ $t('admin.cancel') }}</span>
        <!-- <el-button @click="ok()" size="small" type="primary" class="px-2">
            Lưu
        </el-button>
        <el-button @click="close()" size="small" type="danger">
            Huỷ
        </el-button> -->
    </div>
  </div>
</template>

<script>
import load_api from '../../../../../../../api.json';
import WidgetFormInput from './WidgetFormInput'

export default {
     components: {
      WidgetFormInput,
    },
    props: {
        selectedAddress: {
            type: Number,
        },
       
    },
    data(){
        return {
            oldVar: null,
            model:{
                address: '',
                province: null,
                district: null,
                user_id: null,
            },

            returnModel: {
                address: '',
                province:0,
                district:0,
            },
            districts: [],
            wards: [],
            location:{
                api:"",
                data:{
                    user_id:"",
                    data:[],
                },
            },
        }
    },
    watch: {
        model_fix: {
            handler : async function (_oldVar,_val) {
                var val =_val;
                var oldVar = _oldVar;
                if(val.province != oldVar.province){
                    this.districts = [];
                }
                if(this.model.province > 0) {
                    await this.$store.dispatch('fetchDistricts', load_api.location.getLocation+'/'+this.model.province);
                    this.districts = this.$store.state.districts;
                    this.returnModel.province = this.provinces.filter(p=>p._id ==  this.model.province)[0]
                }
                this.returnModel.address = this.model.address;
            },
            deep: true
        },
    },
    computed: {
        provinces(){
            return this.$store.state.provinces;
        },
        model_fix(){
            return this.model;
        }
    },
    methods: {
        async ok(){
            var vm= this;
            let user= await vm.$store.dispatch("fetchData",load_api.auth.info);
            
            // if(array.length<3){
                vm.location.api= load_api.location.updateWithCustomer;
                vm.location.data.user_id=user.data.result._id;
                vm.model.user_id=user.data.result._id;
                vm.location.data.data.push(vm.model);
               
                let res = await vm.$store.dispatch("postData",vm.location);
                if(res.status==200){
                        Vue.$toast.open({
                        message: 'Thêm địa chỉ mới',
                        type: 'success',
                        position: 'top-right'
                    });
                }   
                vm.$parent.$parent.dialogAddressFormVisible = false; 
                window.location.reload();
            // }else{
            //    Vue.$toast.open({
            //         message: 'Chỉ được tạo tối đa 3 địa chỉ',
            //         type: 'error',
            //         position: 'top-right'
            //     });  
            // }
           
            
        },
        close(){
            var vm=this;
            vm.$nextTick(async ()=>{
                console.log(vm.$parent.$parent.dialogAddressFormVisible);
                vm.$parent.$parent.dialogAddressFormVisible = false; 
            });
           
        }
    },
    mounted() {
        var vm = this;
        vm.$nextTick(()=> {
            vm.$store.dispatch("fetchProvinces",load_api.location.getLocation+'/'+'0');
            var item =vm.$attrs.value[vm.selectedAddress];
            if(item){
                vm.model.address = item.address;
                vm.model._id = item._id ;
            }
   
        })
    }
}
</script>

<style>
.el-select-dropdown__empty{
    display: none;
}
</style>