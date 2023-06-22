@extends('admin.layouts.main') 
@section('main')
<!--app-content open-->
<div class="main-content app-content mt-0">
    <div class="side-app">

        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            <!-- PAGE-HEADER -->
            <div class="page-header">
                <h1 class="page-title">Cài đặt</h1>
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Trang chủ</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Cài đặt</li>
                    </ol>
                </div>

            </div>
            <!-- PAGE-HEADER END -->
            <!-- Row -->
            <div class="row row-sm">
                    <div class="card">
                        <div class="card-body p-1">
                            <div class="panel panel-primary">
                                <div class=" tab-menu-heading">
                                    <div class="tabs-menu1">
                                        <!-- Tabs -->
                                        <ul class="nav panel-tabs">
                                            <li><a href="#website_settings" class="active" data-bs-toggle="tab">Cài đặt website</a></li>
                                            <li><a href="#config_mail" data-bs-toggle="tab" class="">Cấu hình mail</a></li>
                                            <li><a href="#google_setting" data-bs-toggle="tab" class="">Cấu hình google</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="panel-body tabs-menu-body">
                                    <div class="tab-content">
                                        {{-- Chỉnh sửa cài đặt website --}}
                                          <div class="tab-pane active" id="website_settings">
                                            <form id="setting_website" enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" id="id_setting" name="id" value="{{ settings()->id }}">
                                                <div class="row">
                                                  @foreach(json_decode(settings()->website_logo) as $list_logo)
                                                <div class="col-md-12 mb-3">
                                                   <h4>Cài đặt website</h4>
                                                 </div>
                                                 <div class="col-md-6">
                                                <div class="form-group">
                                                  <label>Link login admin</label>
                                                  <input type="text" name="route_login" class="form-control" value="{{ settings()->route_login }}"/>
                                                </div>
                                                <div class="form-group">
                                                  <label>Folder Admin</label>
                                                  <input type="text" name="route_admin" class="form-control" value="{{ settings()->route_admin }}"/>
                                                </div>
                                                </div>
                                                 <div class="col-md-6">
                                                   <div class="form-group">
                                                     <label>Logo website</label>
                                                     @if(!empty($list_logo->logo_guest))
                                                     <p><img class="w-25" src="{{route('guest.index')}}/uploads/website/{{ $list_logo->logo_guest }}"/></p>
                                                     @else
                                                     @endif
                                                     <input type="file" name="website_logo" class="form-control"/>
                                                   </div>
                                                   <div class="form-group">
                                                    <label>Favicon website</label>
                                                    @if(!empty($list_logo->favicon))
                                                     <p><img class="w-25" src="{{route('guest.index')}}/uploads/website/{{ $list_logo->favicon }}"/></p>
                                                     @else
                                                     @endif
                                                    <input type="file" name="website_favicon" class="form-control"/>
                                                  </div>
                                                 </div>
                                                 <div class="col-md-6">
                                                    <div class="form-group">
                                                      <label>Logo admin light mode</label>
                                                      @if(!empty($list_logo->admin_logo_blue))
                                                      <p><img class="w-25" src="{{route('guest.index')}}/uploads/website/{{ $list_logo->admin_logo_blue }}"/></p>
                                                      @else
                                                      @endif
                                                      <input type="file" name="admin_logo_blue" class="form-control"/>
                                                    </div>
                                                  </div>
                                                  <div class="col-md-6">
                                                    <div class="form-group">
                                                      <label>Logo admin dark mode</label>
                                                      @if(!empty($list_logo->admin_logo_white))
                                                       <p><img class="w-25" src="{{route('guest.index')}}/uploads/website/{{ $list_logo->admin_logo_white }}"/></p>
                                                       @else
                                                       @endif
                                                      <input type="file" name="admin_logo_white" class="form-control"/>
                                                    </div>
                                                  </div>
                                                  <div class="col-md-12">
                                                    <div class="form-group">
                                                    <button type="submit" class="btn btn-primary" id="submit_setting_website">Lưu</button>
                                                  </div>
                                                  
                                                </div>
                                                @endforeach
                                                </div>
                                               </form>
                                        </div>
                                        {{-- Cấu hình mail --}}
                                        <div class="tab-pane" id="config_mail">
                                            <form id="setting_mail" method="post">
                                                @csrf
                                                <input type="hidden" id="id_setting" name="id" value="{{ settings()->id }}">
                                                <div class="row">
                                                  @foreach(json_decode(settings()->config_mail) as $list_mail)
                                                <div class="col-md-12 mb-3">
                                                   <h4>Cài đặt cấu hình gửi mail</h4>
                                                 </div>
                                                 <div class="col-md-6">
                                                   <div class="form-group">
                                                     <label>Mail driver</label>
                                                     <input type="text" name="mail_driver" class="form-control form-control-sm" value="{{ $list_mail->mail_driver }}"/>
                                                   </div>
                                                   <div class="form-group">
                                                     <label>Mail host</label>
                                                     <input type="text" name="mail_host" class="form-control form-control-sm" value="{{ $list_mail->mail_host }}"/>
                                                   </div>
                                                   <div class="form-group">
                                                     <label>Mail port</label>
                                                     <input type="text" name="mail_port" class="form-control form-control-sm" value="{{ $list_mail->mail_port }}"/>
                                                   </div>
                                                   <div class="form-group">
                                                     <label>Mail from address</label>
                                                     <input type="text" name="mail_from_address" class="form-control form-control-sm" value="{{ $list_mail->mail_from_address }}"/>
                                                   </div>
                                                   <div class="form-group">
                                                     <label>Mail from name</label>
                                                     <input type="text" name="mail_from_name" class="form-control form-control-sm" value="{{ $list_mail->mail_from_name }}"/>
                                                   </div>
                                                 </div>
                                                 <div class="col-md-6">
                                                   <div class="form-group">
                                                     <label>Mail encryption</label>
                                                     <input type="text" name="mail_encryption" class="form-control form-control-sm" value="{{ $list_mail->mail_encryption }}"/>
                                                   </div>
                                                   <div class="form-group">
                                                     <label>Mail username</label>
                                                     <input type="text" id="mail_username" name="mail_username" class="form-control form-control-sm" value="{{ $list_mail->mail_username }}"/>
                                                   </div>
                                                   <div class="form-group">
                                                     <label>Mail password</label>
                                                     <input type="text" id="mail_password" name="mail_password" class="form-control form-control-sm" value="{{ $list_mail->mail_password }}"/>
                                                   </div>
                                                   <div class="form-group">
                                                     <label>Mail người nhận</label>
                                                     <input type="text" name="mail_receive" class="form-control form-control-sm" value="{{ $list_mail->mail_receive }}"/>
                                                   </div>
                                                 </div>
                                               <div class="col-md-1">
                                                 <button type="submit" class="btn btn-primary btn-block">Lưu</button>
                                               </div>
                                               @endforeach
                                                </div>            
                                               </form>
                                        </div>
                                        {{-- Cấu hình google --}}
                                        <div class="tab-pane" id="google_setting">
                                            <form id="setting_google" method="post">
                                                @csrf
                                                <input type="hidden" id="id_setting" name="id" value="{{ settings()->id }}">
                                                <div class="row">
                                                  @foreach(json_decode(settings()->config_google) as $list_google)
                                                 <div class="col-md-6">
                                                     <h4>Captcha Google</h4>
                                                   <div class="form-group">
                                                     <label>Nocaptcha Secret</label>
                                                     <input type="text" name="nocaptcha_secret" class="form-control form-control-sm" value="{{ $list_google->nocaptcha_secret }}"/>
                                                   </div>
                                                   <div class="form-group">
                                                     <label>Nocaptcha Sitekey</label>
                                                     <input type="text" name="nocaptcha_sitekey" class="form-control form-control-sm" value="{{ $list_google->nocaptcha_sitekey }}"/>
                                                   </div>
                                                   
                                                 </div>
                                                 <div class="col-md-6">
                                                    <h4>Login Google</h4>
                                                   <div class="form-group">
                                                     <label>Client ID</label>
                                                     <input type="text" name="client_id" class="form-control form-control-sm" value="{{ $list_google->client_id }}"/>
                                                   </div>
                                                   <div class="form-group">
                                                     <label>Client secret</label>
                                                     <input type="text" name="client_secret" class="form-control form-control-sm" value="{{ $list_google->client_secret }}"/>
                                                   </div>
                                                   <div class="form-group">
                                                     <label>URL Callback</label>
                                                     <input type="text" name="redirect" class="form-control form-control-sm" value="{{ $list_google->redirect }}"/>
                                                   </div>
                                                 </div>
                                               <div class="col-md-1">
                                                 <button type="submit" class="btn btn-primary btn-block">Lưu</button>
                                               </div>
                                               @endforeach
                                                </div>            
                                               </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <!-- End Row -->

        </div>
        <!-- CONTAINER CLOSED -->

    </div>
</div>
<!--app-content closed-->
@include('admin.pages.home.modal')
@endsection
@section('jsAdmin')
<script src="{{asset('app/admin/setting/setting.js')}}"></script>
<!--  Validate -->
<script src="{{ asset('themes/admin/assets/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="{{ asset('themes/admin/assets/plugins/jquery-validation/additional-methods.min.js')}}"></script>
<script>
    var update_home_banner = "{{route('admin.setting.homeBannerUpdate')}}";
    var update_website = "{{route('admin.setting.websiteUpdate')}}";
    var update_mail = "{{route('admin.setting.mailUpdate')}}";
    var update_google = "{{route('admin.setting.googleUpdate')}}";
</script>
@endsection
