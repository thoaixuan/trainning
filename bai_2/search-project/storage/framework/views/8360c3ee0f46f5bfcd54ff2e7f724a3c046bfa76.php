<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tổng quan|Project Thanh Sơn</title>
  <?php echo $__env->make('admin.partials.stylesheet', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
 
</head>

<body class="hold-transition sidebar-mini layout-fixed">
<!-- Preloader -->
<!-- <?php echo $__env->make('admin.includes.preloader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> -->

<!-- Navbar -->
<?php echo $__env->make('admin.includes.main-header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<?php echo $__env->make('admin.includes.main-sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->yieldContent('content'); ?>

<!-- /.content-wrapper -->
<?php echo $__env->make('admin.includes.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<script src="<?php echo e(asset('app/admin/main.js')); ?>"></script>
<?php echo $__env->make('admin.partials.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->yieldContent('jsAdmin'); ?>
</body>
</html>
<?php /**PATH C:\teamcoder\www\trainning\bai_2\search-project\resources\views/admin/layouts/main.blade.php ENDPATH**/ ?>