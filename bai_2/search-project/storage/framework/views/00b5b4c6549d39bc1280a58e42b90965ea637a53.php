

<?php $__env->startSection('content'); ?>
<section class="login-area another-page pt-60">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="login-information pb-150">
                    <h2>Hey There!</h2>
                    <p>Welcome Back. <br>
                    You are just one step away to your feed.</p>
                    <form class="login-form" method="post" id="login-form" name="login">
                    <?php echo csrf_field(); ?>
                        <div class="text-field form-group">
                            <input class="form-control" type="text" placeholder="Email" name="email">
                        </div>
                        <div class="password-field form-group">
                            <input class="form-control " type="password" placeholder="Password" name="password">
                        </div>
                        <div class="signin-button-wrap">
                            <button type="submit" class="btn-bg2">Sign In</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('jsGuest'); ?>
<script src="<?php echo e(asset('app/guest/user/user.js')); ?>"></script>
<script>
  var user=new user();
      user.datas={
        routes:{
            login:"<?php echo e(route('guest.signin')); ?>",
        }
      }
      user.init();
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('guest.layouts.sign', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\teamcoder\www\trainning\bai_2\search-project\resources\views/guest/pages/signin/signin.blade.php ENDPATH**/ ?>