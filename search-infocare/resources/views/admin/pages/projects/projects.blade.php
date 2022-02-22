@extends('admin.main')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Khách hàng</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Admin</a></li>
            <li class="breadcrumb-item active">Khách hàng</li>
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
          <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                    <input class="form-control" id="search" name="search" placeholder="Nội dung tìm kiếm ...">
                </div>
              </div>
              <div class="col-2">
                <div class="form-group row">
                <button type="submit" class="btn btn-info formSearch">Tìm kiếm</button>
                </div>
              </div>
              <div class="col-md-1"></div>
              <div class="col-md-3">
                <div class="form-group text-right">
                    <button type="button" class="btn btn-success" id="btn-insert"><i class="fa fa-plus" aria-hidden="true"></i> Thêm Mới</button>
                </div>
              </div>
          </div>

          <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered hover table-hover table-striped" id="table-users">
                    <thead>
                        <tr>
                          <th>Công ty</th>
                          <th>Tên Dự án</th>
                          <th>Tên dự án</th>
                          <th>Hành động</th>
                        </tr>
                        </thead>
                        <tbody>
                           
                        @foreach($projects_list as $projects_list)
                        <tr>
                          <td>{{$projects_list->full_name}}</td>
                          <td>{{$projects_list->services_name}}</td>
                          <td>{{$projects_list->projects_name}}</td>
                          <td>Xóa</td>
                        </tr>
                        @endforeach
                          </tbody>
                </table>
            </div>
        </div>

      </div>
      <!-- /.card-footer -->
    </div>
    <!-- /.card -->

  </section>
    @section('jsComponent')
<script>
    $(function () {
    $("#table-users").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false
    });
    });
</script>
@endsection
  
  <!-- /.content -->
  @endsection