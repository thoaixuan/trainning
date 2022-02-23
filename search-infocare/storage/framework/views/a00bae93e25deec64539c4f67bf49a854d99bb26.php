<!--==================================================================== 
                    Start Scroll Top Button
=====================================================================-->

<button class="scroll-top scroll-to-target" data-target="html">
    <span class="fa fa-angle-up"></span>
</button>   


<!--====================================================================
                    End Scroll Top Button
====================================================================-->
<!--==================================================================== 
                    Start footer section
=====================================================================-->

<footer class="footer">
    <div class="container">
        <div class="row">

            <!--big column-->
            <div class="col-md-7">
                <div class="row">

                    <!--Footer Column-->
                    <div class="col-sm-7">
                        <div class="footer-widget logo-widget">
                            <div class="footer-logo"><a href="<?php echo e(route('guest_home')); ?>"><img src="<?php echo e(route('guest_home')); ?>/guest/img/logo.png" alt=""></a></div>
                            <div class="widget-content">
                                <div class="text">
                                    <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat</p>
                                </div>
                                <div class="footer-social-icon">
                                    <ul class="social-icon-one">
                                        <li><a href=""><i class="fa fa-facebook-f"></i></a></li>
                                        <li><a href="tel:+" rel="no-follow"><i class="fa fa-phone"></i></a></li>
                                        <li><a href=""><i class="fa fa-linkedin"></i></a></li>
                                        <li><a href=""><i class="fa fa-instagram"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--big column-->
            <div class="col-md-5">
                <div class="row">

                    <!--Footer Column-->
                    <div class="">
                        <div class="footer-widget links-widget float-lg-right">
                            <h5 class="footer-title">Liên kết</h5>
                            <div class="widget-content">
                                <ul class="list">
                                    <?php $__currentLoopData = getPages(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li>
                                        <a href="<?php echo e(route('guest_pages',$item->pages_slug)); ?>"><?php echo e($item->pages_name); ?></a>
                                    </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>

    <!--Copyright-->
    <div class="footer-bottom">
        <div class="copyright">Copyright @ <?=(date("Y"))?> <a href="http://google.com">Sáng.</a> All rights reserved.</div>
    </div>
</footer>


<!--==================================================================== 
                    End footer section
=====================================================================--><?php /**PATH C:\laragon\www\search-infocare\resources\views/guest/includes/footer.blade.php ENDPATH**/ ?>