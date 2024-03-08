<template>
  <div>
    <div class="row d-flex justify-content-center">
      <div class="col-md-12 col-lg-12 col-xl-12">

        <div class="card" id="chat2">
          <div class="card-body overflow-auto" data-mdb-perfect-scrollbar="true" style="position: relative; height: 400px"  >
              <div class="d-flex flex-row mb-1 justify-content-end">
                    <div>
                      <p class="small p-1 m-0 text-white rounded bg-primary">{{ticket.content}}</p>
                      <p class="small me-2 mb-0 rounded text-muted d-flex justify-content-end">{{moment(ticket.createdAt).format("DD-MM-YYYY H:mm")}}</p>
                    </div>
                    <img v-if="ticket.user.avatar == null || ticket.user.avatar == ''" class="rounded-circle" src="/themes/assets/images/logo_admin/user.png" alt="avatar 1" style="width: 45px; height: 100%;">
                    <img v-else class="rounded-circle" :src="ticket.user.avatar" alt="avatar 1" style="width: 45px; height: 100%;">

                  </div>  
               
            <div v-for="(item,index) in ticket.replies" :key="index">
            <div v-if="item.user.userType==1">
                <div class="d-flex flex-row">
                  <img class="rounded-circle" src="/themes/assets/images/logo_admin/1.jpg" alt="avatar 1" style="width: 45px; height: 100%;">
                  <div>
                    <p class="small p-1 m-0 rounded" style="background-color: #f5f6f7;">{{item.content}}</p>
                    <p class="small ms-3 mb-1 rounded text-muted">{{moment(item.createdAt).format("DD-MM-YYYY H:mm")}}</p>
                  </div>
                </div>
            </div>

            <div v-else>
                  <div class="d-flex flex-row mb-1 justify-content-end">
                    <div>
                      <p class="small p-1 m-0 text-white rounded bg-primary">{{item.content}}</p>
                      <p class="small me-2 mb-0 rounded text-muted d-flex justify-content-end">{{moment(item.createdAt).format("DD-MM-YYYY H:mm")}}</p>
                    </div>
                      <img v-if="ticket.user.avatar == null || ticket.user.avatar == ''" class="rounded-circle" src="/themes/assets/images/logo_admin/user.png" alt="avatar 2" style="width: 45px; height: 100%;">
                    <img v-else class="rounded-circle" :src="ticket.user.avatar" alt="avatar 2" style="width: 45px; height: 100%;">
                  </div>
            </div>
            </div>
          </div>
            <div v-if="ticket.status">
              <div  class="card-footer text-muted d-flex justify-content-start align-items-center p-1" v-if="ticket.status.code!==4">
                <img v-if="ticket.user.avatar == null || ticket.user.avatar == ''" class="rounded-circle" src="/themes/assets/images/logo_admin/user.png" alt="avatar 3" style="width: 45px; height: 100%;">
                    <img v-else class="rounded-circle" :src="ticket.user.avatar" alt="avatar 3" style="width: 45px; height: 100%;">
                <input v-model="data.content" type="text" class="form-control form-control-lg" id="exampleFormControlInput1"
                  placeholder="Type message" autocomplete="off">
                  <div class="d-flex justify-content-between">
                      <span v-on:click="onSubmit()" data-dismiss="modal" aria-label="Close" class="cursor-pointer">
                            <i class="feather icon-send font-medium-5"></i>
                      </span>
                  </div>
                
              </div>
            </div>
              
            <div>

            </div>

        </div>

      </div>
    </div>
  </div>

</template>

<script>
import Vue from 'vue';
import load_api from '../../../../../../../api.json';
import moment from 'moment';
export default {
  props:{
        ticket:{
            type:Object,
            default:{},
        },
      
    },
  data(){
    return{ 
      moment: moment,
      chat:{
        "api":"",
        "data":{}
      },
      data:{
        title:"Phản hồi",
        content:"",
        ref:"",
        parent:"",
      },
      
    }
  },
  methods: {
     async onSubmit() {
      try {
        var vm=this;
        vm.data.ref=vm.ticket._id;
        vm.data.parent=vm.ticket._id;
        vm.chat.api=load_api.ticket.postReplyData;
        vm.chat.data=vm.data;
        let data= await vm.$store.dispatch("postData",vm.chat);
        if(data.status===200){
            Vue.$toast.open({
                message: 'Gửi tin nhắn thành công',
                type: 'success',
                position: 'top-right'
            }); 
            vm.data={
              title:"Phản hồi",
              content:"",
              ref:"",
              parent:"",
            }
        }
      } catch (error) {
        Vue.$toast.open({
          message:"Gửi tin nhắn thất bại",
          type:"error",
          position:"top-right"
        });
      }
      let data= await vm.$store.dispatch("fetchTicket",load_api.ticket.get);
      // window.location.reload();
     },
      async close(){
      var vm=this;
        try {
          console.log("Chạy lần 2");
          vm.chat.api = load_api.ticket.close;
          vm.chat.data = {ticket_id:vm.ticket._id};
          
          let response = await vm.$store.dispatch('postData',vm.chat);
          console.log(response);
          if(response.status==200){
            this.$notify({
              title :"Đóng nội dung thành công",
              type:"success",
            })
            let data= await vm.$store.dispatch("fetchTicket",load_api.ticket.get);
          }
          else{
            this.$notify({
              title:"Đã xảy ra lỗi",
              type:"error",
            })
          }
        } catch (error) {
          this.$notify({
              title: "Thất bại",
              type: "error",
          })
        }
    },
      // async handleCloseTicket() {
      //   this.$confirm(
      //     "This will permanently delete the file. Continue?",
      //     "Warning",
      //     {
      //       confirmButtonText: "OK",
      //       cancelButtonText: "Cancel",
      //       type: "warning",
      //     }
      //   )
      //     .then(() => {
      //       this.$message({
      //         type: "success",
      //         message: "Delete completed",
      //       });
      //       console.log("Chạy lần 1");
      //       this.close();
      //     })
      //     .catch(() => {
      //       this.$message({
      //         type: "info",
      //         message: "Delete canceled",
      //       });
      //     });
      // },
  },
  mounted() {
    },
}
</script>

<style>
#chat2 .form-control {
border-color: transparent;
}

#chat2 .form-control:focus {
border-color: transparent;
box-shadow: inset 0px 0px 0px 1px transparent;
}
</style>