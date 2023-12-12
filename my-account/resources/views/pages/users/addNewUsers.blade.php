@extends('layouts.main')
@section('main')

        <div class="page-header">
            <h1 class="page-title my-auto" id="page-title">Tạo tài khoản mới!</h1>
            <div>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item">
                        <a href="javascript:void(0)">Home</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Users</li>
                </ol>
            </div>
        </div>
        <div class="row add-users">
            <div class="card custom-card">
                <div class="card-header">
                    <i class="las la-user-plus"></i>
                    <div class="card-title">
                        Thông tin tài khoản
                    </div>
                </div>
                <div class="card-body">
                    <form class="row g-3 mt-0" id="form-add-users">
                        @csrf
                        <div class="col-md-6">
                            <label for="inputName" class="form-label">Họ và tên <span>*</span></label>
                            <input type="text" class="form-control" name="fullname" id="inputName" placeholder="Họ và tên" aria-label="fullname">
                        </div>
                        <div class="col-md-6">
                            <label for="inputPhone" class="form-label">Số điện thoại <span>*</span></label>
                            <input type="text" class="form-control" name="phone" id="inputPhone" placeholder="Số điện thoại" aria-label="phone">
                        </div>
                        <div class="col-12">
                            <label for="inputEmail" class="form-label">Email <span>*</span></label>
                            <input type="email" name="email"  class="form-control" id="inputEmail" placeholder="email">
                        </div>
                        <div class="col-12">
                            <label for="inputPassword" class="form-label">Mật khẩu <span>*</span></label>
                            <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Mật khẩu">
                        </div>
                        <div class="col-12">
                            <label for="inputRePassword" class="form-label">Xác nhận mật khẩu <span>*</span></label>
                            <input type="password" name="repassword" class="form-control" id="inputRePassword" placeholder="Xác nhận mật khẩu">
                        </div>
                        <div class="col-md-6">
                            <label for="inputPermission" class="form-label">Nhóm quyền <span>*</span></label>
                            <select name="permission"  id="inputPermission" class="form-select form-select-lg">
                                <option value="" selected>Quyền...</option>
                                <option value="1">Quản trị viên</option>
                                <option value="2">Quản lý nội dung</option>
                                <option value="3">Người dùng</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="inputStatus" class="form-label">Trạng thái <span>*</span></label>
                            <select name="status"  id="inputStatus" class="form-select form-select-lg">
                                <option value="" selected>Trạng thái...</option>
                                <option value="1">Hoạt động</option>
                                <option value="0">Ngừng hoạt động</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label for="inputCity" class="form-label">Địa chỉ</label>
                            <input type="text" class="form-control" id="inputCity" placeholder="Địa chỉ">
                        </div>
                        <div class="col-12">
                            <button id="btnAddUsers" type="submit" class="btn btn-primary" data-url="" data-id="">Cập nhật</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection
@section('js')
<script>
    var routeUsers = {
        table: "{{route('admin.users.table')}}",
        createPost: "{{route('admin.users.createpost')}}",
        index: "{{route('admin.users.index')}}",
    };
</script>
    <script src="{{ asset('app/main.js') }}"></script>
    <script src="{{ asset('app/users/users.js') }}"></script>
@endsection