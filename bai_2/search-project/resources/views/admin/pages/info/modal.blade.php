
 <div class="modal fade" id="passwordModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thay đổi mật khẩu</h5>
                  </div>
                  <div class="modal-body">
                    <form id="passwordForm" name="projectForm"> 
                    @csrf
                      <input type="hidden" name="id" id="id" value="{{auth()->user()->id}}"/>

                      <div class="form-group">
                        <label for="password">Nhập mật khẩu mới</label>
                        <input type="text" name="password" id="password" class="form-control" />
                      </div>

                      <div class="form-group">
                        <label for="reset_password">Nhập mật khẩu cũ</label>
                        <input type="text" name="reset_password" id="reset_password" class="form-control"/>
                      </div>

                      <div class="form-group">
                        <label for="re_password">Xác nhận lại mật khẩu</label>
                        <input type="text" name="re_password" id="re_password" class="form-control"/>
                      </div>
                      
                      <button id="#submit" class="btn btn-success">Submit</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
        </div>

