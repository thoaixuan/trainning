<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
  <link rel="icon" type="image/png" href="<?php echo e(asset('guest/img/icon.png')); ?>" >
  <title>Trang chủ</title>
  <?php echo $__env->make('guest.includes.stylesheet', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>
<body>

    <?php echo $__env->make('guest.includes.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->yieldContent('content'); ?>

    <?php echo $__env->make('guest.includes.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('guest.includes.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <script src="<?php echo e(asset('guest/js/main.js')); ?>"></script>
    <?php echo $__env->yieldContent('jsGuest'); ?>

</body>
</html><?php /**PATH C:\laragon\www\search-infocare\resources\views/guest/main.blade.php ENDPATH**/ ?>