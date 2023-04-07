<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content dashboard modal-content-2">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Note</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="formUser1" data-id="">
            @csrf
          <div class="modal-body">
            <div class="mb-3">
              <label for="exampleInputName1" class="form-label">ID</label>
              <input type="text" name="id" class="form-control" id="id1" disabled>
            </div>
            <div class="mb-3">
              <label for="exampleInputName1" class="form-label">Title</label>
              <input type="text" name="title" class="form-control" id="title" >
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Description</label>
              <textarea type="text" name ="description" class="form-control" id="description"></textarea>
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1"  class="form-label">Owner</label>
              <input type="text" name = "owner" class="form-control" id="owner" disabled>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
          </div>
        </form>
      </div>
    </div>
</div>