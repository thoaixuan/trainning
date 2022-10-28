import { MessageBody, OnGatewayConnection, OnGatewayDisconnect, OnGatewayInit, SubscribeMessage, WebSocketGateway, WebSocketServer } from "@nestjs/websockets";
import { Server, Socket } from "socket.io";


@WebSocketGateway({cors: true})
export class EventGateway implements OnGatewayConnection, OnGatewayDisconnect{
    constructor(private message: object) {}

    @WebSocketServer()
    server: Server;

    // tạo kết nối với client
    handleConnection(client: Socket, ...args: any) {
        console.log("client connect: ",client.id);
    }
    // ngắt kết nối với client
    handleDisconnect(client: Socket) {
        console.log("client disconnect: ",client.id);
    }
    // lắng nghe sự kiện events
    @SubscribeMessage('events')
    handleEvent(@MessageBody() data: {room: string, name: string, mess: string}) {
        this.message = data
        // gửi dữ liệu cho client trong phòng với key là events, dữ liệu là data
        this.server.to(data.room).emit("events", data)
    }
    //lắng nghe sự kiện joinRoom
    @SubscribeMessage('joinRoom')
    handleJoinRoom(client: Socket, room: string){
        console.log(room);
        // đưa socket client vào room
        client.join(room);
    }
    getMessage(){
        return this.message
    }
}

