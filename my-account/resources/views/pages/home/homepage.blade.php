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
           <div class="row row-note">
            <div class="col-md-12">
                <div class="bg-primary-gradient rounded-3 fw-semibold fs-5  p-2 mb-3"> Note hôm nay</div>
            </div>
            @foreach ($notes as $notenow)
               <div class="col-lg-6 col-md-6 col-sm-12 col-xxl-3">
                   <div class="card overflow-hidden">
                       <div class="card-body card-home">
                           <div class="d-flex mb-3">
                               <div class="mt-2" style="width:70%">
                                   <h4 class="mb-0 text-dark fw-semibold">{{$notenow->title}}</h4>
                               </div>
                               <div class="ms-auto">

                                @if ($notenow->status == "2")
                                    <span class="badge bg-success-transparent rounded-pill text-success p-2 px-3">Done</span>
                                @endif
                                @if ($notenow->status == "1")
                                    <span class="badge bg-warning-transparent rounded-pill text-warning p-2 px-3">Processing</span>
                                @endif
                                @if ($notenow->status == "0")
                                    <span class="badge bg-danger-transparent rounded-pill text-danger p-2 px-3">Cancel</span>
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
           <div class="row row-task rounded-3 mb-3">
            <div class="col-md-12 p-0">
                <div class="bg-primary-gradient rounded-3 fw-semibold fs-5  p-2"> Công việc của bạn</div>
            @foreach ($tasks as $listTask)
                   <div class="card overflow-hidden bg-info-transparent m-3">
                       <div class="card-body card-home p-3">
                           <div class="d-flex">
                               <div class="mt-2" style="width:70%">
                                   <h4 class="mb-0 text-dark fw-semibold">{{$listTask->nametask}}</h4>
                               </div>
                               <div class="ms-auto">
                                    @if ($listTask->status == "2")
                                        <span class="badge bg-success rounded-pill  px-3">Đã hoàn thành</span>
                                    @endif
                                    @if ($listTask->status == "1")
                                        <span class="badge bg-warning rounded-pill px-3">Đang thực hiện</span>
                                    @endif
                                    @if ($listTask->status == "0")
                                        <span class="badge bg-danger rounded-pill  px-3">Trễ Deadline</span>
                                    @endif
                                    <a href="#" class="badge bg-primary-gradient rounded-pill p-2 px-3">Chi tiết</a>
                               </div>
                           </div>
                           <div class="my-3">
                            <p class=""> Thời gian: {{$listTask->startdate}} - {{$listTask->enddate}}</p>
                            <p class="user-join">Thực hiện:
                                @php
                                    $userJoins = explode(',', str_replace(['{', '}'], '', $listTask->userjoin));
                                @endphp
                                @foreach($userJoins as $userJoin)
                                    <span class="badge bg-danger-transparent text-dark">{{ trim($userJoin) }}</span>
                                @endforeach
                            </p>
                           </div>
                           <div class="progress" role="progressbar"
                                    aria-valuenow="{{$listTask->progress}}" aria-valuemin="0" aria-valuemax="100">
                                <div class="progress-bar bd-teal-500" style="width: {{$listTask->progress}}%;">{{$listTask->progress}}%</div>
                            </div>

                       </div>
                   </div>
            @endforeach
            </div>
            @include('pages.home.modal')
           </div>

@endsection
@section('js')
<script src="{{ asset('app/main.js') }}"></script>
<script>
    var user = "{{$user->permission}}";
    if(user == 1){
        var routeHome = {
                getnote: "{{route('admin.note.update')}}",
        }
    }else{
        var routeHome = {
                getnote: "{{route('guest.note.update')}}",
        }
    }

</script>
<script>
    function getNote(id){
        $.ajax({
            url:routeHome.getnote,
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
