<!--==================================================================== 
                    Start service-section-style-one
=====================================================================-->
<?php if(count(getService())>0): ?>

<section class="service-section-one pt-85 rpt-65 pb-45 bg-gray">
    <div class="container">
        <div class="row justify-content-center">
            <div class="section-title">
                <h2>Dịch vụ của chúng tôi</h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <?php $__currentLoopData = getService(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <!-- single-service -->
            <div class="col-lg-3 col-md-6">
                <div class="single-service service-style-one text-center wow animated customFadeInUp delay-0-1s">
                    <div class="service-icon zero">
                         <i class="flaticon-network"></i>
                    </div>
                    <div class="service-content">
                        <h5><a href="single-service.html"><?php echo e($item->service_name); ?></a></h5>
                        <p><?php echo e($item->service_description); ?></p>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>
<?php endif; ?>


<!--==================================================================== 
                    End service-section-style-one
=====================================================================-->
<?php /**PATH C:\teamcoder\www\trainning\bai_2\search-project\resources\views/guest/pages/home/includes/service.blade.php ENDPATH**/ ?>