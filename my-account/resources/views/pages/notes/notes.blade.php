@extends('layouts.main')
@section('main')
            <!-- PAGE-HEADER -->
            <div class="page-header">
                <h1 class="page-title my-auto">Note của {{$user->name}}</h1>
                <div>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item">
                            <a href="javascript:void(0)">Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">My Notes</li>
                    </ol>
                </div>
            </div>
            <!-- PAGE-HEADER END -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="card custom-card">
                        <div class="card-header">
                            <div class="card-title">
                                Note List
                            </div>
                        </div>
                        <div class="card-body card-table">
                            <div class="row row-sm mb-3">
                                <div class="col-md-4 mb-2">
                                    <input type="text" class="form-control" id="search" placeholder="Search...">
                                </div>
                                <div class="col-md-3 mb-2">
                                    <button type="button" id="addNew" class="btn btn-add-new btn-primary mb-2 w-100">Add new
                                        note</button>
                               </div >
                            </div>
                            <div class="table-responsive">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="table-note"
                                            class="table table-bordered text-nowrap w-100 dataTable no-footer"
                                            aria-describedby="add-row_info"></table>
                                    </div>
                                </div>

                            </div>
                            @include('pages.notes.modal')
                        </div>
                    </div>
                </div>
            </div>
@endsection
@section('js')
    <script>
        var user = "{{$user->permission}}";
        if(user == 1){
            var routeNote = {
            table: "{{route('admin.note.table')}}",
            createPost: "{{route('admin.note.createpost')}}",
            update: "{{route('admin.note.update')}}",
            updatePost: "{{route('admin.note.updatepost')}}",
            delete: "{{route('admin.note.delete')}}",
            };
        } else {
            var routeNote = {
            table: "{{route('guest.note.table')}}",
            createPost: "{{route('guest.note.createpost')}}",
            update: "{{route('guest.note.update')}}",
            updatePost: "{{route('guest.note.updatepost')}}",
            delete: "{{route('guest.note.delete')}}",
            }
        }

    </script>
    <script src="{{ asset('app/main.js') }}"></script>
    <script src="{{ asset('app/note/note.js') }}"></script>
@endsection
