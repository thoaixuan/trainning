
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
                        <form class="login100-form validate-form" action="{{route('guest.auth.reset_new_pass')}}" method="post">
                            @csrf
                            <span class="login100-form-title pb-5">
                                Cập nhật mật khẩu
                            </span>
                            <div class="panel panel-primary">

                                <div class="panel-body tabs-menu-body p-0 pt-5">
                                    <div class="tab-content">
                                        <div class="wrap-input100 validate-input input-group" id="Password-toggle">
                                            <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                <i class="zmdi zmdi-eye " aria-hidden="true"></i>
                                            </a>
                                            <input type="hidden" name="email" value="{{request()->email}}"/>
                                            <input type="hidden" name="forgot_token" value="{{request()->token}}"/>
                                            <input type="password" id="password" name="password" class="input100 border-start-0 form-control ms-0"  placeholder="Password">
                                        </div>
                                            <div>
                                                @if(session()->has('success_new_pass'))
                                            <div class="alert alert-success">
                                                {!! session()->get('success_new_pass') !!}
                                            </div>
                                            <a href="{{ route('guest.auth.login') }}"><button type="button" class="login100-form-btn btn-primary cursor-pointer">Đăng nhập</button></a>
                                            @elseif(session()->has('error_new_pass'))
                                            <div class="alert alert-danger">
                                                {!! session()->get('error_new_pass') !!}
                                            </div>
                                            @endif
                                            </div>
                                           
                                            <div class="container-login100-form-btn">
                                                <button type="submit" class="login100-form-btn btn-primary cursor-pointer">Cập nhật</button>
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