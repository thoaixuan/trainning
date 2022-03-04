
 
 <!-- Modal Create -->
 <div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-xl">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm mới user</h5>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fa fa-xmark"></i></button>

                  </div>
                  <div class="modal-body">
                    <form id="userForm" name="userForm"> 
                    @csrf
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <div class="row">
                        <div class="col-6">
                        <div class="form-group">
                          <label for="full_name">Họ tên</label>
                          <input type="text" name="full_name" class="form-control" />
                        </div>
                        
                        <div class="form-group">
                          <label for="status">Giới tính</label>
                          <select id="gender" class="form-control">
                          <option value=0>Nam</option>
                          <option value=1>Nữ</option>
                          </select>
                      </div>
                      <div class="form-group">
                          <label for="date">Ngày sinh</label>
                          <input type="date" name="date" class="form-control" />
                        </div>  
                      <div class="form-group">
                        <label for="date_start">Ngày vào làm</label>
                        <input type="date" name="date_start" class="form-control" />
                      </div> 
                      <div class="form-group">
                        <label for="phone_number">Số điện thoại</label>
                        <input type="text" name="phone_number" class="form-control" />
                      </div>
                     
                      <div class="form-group">
                        <label for="image">Chứng minh thư mặt trước</label>
                        <input id="input-file" type="file" name="cover" class="form-control"/>
                      </div>
                     
                        </div>
                        <div class="col-6">
                        <div class="form-group">
                        <label for="email ">Email</label>
                        <input type="text" name="email" class="form-control" />
                      </div>  

                      <div class="form-group">
                        <label for="status">Phòng ban</label>
                        <select id="room_id" class="form-control">
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="status">Chức vụ</label>
                        <select id="position" class="form-control">
                        <option value=0>Nhân viên</option>
                        <option value=1>Quản lý</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="status">Trạng thái</label>
                        <select id="action" class="form-control">
                        <option value=0>Đang làm việc</option>
                        <option value=1>Nghỉ việc</option>
                        <option value=1>Đình chỉ</option>
                        </select>
                      </div>
                      
                      <div class="form-group">
                        <label for="image">Chứng minh thư mặt sau</label>
                        <input id="input-file-after" type="file" name="cover_after" class="form-control"/>
                      </div>
                      <div class="form-group ck-editor">
                                <label for="description">Mô tả</label>
                                <textarea name="description" class="form-group" id="user_description" rows="8"></textarea>
                            </div>
                        </div>
                    </div>
                      <button id="#submit" class="btn btn-success">Submit</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
        </div>

 <!-- Modal update -->
 
 <!-- Modal Create -->
 <div class="modal fade" id="userEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-xl">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cập nhật user</h5>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fa fa-xmark"></i></button>

                  </div>
                  <div class="modal-body">
                    <form id="userEditForm" name="userForm"> 
                    @csrf 
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <input type="hidden" id="id">
                    <div class="row">
                        <div class="col-6">
                        <div class="form-group">
                        <label for="full_name">full_name</label>
                        <input type="text" name="full_name" id="full_name" class="form-control" />
                      </div>
                      <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" class="form-control" />
                      </div>
  
                      <div class="form-group">
                        <label for="address">Địa chỉ</label>
                        <input type="text" name="address" id="address" class="form-control" />
                      </div>
                   
                      <div class="form-group">
                        <label for="image">Chứng minh thư mặt trước</label>

                        <input id="input-file" type="file" name="cover" id="cover" class="form-control" />
                      </div>
                      <div class="form-group">
                        <label for="image">Chứng minh thư mặt sau</label>
                        <input id="input-file-after" type="file" id="cover_after" name="cover_after" class="form-control"/>
                      </div>
                        </div>
                        <div class="col-6">
                        <div class="form-group">
                        <label for="phone_number">Số điện thoại</label>
                        <input type="text" name="phone_number" id="phone_number" class="form-control" />
                      </div>
                      <div class="form-group">
                        <label for="date_start">Ngày vào làm</label>
                        <input type="date" name="date_start" id="date_start" class="form-control" />
                      </div>  
                       <div class="form-group">
                        <label for="keyword">Từ khóa</label>
                        <input type="text" name="keyword" id="keyword" class="form-control" />
                      </div> 
                      <div class="form-group">
                        <label for="gender">Giới tính</label>
                        <input type="text" name="gender" id="gender" class="form-control" />
                      </div> 
                    
                        </div>
                    </div>
                      <button id="#submit" class="btn btn-success">update</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
        </div>

                   