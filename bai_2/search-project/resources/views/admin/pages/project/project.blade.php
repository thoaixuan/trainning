@extends('admin.layouts.main')

@section('content')
<div class="wrapper">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Project</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Project</a></li>
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
            <div class="col-8">
              <input class="form-control" id="search"  name="search" vale="" placeholder="Từ khóa tìm kiếm ....">
            </div>
            <div class="col-4">
              <button class="btn btn-success float-sm-right" id="open"><i class="fa fa-plus"></i></button>
            </div>
          </div>
            
          <table class="table" id="projects-table">
          </table>
          @include('admin.pages.project.modal');
        </div><!-- /.container-fluid -->
      </section>
    <!-- /.content -->
  </div>
</div>

@endsection

@section('jsAdmin')
<script src="{{asset('app/admin/projects/projects.js')}}"></script>
<script>
  var projects=new projects();
      projects.datas={
        routes:{
          datatable:"{{route('admin.datatables.project')}}",
          insert:"{{route('admin.insert.project')}}",
          updates:"{{route('admin.update.project')}}",
          updates_data:"{{route('admin.update_data.project')}}",
          delete:"{{route('admin.delete.project')}}",
        }
      }
      projects.init();
</script>
@endsection




