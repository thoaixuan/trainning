
<!-- Modal Home Project-->
<div class="modal fade" id="modalHomeProject" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="ModalLabelHomeProject">Dữ liệu</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">&times;</button>
        </div>
        <div class="modal-body">
          <div class="container">
            <form id="homeProjectForm" autocomplete="off"> 
              @csrf 
              <div class="row">
                <div class="col-md-12">
                <div class="form-group">
                  <label>Icon</label>
                  <input id="icon" type="text" name="icon" class="form-control" />
                </div>
                <div class="form-group">
                  <label>Content</label>
                  <textarea id="content" name="content" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label>Color</label>
                    <input id="color" type="text" name="color" class="form-control" />
                  </div>
                </div>
              </div>
              <button id="submitHomeProject" class="btn btn-success" data-bs-dismiss="">Lưu</button>
            </form>         
          </div>
        </div>
      
      </div>
    </div>
  </div>

  
<!-- Modal Home Camket -->
<div class="modal fade" id="modalHomeCamket" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="ModalLabelHomeCamket">Dữ liệu</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">&times;</button>
        </div>
        <div class="modal-body">
          <div class="container">
            <form id="homeCamketForm" autocomplete="off"> 
              @csrf 
              <div class="row">
                <div class="col-md-12">
                <div class="form-group">
                  <label>Hình ảnh</label>
                  <input type="file" name="image" class="form-control" />
                </div>
                <div class="form-group">
                    <label>Tiêu đề</label>
                    <input id="title-camket" type="text" name="title" class="form-control" />
                  </div>
                <div class="form-group">
                  <label>Mô tả</label>
                  <textarea id="des-camket" name="des" class="form-control"></textarea>
                </div>
                </div>
              </div>
              <button id="submitHomeCamket" class="btn btn-success" data-bs-dismiss="">Lưu</button>
            </form>         
          </div>
        </div>
      
      </div>
    </div>
  </div>

  <!-- Modal Delete Cam ket -->
<div class="modal fade" id="modal-delete-camket" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Thông báo</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div id="modal-text-delete-camket"></div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary"  data-bs-dismiss="modal">Hủy</button>
          <button type="button" class="btn btn-primary" id="onDeleteCamket">Xác nhận</button>
        </div>
      </div>
    </div>
  </div>