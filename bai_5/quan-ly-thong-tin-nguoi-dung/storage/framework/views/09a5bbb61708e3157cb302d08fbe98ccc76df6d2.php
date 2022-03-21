
 
 <!-- Modal Create -->
 <div class="modal fade" id="roleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Thêm mới quyền</h5>
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fa fa-xmark"></i></button>

        </div>
        <div class="modal-body">
          <form id="roleForm" name="userForm"> 
          <?php echo csrf_field(); ?>
          <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
            <div class="col-md-12">
                <div class="form-group">
                    <label for="name">Tên quyền</label>
                    <input type="text" name="name" class="form-control" />
                </div>       
            </div>
            <div class="col-md-12">
                <div class="centered form-group ck-editor">
                    <label for="description">Mô tả</label>
                    <textarea name="description" class="form-group" id="role_detail" rows="8"></textarea>
                </div>
            </div>
                <label for="position">Phân quyền</label>
              <div class="form-group mx-5" id="form-check">
          
              </div>
      
        
            <button id="#submit" class="btn btn-success">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal update -->

<?php /**PATH C:\teamcoder\www\trainning\bai_5\quan-ly-thong-tin-nguoi-dung\resources\views/admin/pages/role/modal.blade.php ENDPATH**/ ?>