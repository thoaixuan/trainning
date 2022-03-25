
<div class="modal fade" id="modal-action" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-xl">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="ModalLabel">Cập nhật phòng ban mới</h5>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fa fa-xmark"></i></button>

                  </div>
                  <div class="modal-body">
                    <form id="roomForm" name="roomForm"> 
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="id" id="id"/>

                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="name">Tên phòng ban</label>
                                <input type="text" name="name" id="name" class="form-control" />
                            </div>       
                        </div>
                        <div class="col-md-8">
                            <div class="centered form-group ck-editor">
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
<?php /**PATH C:\laragon\www\trainning\bai_5\quan-ly-thong-tin-nguoi-dung\resources\views/admin/pages/room/modal.blade.php ENDPATH**/ ?>