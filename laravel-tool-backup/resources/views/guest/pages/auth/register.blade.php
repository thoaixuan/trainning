
@extends('guest.layouts.main') 
@section('main')
    <!-- BACKGROUND-IMAGE -->
    <div class="">

        <!-- PAGE -->
        <div class="">
            <div class="">

                <!-- CONTAINER OPEN -->
              
                <div class="container-login100 row">
                    <div class="wrap-login100 p-6 col-md-12 col-lg-6 col-xl-6 col-sm-12 ">
                        <form class="login100-form validate-form" id="register_form">
                            @csrf
                            <span class="login100-form-title pb-5">
                                Đăng ký
                            </span>
                            <div class="panel panel-primary">

                                <div class="panel-body tabs-menu-body p-0 pt-5">
                                    <div class="tab-content">
                                        <div class="row">
                                                <!-- >form  register-->
                                            <div class="col-md-6 col-12 wrap-input100 validate-input input-group">
                                                <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                    <i class="fa fa-text-width" aria-hidden="true"></i>
                                                </a>
                                            <input id="full_name" name="full_name" class="input100 border-start-0 form-control ms-0" type="full_name" placeholder="Nhập họ và tên">
                                            </div>
                                            <div class="col-md-6 col-12 wrap-input100 validate-input input-group" >
                                                <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                    <i class="fa fa-phone" aria-hidden="true"></i>
                                                </a>
                                                <input type="phone_number" id="phone_number" name="phone_number" class="input100 border-start-0 form-control ms-0"  placeholder="Nhập số điện thoại">
                                            </div>

                                            <div class="col-md-6 col-12 wrap-input100 validate-input input-group" data-bs-validate="Valid email is required: ex@abc.xyz">
                                                <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                                </a>
                                            <input id="email" name="email" class="input100 border-start-0 form-control ms-0" type="email" placeholder="Nhập email (Không bắt buộc)">
                                            </div>
                                            <div class="col-md-6 col-12 wrap-input100 validate-input input-group" >
                                                <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                    <i class="fa fa-address-card" aria-hidden="true"></i>
                                                </a>
                                                <input type="address" id="address" name="address" class="input100 border-start-0 form-control ms-0"  placeholder="Nhập địa chỉ">
                                            </div>
                                            <div class="col-md-6 col-12 wrap-input100 validate-input input-group" id="Password-toggle">
                                                <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                    <i class="zmdi zmdi-eye " aria-hidden="true"></i>
                                                </a>
                                                <input type="password" id="password" name="password" class="input100 border-start-0 form-control ms-0"  placeholder="Nhập mật khẩu">
                                            </div>
                                            <div class="col-md-6 col-12 wrap-input100 validate-input input-group" >
                                                <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                    <i class="fa fa-male" aria-hidden="true"></i>
                                                </a>
                                                <select type="gender" id="gender" name="gender" class="text-gray form-control select2 form-select input100 border-start-0 form-control ms-0" data-placeholder="Choose one">
                                                    <option label="Chọn giới tính" disabled >
                                                    </option>
                                                    <option value="1">Nam</option>
                                                    <option value="2">Nữ</option>
                                                </select>
                                                <!-- <input type="gender" id="gender" name="gender" class="input100 border-start-0 form-control ms-0"  placeholder="Chọn giới tính"> -->
                                            </div>
                                                <!-- form register -->
                                        </div>
                                           
                                            <div class="container-login100-form-btn">
                                                <button id="submit" class="login100-form-btn btn-primary cursor-pointer">Login</button>
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
@section('jsGuest')

<script src="{{asset('app/Guest/login/login.js')}}"></script>
<script>
  var login=new login();
      login.datas={
        routes:{
          register:"{{route('guest.auth.post_register')}}", 
        }
      }
      login.init();
</script>
@endsection
