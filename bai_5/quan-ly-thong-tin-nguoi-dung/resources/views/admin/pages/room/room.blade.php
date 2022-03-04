@extends('admin.layouts.main')

@section('content')
<div class="wrapper">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Room</h1>
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
              <div class="col-md-8">
               <input class="form-control" id="search"  name="search" vale="" placeholder="Từ khóa tìm kiếm ....">
              </div>
              <div class="col-md-4">
                <button class="btn btn-primary" id="btn-search">Tìm kiếm dữ liệu</button>
              </div>  
            </div>
            <div class="col-4">
              <button class="btn btn-success float-sm-right" id="open"><i class="fa fa-plus"></i></button>
            </div>
          </div>
            
          <table class="table" id="rooms-table">
          </table>
          @include('admin.pages.room.modal')
        </div><!-- /.container-fluid -->

      </section>
    <!-- /.content -->
  </div>
</div>

@endsection
@section('jsAdmin')
<script src="{{asset('themes/admin/js/rooms/rooms.js')}}"></script>
<script>
  var rooms=new rooms();
      rooms.datas={
        routes:{
          datatable:"{{route('admin.datatables.room')}}",
          insert:"{{route('admin.insert.room')}}",
          updates:"{{route('admin.update.room')}}",
          updates_data:"{{route('admin.update_data.room')}}",
          delete:"{{route('admin.delete.room')}}", 
          get_permision:"{{route('admin.get_permision.room')}}" 
        }
      }
      rooms.init();

</script>
@endsection

