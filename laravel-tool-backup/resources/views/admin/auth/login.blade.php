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
                        <img src="{{route('guest.index')."/uploads/website/logo-1.png"}}" class="header-brand-img" alt="">
                    </div>
                </div>

                <div class="container-login100">
                    <div class="wrap-login100 p-6">
                        <form class="login100-form validate-form" id="login_form">
                            @csrf
                            <span class="login100-form-title pb-5">
                                Login Admin 
                            </span>
                            <div class="panel panel-primary">

                                <div class="panel-body tabs-menu-body p-0 pt-5">
                                    <div class="tab-content">
                                            <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid email is required: ex@abc.xyz">
                                                <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                    <i class="zmdi zmdi-email text-muted" aria-hidden="true"></i>
                                                </a>
                                                <input id="email" name="email" class="input100 border-start-0 form-control ms-0" type="email" placeholder="Email">
                                            </div>
                                            <div class="wrap-input100 validate-input input-group" id="Password-toggle">
                                                <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                    <i class="zmdi zmdi-eye text-muted" aria-hidden="true"></i>
                                                </a>
                                                <input type="password" id="password" name="password" class="input100 border-start-0 form-control ms-0"  placeholder="Password">
                                            </div>
                                            <div class="mt-4">
                                            {{-- {!! NoCaptcha::renderJs() !!}
                                            {!! NoCaptcha::display() !!} --}}
                                            </div>
                                            <div class="container-login100-form-btn">
                                                <button id="submit" class="login100-form-btn btn-primary">Login</button>
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
  var login=new login();
      login.datas={
        routes:{
          login:"{{route('admin.auth.login')}}", 
          redirect_admin: "{{ route_admin()==null?'admin':route_admin() }}",
        }
      }
      login.init();
</script>
@endsection