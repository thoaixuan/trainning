<!--==================================================================== 
                    Start header area
=====================================================================-->

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
                            <li class="current dropdown"><a href="#">Home</a>
                          
                            </li>
                            <li><a href="about.html">Thông tin</a></li>
                     
                            <li class="dropdown"><a href="#">Hỗ trợ</a>
                          
                            </li>
                            <?php if(auth()->guard()->check()): ?>
                            <li>
                                <a class="login" href="#" data-toggle="modal" data-target="#info"><?php echo e(Auth::user()->full_name); ?></a>
                            </li>    
                            <!-- <li class="dropdown text-uppercase"  data-toggle="modal" data-target="#info"><a href="#"><?php echo e(Auth::user()->full_name); ?></a>    
                            </li> -->
                          <?php endif; ?>
                        </ul>
                    </div>
                </nav>
                <!-- Main Menu End-->

                <!-- Menu buttons-->
                <?php if(auth()->guard()->guest()): ?>
                <div class="sup-log">
                    <a class="login" href="<?php echo e(route('guest.signin.home')); ?>">LOGIN</a>
                </div>
                <?php endif; ?>
             
            </div>

        </div>
    </div>
    <!--End Header Upper-->

</header>

<!--==================================================================== 
                    End header area
=====================================================================-->
<?php /**PATH C:\laragon\www\trainning\bai_5\quan-ly-thong-tin-nguoi-dung\resources\views/guest/includes/header.blade.php ENDPATH**/ ?>