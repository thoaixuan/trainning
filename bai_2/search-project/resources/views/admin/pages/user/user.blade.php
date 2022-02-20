@extends('admin.layouts.main')

@section('content')
<div class="wrapper">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">User</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">User</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
        <div class="row">
          <input class="form-control" id="search"  name="search" vale="" placeholder="Từ khóa tìm kiếm ....">
          <table class="table" id="users-table">
          </table>
          
        </div><!-- /.container-fluid -->
      </section>
    <!-- /.content -->
  </div>
</div>

@endsection

@section('jsAdmin')
<script src="{{asset('app/admin/users/users.js')}}"></script>
<!-- <script>
  var users=new users();
      users.datas={
        routes:{
          datatable:"{{route('admin.datatables.user')}}"
        }
      }
</script> -->
@endsection




