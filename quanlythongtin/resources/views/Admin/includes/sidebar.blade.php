<aside class="main-sidebar elevation-4 sidebar-light">
    <a href="{{route('dashboard')}}" class="brand-link text-center ">
      <div class="bounce">
        <b>
        <span id="website_logo_text_header" style="font-size:14px; font-weight: bold; color:#000">Admin Panel</span>

        </b>
      </div>
    </a>
    <div class="sidebar">
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column " data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item menu-open-new menu-open">
            <a href="{{route('dashboard')}}" class="nav-link ">
              <i class="nav-icon fas fa-chart-line"></i>
              <p>
                 Tổng Quan
              </p>
            </a>
          </li>
          @if(Auth::user()->id_permissions == 1)
          <li class="nav-item has-treeview menu-open-new">
            <a href="{{ route('phongban') }}" class="nav-link ">
              <i class="nav-icon fas fa-address-book"></i>
              <p>
                  Phòng ban
              </p>
            </a>
          </li>
          @endif
          <li class="nav-item has-treeview menu-open-new">
            <a href="{{ route('users') }}" class="nav-link ">
              <i class="nav-icon fas fa-users"></i>
              <p>
                  Người dùng
              </p>
            </a>
          </li>


          <li class="nav-item menu-open-new">
            <a href="{{ route('logout') }}" class="nav-link ">
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
