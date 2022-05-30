
 <!-- Modal Create -->
 <div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-xl">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="ModalLabel">Thêm mới user</h5>
              
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fa fa-xmark"></i></button>

                  </div>
                  <div class="modal-body">
                    <form id="userForm" name="userForm"> 
                    <?php echo csrf_field(); ?>
           
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
                                  <label for="gender" class="d-block">Giới tính</label>
                                  <select id="gender" name="gender" style="width:100%" class="form-control">
                                  <option value="0">Nam</option>
                                  <option value="1">Nữ</option>
                                  </select>
                              </div>
                            </div>
                            <div class="col-md-6">
                               <div class="form-group">
                                  <label for="room_id" class="d-block">Phòng ban</label>
                                  <select id="room_id" name="room_id" style="width:100%" class="form-control">
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
                            <input id="cover" type="file" name="cover" class="form-control"/>
                          </div>
                       </div>
                       <div class="col-md-6">
                          <div class="form-group">
                            <label for="image">Chứng minh thư mặt sau</label>
                            <input id="cover_after" type="file" name="cover_after" class="form-control"/>
                          </div>
                       </div>
                     </div>
                   
                        </div>
                        <div class="col-6">
                          <div class="row">
                            <div class="col-md-5">
                            <div class="form-group">
                              <label for="email ">Email</label>
                              <input type="text" name="email" id="email" class="form-control" />
                            </div> 
                            </div>
                            <div class="col-md-7">
                            <div class="form-group">
                              <label for="password ">Mật khẩu <span id="spanPassword" style="color:red"> </span></label>
                              <input type="password" name="password" id="password" class="form-control" />
                            </div> 
                            </div>
                          </div>
                        
                      <div class="row">
                      <div class="col-md-6">
                          <div class="form-group">
                          <label for="status" class="d-block">Trạng thái</label>
                            <select id="status" name="status" style="width:100%" class="form-control">
                              <option value=0>Đang làm việc</option>
                              <option value=1>Nghỉ việc</option>
                              <option value=1>Đình chỉ</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="status" class="d-block">Chức vụ</label>
                              <select id="permission_id" name="permission_id" style="width:100%" class="form-control">
                              </select>
                          </div>
                        </div>
                     
                      </div>
                      <div class="form-group ck-editor">
                                <label for="description">Mô tả</label>
                                <textarea name="description" class="form-group" id="description" rows="8"></textarea>
                            </div>
                        </div>
                    </div>
                      <button id="submit" class="btn btn-success">Submit</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
        </div>

 <!-- Modal update -->
 



<!-- Modal Detail  -->

<div class="modal fade" id="userDetailModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thông tin user</h5>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fa fa-xmark"></i></button>

                  </div>
                  <div class="modal-body">
                    <div id="user_content" class="content">
                    <div ><p><b>Tên: </b></p><p id="ten"></p></div>
                    <div><p><b>Mô tả: </b></p><p id="mota"></p></div>
                    <div class="row">
                      <div class="col-md-6">
                    <div><p><b>Chứng minh nhân dân mặt trước: </b></p><img id="cmnd_before" width="200" height="100"></div>
                      </div>
                      <div class="col-md-6">
                    <div><p><b>Chứng minh nhân dân mặt sau: </b></p><img id="cmnd_after" width="200" height="100"></div>

                      </div>
                    </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>



<?php /**PATH C:\laragon\www\trainning\bai_5\quan-ly-thong-tin-nguoi-dung\resources\views/admin/pages/user/modal.blade.php ENDPATH**/ ?>