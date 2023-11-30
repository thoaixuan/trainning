<template>
  <div class="grid grid-cols-1 w-full">
            <section name="info">
                <div class="grid grid-cols-1">
                    <section name="address" class="grid grid-cols-1 w-full" >
                        <div class="h-100 w-full flex items-right bg-teal-lightest font-sans">
                            <div class="w-full">
                                <div>
                                    <div v-for="(data, index) in model.addresses" :key="index" @click="editAddress(data)">
                                        <div class="card-body doctor-detail order-1 order-md-0 cusor-point">
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
                            </div>
                        </div>
                    </section>
                </div>
            </section>




    
  </div>
</template>

<script>
export default {
  layout:"blank",
     props: {
        model: {
        },
        order:{
        },
    },
    data() {
        return {

            dataModel:{},
            checkBox:false,
            checked: false,
            dialogAddressFormVisible: false,
            selectedAddress: null,
        }
    },
  
    computed: {
    },
    methods: {
        editAddress(item){
            var vm =this;
            vm.order.shipTo.address=[];
            vm.checkBox=true;
            vm.order.shipTo.address.push(item);
            // vm.$buefy.toast.open({
            //     duration: 5000,
            //     message: "Thay đổi địa chỉ thành công",
            //     type: 'is-success'
            // });
        },
    },
    mounted() {
        var vm = this;
        vm.$nextTick(()=> {
            vm.dataModel=this.model.addresses;
        })
    }
}
</script>

<style>
.resume-box__padding{
    padding: 0px;
}
</style>