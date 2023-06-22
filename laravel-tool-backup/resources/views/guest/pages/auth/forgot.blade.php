
@extends('guest.layouts.main') 
@section('main')
    <!-- BACKGROUND-IMAGE -->
    <div >

        <!-- PAGE -->
        <div class="">
            <div class="">

                <!-- CONTAINER OPEN -->
               
                <div class="container-login100 row ">
                    <div class="wrap-login100 p-6 col-md-6 col-lg-8 col-xl-4 col-sm-12">
                        <form class="login100-form validate-form" action="{{route('guest.auth.post_forgot')}}" method="post">
                            @csrf
                            <span class="login100-form-title pb-5">
                                Quên mật khẩu
                            </span>
                            <div class="panel panel-primary">

                                <div class="panel-body tabs-menu-body p-0 pt-5">
                                    <div class="tab-content">
                                            <div class="wrap-input100 validate-input input-group">
                                                <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                    <i class="zmdi zmdi-email " aria-hidden="true"></i>
                                                </a>
                                                <input id="email" name="email" class="input100 border-start-0 form-control ms-0" type="text" placeholder="Nhập Email">
                                                
                                            </div>
                                            <div>
                                                @if(session()->has('message'))
                                            <div class="alert alert-success">
                                                {!! session()->get('message') !!}
                                            </div>
                                            @elseif(session()->has('error'))
                                            <div class="alert alert-danger">
                                                {!! session()->get('error') !!}
                                            </div>
                                            @endif
                                            </div>
                                            {!! NoCaptcha::renderJs() !!}
                                            {!! NoCaptcha::display() !!}
                                                <div>
                                                <a class="cursor-pointer font-italic" href="{{route('guest.auth.register')}}">Bạn chưa có tài khoản?</a>
                                                </div>
                                           
                                            <div class="container-login100-form-btn">
                                                <button type="submit" class="login100-form-btn btn-primary cursor-pointer">Quên mật khẩu</button>
                                            </div>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
                <!-- CONTAINER CLOSED -->
            </div>
        </div>
        <!-- End PAGE -->

    </div>
    <!-- BACKGROUND-IMAGE CLOSED -->
@endsection