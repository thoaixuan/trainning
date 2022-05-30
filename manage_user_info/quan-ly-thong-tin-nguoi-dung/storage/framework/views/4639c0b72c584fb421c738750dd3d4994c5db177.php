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
            <a href="<?php echo e(route('admin.index.user')); ?>" class="nav-link">
              <i class="nav-icon fas fa-list-alt"></i>
              <p id="user">
                Người dùng
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo e(route('admin.index.role')); ?>" class="nav-link">
              <i class="nav-icon fas fa-list-alt"></i>
              <p id="user">
                Phân quyền
              </p>
            </a>
          </li>
      <?php if(auth()->guard()->check()): ?>
          <?php if(Auth::user()->is_admin): ?>
          <li class="nav-item">
            <a href="<?php echo e(route('admin.index.room')); ?>" class="nav-link">
              <i class="nav-icon fas fa-layer-group"></i>
              <p id="user">
                Phòng ban
              </p>
            </a>
          </li>
          <?php endif; ?>
      <?php endif; ?>
          <li class="nav-item">
            <a href="<?php echo e(route('admin.logout.login')); ?>" class="nav-link">
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
<?php /**PATH C:\laragon\www\trainning\bai_5\quan-ly-thong-tin-nguoi-dung\resources\views/admin/includes/main-sidebar.blade.php ENDPATH**/ ?>