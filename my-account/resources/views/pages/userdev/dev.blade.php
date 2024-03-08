@extends('layouts.main')
@section('main')
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
                            <div class="col-lg-3 col-md-6 mb-2">
                                <input type="text" class="form-control" id="search" placeholder="Tìm kiếm...">
                            </div>
                            <div class="col-lg-3 col-md-6 mb-2">
                                <select class="form-select" name="searchDepartment" id='search-department'>
                                    <option value="" selected>Phòng ban...</option>
                                    <option value="1"> Phòng IT</option>
                                    <option value="2">Phòng nhân sự</option>
                                    <option value="3">Phòng kế toán</option>
                                    <option value="3">Phòng kinh doanh</option>
                                </select>
                            </div>
                            <div class="col-lg-3 col-md-6 mb-2">
                                <select class="form-select" name="searchPermission" id='search-permission'>
                                    <option value="" selected>Chức vụ...</option>
                                    <option value="1">Quản trị viên</option>
                                    <option value="2">Quản lý </option>
                                    <option value="3">Nhân viên</option>
                                    <option value="4">Thực tập</option>
                                </select>
                            </div>
                            <div class="col-lg-3 col-md-6 mb-2">
                                <button id="addNewUsers" class="btn btn-add-new btn-primary mb-2 w-100">Thêm mới</button>
                           </div >
                        </div>
                        <div class="table-responsive">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="table-userdev"
                                        class="table table-bordered text-nowrap w-100 dataTable no-footer"
                                        aria-describedby="add-row_info"></table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('pages.users.modal')
        </div>
@endsection
@section('js')
    <script>
        var routeDev = {
            table: "{{route('admin.userdev.index')}}",
        };
    </script>
    <script src="{{ asset('app/main.js') }}"></script>
    <script src="{{ asset('app/userdev/dev.js') }}"></script>

@endsection
