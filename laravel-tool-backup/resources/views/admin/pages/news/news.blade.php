@extends('admin.layouts.main') 
@section('main')
<!--app-content open-->
<div class="main-content app-content mt-0">
    <div class="side-app">

        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            <!-- PAGE-HEADER -->
            <div class="page-header">
                <h1 class="page-title">Quản lý tin tức</h1>
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Trang chủ</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tin tức</li>
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
                                <table class="table table-bordered text-nowrap border-bottom" id="news-datatable">
                                </table>
                                @include('admin.pages.news.modal')
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
<script src="{{asset('app/Admin/news/news.js')}}"></script>
<script src='{{asset('themes/admin/assets/plugins/fullcalendar/moment.min.js')}}'></script>
<!--  Quill Editor -->
<script src="{{asset('themes/admin/assets/plugins/quill/quill.min.js')}}"></script>
<!--  Validate -->
<script src="{{ asset('themes/admin/assets/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="{{ asset('themes/admin/assets/plugins/jquery-validation/additional-methods.min.js')}}"></script>

<script>
  var news=new news();
        news.datas={
        routes:{
          datatable:"{{route('admin.news.getDatatable')}}",
          insert: "{{route('admin.news.insert')}}",
          get_update:"{{route('admin.news.getUpdate')}}",
          update:"{{route('admin.news.postUpdate')}}",
          delete:"{{route('admin.news.delete')}}",
          get_insert: "{{route('admin.news.getInsert')}}",
          get_category: "{{route('admin.news.getCategory')}}",
          load_slug: "{{route('admin.news.checkSlug')}}",
        }
      }
      news.init();
    
</script>
@endsection
