
 
 <!-- Modal Create -->
 <div class="modal fade" id="projectModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New project</h5>
                  </div>
                  <div class="modal-body">
                    <form id="projectForm" name="projectForm"> 
                    @csrf
                      <div class="form-group">
                        <label for="projects_name">Name</label>
                        <input type="text" name="projects_name" class="form-control" />
                      </div>

                      <div class="form-group">
                        <label for="user_id">Chọn cá nhân</label>
                        <select name="user_id" id="select_user" class="form-control required">
                          <option value="0" disabled selected>-- Chọn cá nhân--</option>
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="service_id">Chọn dịch vụ</label>
                        <select name="service_id" id="select_service" class="form-control required">
                          <option value="0" disabled selected>-- Chọn dịch vụ--</option>
                        </select>
                      </div> 

                      <button id="submit" class="btn btn-success">Submit</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
        </div>

          
<!-- Modal Edit-->
            <div class="modal fade" id="projectEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit project</h5>  
                  </div>
                  <div class="modal-body">
                    <form id="projectEditForm">
                      @csrf
                      <input type="hidden" name="id" id="id"/>
                   
                      <div class="form-group">
                        <label for="projects_name">Name</label>
                        <input type="text" name="projects_name" id="projects_name" class="form-control" />
                      </div>

                      <div class="form-group">
                        <label for="user_id">Chọn cá nhân</label>
                        <select name="user_id" id="select_user_edit" class="form-control required">
                          <option value="0" disabled selected>-- Chọn cá nhân--</option>
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="service_id">Chọn dịch vụ</label>
                        <select name="service_id" id="select_service_edit" class="form-control required">
                          <option value="0" disabled selected>-- Chọn dịch vụ--</option>
                        </select>
                      </div> 

                      <button type="submit" class="btn btn-success">Update</button>
                    </form>
                  </div>
                </div>
              </div>