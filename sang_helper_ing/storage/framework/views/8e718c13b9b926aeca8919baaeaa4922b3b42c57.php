<section name="header">
    <div class="bg-white position-fixed top-0 w-100 mb-100  header-content">
        <nav class="navbar navbar-expand-lg navbar-light container">
            <div class="container-fluid">
                <a class="navbar-brand m-0 header-logo" href="<?php echo e(route('guest.home.index')); ?>">
                    <?php $__currentLoopData = json_decode(getConfigMail()->website_logo); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $header_logo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <img src="<?php echo e(url('/uploads').'/'.$header_logo->logo_guest); ?>" alt="logo" height="46">
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </a>
                <a class="navbar-brand m-0 position-relative header-logo" href="<?php echo e(url('')); ?>">
                    <div class="text-title m-0" >
                        <a href="<?php echo e(route('guest.home.index')); ?>">
                            Trung tâm Hỗ trợ e-Gate
                        </a>
                    </div>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <a aria-label="Hide Sidebar" class="app-sidebar__toggle" data-bs-toggle="sidebar" href="javascript:void(0)"></a>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item mx-2">
                    <a class="nav-link active" aria-current="page" href="<?php echo e(route('guest.contact.index')); ?>">Liên hệ</a>
                    </li>
                    <li class="nav-item mx-2">
                    <a class="nav-link active" aria-current="page" href="<?php echo e(route('guest.support.index')); ?>">Hỗ trợ</a>
                    </li>
                </ul>
                
                </div>
            </div>
        </nav>

    </div>
</section><?php /**PATH C:\laragon\www\trainning\helper\resources\views/guest/includes/header.blade.php ENDPATH**/ ?>