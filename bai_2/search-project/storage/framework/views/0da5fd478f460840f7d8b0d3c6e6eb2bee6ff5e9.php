
 
 <!-- Modal Create -->
 <div class="modal fade" id="projectModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-xl">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm mới dựa án</h5>
                  </div>
                  <div class="modal-body">
                    <form id="projectForm" name="projectForm"> 
                    <?php echo csrf_field(); ?>
                    <div class="row">
                      <div class="col-md-8 border"> 
                        <div class="form-group">
                           <label for="user_id">Chọn cá nhân</label>
                           <select name="user_id" id="select_user" class="form-control required">
                             <option value="0" disabled selected>-- Chọn cá nhân--</option>
                            </select>
                      </div>

                      <div class="form-group">
                        <label for="service_id">Chọn dịch vụ </label>
                        <select name="service_id" id="select_service" class="form-control required">
                          <option value="0" disabled selected>-- Chọn dịch vụ--</option>
                        </select>
                      </div> </div>
                      <div class="col-md-4 border">
                        <div class="form-group">
                          <label for="time_begin">Ngày bắt đầu</label>
                          <input class="form-control" type="date" name="time_begin" min="2000-01-02">
                        </div>
                        <div class="form-group">
                          <label for="time_end">Ngày kết thúc</label>
                          <input class="form-control" type="date" name="time_end">
                        </div>
                      </div>
                        <div class="col-md-12 border">
                        <span class="border-bottom d-block">Chi tiết dựa án</span>
                          <div class="form-group">
                            <label for="projects_name">Tên dựa án</label>
                            <input type="text" name="projects_name" class="form-control" />
                          </div>
                          <div class="form-group">
                            <label for="projects_detail">Nội dung</label>
                            <textarea name="projects_detail" class="form-group" id="projects_detail" rows="8"></textarea>
                          </div>   
                      </div>
                    </div>
                   
                      <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                      <button id="submit" class="btn btn-success">Submit</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
        </div>

          
<!-- Modal Edit-->
            <div class="modal fade" id="projectEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-xl">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit project</h5>  
                  </div>
                  <div class="modal-body">
                    <form id="projectEditForm">
                      <?php echo csrf_field(); ?>
                      <input type="hidden" name="id" id="id"/>
                      <div class="row">
                      <div class="col-md-8 border"> 
                        <div class="form-group">
                           <label for="user_id">Chọn cá nhân</label>
                           <select name="user_id" id="select_user_edit" class="form-control required">
                             <option value="0" disabled selected>-- Chọn cá nhân--</option>
                            </select>
                      </div>

                      <div class="form-group">
                        <label for="service_id">Chọn dịch vụ </label>
                        <select name="service_id" id="select_service_edit" class="form-control required">
                          <option value="0" disabled selected>-- Chọn dịch vụ--</option>
                        </select>
                      </div> </div>
                      <div class="col-md-4 border">
                        <div class="form-group">
                          <label for="time_begin">Ngày bắt đầu</label>
                          <input class="form-control" type="date" name="time_begin_edit" id="time_begin_edit" min="2000-01-02">
                        </div>
                        <div class="form-group">
                          <label for="time_end">Ngày kết thúc</label>
                          <input class="form-control" type="date" name="time_end_edit" id="time_end_edit">
                        </div>
                      </div>
                        <div class="col-md-12 border">
                        <span class="border-bottom d-block">Chi tiết dựa án</span>
                          <div class="form-group">
                            <label for="projects_name">Tên dựa án</label>
                            <input type="text" name="projects_name" id="projects_name" class="form-control" />
                          </div>
                          <div class="form-group">
                            <label for="projects_detail">Nội dung</label>
                            <textarea name="projects_detail_edit" class="form-group" id="projects_detail_edit" rows="8"></textarea>
                          </div>   
                      </div>
                    </div>
                      <button type="submit" class="btn btn-success">Update</button>
                    </form>
                  </div>
                </div>
              </div><?php /**PATH C:\teamcoder\www\trainning\bai_2\search-project\resources\views/admin/pages/project/modal.blade.php ENDPATH**/ ?>