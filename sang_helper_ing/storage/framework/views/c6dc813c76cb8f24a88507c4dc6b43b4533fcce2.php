 
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
                <form action="<?php echo e(route('admin.login.change_password')); ?>" method="post" class="login100-form validate-form" id="login_form">
                    <?php echo csrf_field(); ?>
                    <span class="login100-form-title pb-5">
                        Lấy lại mã pin
                    </span>
                    <div class="panel panel-primary">
                        <div class="panel-body tabs-menu-body p-0 pt-5">
                            <div class="tab-content">
                                    <div class="wrap-input100 validate-input input-group" id="Password-toggle">
                                        <input type="text" id="code" name="code" class="input100 form-control ms-0"  placeholder="Mã xác thực">
                                    </div>
                                    <div class="wrap-input100 validate-input input-group" id="Password-toggle">
                                        <input type="text" id="newPassword" name="newPassword" class="input100 form-control ms-0"  placeholder="Mã pin">
                                    </div>
                                    <div class="container-login100-form-btn">
                                        <button id="submit" type="submit" class="login100-form-btn btn-primary">Gửi</button>
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
<script src="<?php echo e(asset('app/admin/contact/contact.js')); ?>"></script>
<script>
var contact = new contact(); 
	    contact.datas={
	        routes:{
	        }
	    }   
contact.init();
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Admin.layouts.login', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH M:\2022-ING\trainning\helper.ecommerce_ing\resources\views/admin/pages/forget_password/index.blade.php ENDPATH**/ ?>