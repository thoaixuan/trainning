<!-- Modal Create -->
 <div class="modal fade" id="roleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Thêm mới quyền</h5>
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fa fa-xmark"></i></button>

        </div>
        <div class="modal-body">
          <form id="roleForm" > 
          <?php echo csrf_field(); ?>
          <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
            <div class="col-md-12">
                <div class="form-group">
                    <label for="name">Tên quyền</label>
                    <input type="text" name="name" id="name" class="form-control" />
                </div>       
            </div>
            <div class="col-md-12">
                <div class="centered form-group ck-editor">
                    <label for="description">Mô tả</label>
                    <textarea name="description" class="form-group" id="role_detail" rows="8"></textarea>
                </div>
            </div>
            <div class="col-md-12">
              <select name="permission[]" multiple  id="permission" class="form-control" multiple='multiple'>
                <optgroup class="user" value="user" label="Người Dùng">
                  <option  value="user-list">-- Xem Người Dùng--</option>
                  <option  value="user-add">-- Thêm Người Dùng --</option>
                  <option  value="user-edit">-- Sửa Người Dùng --</option>
                  <option  value="user-delete">-- Xóa Người Dùng --</option>
                </optgroup>
                <optgroup class="room" value="room" label="Phòng Ban">
                  <option  value="room-list">-- Xem Phòng Ban --</option>
                  <option  value="room-add">-- Thêm Phòng Ban --</option>
                  <option  value="room-edit">-- Sửa Phòng Ban --</option>
                  <option  value="room-delete">-- Xóa Phòng Ban --</option>
                </optgroup>
                <optgroup class="role" value="role" label="Phân quyền">
                  <option  value="role-list">-- Xem Phân Quyền --</option>
                  <option  value="role-add">-- Xóa Phản Hồi --</option>
                  <option  value="role-edit">-- Xóa Bài Viết --</option>
                  <option  value="role-delete">-- Khóa Bài Viết --</option>
                </optgroup>
              </select>
            </div>
        
            <button id="submit" class="btn btn-success">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?php /**PATH C:\laragon\www\trainning\bai_5\quan-ly-thong-tin-nguoi-dung\resources\views/admin/pages/role/modal.blade.php ENDPATH**/ ?>