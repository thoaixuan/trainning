
 
 <!-- Modal Create -->
 <div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog ">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New User</h5>
                  </div>
                  <div class="modal-body">
                    <form id="userForm" name="userForm"> 
                    @csrf 
                      <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" />
                      </div>
                      <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" class="form-control" />
                      </div>
                      <div class="form-group">
                        <label for="phone">Số điện thoại</label>
                        <input type="text" name="phone" class="form-control" />
                      </div>
                      <div class="form-group">
                        <label for="password">Mật khẩu</label>
                        <input type="text" name="password" class="form-control" />
                      </div>
                      <button id="#submit" class="btn btn-success">Submit</button>
                      <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
        </div>

          
<!-- Modal Edit-->
            <div class="modal fade" id="userEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>  
                  </div>
                  <div class="modal-body">
                    <form id="userEditForm">
                      @csrf
                      <input type="hidden" name="id" id="id"/>
                      <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control" />
                      </div>
                      <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" class="form-control" />
                      </div>
                      <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" name="phone" id="phone" class="form-control" />
                      </div>
                      <button type="submit" class="btn btn-success">Update</button>
                      <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    </form>
                  </div>
                </div>
              </div>