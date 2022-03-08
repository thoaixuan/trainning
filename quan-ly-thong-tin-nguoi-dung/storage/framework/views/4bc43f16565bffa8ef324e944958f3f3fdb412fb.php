

<?php $__env->startSection('content'); ?>
<!-- partial:index.partial.html -->
<div class="container">
	<div class="screen">
		<div class="screen__content">
			<form id="login-form" class="login" method="POST" role="form" name="login"> 
       		 <?php echo csrf_field(); ?>
				<div class="login__field form-group">
					<i class="login__icon fas fa-user"></i>
					<input type="text" id="email" name="email" class="form-controll login__input <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="User name / Email" >
				</div>
				<div class="login__field form-group">
					<i class="login__icon fas fa-lock"></i>
					<input type="password" name="password" class="form-controll login__input" placeholder="Password" >
				</div>
				<button class="button login__submit">
					<span class="button__text">Log In Now</span>
					<i class="button__icon fas fa-chevron-right"></i>
				</button>				
			</form>
			<div class="social-login">
				<h3>Đăng nhập</h3>
				<div class="social-icons">
					<a href="#" class="social-login__icon fab fa-instagram"></a>
					<a href="#" class="social-login__icon fab fa-facebook"></a>
					<a href="#" class="social-login__icon fab fa-twitter"></a>
				</div>
			</div>
		</div>
		<div class="screen__background">
			<span class="screen__background__shape screen__background__shape4"></span>
			<span class="screen__background__shape screen__background__shape3"></span>		
			<span class="screen__background__shape screen__background__shape2"></span>
			<span class="screen__background__shape screen__background__shape1"></span>
		</div>		
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('jsAdmin'); ?>
<script src="<?php echo e(asset('themes/admin/js/signin/signin.js')); ?>"></script>
<script>
  var signin=new signin();
      signin.datas={
        routes:{
            login:"<?php echo e(route('admin.post.login')); ?>",
        }
      }
      signin.init();
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.signin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\teamcoder\www\trainning\bai_5\quan-ly-thong-tin-nguoi-dung\resources\views/admin/pages/signin/signin.blade.php ENDPATH**/ ?>