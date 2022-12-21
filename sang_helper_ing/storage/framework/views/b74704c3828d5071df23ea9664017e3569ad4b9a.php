 
<?php $__env->startSection('main'); ?>
    <!-- BACKGROUND-IMAGE -->
    <div class="login-img">

        <!-- GLOABAL LOADER -->
        <div id="global-loader">
            <img src="<?php echo e(asset('themes/admin/assets/images/loader.svg')); ?>" class="loader-img" alt="Loader">
        </div>
        <!-- /GLOABAL LOADER -->

        <!-- PAGE -->
        <div class="page">
            <div class="">

                <!-- CONTAINER OPEN -->
                <div class="col col-login mx-auto mt-7">
                    <div class="text-center">
                        <img src="<?php echo e(asset('themes/admin/assets/images/brand/logo-white.png')); ?>" class="header-brand-img" alt="">
                    </div>
                </div>

                <div class="container-login100">
                    <div class="wrap-login100 p-6">
                        <form autocomplete="off" class="login100-form validate-form" id="login_form">
                            <?php echo csrf_field(); ?>
                            <span class="login100-form-title pb-5">
                                Login Admin
                            </span>
                            <div class="panel panel-primary">
                                <div class="panel-body tabs-menu-body p-0 pt-5">
                                    <div class="tab-content">
                                            <div class="form-group" id="Password-toggle">
                                                <input type="password" id="password" name="password" class="w-100 form-control ms-0"  placeholder="Mã pin" pattern="[0-9]*" inputmode="numeric">
                                            </div>
                                            <div class="form-group">
                                                <?php echo NoCaptcha::renderJs(); ?>

                                                <?php echo NoCaptcha::display(); ?>

                                            </div>
                                            <div class="d-flex justify-content-end ">
                                              <a id="forget-password" href="<?php echo e(route('admin.login.send_password')); ?>">Quên mật khẩu ?</a>
                                            </div>
                                            <div class="container-login100-form-btn">
                                                <span id="submit" class="login100-form-btn btn-primary cusor-point">Đăng nhập</span>
                                            </div>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
                <!-- CONTAINER CLOSED -->
            </div>
        </div>
        <!-- End PAGE -->

    </div>
    <!-- BACKGROUND-IMAGE CLOSED -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('jsAdmin'); ?>
<script src="<?php echo e(asset('app/admin/login/login.js')); ?>"></script>
<script>
var login = new login(); 
	    login.datas={
	        routes:{
	            password:"<?php echo e(route('admin.login.forget_password')); ?>",
	            login:"<?php echo e(route('admin.login.login')); ?>"
	        }
	    }   
login.init();
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Admin.layouts.login', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\trainning\helper\resources\views/admin/pages/login/login.blade.php ENDPATH**/ ?>