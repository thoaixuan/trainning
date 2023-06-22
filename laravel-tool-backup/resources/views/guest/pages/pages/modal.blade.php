@if(Auth::check() && Auth::user()->type == "AdminSystem")
<!-- Modal -->
<button class="d-none" id="update" type="button">update</button>
<div class="modal fade" id="pageModal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="ModalLabel">Dữ liệu</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">&times;</button>
        </div>
        <div class="modal-body">
          <div class="container">
            <form id="pageForm" autocomplete="off"> 
              @csrf 
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Tiêu đề</label>
                    <input id="name" type="text" name="name" class="form-control" />
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Đường dẫn URL</label>
                    <input id="slug" type="text" name="slug" class="form-control" />
                  </div>
                  </div>
                <div class="col-md-12">
                <div class="form-group">
                    <label>Nội dung</label>
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
  @endif