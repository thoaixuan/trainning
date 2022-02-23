<!-- Preloader -->
<div class="preloader"></div>
<!--==================================================================== 
                    Start header area
=====================================================================-->

<header class="main-header">

    <!--Header-Upper-->
    <div class="header-upper">
        <div class="container clearfix">

            <div class="header-inner clearfix d-lg-flex">
                <div class="logo-outer">
                    <div class="logo"><a href="<?php echo e(route('guest_home')); ?>"><img src="<?php echo e(route('guest_home')); ?>/guest/img/logo.png" alt="" title=""></a></div>
                    <div class="fixed-logo"><a href="<?php echo e(route('guest_home')); ?>"><img src="<?php echo e(route('guest_home')); ?>/guest/img/logo.png" alt="" title=""></a></div>
                </div>

                <!-- Main Menu -->
                <nav class="main-menu navbar-expand-md ml-md-auto">
                    <div class="navbar-header clearfix">
                    <div class="logo"><a href="<?php echo e(route('guest_home')); ?>"><img src="<?php echo e(route('guest_home')); ?>/guest/img/logo.png" alt="" title=""></a></div>
                    <div class="fixed-logo"><a href="<?php echo e(route('guest_home')); ?>"><img src="<?php echo e(route('guest_home')); ?>/guest/img/logo.png" alt="" title=""></a></div>
                        <!-- Toggle Button -->
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse-one">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>

                    <div class="navbar-collapse navbar-collapse-one collapse clearfix">
                        <ul class="navigation clearfix">
                            <li><a href="<?php echo e(route('guest_home')); ?>">Trang chủ</a></li>
                                    <?php $__currentLoopData = getPages(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li>
                                        <a href="<?php echo e(route('guest_pages',$item->pages_slug)); ?>"><?php echo e($item->pages_name); ?></a>
                                    </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </ul>
                    </div>
                </nav>
                <!-- Main Menu End-->

            </div>

        </div>
    </div>
    <!--End Header Upper-->

</header>

<!--==================================================================== 
                    End header area
=====================================================================-->
<?php /**PATH C:\laragon\www\search-infocare\resources\views/guest/includes/header.blade.php ENDPATH**/ ?>