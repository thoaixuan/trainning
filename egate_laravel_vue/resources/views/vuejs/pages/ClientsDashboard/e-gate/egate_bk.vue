<template>
  <div>
      <section class="dashboard-order">       
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
                                                    <h4>{{item.code}}</h4>
                                                    <h5>
                                                          {{item.name}}
                                                    </h5>
                                                     <p class="mb-0">
                                                          {{item.description}}
                                                    </p>
                                                    <span>
                                                        <div v-if="item.isOnline" class="flex flex-wrap w-full text-2xl text-green-500">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-wifi-off"><line x1="1" y1="1" x2="23" y2="23"></line><path d="M16.72 11.06A10.94 10.94 0 0 1 19 12.55"></path><path d="M5 12.55a10.94 10.94 0 0 1 5.17-2.39"></path><path d="M10.71 5.05A16 16 0 0 1 22.58 9"></path><path d="M1.42 9a15.91 15.91 0 0 1 4.7-2.88"></path><path d="M8.53 16.11a6 6 0 0 1 6.95 0"></path><line x1="12" y1="20" x2="12.01" y2="20"></line></svg>
                                                        </div>
                                                        <div v-else class="flex flex-wrap w-full text-2xl text-red-500">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-wifi-off"><line x1="1" y1="1" x2="23" y2="23"></line><path d="M16.72 11.06A10.94 10.94 0 0 1 19 12.55"></path><path d="M5 12.55a10.94 10.94 0 0 1 5.17-2.39"></path><path d="M10.71 5.05A16 16 0 0 1 22.58 9"></path><path d="M1.42 9a15.91 15.91 0 0 1 4.7-2.88"></path><path d="M8.53 16.11a6 6 0 0 1 6.95 0"></path><line x1="12" y1="20" x2="12.01" y2="20"></line></svg>
                                                        </div>
                                                    </span>
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
        </div>
      </section>


  </div>
</template>


<script>
import load_api from '../../../../../../api.json';
export default {
    sockets: {
        connect(e){
            
        },
        disconnect(){
           
        },
        status(e) {
            var id = e.status.split('|')[0];
            var model = this.model.filter(p=>p.code == id);
            if(model.length == 0) return;
            model[0].isOnline = true;
        }
    },
    data(){
        return {
            model: [],
            token: '',
        }
    },
    mounted(){
        var vm = this;
        vm.$socket.connect();
        vm.$nextTick(async ()=> {
            let response = await vm.$store.dispatch("fetchData",load_api.egate.get);
            console.log(response);  
            // var response = await vm.$axios.get("/api/egproduct/getAll");
            var fixData = []
            response.data.forEach(p=> {
                p.isOnline = false;
                fixData.push(p);
            })
            vm.model = fixData;
            var token =localStorage.getItem('auth');
            // var token = vm.$auth.strategy.token.get().replace("Bearer ", "");
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