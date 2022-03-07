
 
 <!-- Modal Create -->
 <div class="modal fade" id="roomModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-xl">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm phòng ban mới</h5>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fa fa-xmark"></i></button>

                </div>
                  <div class="modal-body">
                    <form id="roomForm" name="roomForm"> 
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="name">Tên phòng ban</label>
                                <input type="text" name="name" class="form-control" />
                            </div>       
                            <div class="form-group">
                                <label for="status">Chức vụ</label>
                                <select name="status" id="permission_id" class="form-control select">

                                </select>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="centered form-group ck-editor">
                                <label for="description">Mô tả</label>
                                <textarea name="description" class="form-group" id="room_detail" rows="8"></textarea>
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

         
 <!-- Modal Edit-->
 <div class="modal fade" id="roomEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-xl">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cập nhật phòng ban mới</h5>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fa fa-xmark"></i></button>

                  </div>
                  <div class="modal-body">
                    <form id="roomEditForm" name="roomForm"> 
                    @method('PUT')
                    @csrf
                    <input type="hidden" name="id" id="id"/>

                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="name">Tên phòng ban</label>
                                <input type="text" name="name" id="name" class="form-control" />
                            </div>       
                            <div class="form-group">
                                <label for="status" class="d-block">Bộ phận</label>
                                <select class="form-control select" name="status" id="permission_edit_id" > 
                                </select>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="centered form-group ck-editor">
                                <label for="description">Mô tả</label>
                                <textarea name="description" class="form-group" id="room_detail_edit" rows="8"></textarea>
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
