<!-- Modal Create -->
<div class="modal fade" id="projectModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thông tin dựa án</h5>
                  </div>
                  <div class="modal-body">
                    <form id="projectForm" name="projectForm"> 
                    <?php echo csrf_field(); ?>
                    <div class="row">
                      <div class="col-md-8 border"> 
                        <div class="form-group">
                           <label for="user_id">Chọn cá nhân</label>
                           <select name="user_id" id="select_user" class="form-control required" disabled>
                             <option value="0" disabled selected>-- Chọn cá nhân--</option>
                            </select>
                      </div>

                      <div class="form-group">
                        <label for="service_id">Chọn dịch vụ </label>
                        <select name="service_id" id="select_service" class="form-control required" disabled>
                          <option value="0" disabled selected>-- Chọn dịch vụ--</option>
                        </select>
                      </div> </div>
                      <div class="col-md-4 border">
                        <div class="form-group">
                          <label for="time_begin">Ngày bắt đầu</label>
                          <input class="form-control" type="date" name="time_begin" id="time_begin" value="2022-02-27" disabled>
                        </div>
                        <div class="form-group">
                          <label for="time_end">Ngày kết thúc</label>
                          <input class="form-control" type="date" name="time_end" disabled>
                        </div>
                      </div>
                        <div class="col-md-12 border">
                        <span class="border-bottom d-block">Chi tiết dựa án</span>
                          <div class="form-group">
                            <label for="projects_name">Tên dựa án</label>
                            <input type="text" name="projects_name" class="form-control" disabled />
                          </div>
                          <div class="form-group">
                            <label for="projects_detail">Nội dung</label>
                            <textarea name="projects_detail" class="form-group" id="projects_detail" rows="8" disabled></textarea>
                          </div>   
                      </div>
                    </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
        </div>


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
        <p><?php echo e(Auth::user()->name); ?></p>
        <hr/>
        <p><?php echo e(Auth::user()->phone); ?></p>
        <hr/>
        <p><?php echo e(Auth::user()->email); ?></p>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <a type="button" class="btn btn-primary" href="<?php echo e(route('guest.logout')); ?>">Đăng xuất</a>
      </div>
    </div>
  </div>
</div>
<?php endif; ?>

<?php /**PATH C:\teamcoder\www\trainning\bai_2\search-project\resources\views/guest/pages/home/includes/modal.blade.php ENDPATH**/ ?>