<div class="modal fade" id="exampleModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content dashboard">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">User</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="formUser" data-id="" onsubmit="return false">
            @csrf
          <div class="modal-body">
            <div class="form-group mb-3">
              <label class="form-label">Name</label>
              <input type="text" name="name" class="form-control" id="name" >
            </div>
            <div class="form-group mb-3">
              <label class="form-label">Email address</label>
              <input type="email" name ="email" class="form-control" id="email">
            </div>
            <div class="form-group mb-3">
              <label class="form-label">Password</label>
              <input type="password" name = "password" class="form-control" id="password">
            </div>
            <div class="form-group mb-3">
              <label class="form-label">Permission</label>
              <select id="per_id" name="per_id" class="form-control">
                <option value="1">Admin</option>
                <option value="2"  selected>User</option>
              </select>
              
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" data-id="" data-url ="">Save</button>
          </div>
        </form>
      </div>
    </div>
</div>