<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalLabel">Thêm dữ liệu</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">&times;</button>
      </div>
      <div class="modal-body">
        <div class="container">
          <form id="newsForm" autocomplete="off" enctype="multipart/form-data"> 
            @csrf 
            <div class="row">
              <div class="col-md-6">
              <div class="form-group">
                <label>Tiêu đề bài viết</label>
                <input id="title" type="text" name="title" class="form-control" />
              </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Đường dẫn URL</label>
                  <input id="slug" type="text" name="slug" class="form-control" />
                </div>
                </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="category_id">Danh mục</label>
                  <select name="category_id" id="category_id"  aria-label="Default" class="form-select form-control">
                  </select>
                  <span class="error" aria-live="polite"></span>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Hình ảnh</label>
                  <div class="text-center" id="load-images"></div>
                    <input id="image" type="file" name="image" accept="image/*" class="form-control">
                    <div id="load-images"></div>
                  </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label>Tóm lược</label>
                  <textarea class="form-control" rows="8" name="summary" id="summary"></textarea>
                  </div>
                <div class="form-group">
                  <label>Mô tả</label>
                  <div class="form-control" id="editor_content"></div>
                  </div>
              </div>
      
            </div>
      
            <button id="submit" class="btn btn-success" data-bs-dismiss="" >Lưu</button>
          </form>         
        </div>
      </div>
    
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="myModalDetail" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-body">
        <div class="container">
          <div class="text-center" id="view-image"></div>
          <div class="text-center mt-2 mb-2" id="view-title"></div>
          <div id="view-summary"></div>
          <div id="view-content"></div>
        </div>
      </div>
    
    </div>
  </div>
</div>