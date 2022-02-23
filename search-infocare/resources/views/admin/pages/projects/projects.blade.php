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
              <div class="col-md-3">
                <div class="form-group row">
                <button type="submit" class="btn btn-info formSearch">Tìm kiếm</button>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group text-right">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-add"><i class="fa fa-plus" aria-hidden="true"></i> Thêm Mới</button>
                </div>
              </div>
          </div>

          <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered hover table-hover table-striped" id="table-users">
                    <thead>
                        <tr>
                          <th>Công ty</th>
                          <th>Tên dịch vụ</th>
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
                          <td>
                            <button onclick="idEdit('{{$projects_list->full_name}}','{{$projects_list->services_name}}','{{$projects_list->projects_name}}',{{$projects_list->id}})"
                              type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-edit">
                              <i class="fas fa-edit"></i>
                            </button>
                            <button type="button" class="btn btn-danger" id="btn-delete"
                            data-url="{{route('project-delete')."/".$projects_list->id}}">
                              <i class="fa fa-trash" aria-hidden="true"></i>
                            </button>
                          </td>
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

     <!-- modal add -->
     <div class="modal fade" id="modal-add">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Thêm mới</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="" data-url="{{route('project-add')}}" id="form-add" method="post">
              @csrf
            <div class="form-group">
              <label>Tên dự án</label>
              <input class="form-control form-control-sm" type="text" name="projects_name">
              <label for="">Khách hàng / Công ty</label>
              <select class="custom-select" name="userID">
                @foreach($users_list as $users_list)
                <option value="{{$users_list->id}}">{{$users_list->full_name}}</option>
                @endforeach
              </select>
              <label for="">Dịch vụ</label>
              <select class="custom-select">
                @foreach($services_list as $services_list)
                <option value="{{$services_list->id}}">{{$services_list->services_name}}</option>
                @endforeach
              </select>
          </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
            <button type="submit" class="btn btn-primary">Thêm mới</button>
          </div>
          </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>

    <!-- modal edit -->
    <div class="modal fade" id="modal-edit">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Cập nhật</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="" data-url="{{route('service-update')}}" id="form-edit" method="post">
              @csrf
              <input type="hidden" name="id" id="id_services">
            <div class="form-group">
              <label>Tên dịch vụ</label>
              <input id="projects_name" class="form-control form-control-sm" type="text" name="services_name">

          </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
            <button type="submit" class="btn btn-primary">Lưu lại</button>
          </div>
          </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>

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