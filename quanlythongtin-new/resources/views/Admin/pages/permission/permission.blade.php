@extends('Admin.layouts.main') 
@section('main')
<!--app-content open-->
<div class="main-content app-content mt-0">

    <div class="side-app">

        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            <!-- PAGE-HEADER -->
            <div class="page-header">
                <h1 class="page-title">Quản lý phòng ban</h1>
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Trang chủ</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Phòng ban</li>
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
                    <button class="btn btn-info btn-block" id="formSearch">Tra cứu</button>
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-success btn-block" id="btn-insert"><i class="fa fa-plus" aria-hidden="true"></i> Thêm Mới</button>
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
                                <table class="table table-bordered text-nowrap border-bottom" id="table-permission">
                                </table>
                                @include('Admin.pages.permission.modal')
                            </div>
                        </div>
                    </div>
            </div>
            <!-- End Row -->

        </div>
        <!-- CONTAINER CLOSED -->

    </div>
</div>
<!--app-content closed-->
@endsection
@section('jsAdmin')
<script src="{{asset('app/Admin/permission/permission.js')}}"></script>
<script>
  
    var permission = new permission(); 
            permission.datas={
                routes:{
                    datatable:"{{route('permission_datatable')}}",
                    insert:"{{route('permission_insert')}}",
                    update:"{{route('permission_update')}}",
                    delete:"{{route('permission_delete')}}"
                }
            }   
            permission.init();
          
    </script>
@endsection
