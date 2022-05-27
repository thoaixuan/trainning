@extends('admin.layouts.main') 
@section('main')  

<!--app-content open-->
<div class="main-content app-content mt-0">

    <div class="side-app">

        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            <!-- PAGE-HEADER -->
            <div class="card card-solid">
                <div class="card-body">
                    <form   enctype="multipart/form-data" id="websiteForm">
                    @csrf
                    <input type="hidden" name="id" value="{{ getConfigMail()->id }}">
                    <div class="row">
                    <div class="col-md-12 mb-3">
                        <h4>Cài đặt trang chủ</h4>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                        <label>Logo header</label>
                        @if(isset(getConfigMail()->guest_logo_header))
                        <p><img class="w-25" src="{{route('guest.home.index')}}/uploads/{{ getConfigMail()->guest_logo_header }}"/></p>
                        @else
                        @endif
                        <input type="file" name="guest_logo_header" id="guest_logo_header" class="w-100"/>
                        </div>
                    
                    </div>
                    <div class="p-3">
                        <button type="submit" class="btn btn-primary" id="submitWeb">Lưu</button>
                    </div>
                    </div>
                    </form>
                </div>
            </div>
       
            <!-- Row -->
            <div class="card card-solid mt-4">
                <div class="card-body">
                    <form  method="post" id="mailForm">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 mb-3">
                        <h4>Cài đặt cấu hình gửi mail</h4>
                        </div>
                            <input type="hidden" name="id" value="{{ getConfigMail()->id }}">
                        <div class="col-md-6">
                        <div class="form-group">
                            <label>Mail driver</label>
                            <input type="text" name="mail_driver" class="form-control form-control-sm" value="{{ getConfigMail()->mail_driver }}"/>
                        </div>
                        <div class="form-group">
                            <label>Mail host</label>
                            <input type="text" name="mail_host" class="form-control form-control-sm" value="{{ getConfigMail()->mail_host }}"/>
                        </div>
                        <div class="form-group">
                            <label>Mail port</label>
                            <input type="text" name="mail_port" class="form-control form-control-sm" value="{{ getConfigMail()->mail_port }}"/>
                        </div>
                        <div class="form-group">
                            <label>Mail from address</label>
                            <input type="text" name="mail_from_address" class="form-control form-control-sm" value="{{ getConfigMail()->mail_from_address }}"/>
                        </div>
                        <div class="form-group">
                            <label>Mail from name</label>
                            <input type="text" name="mail_from_name" class="form-control form-control-sm" value="{{ getConfigMail()->mail_from_name }}"/>
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                            <label>Mail encryption</label>
                            <input type="text" name="mail_encryption" class="form-control form-control-sm" value="{{ getConfigMail()->mail_encryption }}"/>
                        </div>
                        <div class="form-group">
                            <label>Mail username</label>
                            <input type="text" name="mail_username" class="form-control form-control-sm" value="{{ getConfigMail()->mail_username }}"/>
                        </div>
                        <div class="form-group">
                            <label>Mail password</label>
                            <input type="text" name="mail_password" class="form-control form-control-sm" value="{{ getConfigMail()->mail_password }}"/>
                        </div>
                        <div class="form-group">
                            <label>Mail người nhận</label>
                            <input type="text" name="mail_receive" class="form-control form-control-sm" value="{{ getConfigMail()->mail_receive }}"/>
                        </div>
                        </div>
                    <div class="col-md-1">
                        <button type="submit" class="btn btn-primary btn-block">Lưu</button>
                    </div>
                    </div>
                </form>
                </div>
            <!-- /.card-footer -->
            </div>
            <!-- End Row -->

        </div>
        <!-- CONTAINER CLOSED -->

    </div>
</div>
<!--app-content closed-->
@endsection
@section('jsAdmin')
<script src="{{asset('app/admin/setting/setting.js')}}"></script>
<script>
var setting = new setting(); 
	    setting.datas={
	        routes:{
			    update_website:"{{route('admin.setting.update_website')}}",
			    update_mail:"{{route('admin.setting.update_mail')}}",
	        }
	    }   
setting.init();
</script>
@endsection
