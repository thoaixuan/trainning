<div class="modal fade" id="ModalNewUser" tabindex="-1" aria-labelledby="ModalNewUser" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">&times;</button>
            </div>
            <div class="modal-body">
                <form id="form-add-users">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="main-avatar">
                                <input type="file" class="ImageNoAvatar" name="avatar" id="avatar_input">
                                <div class="show-avatar">
                                    <img id="img-upload" src="" alt="">
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row card-custom">
                        <div class="col-md-6">
                            <label for="inputName" class="form-label">Họ và tên <span>*</span></label>
                            <input type="text" name="fullname" class="form-control" id="inputName" placeholder="Họ và tên"
                                aria-label="fullname">
                        </div>
                        <div class="col-md-6">
                            <label for="inputPhone" class="form-label">Số điện thoại <span>*</span></label>
                            <input type="text" class="form-control" name="phone" id="inputPhone"
                                placeholder="Số điện thoại" aria-label="phone">
                        </div>
                        <div class="col-md-6 mt-2">
                            <label for="inputEmail" class="form-label">Email <span>*</span></label>
                            <input type="email" name="email" class="form-control" id="inputEmail"
                                placeholder="email">
                        </div>
                        <div class="col-md-6 mt-2">
                            <label for="inputBirthDate" class="form-label">Ngày sinh</label>
                            <input type="date" name="birthdate" class="form-control" id="inputBirthDate">
                        </div>
                        <div class="col-md-6 mt-2">
                            <label for="inputSex" class="form-label">Giới tính</label>
                            <select name="sex" id="inputSex" class="form-select form-select-lg">
                                <option value="male">Nam</option>
                                <option value="female">Nữ</option>
                                <option value="other">Khác</option>
                            </select>
                        </div>
                        <div class="col-md-6 mt-2">
                            <label for="inputStatus" class="form-label">Trạng thái <span>*</span></label>
                            <select name="status" id="inputStatus" class="form-select form-select-lg">
                                <option value="" selected>Trạng thái...</option>
                                <option value="1">Hoạt động</option>
                                <option value="0">Ngừng hoạt động</option>
                            </select>
                        </div>
                        <div class="col-md-6 mt-2">
                            <label for="inputPermission" class="form-label">Chức vụ <span>*</span></label>
                            <select name="permission" id="inputPermission" class="form-select form-select-lg">
                                <option value="" selected>Chức vụ...</option>
                                <option value="1">Quản trị viên</option>
                                <option value="2">Quản lý </option>
                                <option value="3">Nhân viên</option>
                                <option value="4">Thực tập</option>
                            </select>
                        </div>
                        <div class="col-md-6 mt-2">
                            <label for="inputDepartment" class="form-label">Phòng ban <span>*</span></label>
                            <select name="department" id="inputDepartment" class="form-select form-select-lg">
                                <option value="" selected>Phòng ban...</option>
                                <option value="1"> Phòng IT</option>
                                <option value="2">Phòng nhân sự</option>
                                <option value="3">Phòng kế toán</option>
                                <option value="3">Phòng kinh doanh</option>
                            </select>
                        </div>
                        <div class="col-md-6 mt-2">
                            <label for="inputPassword" class="form-label">Mật khẩu <span>*</span></label>
                            <input type="password" name="password" class="form-control" id="inputPassword"
                                placeholder="Mặc định: 123456">
                        </div>
                        <div class="col-md-6 mt-2">
                            <label for="inputRePassword" class="form-label">Xác nhận mật khẩu <span>*</span></label>
                            <input type="password" name="repassword" class="form-control" id="inputRePassword"
                                placeholder="Xác nhận mật khẩu">
                        </div>
                        <div class="col-12 mt-2">
                            <label for="inputCity" class="form-label">Địa chỉ</label>
                            <input type="text" class="form-control" id="inputCity" placeholder="Địa chỉ">
                        </div>
                    </div>
                    <div class="col-12">
                        <button id="btnAddUsers" type="submit" class="btn btn-primary" data-url=""
                            data-id="">Cập nhật</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal Detail -->
<div class="modal fade" id="ModalDetail" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center">Thông tin tài khoản </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="main-avatar">
                            <div class="show-avatar" id="view_avatar">
                                <img id="img-show" src="" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row p-3">
                    <div class="col-lg-4 col-md-6  mt-3">
                        <div class="form-group">
                            <span class="fw-bold">Họ và tên: </span> <span id="view_fullname"></span>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mt-3">
                        <div class="form-group">
                            <span class="fw-bold">Giới tính: </span> <span id="view_sex"></span>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mt-3">
                        <div class="form-group">
                            <span class="fw-bold">Ngày sinh: </span> <span id="view_birthdate"></span>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6  mt-3">
                        <div class="form-group">
                            <span class="fw-bold">Email: </span> <span id="view_email"></span>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mt-3">
                        <div class="form-group">
                            <span class="fw-bold">Số điện thoại: </span> <span id="view_phone"></span>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mt-3">
                        <div class="form-group">
                            <span class="fw-bold">Trạng thái: </span> <span id="view_status"></span>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mt-3">
                        <div class="form-group">
                            <span class="fw-bold">Chức vụ: </span> <span id="view_permission"></span>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mt-3">
                        <div class="form-group">
                            <span class="fw-bold">Phòng ban: </span> <span id="view_department"></span>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 my-3">
                        <div class="form-group">
                            <span class="fw-bold">Địa chỉ: </span> <span id="view_address"></span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
