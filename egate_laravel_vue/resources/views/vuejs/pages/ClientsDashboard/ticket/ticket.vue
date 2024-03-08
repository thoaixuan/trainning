<template>
  <div>
      <!-- Dashboard Analytics Start -->
        <section class="dashboard-ticket" id="dashboard-analytics">
            <!-- <div class="row">
                        <div class="col-lg-3 col-md-3 col-12">
                            <div class="card" v-on:click="handleChange(1)">
                                <div class="card-header d-flex flex-row align-items-start ">
                                    <div>
                                          <div class="avatar bg-rgba-primary p-50 m-0">
                                            <div class="avatar-content">
                                                <i class="feather icon-users text-primary font-medium-5"></i>
                                            </div>
                                        </div>
                                        <h4 class="mb-0">Ticket mới</h4>
                                    </div>
                                    <div class="avatar bg-rgba-primary m-0">
                                        <div class="avatar-content text-dark">{{modelData.filter((p) => p.parent == null && p.status.code == 1).length}}</div>
                                     </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-12">
                            <div class="card" v-on:click="handleChange(2)">
                                <div class="card-header d-flex flex-row align-items-start">
                                    <div>
                                          <div class="avatar bg-rgba-warning p-50 m-0">
                                                <div class="avatar-content">
                                                    <i class="feather icon-at-sign text-warning font-medium-5"></i>
                                                </div>
                                            </div>
                                            <h4 class="mb-0">Chưa trả lời</h4>
                                    </div>
                                    <div class="avatar bg-rgba-primary m-0">
                                            <div class="avatar-content text-dark">{{modelData.filter((p) => p.parent == null && p.status.code == 2).length}}</div>
                                        </div>
                                        
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-12">
                            <div class="card" v-on:click="handleChange(3)">
                                <div class="card-header d-flex flex-row align-items-start">
                                    <div>
                                        <div class="avatar bg-rgba-warning p-50 m-0">
                                            <div class="avatar-content">
                                                <i class="feather icon-credit-card text-success font-medium-5"></i>
                                            </div>
                                        </div>
                                        <h4 class="mb-0">Đã trả lời</h4>
                                    </div>
                                   <div class="avatar bg-rgba-primary m-0">
                                        <div class="avatar-content text-dark">{{modelData.filter((p) => p.parent == null && p.status.code == 3).length}}</div>
                                     </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-12">
                            <div class="card" v-on:click="handleChange(4)">
                                <div class="card-header d-flex flex-row align-items-start">
                                    <div>
                                        <div class="avatar bg-rgba-warning p-50 m-0">
                                                <div class="avatar-content">
                                                    <i class="feather icon-package text-warning font-medium-5"></i>
                                                </div>
                                            </div>
                                            <h4 class="mb-0">Đóng</h4>
                                        </div>
                                        <div class="avatar bg-rgba-primary m-0">
                                            <div class="avatar-content text-dark">{{modelData.filter((p) => p.parent == null && p.status.code == 4).length}}</div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div> -->
        </section>
        <section>
            <div>
              <Table :model="model" :title="title[0]"></Table>
            </div>
            <!-- <div v-if="checkTicket===2">
            <Table :model="model" :title="title[1]"></Table>
            
            </div>
            <div v-if="checkTicket===3">
            <Table :model="model" :title="title[2]"> </Table>
            
            </div>
            <div v-if="checkTicket===4">
            <Table :model="model" :title="title[3]"></Table>
            </div> -->
        </section>
  </div>
</template>

<script>
import load_api from '../../../../../../api.json';
import Table from './components/table.vue';


export default {
components: {
    Table,
    },
     data:function(){
      return{
        title:["Ticket mới","Chưa trả lời","Đã trả lời","Đóng"],
      }
    },
    methods:{
     handleChange(item){
        var vm =this;
        vm.checkTicket=item;
        
     },
     async fetchData() {
        var vm = this;
        vm.$nextTick(async () => {
            let data= await vm.$store.dispatch("fetchTicket",load_api.ticket.get);
        });
    },
    },
    mounted(){
        var vm =this;
        vm.$nextTick(async()=>{
            vm.fetchData();
        });
    },
    computed: {
        modelData(){
            return this.$store.state.ticket;
        },
        model(){
            return this.$store.state.ticket.filter((p) => p.parent == null);
        },
    },
}
</script>

<style>

</style>