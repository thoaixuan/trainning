<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CodePen - A Pen by Mohithpoojary</title>
  <?php echo $__env->make('admin.partials.stylesheet', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</head>
<body>
<?php echo $__env->yieldContent('content'); ?>
<!-- partial -->
<script src="<?php echo e(asset('themes/admin/js/main.js')); ?>"></script>
<?php echo $__env->make('admin.partials.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->yieldContent('jsAdmin'); ?>
</body>
</html>
<?php /**PATH C:\teamcoder\www\trainning\bai_5\quan-ly-thong-tin-nguoi-dung\resources\views/admin/layouts/signin.blade.php ENDPATH**/ ?>