<template lang="">
    <div>
            <div class="row" id="table-hover-row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <span>Ticket-{{model.length}}</span>
                        <div>
                            <h4 class="card-title"><button class="btn btn-success btn-md" data-bs-toggle="modal" data-bs-target="#newTicket"><i class="feather icon-plus"></i> Thêm ticket</button> </h4>
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tiêu đề</th>
                                        <th>Nội dung</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(ticket,index) in model" :key="index" >
                                        <th scope="row">{{index+1}}</th>
                                        <td data-toggle="modal" data-backdrop="false" data-target="#backdrop"class="cursor-pointer" @click="modalTicket(ticket)" >
                                            {{ticket.title}}
                                            <span class="badge bg-light">{{ticket.priority.text}}</span>
                                            <span class="badge bg-light">{{ticket.status.text}}</span>
                                        </td>
                                        <td>{{ticket.content}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                       <nav aria-label="d-flex flex-row-reverse Page navigation " v-if="pages">
                        <ul class="pagination">
                            <li class="page-item">
                                <span class="page-link cursor-pointer" @click="decreased" aria-label="Previous"><span aria-hidden="true">&laquo;</span></span>
                            </li>
                            <li class="page-item" v-for="index in pages" :key="index">
                                <span class="page-link cursor-pointer" @click="setPage(index)">{{index}}</span>
                            </li>
                            <li class="page-item">
                                <span class="page-link cursor-pointer" @click="advanced" aria-label="Next"><span aria-hidden="true">&raquo;</span></span>
                            </li>
                        </ul> 
                    </nav>  
                </div>
            </div>
        </div>
        <!-- Modal   -->
           <div class="modal fade text-left w-100" id="backdrop" tabindex="-1" role="dialog" aria-labelledby="myModalLabel4" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel4" v-text="titleModal+' - '+statusModal">Chat</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <Chat :ticket="ticket"></Chat>
                    </div>
                    
                </div>
            </div>
        </div>
        <!-- Modal -->

            <div class="modal fade" id="newTicket" tabindex="-1" aria-labelledby="newTicket" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                <Form></Form>
            </div>
            </div>
    </div>
</template>
<script>
import axios from "axios";
import load_api from '../../../../../../../api.json';
import Chat from './chat.vue';
import Form from './form.vue';
export default {
    components: {
        Chat,
        Form,
    },
    props:{
        title:{
            type:String,
            default:"",
            selected:{},
        },
        model:{
            type:Array,
            default:[],
        },
      
    },
     data:function(){
      return{
        titleModal: "",
        statusModal: "",
        checkTicket:1,
        ticket:{},
        models:{
            title:"",
            content:"",
            type:"",
            priority:"",
        },
        delete:{
            api:"",
            data:"",
        },
         pages:0,
        indexPages:1,
        total:0,
        currentPage:10,
      }
    },
    methods:{
        async modalTicket(ticket){
            var vm=this;
            vm.selected=ticket;
            let data= await vm.$store.dispatch("getByID",load_api.ticket.getById+'/'+vm.selected._id);
            vm.ticket=data.data;
            vm.titleModal = data.data.title;
            vm.statusModal = data.data.status.text;
        },
        async handelDelete(ticket){
            var vm = this;
            vm.selected=ticket;
            vm.delete.api=load_api.ticket.delete;
            vm.delete.data=vm.selected._id;
            let data =await vm.$store.dispatch("deleteTicket",vm.delete);
                if(data.state===200){
                    Vue.$toast.open({
                    message: 'Xóa thành công',
                    type: 'success',
                    position: 'top-right'
                });  
            }
        },
         decreased() {
        this.indexPages--;
        if(this.indexPages<1){
            this.indexPages=1;
            this.checkIndex=false;
        }
            this.asyncData(this.indexPages);
            console.log(this.indexPages);
        },
        advanced() {
        this.indexPages++;
        if(this.indexPages>=this.pages){
            this.indexPages=this.pages;
            this.checkIndex=false;
        }
            this.asyncData(this.indexPages);
        },
        setPage(page){
        this.asyncData(page);
        },
        async fetchData(page){
            let res = await vm.$store.dispatch("fetchData",api.ticket.get+"?page="+page+"&limit="+6);
            vm.total=data.data.total.rows;
            vm.pages = Math.ceil(parseInt(vm.total) / vm.currentPage)
        }

    },
    mounted() {
        var vm =this;
     
    },
}
</script>
<style lang="">
    
</style>