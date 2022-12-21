<!-- Modal Department -->
<div class="modal fade" id="modalDepartment" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalLabelDepartment">Dữ liệu</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">&times;</button>
      </div>
      <div class="modal-body">
        <div class="container">
          <form id="homeDepartmentForm" autocomplete="off"> 
            @csrf 
            <div class="row">
              <div class="col-md-12">
              <div class="form-group">
                  <label>Tiêu đề</label>
                  <input id="department_title" type="text" name="title" class="form-control" />
              </div>
              <div class="form-group">
                <label>Mô tả</label>
                <textarea id="department_des" name="des" class="form-control"></textarea>
            </div>
              </div>
            </div>
            <button id="submitDepartment" class="btn btn-success" data-bs-dismiss="">Lưu</button>
          </form>         
        </div>
      </div>
    
    </div>
  </div>
</div>
<!-- Modal Home Category -->
<div class="modal fade" id="modalHomeCategory" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="ModalLabelHomeCategory">Dữ liệu</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">&times;</button>
        </div>
        <div class="modal-body">
          <div class="container">
            <form id="homeCategoryForm" autocomplete="off"> 
              @csrf 
              <div class="row">
                <div class="col-md-12">
                <div class="form-group">
                    <label>Tiêu đề</label>
                    <input id="category_title" type="text" name="title" class="form-control" />
                </div>
                <div class="form-group">
                    <label>URL</label>
                    <input id="category_url" type="text" name="url" class="form-control" />
                </div>
                <div class="form-group">
                    <label>Màu</label>
                    <input id="category_color" type="text" name="color" class="form-control" />
                </div>
                <div class="form-group">
                    <label>Icon</label>
                    <input id="category_icon" type="text" name="icon" class="form-control" />
                </div>
                </div>
              </div>
              <button id="submitHomeCategory" class="btn btn-success" data-bs-dismiss="">Lưu</button>
            </form>         
          </div>
        </div>
      
      </div>
    </div>
  </div>

  <!-- Modal Home Question -->
<div class="modal fade" id="modalHomeQuestion" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="ModalLabelHomeQuestion">Dữ liệu</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">&times;</button>
        </div>
        <div class="modal-body">
          <div class="container">
            <form id="homeQuestionForm" autocomplete="off"> 
              @csrf 
              <div class="row">
                <div class="col-md-12">
                <div class="form-group">
                    <label>Tiêu đề</label>
                    <input id="question_title" type="text" name="title" class="form-control" />
                </div>
                <div class="form-group">
                    <label>Mô tả</label>
                    <input type="hidden" name="des" id="question_des">
                    <div class="ql-wrapper ql-wrapper-demo bg-light">
                      <div id="quillEditor">
                      </div>
                    </div>
                </div>
                </div>
              </div>
              <button id="submitHomeQuestion" class="btn btn-success" data-bs-dismiss="">Lưu</button>
            </form>         
          </div>
        </div>
      
      </div>
    </div>
  </div>

  <!-- Modal Delete Q -->
<div class="modal fade" id="modal-delete-question" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Thông báo</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div id="modal-text-delete-question"></div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary"  data-bs-dismiss="modal">Hủy</button>
          <button type="button" class="btn btn-primary" id="onDeleteQuestion">Xác nhận</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Delete Q -->
<div class="modal fade" id="modal-delete-department" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Thông báo</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="modal-text-delete-department"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary"  data-bs-dismiss="modal">Hủy</button>
        <button type="button" class="btn btn-primary" id="onDeleteDepartment">Xác nhận</button>
      </div>
    </div>
  </div>
</div>