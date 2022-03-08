@extends('admin.layouts.main')
@section('main')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Cài đặt website</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Admin</a></li>
            <li class="breadcrumb-item active">Settings</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <div class="card card-solid">
      <div class="card-body">
        <form action="{{route('settings_update_guest')}}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{ getConfigMail()->id }}">
        <div class="row">
          <div class="col-md-12 mb-3">
            <h4>Cài đặt trang chủ</h4>
          </div>
          <div class="col-6">
            <div class="form-group">
              <label>Logo header</label>
              @if(isset(getConfigMail()->guest_logo_header))
              <p><img class="w-25" src="{{route('guest_home')}}/uploads/{{ getConfigMail()->guest_logo_header }}"/></p>
              @else
              @endif
              <input type="hidden" name="header_file_old" value="{{ getConfigMail()->guest_logo_header }}" class="img-fluid"/>
              <input type="file" name="guest_logo_header" class="w-100"/>
            </div>
          </div>
          <div class="col-6">
            <div class="form-group">
              <label>Logo footer</label>
              @if (isset(getConfigMail()->guest_logo_footer))
              <p><img class="w-25" src="{{route('guest_home')}}/uploads/{{ getConfigMail()->guest_logo_footer }}" class="img-fluid"/></p>
              @else
              @endif
              <input type="hidden" name="footer_file_old" value="{{ getConfigMail()->guest_logo_footer }}"/>
              <input type="file" name="guest_logo_footer" class="w-100"/>
            </div>
            <div class="form-group">
              <label>Mô tả footer</label>
              <textarea name="guest_description_footer" class="form-control">{{ getConfigMail()->guest_description_footer }}</textarea>
            </div>
          </div>
          <div class="col-md-1">
            <button type="submit" class="btn btn-primary btn-block">Lưu</button>
          </div>
        </div>
        </form>
      </div>
    </div>
    <!-- Default box -->
    <div class="card card-solid mt-4">
      <div class="card-body">
        <form action="{{route('settings_update_mail')}}" method="post">
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
    <!-- /.card -->

  </section>

  
  <!-- /.content -->
  @endsection