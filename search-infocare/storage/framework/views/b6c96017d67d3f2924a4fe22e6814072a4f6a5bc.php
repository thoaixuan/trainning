<aside class="main-sidebar elevation-4 sidebar-dark-info">
  <!-- Brand Logo -->
  <a href="<?php echo e(asset('admin-cpanel')); ?>" class="brand-link">
    <span class="brand-text font-weight-light pl-5">Administrator Cpanel</span>
  </a>
  <div class="sidebar">
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column " data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item menu-open-new menu-open">
          <a href="<?php echo e(route('dashboard')); ?>" class="nav-link ">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
               Tổng Quan
            </p>
          </a>
        </li>
        <li class="nav-item menu-open-new">
          <a href="<?php echo e(route('services')); ?>" class="nav-link">
            <i class="nav-icon fas fa-list-alt"></i>
            <p>Dịch Vụ </p>
          </a>
        </li>

        <li class="nav-item menu-open-new">
          <a href="<?php echo e(route('projects')); ?>" class="nav-link">
            <i class="nav-icon fas fa-list-alt"></i>
            <p>Dự án </p>
          </a>
        </li>

        <li class="nav-item menu-open-new">
          <a href="<?php echo e(route('pages')); ?>" class="nav-link">
            <i class="fa  fa-gavel nav-icon"></i>
            <p>Quản Lý Trang</p>
          </a>
        </li>

        <li class="nav-item menu-open-new">
          <a href="<?php echo e(route('users')); ?>" class="nav-link ">
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
<?php /**PATH C:\laragon\www\search-infocare\resources\views/admin/includes/sidebar.blade.php ENDPATH**/ ?>