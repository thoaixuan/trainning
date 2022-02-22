@extends('admin.layouts.main')

@section('content')
<div class="wrapper">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Info Admin</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item "><button class="text-decoration-none btn btn-success data-id={{auth()->user()->id}}" id="click-password">Đổi mật khẩu</button></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <hr/>
            <h4>Name: {{auth()->user()->name}}</h4>
            <hr/>
            <h4>Email: {{auth()->user()->email}}</h4>
            <hr/>
            <h4>Phone: {{auth()->user()->phone}}</h4>
            @include('admin.pages.info.modal');
            
        </div><!-- /.container-fluid -->
      </section>

    <!-- /.content -->
  </div>
</div>


@endsection

@section('jsAdmin')
<script src="{{asset('app/admin/info/info.js')}}"></script>
<script>
  var info=new info();
  info.datas={
        routes:{
          updates_data:"{{route('admin.update_data.info')}}",
        }
      }
      info.init();
</script>
@endsection




