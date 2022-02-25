<aside class="main-sidebar elevation-4 sidebar-dark-maroon">
    <a href="{{route('dashboard')}}" class="brand-link text-center ">
      <div class="bounce">
        <b>
        <span id="website_logo_text_header" style="font-size:14px; font-weight: bold; color:#ffff">Admin Panel</span>

        </b>
      </div>
    </a>
    <div class="sidebar">
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column " data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item menu-open-new menu-open">
            <a href="{{route('dashboard')}}/" class="nav-link ">
              <i class="nav-icon fas fa-chart-line"></i>
              <p>
                 Tổng Quan
              </p>
            </a>
          </li>
          <li class="nav-item menu-open-new">
            <a href="{{route('services')}}" class="nav-link">
              <i class="nav-icon fas fa-list-alt"></i>
              <p>Dịch Vụ </p>
            </a>
          </li>

          <li class="nav-item menu-open-new">
            <a href="{{route('projects')}}" class="nav-link">
              <i class="nav-icon far fa-file-alt"></i>
              <p>Dự án</p>
            </a>
          </li>

          <li class="nav-item menu-open-new">
            <a href="{{route('pages')}}" class="nav-link">
              <i class="nav-icon fas fa-pager"></i>
              <p>Quản Lý Trang</p>
            </a>
          </li>

          <li class="nav-item has-treeview menu-open-new">
            <a href="{{route('users')}}" class="nav-link ">
              <i class="nav-icon fas fa-users"></i>
              <p>
                  Khách hàng
              </p>
            </a>
          </li>

          <li class="nav-item menu-open-new">
            <a href="javascript:void(0)" data-toggle="modal" data-target="#modal-logout "class="nav-link ">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Đăng Xuất
              </p>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </aside>
