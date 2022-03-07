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

          <li class="nav-item has-treeview menu-open menu-open-new">
            <a href="{{route('projects')}}" class="nav-link">
              <i class="fas fa-angle-left right"></i>
              <i class="nav-icon far fa-file-alt"></i>
              <p>Dự án <i class="fas fa-angle-left right"></i></p>
            </a>
            <ul class="nav nav-treeview ">
              <li class="nav-item">
                <a href="{{route('projects')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tất cả</p>
                  <span class="badge badge-info right countBlock" ></span>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('projects_expired')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Còn Hạn</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('projects_unexpired')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Hết Hạn</p>
                </a>
              </li>
            </ul>
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

          <li class="nav-item has-treeview menu-open-new">
            <a href="{{route('contact')}}" class="nav-link ">
              <i class="nav-icon fas fa-address-book"></i>
              <p>
                  Liên hệ
              </p>
            </a>
          </li>

          <li class="nav-item has-treeview menu-open-new">
            <a href="{{route('settings')}}" class="nav-link ">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                  Cài đặt
              </p>
            </a>
          </li>

          <li class="nav-item menu-open-new">
            <a href="{{route('logout-admin')}}" class="nav-link ">
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
