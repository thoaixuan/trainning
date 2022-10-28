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

            <div class="mb-2 d-flex" v-for="m in messages" :key="m">
              <div class="col-2">{{m.name}}</div>
              <div class="bg-info rounded-1 col-10">{{m.mess}}</div>
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
      inputName: '',
      disableName: false,
      inputMess: '',
      messages: [],
      inputRoom:'',
      disableRoom: false
    }
  },
  mounted() {
    const eventSource = new EventSource(`${process.env.BASEAPI}event`);
    eventSource.onmessage = ({data})=>{
      console.log('New message', data)
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
      // gửi message gồm tên, tin nhắn, phòng lên server với key là events 
      this.socket.emit('events',  {name: this.inputName,mess: this.inputMess, room: this.inputRoom})
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
