<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conzex</title>
    <link rel="shortcut icon" href="assets\img\favicon.png" type="image/x-icon">
    <?php echo $__env->make('guest.partials.stylesheet', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>
<body>

<div class="page-wrapper">
    <?php echo $__env->yieldContent('content'); ?>
</div>
    <?php echo $__env->make('guest.partials.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html><?php /**PATH C:\teamcoder\www\trainning\bai_2\web\search_infocare\resources\views/guest/layouts/main.blade.php ENDPATH**/ ?>