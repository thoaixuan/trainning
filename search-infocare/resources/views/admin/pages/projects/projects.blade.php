@extends('admin.main')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Dự án</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Admin</a></li>
            <li class="breadcrumb-item active">Dự án</li>
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
                <table class="table table-bordered hover table-hover table-striped" id="table-projects">
                    <thead>
                        <tr>
                          <th>Công ty</th>
                          <th>Tên dịch vụ</th>
                          <th>Tên dự án</th>
                          <th>Hành động</th>
                        </tr>
                        </thead>
                        <tbody id="listSearch">
                           
                        @foreach($projects_list as $projects_list)
                        <tr>
                          <td>{{$projects_list->full_name}}</td>
                          <td>{{$projects_list->services_name}}</td>
                          <td>{{$projects_list->projects_name}}</td>
                          <td>
                            <button onclick="idEdit('{{$projects_list->projects_name}}',{{$projects_list->userID}},{{$projects_list->serviceID}},{{$projects_list->id}})"
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
              <input class="form-control form-control-sm" type="text" id="projects_name" name="projects_name" required>
              <label for="">Khách hàng / Công ty</label>
              <select class="custom-select" name="userID" id="userID" required>
                @foreach($users_list as $users_list)
                <option value="{{$users_list->id}}">{{$users_list->full_name}}</option>
                @endforeach
              </select>
              <label for="">Dịch vụ</label>
              <select class="custom-select" name="serviceID" id="serviceID" required>
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
            <form action="" data-url="{{route('project-update')}}" id="form-edit" method="post">
              @csrf
              <input type="hidden" name="id" id="id_projects">
            <div class="form-group">
              <label>Tên dự án</label>
              <input id="projects_name_edit" class="form-control form-control-sm" type="text" name="projects_name">
              <label>Tên công ty / Khách hàng</label>
              <select class="custom-select" name="userID" id="userID" required>
              @foreach($users_list2 as $users_list2)
                <option value="{{$users_list2->id}}">{{$users_list2->full_name}}</option>
                @endforeach
              </select>
              <label for="">Dịch vụ</label>
              <select class="custom-select" name="serviceID" id="serviceID" required>
                @foreach($services_list2 as $services_list2)
                <option value="{{$services_list2->id}}">{{$services_list2->services_name}}</option>
                @endforeach
              </select>
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
  // get value edit
    function idEdit(projects_name,userID,serviceID,id){
      $('#id_projects').val(id);
      $('#projects_name_edit').val(projects_name);
      $('#userID').val(userID);
      $('#serviceID').val(serviceID);
    }
  // handle ajax add
    $.ajaxSetup({
              headers:
              { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
      });
      $('#form-add').submit(function(e){
        console.log($('#userID').val());
        console.log($('#serviceID').val());
        e.preventDefault();
        let url = $(this).attr('data-url');
        let url_data = '<?php echo route('project-data'); ?>';
        $.ajax({
          type: 'post',
          url: url,
          data: {
            projects_name: $('#projects_name').val(),
            userID: $('#userID').val(),
            serviceID: $('#serviceID').val()
          },
          success: function(data) {
            toastr.success('Thêm thành công')
            $('#modal-add').modal('hide')
            $('#table-projects').load(url_data,function () {
              $(this).unwrap();
            });
            $('#projects_name').val(''),
            $('#userID').val(''),
            $('#serviceID').val('')
            // location.reload();
          },
          error: function(jqXHR,textStatus,errorThrown) {
            alert("Lỗi")
          }
        });
      });

  // handle ajax edit 
  $('#form-edit').submit(function(e){
        e.preventDefault();
        let url = $(this).attr('data-url');
        let url_data = '<?php echo route('project-data'); ?>';
        $.ajax({
          type: 'post',
          url: url,
          data: {
            id: $('#id_projects').val(),
            projects_name: $('#projects_name_edit').val(),
            userID: $('#userID').val(),
            serviceID: $('#serviceID').val()
          },
          success: function(data) {
            toastr.success('Sửa thành công')
            $('#modal-edit').modal('hide')
            $('#table-projects').load(url_data,function () {
              $(this).unwrap();
            });
          },
          error: function(jqXHR,textStatus,errorThrown) {
            alert("Lỗi")
          }
        });
      });

    // handle delete
        
    $('body').delegate('#btn-delete','click',function(e){
          e.preventDefault();
          if (confirm("Bạn có chắc xóa không")) {
            let url = $(this).attr('data-url');
            let url_data = '<?php echo route('project-data'); ?>';
            $.ajax({
              type: 'get',
              url: url,
              success: function(res) {
                toastr.success('Xóa thành công')
                $('#table-projects').load(url_data,function () {
                  $(this).unwrap();
                });
              },
              error: function(jqXHR,textStatus,errorThrown) {
                alert("Lỗi")
              }
            });
          } 
        });

    // handle search
    $('#search').keyup(function(){
      let search = $(this).val();
      $.ajax({
        type: "get",
        url: '<?php echo route('project-search'); ?>',
        data: {
          search: search
        },
        dataType: "json",
        success: function(res){
          $('#listSearch').html(res);
        }
      });
    });


    $(function () {
    $("#table-projects").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false
    });
    });
</script>
@endsection
  
  <!-- /.content -->
  @endsection