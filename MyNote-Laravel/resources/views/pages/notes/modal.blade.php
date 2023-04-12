<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content dashboard modal-content-2">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Note</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="formNote" >
            @csrf
          <div class="modal-body">
            <div class="form-group mb-3">
              <label class="form-label">Title</label>
              <input type="text" name="title" class="form-control" id="title" >
            </div>
            <div class="form-group mb-3">
              <label class="form-label">Description</label>
              <textarea type="text" name ="description" class="form-control" id="description"></textarea>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button id="submit" type="submit" class="btn btn-primary" data-id="" data-url="">Save</button>
          </div>
        </form>
      </div>
    </div>
</div>