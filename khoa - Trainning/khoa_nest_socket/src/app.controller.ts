import { Controller, Get, Sse } from '@nestjs/common';
import { filter, interval, Observable, map, of, switchMap, take } from 'rxjs';
import { AppService } from './app.service';
import { EventGateway } from './events.gateway';

interface MessageEvent{
  data: string | object;
  id?: string;
  type?: string;
  retry?: number;
}


@Controller()
export class AppController {

  constructor(
    private event: EventGateway,
    private readonly appService: AppService) {}

  @Get()
  getHello(): string {
    return this.appService.getHello();
  }
  
  // @Sse('event')
  // sse(): Observable<MessageEvent>{
  //   var data = this.event.message;
  //   if(data){
  //     if(this.event.c===this.event.countmess){
  //       this.event.countmess = this.event.countmess+1
  //       //return interval(1000).pipe(map(()=>({data:{data:data}})))
  //       return of({data: data})
  //     }
  //     this.event.countmess = this.event.countmess+1
  //   }
    
  //   // if(data){
  //   //   this.event.message = undefined
  //   //   return of({data: data})
  //   // }
  //   // return of({data: {message:'no change'}})

  //   return of({data: {message:'no change'}})
  // }

  @Sse('event')
  sse(): Observable<MessageEvent> {
    var data = this.event.message;

    if(data){
      return interval(1000).pipe(
        map((value:number)=>({data:{data:this.event.message}})))
    }
    return of({data: {server:{message:'no change'}}})
  }

}