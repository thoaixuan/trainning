<div class="modal fade" id="exampleModal" >
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content dashboard">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Contact</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div> 
        <form id="contactFormModal" >
            @csrf
          <div class="modal-body">
            <div class="form-group mb-3">
                <label class="form-label">Name</label>
                <input id ="name" type="text" name="name" class="form-control" id="title" >
              </div>
            <div class="form-group mb-3">
                <label class="form-label">Email</label>
                <input id ="email" type="email" name="title" class="form-control" id="title" >
            </div>
            <div class="form-group mb-3">
              <label class="form-label">Phone</label>
              <input id ="phone" type="number" name="phone" class="form-control" id="title" >
            </div>
            <div class="form-group mb-3">
              <label class="form-label">Message</label>
              <textarea id ="message" type="text" name ="message" class="form-control" id="description"></textarea>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" data-id="" data-url="">Save</button>
          </div>
        </form>
      </div>
    </div>
</div>