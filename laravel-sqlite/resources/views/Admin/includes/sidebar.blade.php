<aside class="main-sidebar elevation-4 sidebar-light">
    <a href="/" class="brand-link text-center ">
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
            <a href="/" class="nav-link ">
              <i class="nav-icon fas fa-chart-line"></i>
              <p>
                 Tổng Quan
              </p>
            </a>
          </li>

          <li class="nav-item has-treeview menu-open-new">
            <a href="{{ route('product') }}" class="nav-link ">
              <i class="nav-icon fas fa-address-book"></i>
              <p>
                  Sản phẩm
              </p>
            </a>
          </li>

        </ul>
      </nav>
    </div>
  </aside>
