@extends('guest.layouts.main')
@section('main')
<div class="bg-landing pt-3">
    <div class="container">
        <div class="row mt-5">
            <div class="col-xl-8">
                <div class="card">
                    <div class="card-body">
                        <h3><a href="javascript:void(0)">{{$page->name}}</a></h3>
                        <p class="card-text">
                            {!!$page->content!!}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('guest.pages.pages.modal')
@endsection
@section('jsGuest')
<script src='{{asset('themes/admin/assets/plugins/fullcalendar/moment.min.js')}}'></script>
<!--  Quill Editor -->
<script src="{{asset('themes/admin/assets/plugins/quill/quill.min.js')}}"></script>
<!--  Validate -->
<script src="{{ asset('themes/admin/assets/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="{{ asset('themes/admin/assets/plugins/jquery-validation/additional-methods.min.js')}}"></script>
@if(Auth::check() && Auth::user()->type == "AdminSystem")
<script src="{{asset('app/admin/main.js')}}"></script>
<script src="{{asset('app/guest/page/page.js')}}"></script>

<script>
var updateID = "{{$page->id}}";
var page = new page(); 
    page.datas={
        routes:{
            fetchUpdate:"{{route('admin.page.fetch_update')}}",
            update:"{{route('admin.page.update')}}",
            load_slug: "{{route('admin.page.checkSlug')}}"
        }
    }   
page.init();          
</script>
@endif
@endsection