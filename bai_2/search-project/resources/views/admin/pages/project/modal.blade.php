
 
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
                        <label for="user_id">User_id</label>
                        <input type="text" name="user_id" class="form-control" />
                      </div>

                      <div class="form-group">
                        <label for="service_id">Service_id</label>
                        <input type="text" name="service_id" class="form-control" />
                      </div>
                      
                      <button id="#submit" class="btn btn-success">Submit</button>
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
                        <label for="user_id">User id</label>
                        <input type="text" name="user_id" id="user_id" class="form-control" />
                      </div>
                      <div class="form-group">
                        <label for="service_id">Service id</label>
                        <input type="text" name="service_id" id="service_id" class="form-control" />
                      </div>
                   
                      <button type="submit" class="btn btn-success">Update</button>
                    </form>
                  </div>
                </div>
              </div>