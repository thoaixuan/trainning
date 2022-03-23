
 
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
          @csrf
          <input type="hidden" name="_token" value="{{ csrf_token() }}" />
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

<div class="modal fade" id="roleModalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Thêm mới quyền</h5>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fa fa-xmark"></i></button>

      </div>
      <div class="modal-body">
        <form id="roleFormEdit" name="userForm"> 
        @csrf
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <input type="hidden" name="id" id="id" />
          <div class="col-md-12">
              <div class="form-group">
                  <label for="name">Tên quyền</label>
                  <input type="text" name="name" class="form-control" />
              </div>       
          </div>
          <div class="col-md-12">
              <div class="centered form-group ck-editor">
                  <label for="description">Mô tả</label>
                  <textarea name="description" class="form-group" id="role_detail_edit" rows="8"></textarea>
              </div>
          </div>
          <div class="col-md-12">
            <select name="permission[]" multiple  id="permission" class="form-control">
              <optgroup class="area" label="Khu Vu">
                <option  value="area_view">-- Xem Danh Mục --</option>
                <option  value="area_insert">-- Thêm Danh Mục --</option>
                <option  value="area_update">-- Sửa Danh Mục --</option>
                <option  value="area_delete">-- Xóa Danh Mục --</option>
              </optgroup>
              <optgroup class="category" label="Danh Mục">
                <option  value="category_view">-- Xem Danh Mục --</option>
                <option  value="category_insert">-- Thêm Danh Mục --</option>
                <option  value="category_update">-- Sửa Danh Mục --</option>
                <option  value="category_delete">-- Xóa Danh Mục --</option>
              </optgroup>
              <optgroup class="post" label="Bài Viết">
                <option  value="post_view">-- Bài Viết Đã Duyệt--</option>
                <option  value="post_pending_view">-- Bài Viết Chưa Duyệt--</option>
                <option  value="post_hotnew_vew">-- Bài Viết Hót--</option>
                <option  value="post_block_vew">-- Bài Viết Bị Khóa --</option>
                <option  value="post_approved">-- Duyệt Bài Viết --</option>
                <option  value="post_insert">-- Thêm Bài Viết --</option>
                <option  value="post_update">-- Sửa Bài Viết --</option>
                <option  value="post_delete">-- Xóa Bài Viết --</option>
                <option  value="post_status">-- Trang Thái --</option>
              </optgroup>
              <optgroup class="Feedback" label="Phản Hồi">
                <option  value="feedback_view">-- Xem Phản Hồi --</option>
                <option  value="feedback_delete">-- Xóa Phản Hồi --</option>
                <option  value="feedback_delete_post">-- Xóa Bài Viết --</option>
                <option  value="feedback_block_post">-- Khóa Bài Viết --</option>
              </optgroup>
              <optgroup class="Contact" label="Liên Hệ">
                <option  value="contact_view">-- Xem Liên Hệ --</option>
                <option  value="contact_delete">-- Xóa Liên Hệ --</option>
              </optgroup>
              <optgroup class="pages" label="Quản Lý Thông Báo">
                <option  value="notifications_view">-- Xem Thông Báo --</option>
                <option  value="notifications_update">-- Sửa Thông Báo --</option>
                <option  value="notifications_delete">-- Xóa Thông Báo --</option>
                <option  value="notifications_insert">-- Thêm Thông Báo --</option>
                <option  value="notifications_status">-- Trạng Thái --</option>
              </optgroup>
            </select>
          </div>
          <button id="#submit" class="btn btn-success">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>
</div>

