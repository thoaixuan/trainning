<!doctype html>
<html lang="en" dir="ltr">

<head>

    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="robots" content="noindex">
    <meta name="googlebot" content="noindex">
    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo e(asset('themes/admin/assets/images/brand/favicon.ico')); ?>" />

    <!-- TITLE -->
    <title>Resource and Asset Management</title>
    <?php echo $__env->make('Admin.partials.stylesheet', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

   
</head>

<body class="app sidebar-mini ltr light-mode">

    <!-- /GLOBAL-LOADER -->
    <?php echo $__env->make('admin.includes.preload', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- PAGE -->
    <div class="page">
        <div class="page-main">
            <?php echo $__env->make('admin.includes.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('admin.includes.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->yieldContent('main'); ?>
        </div>
        <?php echo $__env->make('admin.includes.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('admin.includes.backtotop', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('admin.partials.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <script src="<?php echo e(asset('app/Admin/main.js')); ?>"></script>
         <?php echo $__env->yieldContent('jsAdmin'); ?>

    </div>

</body>

</html><?php /**PATH M:\2022-ING\helper.ecommerce_ing\resources\views/admin/layouts/main.blade.php ENDPATH**/ ?>