<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conzex</title>
    <link rel="shortcut icon" href="<?php echo e(asset('themes\guest\assets\img\favicon.png')); ?>" type="image/x-icon">
    <?php echo $__env->make('guest.partials.stylesheet', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>
<body>

<div class="page-wrapper">
    <?php echo $__env->yieldContent('content'); ?>
</div>
<?php echo $__env->make('guest.partials.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<script src="<?php echo e(asset('themes/guest/js/main.js')); ?>"></script>

<?php echo $__env->yieldContent('jsGuest'); ?>
</body>
</html><?php /**PATH C:\teamcoder\www\trainning\bai_5\quan-ly-thong-tin-nguoi-dung\resources\views/guest/layouts/sign.blade.php ENDPATH**/ ?>