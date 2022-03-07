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

    <!-- Default box -->
    <div class="card card-solid">
      <div class="card-body pb-0">
        <form action="{{route('settings_update_mail')}}" method="post">
          @csrf
          <div class="row">
            
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