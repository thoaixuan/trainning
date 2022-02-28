
 
 <!-- Modal Create -->
 <div class="modal fade" id="pageModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-xl">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm trang mới</h5>
                  </div>
                  <div class="modal-body">
                    <form id="pageForm" name="pageForm"> 
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="name">Tên trang</label>
                                <input type="text" name="name" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="link">Link chuyển hướng(nếu có)</label>
                                <input type="text" name="link" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="type_open">Mở trang</label>
                                <select name="type_open" id="select_open" class="form-control required">
                                <option value="0" selected>Mặc định</option>
                                <option value="1" selected>Mở trang khác</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="status">Trạng thái</label>
                                <select name="status" id="select_status" class="form-control required">
                                <option value="0" selected>Bật</option>
                                <option value="1" selected>Tắt</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="centered form-group ck-editor">
                                <label for="content">Nội dung</label>
                                <textarea name="content" class="form-group" id="content" rows="8" placeholder="Làm ơn hãy nhập cái gì đó >.<"></textarea>
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

<!-- Modal Edit -->
<div class="modal fade" id="pageEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-xl">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Sửa thông tin trang</h5>
                  </div>
                  <div class="modal-body">
                    <form id="pageEditForm" name="pageForm"> 
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="col-md-4">
                        <input type="hidden" name="id" id="id"/>
                            <div class="form-group">
                                <label for="name">Tên trang</label>
                                <input type="text" name="name" id="name" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="link">Link chuyển hướng(nếu có)</label>
                                <input type="text" name="link" id="link" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="type_open">Mở trang</label>
                                <select name="type_open" id="select_open_edit" class="form-control required">
                                <option value="0" selected>Mặc định</option>
                                <option value="1" selected>Mở trang khác</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="status">Trạng thái</label>
                                <select name="status" id="select_status_edit" class="form-control required">
                                <option value="0" selected>Bật</option>
                                <option value="1" selected>Tắt</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="centered form-group ck-editor">
                                <label for="content_edit">Nội dung</label>
                                <textarea name="content_edit" class="form-group" id="content_edit" rows="8" placeholder="Làm ơn hãy nhập cái gì đó >.<"></textarea>
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
        </div><?php /**PATH C:\teamcoder\www\trainning\bai_2\search-project\resources\views/admin/pages/pages/modal.blade.php ENDPATH**/ ?>