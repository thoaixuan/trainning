@extends('guest.layouts.main')
@section('main')
<div class="bg-landing pt-3">
    <div class="container">
        <div class="row mt-5">
            <div class="col-xl-8">
                <div class="card">
                    <img class="card-img-top" src="/uploads/news/{{$news->image}}" alt="Card image cap">
                    <div class="card-body">
                        <div class="d-md-flex">
                            <a href="javascript:void(0);" class="d-flex me-4 mb-2" ><i class="fe fe-calendar fs-16 me-1 p-3 bg-secondary-transparent text-secondary bradius"></i>
                                <div class="mt-0 mt-3 ms-1 text-muted font-weight-semibold">{{fixDate($news->created_at)}}</div>
                            </a>
                            <div class="btn-list mt-2">
                                <a class="button_share share btn btn-facebook btn-sm" href="http://www.facebook.com/sharer/sharer.php?u={{route('guest.index')}}/blog/detail/{{ $news->slug }}"  target="_blank"><i class="fa fa-facebook"></i> Share</a>
                                 <!-- Googple Plus Share Button -->
                                 <a class="button_share share btn btn-gplus btn-sm" href="https://plus.google.com/share?url={{route('guest.index')}}/blog/detail/{{ $news->slug }}"  target="_blank"><i class="fa fa-google-plus"></i> Share</a>
                                <!-- Twitter Share Button -->
                                <a class="button_share share btn btn-twitter btn-sm" href="https://twitter.com/intent/tweet?text={{$news->name}}&url={{route('guest.index')}}/blog/detail/{{ $news->slug }}"  target="_blank"><i class="fa fa-twitter"></i> Tweet</a>
                                <!-- Pinterest Share Button -->
                                <a class="button_share share btn btn-pinterest btn-sm" href="http://pinterest.com/pin/create/button/?url={{route('guest.index')}}&description={{$news->name}}"  target="_blank"><i class="fa fa-pinterest"></i> Pin it</a>
                                <!-- LinkedIn Share Button -->
                                <a class="button_share share btn btn-linkedin btn-sm" href="http://www.linkedin.com/shareArticle?mini=true&url={{route('guest.index')}}/blog/detail/{{ $news->slug }}&title={{$news->name}}&source={{route('guest.index')}}/blog/detail/{{ $news->slug }}"  target="_blank"><i class="fa fa-linkedin"></i> LinkedIn</a>
                            </div>
                          
                        </div>
                    </div>
                    <div class="card-body">
                        <h1> {{$news->title}}</h1>
                        <p class="card-text">
                            {!!$news->content!!}
                        </p>
                       
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <!-- <div class="card">
                    <div class="card-body">
                        <div class="input-group">
                            <input type="text" class="form-control border-end-0" placeholder="Search ...">
                            <button class="btn input-group-text bg-transparent border-start-0 text-muted">
                                    <i class="fe fe-search" aria-hidden="true"></i>
                                </button>
                        </div>
                    </div>
                </div> -->

                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Danh mục</div>
                    </div>
                    <!-- fetch data categories  -->
                    @include('guest.components.news.category_post')
                    <!-- fetch data categories  -->

                </div>

                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Bài viết gần đây</div>
                    </div>
                    <!-- card body fetch data news is des -->
                    @include('guest.components.news.rencent_post')
                                    
                    <!-- card body fetch data news is des -->

                </div>
            </div>
        </div>
    </div>
</div>
@include('guest.pages.blog.modal')
@endsection
@section('jsGuest')
<script src="{{asset('app/admin/main.js')}}"></script>
<script src='{{asset('themes/admin/assets/plugins/fullcalendar/moment.min.js')}}'></script>
<!--  Quill Editor -->
<script src="{{asset('themes/admin/assets/plugins/quill/quill.min.js')}}"></script>
<!--  Validate -->
<script src="{{ asset('themes/admin/assets/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="{{ asset('themes/admin/assets/plugins/jquery-validation/additional-methods.min.js')}}"></script>

@if(Auth::check() && Auth::user()->type == "AdminSystem")
<script src="{{asset('app/guest/news/news.js')}}"></script>
<script>
var updateID = "{{$news->id}}";
var news=new news();
    news.datas={
    routes:{
    get_update:"{{route('admin.news.getUpdate')}}",
    update:"{{route('admin.news.postUpdate')}}",
    get_category: "{{route('admin.news.getCategory')}}",
    load_slug: "{{route('admin.news.checkSlug')}}",
    }
}
news.init();
</script>
@endif
@endsection