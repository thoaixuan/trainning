<template>
  <div>
    <WidgetFormInput class="">
        <template #title>
            Địa chỉ
        </template>
        <template>
            <el-input v-model="model.address" size="medium" placeholder="Nhập địa chỉ"/>
        </template>
    </WidgetFormInput>
    <WidgetFormInput class="">
        <template #title>
            Tỉnh/Thành Phố
        </template>
        <template>
            <el-select v-model="model.province" class="w-100" filterable placeholder="Chọn">
                <el-option
                v-for="item in provinces"
                :key="item._id"
                :label="item.province_name"
                :value="item._id">
                </el-option>
            </el-select>
        </template>
    </WidgetFormInput>
    <WidgetFormInput class="">
        <template #title>
            Quận
        </template>
        <template>
            <el-select v-model="model.district" class="w-100" filterable placeholder="Chọn">
                <el-option
                v-for="item in districts"
                :key="item._id"
                :label="item.district_name"
                :value="item._id">
                </el-option>
            </el-select>
        </template>
    </WidgetFormInput>
    <WidgetFormInput class="">
        <template #title>
            Phường
        </template>
        <template>
            <el-select v-model="model.ward" class="w-100" filterable placeholder="Chọn">
                <el-option
                v-for="item in wards"
                :key="item._id"
                :label="item.ward_name"
                :value="item._id">
                </el-option>
            </el-select>
        </template>
    </WidgetFormInput>
    <div class="w-100 d-flex py-3 ">
        <span class="btn btn-success" @click="ok()">Lưu</span>
        <span class="btn btn-danger mx-4" @click="close()">Hủy</span>
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
import load_api from '../../../../../../api.json';
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
            model: {
                address: '',
                province: null,
                district: null,
                ward: null,
            },
            returnModel: {
                address: '',
                province:{},
                district:{},
                ward:{}
            },
            districts: [],
            wards: []
        }
    },
    watch: {
        model_fix: {
            handler : async function (_oldVar,_val) {
                var val =_val;
                var oldVar = _oldVar;
                if(val.province != oldVar.province){
                    this.districts = [];
                    this.wards = [];
                    this.model.district = null;
                    this.model.ward = null;
                }
                if(this.model.province > 0) {
                    await this.$store.dispatch('fetchDistricts', load_api.address.districts+"?province_id="+this.model.province)
                    this.districts = this.$store.state.districts;
                    this.returnModel.province = this.provinces.filter(p=>p._id ==  this.model.province)[0]
                    console.log(this.districts);
                }
                if(this.model.district > 0) {
                    await this.$store.dispatch('fetchWards', load_api.address.wards+"?district_id="+this.model.district)
                    this.wards = this.$store.state.wards;
                    this.returnModel.district = this.districts.filter(p=>p._id ==  this.model.district)[0]
                    console.log(this.wards);
                }
                if(this.model.ward > 0){
                    this.returnModel.ward = this.wards.filter(p=>p._id ==  this.model.ward)[0]
                }
                this.returnModel.address = this.model.address;
            },
            deep: true
        },
        selectedAddress(val){
            if(val)
            {
                var item =this.$attrs.value[val];
                this.model.address = item.address;
                this.model.province = item.province == null ? null : item.province._id;
                this.model.district = item.district == null ? null : item.district._id;
                this.model.ward = item.ward == null ? null: item.ward._id;
            }
        }
        
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
            var array = this.$attrs.value;
            if(array.length<3){
                console.log(this.$attrs.value);
                if(this.selectedAddress != null) {
                    console.log("remove item");
                    array.splice(this.selectedAddress,1)
                    console.log(array)
                }
                array.push(this.returnModel);
                await this.$emit('input', array)
                this.$parent.$parent.dialogAddressFormVisible = false;
                this.$parent.$parent.selectedAddress = null;
            }else{
               Vue.$toast.open({
                    message: 'Chỉ được tạo tối đa 3 địa chỉ',
                    type: 'error',
                    position: 'top-right'
                });  
            }
           
            
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
            // vm.$store.dispatch("provinces/fetchData");
            vm.$store.dispatch("fetchProvinces",load_api.address.provinces);

        })
    }
}
</script>

<style>
.el-select-dropdown__empty{
    display: none;
}
</style>