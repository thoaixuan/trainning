<template lang="">
    <div class="modal-content">
    <ValidationObserver v-slot="{ invalid }">
        <form>
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Gửi ticket</h5>
                <button type="button" class="b-none btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
            </div>
            <div class="modal-body">
                <ValidationProvider rules="required|text" v-slot="{ errors }">
            <div class="form-group">
                <label>Tiêu đề</label>
                <input type="text" class="form-control" v-model="models.title"/>
                <span class="text-validate">{{ errors[0] }}</span>
            </div>
        </ValidationProvider>
        <ValidationProvider rules="required|text" v-slot="{ errors }">
            <div class="form-group">
            <label>Nội dung</label>
            <textarea 
                    v-model="models.content"
                    class="form-control"
                    type="text"
                    >
            </textarea>
            <span class="text-validate">{{ errors[0] }}</span>
            </div>
        </ValidationProvider>
        <div class="row">
            <div class="col-6">
                <ValidationProvider rules="required" v-slot="{ errors }">
                    <select class="form-select form-control" v-model="models.type">
                        <option value=1>Liên hệ CSKH</option>
                        <option value=0>Liên hệ kỹ thuật</option>
                        <option value=2>Liên hệ Kế toán</option>
                    </select>
                    <span class="text-validate">{{ errors[0] }}</span>
                </ValidationProvider>
            </div>
            <div class="col-6">
                <ValidationProvider rules="required" v-slot="{ errors }">
                    <select class="form-select form-control" v-model="models.priority">
                        <option value=0>Bình thường</option>
                        <option value=1>Quan tâm</option>
                        <option value=2>Khẩn cấp</option>
                    </select>
                    <span class="text-validate">{{ errors[0] }}</span>
                </ValidationProvider>
            </div>
            <code></code>
        </div> 
        </div>
        <div class="modal-footer">
            <button type="button" data-bs-dismiss="modal" class="btn btn-primary" @click="sendTicket" :disabled="invalid">Gửi</button>
        </div>
        </div>
        </form>
    </ValidationObserver>
    </div>
</template>
<script>
import load_api from '../../../../../../../api.json';
export default {
     data:function(){
      return{
        ticket:{},
            models:{
            title:"",
            content:"",
            type:0,
            priority:0,
      },
      room:{},
      priority:{},
      objectTicket:{
        api:"",
        data:"",
        },
      }
    },
    methods:{
        async sendTicket(){
        var vm =this;
            try{
                vm.objectTicket.api=load_api.ticket.insert;
                vm.models.type=parseInt(vm.models.type);
                vm.models.priority=parseInt(vm.models.priority);
                vm.objectTicket.data=vm.models;
                console.log(vm.models);
                let res = await vm.$store.dispatch("postData",vm.objectTicket);
                if(res.state===200){
                    Vue.$toast.open({
                        message: 'Thêm mới ticket thành công',
                        type: 'success',
                        position: 'top-right'
                    });
                }
            }catch(e){
                Vue.$toast.open({
                message: 'Thêm mới ticket thất bại',
                type: 'error',
                position: 'top-right'
                });
            }
            vm.$store.dispatch("fetchTicket",load_api.ticket.get);
        },
        async fetchPriority(){
            var vm =this;
           let res= vm.$store.dispatch("fetchData",load_api.ticket.priority);
           vm.priority=res;
           console.log(res);
        }
    },
    mounted() {
        var vm =this;
        vm.models.type=0,
        vm.models.priority=0;
        vm.$store.dispatch("fetchData",load_api.ticket.type);
    },
}
</script>
<style lang="">
    
</style>