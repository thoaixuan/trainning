
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
  <link rel="icon" type="image/png" href="" >
  <title>Admin </title>
  <?php echo $__env->make('admin.includes.stylesheet', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>
<body class="sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed text-sm">
    <div class="wrapper">
        <?php echo $__env->make('admin.includes.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('admin.includes.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="content-wrapper">
            <section class="content">
                  <?php echo $__env->yieldContent('content'); ?>
          </section>
        </div>
        </div>
        <?php echo $__env->make('admin.includes.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->yieldContent('jsComponent'); ?>
</body>
</html>
<?php /**PATH C:\laragon\www\search-infocare\resources\views/admin/main.blade.php ENDPATH**/ ?>