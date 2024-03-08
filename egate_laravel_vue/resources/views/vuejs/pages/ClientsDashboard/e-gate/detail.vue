<template lang="">
    <div>
        <section id="dashboard-analytics">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex flex-column align-items-start pb-0">
                            <div class="avatar bg-rgba-warning p-50 m-0">
                                <div class="avatar-content">
                                    <i class="feather icon-package text-warning font-medium-5"></i>
                                </div>
                            </div>
                            <h2 class="text-bold-700 mt-1 mb-25">{{model.product_name}}</h2>
                            <p class="mb-0">{{model.product_detail}}</p>
                             <span>
                                <div v-if="model.isOnline" class="flex flex-wrap w-full text-2xl text-green-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-wifi-off"><line x1="1" y1="1" x2="23" y2="23"></line><path d="M16.72 11.06A10.94 10.94 0 0 1 19 12.55"></path><path d="M5 12.55a10.94 10.94 0 0 1 5.17-2.39"></path><path d="M10.71 5.05A16 16 0 0 1 22.58 9"></path><path d="M1.42 9a15.91 15.91 0 0 1 4.7-2.88"></path><path d="M8.53 16.11a6 6 0 0 1 6.95 0"></path><line x1="12" y1="20" x2="12.01" y2="20"></line></svg>
                                </div>
                                <div v-else class="flex flex-wrap w-full text-2xl text-red-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-wifi-off"><line x1="1" y1="1" x2="23" y2="23"></line><path d="M16.72 11.06A10.94 10.94 0 0 1 19 12.55"></path><path d="M5 12.55a10.94 10.94 0 0 1 5.17-2.39"></path><path d="M10.71 5.05A16 16 0 0 1 22.58 9"></path><path d="M1.42 9a15.91 15.91 0 0 1 4.7-2.88"></path><path d="M8.53 16.11a6 6 0 0 1 6.95 0"></path><line x1="12" y1="20" x2="12.01" y2="20"></line></svg>
                                </div>
                            </span>
                        </div>
                           
                    </div>
                </div>
                <div v-if="model.isOnline" class="col-lg-4 col-md-6 col-12">
                        <div class="card">
                            <div class="card-header d-flex flex-column align-items-start pb-0">
                                <div class="avatar bg-rgba-primary p-50 m-0">
                                    <div class="avatar-content">
                                        <i class="feather icon-package text-warning font-medium-5"></i>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex  mt-1 mb-25">
                                        <h2 class="text-bold-700">Cửa trước</h2>
                                        <el-switch
                                        class="mx-2"
                                                v-model="v1"
                                            active-color="#13ce66"
                                            inactive-color="#ff4949">
                                        </el-switch>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <div v-if="model.isOnline" class="col-lg-4 col-md-6 col-12">
                        <div class="card">
                            <div class="card-header d-flex flex-column align-items-start pb-0">
                                <div class="avatar bg-rgba-primary p-50 m-0">
                                    <div class="avatar-content">
                                        <i class="feather icon-package text-warning font-medium-5"></i>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex  mt-1 mb-25">
                                        <h2 class="text-bold-700">Cửa sau</h2>
                                        <el-switch
                                            class="mx-2"
                                            v-model="v2"
                                            active-color="#13ce66"
                                            inactive-color="#ff4949">
                                        </el-switch>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div v-if="model.isOnline"  class="col-lg-4 col-md-6 col-12">
                        <div class="card">
                            <div class="card-header d-flex flex-column align-items-start pb-0">
                                <div class="avatar bg-rgba-primary p-50 m-0">
                                    <div class="avatar-content">
                                        <i class="feather icon-package text-warning font-medium-5"></i>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex  mt-1 mb-25">
                                        <h2 class="text-bold-700">Đèn</h2>
                                        <el-switch
                                             class="mx-2"
                                            v-model="v3"
                                            active-color="#13ce66"
                                            inactive-color="#ff4949">
                                        </el-switch>
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
import load_api from '../../../../../../api.json';
export default {
    data(){
        return {
            isActive: true,
            isUsing: false,
            model: {},
            v1: false,
            v2: false,
            v3: false,
            v4: 30, //temp
            id:this.$route.params.id,

        }
    },
     sockets: {
        connect(e){
            
        },
        disconnect(){
           
        },
        status(e) {
            var id = e.status.split('|')[0];
            var v1 = e.status.split('|')[1];
            var v2 = e.status.split('|')[2];
            var v3 = e.status.split('|')[3];
            var v4=  e.status.split('|')[4];
            //
            this.model.isOnline = true;
            this.v1 = v1.split(':')[1] == 1 ? true : false;
            this.v2 = v2.split(':')[1] == 1 ? true : false;
            this.v3 = v3.split(':')[1] == 1 ? true : false;
            this.v4 = v4.split(':')[1];
        }
    },
    watch: {
        v1(val,oldVar){
            // console.log(val,oldVar)
            this.control(101,val == true ? 1: 0)
        },
        v2(val,oldVar){
            // console.log(val,oldVar)
            this.control(102,val == true ? 1: 0)
        },
        v3(val,oldVar){
            // console.log(val,oldVar)
            this.control(104,val == true ? 1: 0)
        },
    },
    methods: {
        control(e,a) {
            if(!this.isUsing) {
                this.$socket.emit('controlDevice', `${this.model.product_code}|${e}:${a}`)
                this.isUsing = true;
                setTimeout(()=> { this.isUsing = false}, 2000);
            }
        },
        test(){
            console.log(v1)
        }
    },
    mounted() {
        var vm = this;
        vm.$nextTick(async ()=> {
             let response = await vm.$store.dispatch("getByID",load_api.egate.getById +'?_id='+vm.id);
            // var response = await vm.$axios.get(`/api/egproduct/getByID?id=${vm.$route.params.id}`);
            var fix = response.data;
            fix.isOnline = false;
            vm.model = fix;
            // var token = vm.$auth.strategy.token.get().replace("Bearer ", "");
            var token =localStorage.getItem('auth');
            vm.token = token;
            vm.$socket.disconnect();
            vm.$socket.io.opts.query = `token=${token}`; 
            vm.$socket.connect();
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
<style lang="">
    
</style>