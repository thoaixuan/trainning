<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content dashboard">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">User</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="formUser" data-id="">
            @csrf
          <div class="modal-body">
            <div class="mb-3">
              <label for="exampleInputName1" class="form-label">ID</label>
              <input type="text" name="id" class="form-control" id="id" disabled>
            </div>
            <div class="mb-3">
              <label for="exampleInputName1" class="form-label">Name</label>
              <input type="text" name="name" class="form-control" id="name" >
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Email address</label>
              <input type="email" name ="email" class="form-control" id="email">
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1"  class="form-label">Password</label>
              <input type="password" name = "password" class="form-control" id="password">
            </div>
            <div class="mb-3">
              <label class="form-label">Permission</label>
              <select id="per_id" name="per_id" class="form-control">
                <option value="1">Admin</option>
                <option value="2"  selected>User</option>
              </select>
              
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