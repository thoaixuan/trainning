@extends('Admin.layouts.main') 
@section('main')
<!--app-content open-->
<div class="main-content mr-1">
    <div class="side-app">

        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            <!-- PAGE-HEADER -->
            <div class="page-header position-relative">
                <h1 class="page-title" >Thống kê thị trường bất động sản </h1>
                <div class=" position-absolute top-50 start-50 translate-middle-y"><span id="time"></span></div>
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Trang chủ</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Bất động sản </li>
                    </ol>
                </div>

            </div>
            <!-- PAGE-HEADER END -->
            <div class="row row-sm">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                <div class="col-md-2">
                    <input type="text" class="form-control" id="search">
                </div>
           
                <div class="col-md-8 row">
                    <div class="col-md-4">
                    <select class="form-select" aria-label="Default select example" id="tinh">
                        <option value="" disabled>--Tỉnh--</option>
                        <option value=0 selected >--Tất cả--</option>
                    </select>
                    </div>
                    <div class="col-md-4">
                    <select class="form-select" aria-label="Default select example" id="huyen">
                        <option  value="" selected disabled>--Huyện--</option>
                    </select>
                    </div>
                    <div class="col-md-4">
                    <select class="form-select" aria-label="Default select example" id="xa">
                        <option value="" selected disabled>--Xã--</option>
                    </select>
                    </div>
              
                </div>
<!-- 
                <div class="col-md-2">
                <select class="form-select" aria-label="Default select example" id="dientich">
                    <option value=""  disabled>--Diện tích--</option>
                    <option value="" selected >--Tất cả--</option>
                </select>
                </div>

                <div class="col-md-2">
                <select class="form-select" aria-label="Default select example" id="gia">
                    <option value=""  disabled>--Giá tiền--</option>
                    <option value="" selected >--Tất cả--</option>
                </select>
                </div>
             -->
                <div class="col-md-2">
                    <button class="btn btn-info btn-block" id="btn_search">Tra cứu</button>
                </div>
                </div>
                </div>
            </div>
            </div>
            <!-- Row -->
            <div class="row row-sm">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered text-nowrap border-bottom" id="datatable">
                                </table>
                                @include('Admin.pages.dashboard.modal')

                            </div>
                        </div>
                    </div>
            </div>
            <!-- End Row -->

        </div>
        <!-- CONTAINER CLOSED -->

    </div>
</div>
@endsection
<script src="{{asset('themes/admin/assets/js/jquery.min.js')}}"></script>
<script src="{{asset('themes/admin/assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('themes/admin/assets/plugins/datatable/js/dataTables.bootstrap5.js')}}"></script>
<script src="{{asset('app/Admin/dashboard/dashboard.js')}}"></script>
@section('jsAdmin')
<script>
  var dashboard=new dashboard();
        dashboard.datas={
        routes:{
            datatable:"{{route('admin.dashboard.datatable')}}",
            get_province:"{{route('admin.dashboard.get-province')}}",
            get_district:"{{route('admin.dashboard.get-district')}}",
            get_ward:"{{route('admin.dashboard.get-ward')}}",
            get_price:"{{route('admin.dashboard.get-price')}}",
            get_area:"{{route('admin.dashboard.get-area')}}",
            get_data:"{{route('admin.dashboard.get-data')}}",
        }
      }
      dashboard.init();
    
</script>
@endsection
