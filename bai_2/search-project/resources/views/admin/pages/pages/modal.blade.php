
 
 <!-- Modal Create -->
 <div class="modal fade" id="pageModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-xl">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm trang mới</h5>
                  </div>
                  <div class="modal-body">
                    <form id="pageForm" name="pageForm"> 
                    @csrf
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
                                <option value="0" disabled selected>-- Mở trang--</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="status">Trạng thái</label>
                                <select name="status" id="select_status" class="form-control required">
                                <option value="0" disabled selected>-- Trạng thái--</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="centered form-group ck-editor">
                                <label for="content">Nội dung</label>
                                <textarea name="content" class="form-group" id="editor" rows="8" placeholder="Làm ơn hãy nhập cái gì đó >.<"></textarea>
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