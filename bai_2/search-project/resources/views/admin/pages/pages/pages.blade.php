@extends('admin.layouts.main')

@section('content')
<div class="wrapper">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">page</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">page</a></li>
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
          <div class="col-12 row">
            <div class="col-8 row">
              <div class="col-md-8"> <input class="form-control" id="search"  name="search" vale="" placeholder="Từ khóa tìm kiếm ...."></div>
              <div class="col-md-4"><button class="btn btn-primary" id="btn-search">Tìm kiếm dữ liệu</button></div>
            </div>
            <div class="col-4">
         
              <!-- <button class="btn btn-primary float-sm-left" id="btn-search"><i class="fa fa-plus"></i></button> -->
              <button class="btn btn-success float-sm-right" id="open"><i class="fa fa-plus"></i></button>
            </div>
          </div>
            
          <table class="table table-striped" id="pages-table">
          </table>
          @include('admin.pages.pages.modal');
        </div><!-- /.container-fluid -->
      </section>
    <!-- /.content -->  
  </div>
</div>

@endsection

@section('jsAdmin')
<script src="{{asset('app/admin/pages/pages.js')}}"></script>
<script>
  var pages=new pages();
      pages.datas={
        routes:{
          datatable:"{{route('admin.datatables.page')}}",
          insert:"{{route('admin.insert.page')}}",
          updates:"{{route('admin.update.page')}}",
          updates_data:"{{route('admin.update_data.page')}}",
          delete:"{{route('admin.delete.page')}}",
          swap:"{{route('admin.swap.page')}}",
      }
    }
      pages.init();
     

</script>
@endsection




