<header class="main-header">

    <!--Header-Upper-->
    <div class="header-upper">
        <div class="container clearfix">

            <div class="header-inner clearfix d-lg-flex">
                <div class="logo-outer">
                    <div class="logo"><a href="index.html"><img src="<?php echo e(asset('themes\guest\assets\img\logo\logo.png')); ?>" alt="" title=""></a></div>
                    <div class="fixed-logo"><a href="index.html"><img src="<?php echo e(asset('themes\guest\assets\img\logo\footer-logo.png')); ?>" alt="" title=""></a></div>
                </div>

                <!-- Main Menu -->
                <nav class="main-menu navbar-expand-md ml-md-auto">
                    <div class="navbar-header clearfix">
                    <div class="logo"><a href="index.html"><img src="<?php echo e(asset('themes\guest\assets\img\logo\logo.png')); ?>" alt="" title=""></a></div>
                    <div class="fixed-logo"><a href="index.html"><img src="<?php echo e(asset('themes\guest\assets\img\logo\footer-logo.png')); ?>" alt="" title=""></a></div>
                        <!-- Toggle Button -->
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse-one">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>

                    <div class="navbar-collapse navbar-collapse-one collapse clearfix">
                        <ul class="navigation clearfix">
                            <li class="current dropdown"><a href="<?php echo e(route('guest.home')); ?>">Trang chủ</a></li>
                            <?php $__currentLoopData = getPage(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($data->status==0): ?>
                                    <li>
                                        <a href="<?php echo e(route('guest.page',$data->slug)); ?>"><?php echo e($data->name); ?></a>
                                    </li>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php if(auth()->guard()->check()): ?>
                            <li class="dropdown text-uppercase"  data-toggle="modal" data-target="#info"><a href="#"><?php echo e(Auth::user()->name); ?></a>    
                            </li>
                            <?php endif; ?>

                            <?php if(auth()->guard()->guest()): ?>
                            <li class="dropdown"><a href="<?php echo e(route('guest.signin')); ?>">Đăng nhập</a>    
                            </li>  
                            <?php endif; ?>
                                
                </nav>
                <!-- Main Menu End-->

            </div>

        </div>
    </div>
    <!--End Header Upper-->

</header>
<?php /**PATH C:\teamcoder\www\trainning\bai_2\search-project\resources\views/guest/includes/header.blade.php ENDPATH**/ ?>