@extends('Admin.layouts.main') 
@section('main')
<!--app-content open-->
<div class="main-content app-content mt-0">
    <div class="side-app">

        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            <!-- PAGE-HEADER -->
            <div class="page-header">
                <h1 class="page-title">Quản lý bất động sản </h1>
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
                <div class="col-md-4">
                    <input type="text" class="form-control" id="search">
                </div>
                <div class="col-md-2">
                    <button class="btn btn-info btn-block" id="btn_search">Tra cứu</button>
                </div>
                <div class="col-md-2">
                    <button class="btn btn-success btn-block" id="open" type="button" data-bs-toggle="modal" data-bs-target="#myModal">Tạo mới</button>
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
        }
      }
      dashboard.init();
    
</script>
@endsection
