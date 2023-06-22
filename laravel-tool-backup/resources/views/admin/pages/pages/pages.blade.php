@extends('admin.layouts.main')

@section('main')
<div class="main-content app-content mt-0">
    <div class="side-app">

        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            <!-- PAGE-HEADER -->
            <div class="page-header">
                <h1 class="page-title">Quản lý trang</h1>
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Trang chủ</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Trang</li>
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
                    <button class="btn btn-success btn-block" id="open" type="button">Tạo mới</button>
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
                                <table class="table table-bordered border text-nowrap mb-0" id="table-pages">
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
@include('admin.pages.pages.modal')
@endsection
@section('jsAdmin')
<script src="{{asset('app/admin/page/page.js')}}"></script>
<script>
var page = new page(); 
	    page.datas={
	        routes:{
                datatable:"{{route('admin.page.datatables')}}",
                fetchUpdate:"{{route('admin.page.fetch_update')}}",
                insert:"{{route('admin.page.insert')}}",
	            update:"{{route('admin.page.update')}}",
                delete:"{{route('admin.page.delete')}}",
                load_slug: "{{route('admin.page.checkSlug')}}"
	        }
	    }   
	    page.init();

      
</script>
@endsection

