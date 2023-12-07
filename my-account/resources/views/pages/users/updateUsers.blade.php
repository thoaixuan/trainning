@extends('layouts.main')
@section('main')
            <div class="page-header">
                <h1 class="page-title my-auto" id="page-title">Cập nhật thông tin tài khoản</h1>
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
                        <ul class="nav nav-pills mb-3 nav-justified tab-style-5 d-sm-flex d-block" id="pills-tab"
                            role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="info-users-tab" data-bs-toggle="pill"
                                    data-bs-target="#info-users" type="button" role="tab" aria-controls="info-users"
                                    aria-selected="true">
                                    <i class="las la-user-edit"></i>
                                    Thông tin tài khoản
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="info-pass-tab" data-bs-toggle="pill"
                                    data-bs-target="#info-pass" type="button" role="tab"
                                    aria-controls="info-pass" aria-selected="false" tabindex="-1">
                                    <i class="las la-user-lock"></i>
                                    Thay đổi mật khẩu
                                </button>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane text-muted active show" id="info-users" role="tabpanel"
                                aria-labelledby="info-users-tab" tabindex="0">
                                <h4 class="tab-title">Thay đổi thông tin </h4>
                                <form class="row g-3 mt-0" id="form-update-users">
                                    @csrf
                                    <div class="col-md-6">
                                        <label for="updateName" class="form-label">Họ và tên <span>*</span></label>
                                        <input type="text" class="form-control" name="fullname" id="updateName"
                                            placeholder="Họ và tên" aria-label="fullname" value="{{$data['name']}}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="updatePhone" class="form-label">Số điện thoại <span>*</span></label>
                                        <input type="text" class="form-control" name="phone" id="updatePhone"
                                            placeholder="Số điện thoại" aria-label="phone" value="{{$data['phone']}}">
                                    </div>
                                    <div class="col-12">
                                        <label for="updateEmail" class="form-label">Email <span>*</span></label>
                                        <input type="email" name="email" class="form-control" id="updateEmail" value="{{$data['email']}}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="updatePermission" class="form-label">Nhóm quyền <span>*</span></label>
                                        <select name="permission" id="updatePermission" class="form-select form-select-lg">
                                            <option value="1" {{($data['permission'] == '1') ? 'selected' : ''}}> Quản trị viên</option>
                                            <option value="2" {{($data['permission'] == '2') ? 'selected' : ''}}>Quản lý nội dung</option>
                                            <option value="3" {{($data['permission'] == '3') ? 'selected' : ''}}>Người dùng</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="updateStatus" class="form-label">Trạng thái <span>*</span></label>
                                        <select name="status" id="updateStatus" class="form-select form-select-lg">
                                            <option value="1" {{($data['status'] == '1') ? 'selected' : ''}}>Hoạt động</option>
                                            <option value="0" {{($data['status'] == '0') ? 'selected' : ''}}>Ngừng hoạt động</option>
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <label for="updateCity" class="form-label">Địa chỉ</label>
                                        <input type="text" class="form-control" id="updateCity" placeholder="Địa chỉ" value="{{$data['address']}}">
                                    </div>
                                    <div class="col-12">
                                        <button id="btnUpdateUsers" type="submit" class="btn btn-primary" data-url=""
                                            data-id="{{$data['id']}}">Cập nhật</button>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane text-muted" id="info-pass" role="tabpanel"
                                aria-labelledby="info-pass-tab" tabindex="0">
                                <h4 class="tab-title">Thay đổi mật khẩu </h4>
                                <form class="row g-3 mt-0" id="form-update-password">
                                    @csrf
                                    <div class="col-12">
                                        <label for="updatePassword" class="form-label">Mật khẩu <span>*</span></label>
                                        <input type="password" name="password" class="form-control" id="updatePassword">
                                    </div>
                                    <div class="col-12">
                                        <label for="inputRePassword" class="form-label">Xác nhận mật khẩu
                                            <span>*</span></label>
                                        <input type="password" name="repassword" class="form-control"
                                            id="inputRePassword" placeholder="Xác nhận mật khẩu">
                                    </div>
                                    <div class="col-12">
                                        <button id="btnUpdatePass" type="submit" class="btn btn-primary" data-url="{{ route('users.updatepost')}}"
                                            data-id="">Cập nhật</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection
@section('js')
    <script>
        var routeUsers = {
            table: "{{ route('users.table') }}",
            createPost: "{{ route('users.createpost') }}",
            index: "{{ route('users.index') }}",
            updatePost: "{{ route('users.updatepost') }}",
        };
    </script>
    <script src="{{ asset('app/main.js') }}"></script>
    <script src="{{ asset('app/users/users.js') }}"></script>
@endsection
