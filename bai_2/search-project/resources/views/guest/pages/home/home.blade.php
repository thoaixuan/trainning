@extends('guest.layouts.main')

@section('content')
    <!-- Preloader -->
    @include('guest.includes.preloader')
    <!-- Main Header -->
    @include('guest.pages.home.includes.main-header')
    <!-- Tra cứu -->
    <br/>
    <div class="tracuu text-center container">
        <h2>Tra Thông Tin Dịch Vụ</h2><br/>
        <p>Nhập <b>tên khách hàng hoặc số điện thoại</b> để tra cứu thông tin: Thông tin khách hàng, thông tin dịch vụ đã sử dụng, trạng thái bảo hành - hỗ trợ,..v.v</p><br/>
        <div class="input-group">
        <input type="search" id="search" class="form-control" placeholder="Nhập tên khách hàng, tên công ty hoặc số điện thoại"><button class="btn btn-outline-secondary p-1" id="btn-search">Tra cứu</button>
        </div>
        <table class="table table-striped table-hover" id="project-table">

        </table>
    </div>
    <!--Service-->
    @include('guest.pages.home.includes.service')
    @include('guest.pages.home.includes.modal')
  

@endsection



@section('jsGuest')
<script src="{{asset('app/guest/home/home.js')}}"></script>
<script>
  var home=new home();
      home.datas={
        routes:{
          datatable:"{{route('guest.datatables.home')}}",
          get_data_project:"{{route('guest.get_data_project.home')}}",
          get_user:"{{route('admin.get_user.project')}}",
          get_service:"{{route('admin.get_service.project')}}",
        }
      }
      home.init();
</script>
@endsection