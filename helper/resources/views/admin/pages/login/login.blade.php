@extends('admin.layouts.login') 
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
                        @foreach(json_decode(setting()->website_logo) as $logo_login)
                        <img src="{{url('/uploads')."/".$logo_login->admin_logo_white}}" class="header-brand-img max-width-100" alt="">
                        @endforeach
                    </div>
                </div>

                <div class="container-login100">
                    <div class="wrap-login100 p-6" style="width: 23rem">
                        <form autocomplete="off" class="login100-form validate-form" id="login_form">
                            @csrf
                            <span class="login100-form-title pb-5">
                                Login Admin
                            </span>
                            <div class="panel panel-primary">
                                <div class="panel-body tabs-menu-body p-0 pt-5">
                                    <div class="tab-content">
                                            <div class="form-group" id="Password-toggle">
                                                <input type="password" id="password" name="password" class="input-100 w-100 form-control ms-0"  placeholder="Mã pin" pattern="[0-9]*" inputmode="numeric">
                                            </div>
                                            <div class="form-group">
                                                @foreach(json_decode(setting()->config_google) as $list_google)
                                                @if($list_google->active == 1)
                                                {!! NoCaptcha::renderJs() !!}
                                                {!! NoCaptcha::display() !!}
                                                @endif
                                                @endforeach
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
<script src="{{asset('app/Admin/login/login.js')}}"></script>
<script>
var login = new login(); 
	    login.datas={
	        routes:{
	            password:"{{route('admin.login.forget_password')}}",
	            login:"{{route('admin.login.login')}}",
                redirect_admin: "{{ route_admin()==null?'admin':route_admin() }}",
	        }
	    }   
login.init();
</script>
@endsection
