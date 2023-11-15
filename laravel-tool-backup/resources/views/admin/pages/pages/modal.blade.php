
<!-- Modal -->
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
{{-- Modal view description --}}
  <div class="modal fade" id="modal-action-view-description" >
	<div class="modal-dialog" role="document">
		<div class="modal-content">
		<div class="modal-header">
		<h5 class="modal-title" id="modal-action-title-view"></h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			<span aria-hidden="true">&times;</span>
		</button>
		</div>
		<div class="modal-body">
			<div class="row">
                <div class="col-md-12">
                    <div id="description_view"></div>
				</div>
			</div>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Thoát</button>
		</div>
	</div>
	</div>
</div>