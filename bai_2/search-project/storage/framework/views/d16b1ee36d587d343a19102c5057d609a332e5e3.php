

<?php $__env->startSection('content'); ?>
    <!-- Preloader -->
    <?php echo $__env->make('guest.includes.preloader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- Main Header -->

   
<!--==================================================================== 
                            Start breadcumb section
    =====================================================================-->
    <section class="banner-section pt-200 pb-175">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="page-title text-center">
                            <h1><?php echo e($page->name); ?></h1>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <!--==================================================================== 
                            end breadcumb section
    =====================================================================-->
    
    <!--==================================================================== 
                            Start about-us section
    =====================================================================-->
        <section class="about-page-content another-page pt-90 pb-40">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10">
                        <div class="about-content">
                            <h2><?php echo e($page->name); ?></h2>

                            <p><?php echo $page->content; ?></p>

                        </div>
                    </div>
                    <div class="about-content-img">
                    <img src="<?php echo e(asset('themes\guest\assets\img\hero-section\hero-right.png')); ?>" alt="">
                </div>
            </div>
        </section>
    <!--==================================================================== 
                            end about-us section
    =====================================================================-->
    <!--Service-->
    <?php echo $__env->make('guest.pages.home.includes.service', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('jsGuest'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('guest.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\teamcoder\www\trainning\bai_2\search-project\resources\views/guest/pages/page/page.blade.php ENDPATH**/ ?>