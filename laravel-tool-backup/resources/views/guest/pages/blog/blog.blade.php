@extends('guest.layouts.main')
@section('main')
<div class="bg-landing pt-3">
<div class="container-sm">
    <h1 class="text-center">Tin tức</h1>
    <!-- ROW-1 OPEN -->
<div class="row mt-5">

    <!-- COL-END -->
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-8">
    @include('guest.components.news.list_post')    
        <div class="mb-9">
            <div class="float-end">
                <ul class="pagination ">
                    {{ $news->links() }}
                </ul>
            </div>
        </div>
    </div>
    <!-- COL-END -->
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
                <div class="card-title">Bài viết gần đây</div>
            </div>
              <!-- card body fetch data news is des -->
                     @include('guest.components.news.rencent_post')    
                <!-- card body fetch data news is des -->
                
        </div>

    </div>
</div>
<!-- ROW-1 CLOSED -->
</div>
</div>
@endsection
@section('jsGuest')

@endsection