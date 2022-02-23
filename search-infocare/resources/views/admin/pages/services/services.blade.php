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
                <table class="table table-bordered hover table-hover table-striped" id="table-services">
                    <thead>
                        <tr>
                          <th>Tên dịch vụ</th>
                          <th>Mô tả</th>
                          <th>Đường dẫn</th>
                          <th>Hành động</th>
                        </tr>
                        </thead>
                        <tbody id="listSearch">
                        @foreach($services_list as $services_list)
                        <tr>
                          <td>{{$services_list->services_name}}</td>
                          <td>{{$services_list->services_description}}</td>
                          <td>{{$services_list->services_slug}}</td>
                          <td>
                            <button onclick="idEdit('{{$services_list->services_name}}','{{$services_list->services_description}}','{{$services_list->services_slug}}',{{$services_list->id}})"
                              type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-edit">
                              <i class="fas fa-edit"></i>
                            </button>
                            <button type="button" class="btn btn-danger" id="btn-delete"
                            data-url="{{route('service-delete')."/".$services_list->id}}">
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
            <form action="" data-url="{{route('service-add')}}" id="form-add" method="post">
              @csrf
            <div class="form-group">
              <label>Tên dịch vụ</label>
              <input class="form-control form-control-sm" type="text" onkeyup="ChangeToSlug()" id="slug" name="services_name">
              <label for="">Đường dẫn</label>
              <input class="form-control form-control-sm" type="text" id="convert_slug" name="services_slug">
              <label for="">Mô tả</label>
              <textarea class="form-control form-control-sm" id="description" name="services_description"></textarea>
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
              <input id="services_name" class="form-control form-control-sm" type="text" name="services_name">
              <label for="">Mô tả</label>
              <textarea id="services_description" class="form-control form-control-sm" name="services_description"></textarea>
              <label for="">Đường dẫn</label>
              <input id="services_slug" type="text" class="form-control form-control-sm" name="services_slug">
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
    function idEdit(services_name,services_description,services_slug,id){
      $('#id_services').val(id);
      $('#services_name').val(services_name);
      $('#services_description').val(services_description);
      $('#services_slug').val(services_slug);
    }

    // handle ajax add
    $.ajaxSetup({
            headers:
            { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
    });
    $('#form-add').submit(function(e){
      e.preventDefault();
      let url = $(this).attr('data-url');
      let url_data = '<?php echo route('service-data'); ?>';
      $.ajax({
        type: 'post',
        url: url,
        data: {
          services_name: $('#slug').val(),
          services_slug: $('#convert_slug').val(),
          services_description: $('#description').val()
        },
        success: function(data) {
          toastr.success('Thêm thành công')
          $('#modal-add').modal('hide')
          $('#table-services').load(url_data,function () {
            $(this).unwrap();
          });
          $('#slug').val(''),
          $('#convert_slug').val(''),
          $('#description').val('')
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
      let url_data = '<?php echo route('service-data'); ?>';
      $.ajax({
        type: 'post',
        url: url,
        data: {
          id: $('#id_services').val(),
          services_name: $('#services_name').val(),
          services_slug: $('#services_slug').val(),
          services_description: $('#services_description').val()
        },
        success: function(data) {
          toastr.success('Sửa thành công')
          $('#modal-edit').modal('hide')
          $('#table-services').load(url_data,function () {
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
        let url_data = '<?php echo route('service-data'); ?>';
        $.ajax({
          type: 'get',
          url: url,
          success: function(res) {
            toastr.success('Xóa thành công')
            $('#table-services').load(url_data,function () {
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
        url: '<?php echo route('services-search'); ?>',
        data: {
          search: search
        },
        dataType: "json",
        success: function(res){
          $('#listSearch').html(res);
        }
      });
    });

    // Change name slug 
    function ChangeToSlug()
        {
            var slug;
         
            //Lấy text từ thẻ input title 
            slug = document.getElementById("slug").value;
            slug = slug.toLowerCase();
            //Đổi ký tự có dấu thành không dấu
                slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
                slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
                slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
                slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
                slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
                slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
                slug = slug.replace(/đ/gi, 'd');
                //Xóa các ký tự đặt biệt
                slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
                //Đổi khoảng trắng thành ký tự gạch ngang
                slug = slug.replace(/ /gi, "-");
                //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
                //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
                slug = slug.replace(/\-\-\-\-\-/gi, '-');
                slug = slug.replace(/\-\-\-\-/gi, '-');
                slug = slug.replace(/\-\-\-/gi, '-');
                slug = slug.replace(/\-\-/gi, '-');
                //Xóa các ký tự gạch ngang ở đầu và cuối
                slug = '@' + slug + '@';
                slug = slug.replace(/\@\-|\-\@|\@/gi, '');
                //In slug ra textbox có id “slug”
            document.getElementById('convert_slug').value = slug;
        }

    // Datatable
    $("#table-services").DataTable({
      "responsive": true
    });
</script>
@endsection
  
  <!-- /.content -->
  @endsection