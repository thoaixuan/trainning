
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="ModalLabel">Dữ liệu</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">&times;</button>
        </div>
        <div class="modal-body">
          <div class="container">
            <form id="departmentForm" autocomplete="off"> 
              @csrf 
              <div class="row">
                <div class="col-md-12">
                <div class="form-group">
                  <label>Tên</label>
                  <input id="name" type="text" name="name" class="form-control" />
                </div>
                <div class="form-group">
                    <label>Nội dung</label>
                    <input id="name" type="text" name="name" class="form-control" />
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
  
  
