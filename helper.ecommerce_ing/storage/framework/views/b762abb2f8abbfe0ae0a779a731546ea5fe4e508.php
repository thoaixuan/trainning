<section name="header">
    <div class="bg-white position-fixed w-100 mb-100  header-content">
        <nav class="navbar navbar-expand-lg navbar-light container">
            <div class="container-fluid">
                <a class="navbar-brand m-0 header-logo" href="<?php echo e(route('guest.home.index')); ?>">
                    <img src="<?php echo e(asset('/uploads/logo.png')); ?>" alt="..." height="36">
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
                    <a class="nav-link active" aria-current="page" href="#">Hỗ trợ</a>
                    </li>
                </ul>
                
                </div>
            </div>
        </nav>

    </div>
</section><?php /**PATH C:\teamcoder\www\trainning\helper.ecommerce_ing\resources\views/guest/includes/header.blade.php ENDPATH**/ ?>