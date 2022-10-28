import { Controller, Get, Sse } from '@nestjs/common';
import { interval, map, Observable } from 'rxjs';
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
  
  @Sse('event')
  sse(): Observable<MessageEvent>{
    return interval(1000).pipe(map(()=>({data:'hello'})))
  }
}