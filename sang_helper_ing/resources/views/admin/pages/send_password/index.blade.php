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
                <form action="{{route('admin.login.change_password')}}" method="post" class="login100-form validate-form" id="login_form">
                    @csrf
                    <span class="login100-form-title pb-5">
                        Đã gửi mã xác thực về email {{getConfigMail()->mail_receive}}
                    </span>
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
<script src="{{asset('app/admin/contact/contact.js')}}"></script>
<script>
var contact = new contact(); 
	    contact.datas={
	        routes:{
	        }
	    }   
contact.init();
</script>
@endsection
