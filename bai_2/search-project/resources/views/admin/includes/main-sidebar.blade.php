<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <span class="brand-text font-weight-light">Project</span>
    </a>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item menu-open">
            <a href="{{route('admin.get.index')}}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Tổng Quan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('admin.get.service')}}" class="nav-link">
              <i class="nav-icon fas fa-list-alt"></i>
              <p id="service">
                Dịch vụ
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('admin.get.project')}}" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Dự Án
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('admin.get.user')}}" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Khách hàng
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('admin.get_info.index')}}" class="nav-link">
              <i class="nav-icon fa fa-user"></i>
              <p>
                Hồ sơ cá nhân
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('admin.logout')}}" class="nav-link">
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
