
 
 <!-- Modal Create -->
 <div class="modal fade" id="serviceModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New service</h5>
                  </div>
                  <div class="modal-body">
                    <form id="serviceForm" name="serviceForm"> 
                    <?php echo csrf_field(); ?>
                      <div class="form-group">
                        <label for="service_name">Name</label>
                        <input type="text" name="service_name" class="form-control" />
                      </div>
                      <div class="form-group">
                        <label for="service_description">Description</label>
                        <input type="text" name="service_description" class="form-control" />
                      </div>                
                      <button id="#submit" class="btn btn-success">Submit</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
        </div>

          
<!-- Modal Edit-->
            <div class="modal fade" id="serviceEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit service</h5>  
                  </div>
                  <div class="modal-body">
                    <form id="serviceEditForm">
                      <?php echo csrf_field(); ?>
                      <input type="hidden" name="id" id="id"/>
                   
                      <div class="form-group">
                        <label for="service_name">Name</label>
                        <input type="text" name="service_name" id="service_name" class="form-control" />
                      </div>
                      <div class="form-group">
                        <label for="service_description">Description</label>
                        <input type="text" name="service_description" id="service_description" class="form-control" />
                      </div>
                   
                      <button type="submit" class="btn btn-success">Update</button>
                    </form>
                  </div>
                </div>
              </div><?php /**PATH C:\teamcoder\www\trainning\bai_2\search-project\resources\views/admin/pages/service/modal.blade.php ENDPATH**/ ?>