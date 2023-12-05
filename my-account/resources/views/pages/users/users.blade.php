@extends('layouts.main')
@section('main')
<div class="main-content app-content">
    <div class="container-fluid">

        <!-- PAGE-HEADER -->
        <div class="page-header">
            <h1 class="page-title my-auto">Chào mừng bạn quay trở lại!</h1>
            <div>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item">
                        <a href="javascript:void(0)">Home</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Users</li>
                </ol>
            </div>
        </div>
        <!-- PAGE-HEADER END -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card custom-card">
                    <div class="card-header">
                        <div class="card-title">
                            Danh sách tài khoản
                        </div>
                    </div>
                    <div class="card-body card-table">
                        <div class="row row-sm mb-3">
                            <div class="col-md-4 mb-2">
                                <input type="text" class="form-control" id="search" placeholder="Tìm kiếm...">
                            </div>
                            <div class="col-md-3 mb-2">
                                <select class="form-select mb-3" name="status" id='status'>
                                    <option value="" selected>Trạng thái</option>
                                    <option value="Done">Hoạt động</option>
                                    <option value="Processing">Ngừng hoạt động</option>
                                </select>
                            </div>
                            <div class="col-md-3 mb-2">
                                <a href="{{route('users.create')}}" id="addNewUsers" class="btn btn-add-new btn-primary mb-2 w-100">Thêm mới</a>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
    <script>
        var routeUsers = {
            table: "{{route('users.table')}}",
            createPost: "{{route('users.createpost')}}",
            update: "{{route('users.update')}}",
            updatePost: "{{route('users.updatepost')}}",
            delete: "{{route('users.delete')}}",
        };
    </script>
    <script src="{{ asset('app/main.js') }}"></script>
    <script src="{{ asset('app/users/users.js') }}"></script>
@endsection
