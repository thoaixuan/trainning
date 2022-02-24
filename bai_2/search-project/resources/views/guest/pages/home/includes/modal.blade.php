@auth
<div class="modal fade"  id="info" class="modal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Thông tin cá nhân</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>{{Auth::user()->name}}</p>
        <hr/>
        <p>{{Auth::user()->phone}}</p>
        <hr/>
        <p>{{Auth::user()->email}}</p>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <a type="button" class="btn btn-primary" href="{{route('guest.logout')}}">Đăng xuất</a>
      </div>
    </div>
  </div>
</div>
@endauth