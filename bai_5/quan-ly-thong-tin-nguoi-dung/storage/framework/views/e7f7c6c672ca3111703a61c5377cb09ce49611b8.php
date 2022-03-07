<?php if(auth()->guard()->check()): ?>
<div class="modal fade"  id="info" class="modal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Thông tin cá nhân</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p><?php echo e(Auth::user()->full_name); ?></p>
        <hr/>
        <p><?php echo e(Auth::user()->phone_number); ?></p>
        <hr/>
        <p><?php echo e(Auth::user()->email); ?></p>

      </div>
      <div class="modal-footer">
        <a type="button" class="color-btn color-btn3" href="<?php echo e(route('guest.logout.home')); ?>">Đăng xuất</a>
      </div>
    </div>
  </div>
</div>
<!-- <?php if(Auth::user()->position==1): ?> -->
 <!-- Modal Update -->
 <div class="modal fade" id="userEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-xl">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cập nhật user</h5>
                    <button type="button" class="close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>

                  </div>
                  <div class="modal-body">
                    <form id="userEditForm" name="userEditForm" > 
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="id" id="id">
                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
                    <div class="row">
                        <div class="col-6">
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="full_name">Họ tên</label>
                                <input type="text" name="full_name" id="full_name" class="form-control" />
                              </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group">
                              <label for="phone_number">Số điện thoại</label>
                              <input type="text" name="phone_number" id="phone_number" class="form-control" />
                            </div>
                            </div>
                          </div>
                      
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                  <label for="status">Giới tính</label>
                                  <select id="gender_edit" class="form-control">
                                  <option value=0>Nam</option>
                                  <option value=1>Nữ</option>
                                  </select>
                              </div>
                            </div>
                            <div class="col-md-6">
                               <div class="form-group">
                                  <label for="status">Phòng ban</label>
                                  <select id="room_id_edit" class="form-control" disabled>
                                  </select>
                              </div>
                            </div>
                          </div>
                     
                      <div class="row">
                        <div class="col-md-6">
                        <div class="form-group">
                          <label for="date">Ngày sinh</label>
                          <input type="date" name="date" id="date" class="form-control" />
                        </div>  
                        </div>

                        <div class="col-md-6">
                        <div class="form-group">
                            <label for="date_start">Ngày vào làm</label>
                            <input type="date" name="date_start" id="date_start" class="form-control" />
                          </div> 
                        </div>
                      </div>
                     <div class="row">
                       <div class="col-md-6">
                          <div class="form-group">
                            <label for="image">Chứng minh thư mặt trước</label>
                            <input id="input-file-edit" type="file" name="cover" class="form-control" />
                          </div>
                       </div>
                       <div class="col-md-6">
                          <div class="form-group">
                            <label for="image">Chứng minh thư mặt sau</label>
                            <input id="input-file-after-edit" type="file" name="cover_after" class="form-control" />
                          </div>
                       </div>
                     </div>
                   
                        </div>
                        <div class="col-6">
                          <div class="row">
                            <div class="col-md-6">
                            <div class="form-group">
                              <label for="email">Email</label>
                              <input type="text" name="email" id="email" class="form-control" />
                            </div> 
                            </div>
                            <div class="col-md-6">
                            <div class="form-group">
                              <label for="password ">Mật khẩu</label>
                              <input type="text" name="password" id="password" class="form-control" disabled />
                            </div> 
                            </div>
                          </div>
                        
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="status">Chức vụ</label>
                              <select id="position_edit" class="form-control" disabled>
                                <option value=0>Nhân viên</option>
                                <option value=1>Quản lý</option>
                              </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                          <label for="status">Trạng thái</label>
                            <select id="action_edit" class="form-control">
                              <option value=0>Đang làm việc</option>
                              <option value=1>Nghỉ việc</option>
                              <option value=1>Đình chỉ</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="form-group ck-editor">
                                <label for="description">Mô tả</label>
                                <textarea name="description" class="form-group" id="user_description_edit" rows="8"></textarea>
                            </div>
                        </div>
                    </div>
                      <button id="#submit" class="btn btn-success">Update</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
        </div>


<!-- <?php endif; ?> -->
<?php endif; ?>
<?php /**PATH C:\teamcoder\www\trainning\bai_5\quan-ly-thong-tin-nguoi-dung\resources\views/guest/pages/home/modal.blade.php ENDPATH**/ ?>