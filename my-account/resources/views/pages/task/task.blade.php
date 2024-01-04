@extends('layouts.main')
@section('main')
            <!-- PAGE-HEADER -->
            <div class="page-header">
                <h1 class="page-title my-auto">Công việc của {{$user->name}}</h1>
                <div>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item">
                            <a href="javascript:void(0)">Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">My Task</li>
                    </ol>
                </div>
            </div>
            <!-- PAGE-HEADER END -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="card custom-card">
                        <div class="card-header">
                            <div class="card-title">
                                Danh sách công việc
                            </div>
                        </div>
                        <div class="card-body card-table">
                            <div class="row row-sm mb-3">
                                <div class="col-md-4 mb-2">
                                    <input type="text" class="form-control" id="search" placeholder="Search...">
                                </div>
                                <div class="col-md-3 mb-2">
                                    <button class="btn btn-primary w-100" id="formSearch">Search</button>
                                </div>
                                <div class="col-md-3 mb-2">
                                    <button type="button" id="addNew" class="btn btn-add-new btn-primary mb-2 w-100">Add new
                                        note</button>
                               </div >
                            </div>
                            <div class="table-responsive">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="table-task"
                                            class="table table-bordered text-nowrap w-100 dataTable no-footer"
                                            aria-describedby="add-row_info"></table>
                                    </div>
                                </div>

                            </div>
                            @include('pages.task.modal')
                        </div>
                    </div>
                </div>
            </div>
@endsection
@section('js')
    <script>
        var user = JSON.parse(localStorage.getItem("infoUser"));
        var routeTask = {
            table: "{{route('admin.task.table')}}",
            createPost: "{{route('admin.task.createpost')}}",
            update: "{{route('admin.task.update')}}",
            updatePost: "{{route('admin.task.updatepost')}}",
            delete: "{{route('admin.task.delete')}}",
            }
    </script>
    <script src="{{ asset('app/main.js') }}"></script>
    <script src="{{ asset('app/task/task.js') }}"></script>
@endsection
