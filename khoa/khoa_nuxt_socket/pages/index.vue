<template>
  <div class="container mt-5">
    <div class="row justify-content-center">

      <div class="col-12 col-md-6 col-sm-12">
        <div class="mt-5 mb-2">
          <el-input placeholder="Nhập tên" v-model="inputName" :disabled="disableName"></el-input>
        </div>
        <div class="mb-2">
          <el-input placeholder="Nhập phòng" v-model="inputRoom" :disabled="disableRoom"></el-input>
        </div>
        <div class="mb-2">
          <el-button @click="SendRoom()" :disabled="disableRoom">Lưu</el-button>
        </div>
      </div>

      <div class="col-12 col-md-6 col-sm-12">
        <div class="w-100 border overflow-auto p-3" style="height:300px">

            <div class="mb-2 d-flex" v-for="m,index in messages" :key="index">
              <div class="col-3">
                <p>{{m.name}}</p>
                <p>{{m.time}}</p>
              </div>
              <div class="bg-info rounded-1 col-9">{{m.mess}}</div>
            </div>
        </div>
        <div class="d-flex justify-content-between">
          <el-input placeholder="Please input" v-model="inputMess"></el-input>
          <el-button @click="SendMessage()">Gửi</el-button>
        </div>

      </div>
    </div>
  </div>

</template>

<script>
export default {
  data() {
    return {
      time: '',
      inputName: '',
      disableName: false,
      inputMess: '',
      messages: [],
      inputRoom:'',
      disableRoom: false,
      id: 0,
      idmess: 0
    }
  },
  mounted() {
    var today = new Date()

    const eventSource = new EventSource(`${process.env.BASEAPI}event`);
    eventSource.onmessage = ({data})=>{
      //console.log(data);
      //console.log(JSON.parse(data));
      if(JSON.parse(data).room==this.inputRoom){
        
        // if(this.id===this.idmess){
        //   console.log(this.id);
        //   this.$message({
        //       message: 'Có 1 tin nhắn mới',
        //       type: 'success'
        //   });
          
        // }
        // this.idmess = this.idmess + 1
        // console.log('idmess',this.idmess);
        this.$message({
              message: 'Có 1 tin nhắn mới',
              type: 'success'
          });
      }
    }

    // khởi tạo socket
    this.socket = this.$nuxtSocket({
      name: 'main',
    })
    //lắng nghe các message của event
    this.socket.on('events', data => {
      this.messages.push(data)
    })

    this.checkUser();
  },

  methods: {

    //kiểm tra localStorage
    checkUser(){
      var getUser = localStorage.getItem('user');
      if(getUser){
        this.inputName = JSON.parse(getUser).name;
        this.inputRoom = JSON.parse(getUser).room
      }
      this.SendRoom();
    },

    //lưu tên, sau khi lưu disabled input
    SaveName(){
      if(this.inputName===''){
        this.$message({
          message: 'Yêu cầu nhập tên',
          type: 'warning'
        });
        return;
      }
      this.disableName = true;
    },

    // gửi tin đến server
    SendMessage() {
      //kiểm tra nếu chưa lưu tên thì hiển thị warning
      if(this.disableName==0){
        this.WarningName();
        return;
      }
      //nếu chưa nhập message thì hiển thị warning
      if(this.inputMess===''){
        this.WarningMessage();
        return;
      }
      //nếu lưu room thì hiển thị warning
      if(this.disableRoom==0){
        this.WarningRoom();
        return;
      }
      
      var today = new Date()
      this.time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
      this.id = this.id + 1
      this.idmess = this.id
      // gửi message gồm tên, tin nhắn, phòng lên server với key là events 
      this.socket.emit('events',  {id: this.id, name: this.inputName,mess: this.inputMess, room: this.inputRoom, time: this.time})
    },

    // gửi sự kiện phòng lên server và disabled input room
    SendRoom(){

      if(this.inputName===''){
        this.$message({
          message: 'Yêu cầu nhập tên',
          type: 'warning'
        });
        return false;
      }
      this.disableName = true;

      if(this.inputRoom===''){
        this.$message({
          message: 'Yêu cầu nhập phòng',
          type: 'warning'
        });
        return false;
      }
      var user = {
        name: this.inputName,
        room: this.inputRoom,
      }
      // lưu localStorage
      localStorage.setItem('user',JSON.stringify(user))

      // gửi sự kiện muốn vào room lên server, phía server sẽ thực hiện đưa client vào room
      this.socket.emit('joinRoom',this.inputRoom);
      this.disableRoom = true;
    },

    WarningName() {
      this.$message({
        message: 'Yêu cầu lưu tên',
        type: 'warning'
      });
    },
    WarningRoom() {
      this.$message({
        message: 'Yêu cầu lưu phòng',
        type: 'warning'
      });
    },
    WarningMessage(){
      this.$message({
        message: 'Yêu cầu nhập tin nhắn',
        type: 'warning'
      });
    }
  },

}

</script>
