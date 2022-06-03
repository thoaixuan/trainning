@extends('Admin.layouts.login') 
@section('main')
    <!-- BACKGROUND-IMAGE -->
    <div class="login-img">

        <!-- GLOABAL LOADER -->
        <div id="global-loader">
            <img src="{{asset('themes/admin/assets/images/loader.svg')}}" class="loader-img" alt="Loader">
        </div>
        <!-- /GLOABAL LOADER -->

        <!-- PAGE -->
        <div class="page">
            <div class="">

                <!-- CONTAINER OPEN -->
                <div class="col col-login mx-auto mt-7">
                    <div class="text-center">
                        <img src="{{asset('themes/admin/assets/images/brand/logo-white.png')}}" class="header-brand-img" alt="">
                    </div>
                </div>

                <div class="container-login100">
                    <div class="wrap-login100 p-6">
                        <form autocomplete="off" class="login100-form validate-form" id="login_form">
                            @csrf
                            <span class="login100-form-title pb-5">
                                Login Admin
                            </span>
                            <div class="panel panel-primary">
                                <div class="panel-body tabs-menu-body p-0 pt-5">
                                    <div class="tab-content">
                                            <div class="form-group" id="Password-toggle">
                                                <input type="password" id="password" name="password" class="w-100 form-control ms-0"  placeholder="Mã pin" pattern="[0-9]*" inputmode="numeric">
                                            </div>
                                            <div class="form-group">
                                                {!! NoCaptcha::renderJs() !!}
                                                {!! NoCaptcha::display() !!}
                                            </div>
                                            <div class="d-flex justify-content-end ">
                                              <a id="forget-password" href="{{route('admin.login.send_password')}}">Quên mật khẩu ?</a>
                                            </div>
                                            <div class="container-login100-form-btn">
                                                <span id="submit" class="login100-form-btn btn-primary cusor-point">Đăng nhập</span>
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
@section('jsAdmin')
<script src="{{asset('app/admin/login/login.js')}}"></script>
<script>
var login = new login(); 
	    login.datas={
	        routes:{
	            password:"{{route('admin.login.forget_password')}}",
	            login:"{{route('admin.login.login')}}",
                redirect_admin: "{{ setting()->route_admin }}",
	        }
	    }   
login.init();
</script>
@endsection
