<nav class="main-header navbar navbar-expand navbar-white navbar-light bg-info">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <div class="dropdown my-auto">
        <span class="text-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <b>Admin</b></span>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          <a class="dropdown-item" href=""> <i class="fas fa-user"> </i>   Hồ sơ cá nhân </a>
          <a class="dropdown-item" href="<?php echo e(route('admin.logout')); ?>"> <i class="fas fa-sign-out-alt"></i> Đăng xuất</a>
        </div>
      </div>
    </ul>
  </nav>   <?php /**PATH C:\teamcoder\www\trainning\bai_2\search-project\resources\views/admin/includes/main-header.blade.php ENDPATH**/ ?>