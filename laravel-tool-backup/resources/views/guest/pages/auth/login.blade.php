
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
                        <form class="login100-form validate-form" id="login_form">
                            @csrf
                            <span class="login100-form-title pb-5">
                                Đăng nhập
                            </span>
                            <div class="panel panel-primary">

                                <div class="panel-body tabs-menu-body p-0 pt-5">
                                    <div class="tab-content">
                                            <div class="wrap-input100 validate-input input-group " data-bs-validate="Valid email is required: ex@abc.xyz">
                                                <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                    <i class="zmdi zmdi-email " aria-hidden="true"></i>
                                                </a>
                                                <input id="email" name="email" class="input100 border-start-0 form-control ms-0" type="text" placeholder="Email/số điện thoại">
                                                <p></p>
                                            </div>
                                            <div class="wrap-input100 validate-input input-group" id="Password-toggle">
                                                <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                    <i class="zmdi zmdi-eye " aria-hidden="true"></i>
                                                </a>
                                                <input type="password" id="password" name="password" class="input100 border-start-0 form-control ms-0"  placeholder="Password">
                                            </div>
                                                {!! NoCaptcha::renderJs() !!}
                                                {!! NoCaptcha::display() !!}
                                                   <!-- <button class="cursor-pointer font-italic d-block" href="{{route('guest.auth.register')}}">Đăng nhập bằng google</a> -->
                                                
                                                <div>
                                                <a class="cursor-pointer font-italic" href="{{route('guest.auth.register')}}">Bạn chưa có tài khoản?</a>
                                                </div>
                                                <div>
                                                    <a class="cursor-pointer font-italic" href="{{route('guest.auth.forgot')}}">Quên mật khẩu?</a>
                                                </div>
                                           
                                            <div class="container-login100-form-btn">
                                                <button type="submit" id="submit" class="login100-form-btn btn-primary cursor-pointer">Login</button>
                                            </div>
                                    </div>
                                </div>
                            </div>

                        </form>
                            <div class="container-login100-form-btn">
                                <a type="submit" id="submit" class="login100-form-btn btn-danger cursor-pointer" href="{{route('guest.login.login_google')}}">
                                <img alt="" class="logo-2 max-width-150" src="{{url('/uploads/website/logo_google.webp')}}" height="24" width="24">    
                                Đăng nhập bằng google</a>
                            </div>
                    </div>
                </div>
                <!-- CONTAINER CLOSED -->
            </div>
        </div>
        <!-- End PAGE -->

    </div>
    <!-- BACKGROUND-IMAGE CLOSED -->
@endsection
@section('jsGuest')

<script src="{{asset('app/Guest/login/login.js')}}"></script>
<script>
  var login=new login();
      login.datas={
        routes:{
          login:"{{route('guest.auth.post_login')}}", 
        }
      }
      login.init();
</script>
@endsection
