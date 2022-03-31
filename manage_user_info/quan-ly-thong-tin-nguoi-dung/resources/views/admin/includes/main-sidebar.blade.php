<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <div href="index3.html" class="brand-link">
      <span class="brand-text font-weight-light">Project Thanh Son</span>
    </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item menu-open">
            <a href="" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Tổng Quan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('admin.index.user')}}" class="nav-link">
              <i class="nav-icon fas fa-list-alt"></i>
              <p id="user">
                Người dùng
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('admin.index.role')}}" class="nav-link">
              <i class="nav-icon fas fa-list-alt"></i>
              <p id="user">
                Phân quyền
              </p>
            </a>
          </li>
      @auth
          @if(Auth::user()->is_admin)
          <li class="nav-item">
            <a href="{{route('admin.index.room')}}" class="nav-link">
              <i class="nav-icon fas fa-layer-group"></i>
              <p id="user">
                Phòng ban
              </p>
            </a>
          </li>
          @endif
      @endauth
          <li class="nav-item">
            <a href="{{route('admin.logout.login')}}" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Đăng xuất
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
