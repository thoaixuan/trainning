@extends('layouts.main')
@section('main')
           <!-- PAGE-HEADER -->
           <div class="page-header">
             <h1 class="page-title my-auto">Xin chào {{$user->name}}</h1>
             <div>
               <ol class="breadcrumb mb-0">
                 <li class="breadcrumb-item">
                   <a href="javascript:void(0)">Home</a>
                 </li>
                 <li class="breadcrumb-item active" aria-current="page">Dashboard 01</li>
               </ol>
             </div>
           </div>
           <!-- PAGE-HEADER END -->

           <!-- ROW-1 -->
           <div class="row">
            @foreach ($notes as $notenow)
               <div class="col-lg-6 col-md-6 col-sm-12 col-xxl-3">
                   <div class="card overflow-hidden">
                       <div class="card-body card-home">
                           <div class="d-flex mb-3">
                               <div class="mt-2" style="width:70%">
                                   <h3 class="mb-0 text-dark fw-semibold">{{$notenow->title}}</h3>
                               </div>
                               <div class="ms-auto">

                                @if ($notenow->status == "Done")
                                    <span class="badge bg-success-transparent rounded-pill text-success p-2 px-3">{{$notenow->status}}</span>
                                @endif
                                @if ($notenow->status == "Processing")
                                    <span class="badge bg-warning-transparent rounded-pill text-warning p-2 px-3">{{$notenow->status}}</span>
                                @endif
                                @if ($notenow->status == "Cancel")
                                    <span class="badge bg-danger-transparent rounded-pill text-danger p-2 px-3">{{$notenow->status}}</span>
                                @endif
                               </div>
                           </div>
                           <h6 class="fw-normal mb-3">{!! $notenow->description !!}</h6>
                           <div class="btn-view">
                            <a href="#" id="viewModal" data-bs-toggle="modal" data-bs-target="#modalHome" onclick="getNote({{ $notenow->id }})" class="btn btn-primary btn-wave waves-effect waves-light">See More</a>
                           </div>
                       </div>
                   </div>
               </div>
            @endforeach
            @include('pages.home.modal')
           </div>
           <!-- ROW-1 END -->

@endsection
@section('js')
<script src="{{ asset('app/main.js') }}"></script>
<script>
    function getNote(id){
        console.log(id);
        $.ajax({
            url: '/mynote/update',
            method: 'GET',
            data:{id: id},
            success: function(data) {
                CKEDITOR.instances.descriptionHome.setData(data.data.description);
                $('#titleHome').val(data.data.title);
                $('#statusHome').val(data.data.status);
            }
        });
    }
    CKEDITOR.replace('descriptionHome');
</script>
@endsection
