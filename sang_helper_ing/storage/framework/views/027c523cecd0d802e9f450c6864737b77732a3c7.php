<!doctype html>
<html lang="en" dir="ltr">

<head>

    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="robots" content="noindex">
    <meta name="googlebot" content="noindex">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo e(asset('themes/admin/assets/images/brand/favicon.ico')); ?>" />

    <!-- TITLE -->
    <title><?php echo getConfigMail()->website_name; ?></title>
    <?php echo $__env->make('Guest.partials.stylesheet', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

   
</head>

<body >

    <!-- /GLOBAL-LOADER -->
    <?php echo $__env->make('guest.includes.preload', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('guest.includes.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldContent('main'); ?>
    <?php echo $__env->make('guest.includes.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('guest.partials.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <script src="<?php echo e(asset('app/Guest/main.js')); ?>"></script>
    <?php echo $__env->yieldContent('jsGuest'); ?>
</body>

</html><?php /**PATH C:\teamcoder\www\trainning\sang_helper_ing\resources\views/guest/layouts/main.blade.php ENDPATH**/ ?>