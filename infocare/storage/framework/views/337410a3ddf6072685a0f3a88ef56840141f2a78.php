
<?php $__env->startSection('main'); ?>

	<!--==================================================================== 
						Start hero section
	=====================================================================-->
	<section class="hero-section py-100 bg-img d-flex align-items-center hero-background">
	    <div class="container">
	        <div class="row">
	            <div class="col-md-7">
                    <div class="hero-text">
						<h1>Giải pháp CNTT an toàn cho một môi trường an toàn hơn</h1>
						<p>Chào mừng bạn đến với Công ty tư vấn đầu tư ING <br>Giải pháp công nghệ thông tin cho doanh nghiệp bạn</p>
						<a href="https://google.com" class="btn">Bắt đầu</a>
					</div>
					
	            </div>

	            <div class="d-none d-md-block wow  customFadeInRight hero-animation-image animated" style="visibility: visible; animation-name: customFadeInRight;">
                    <img src="<?php echo e(route('guest_home')); ?>/themes/guest/img/hero-right.png" alt="">
                </div>
                <div class="d-none d-md-block wow  customFadeInLeft tob-animation-image animated" style="visibility: visible; animation-name: customFadeInLeft;">
                    <img src="<?php echo e(route('guest_home')); ?>/themes/guest/img/tob.png" alt="">
                </div>
	        </div>
	    </div>
	</section>
	<!--==================================================================== 
						End hero section
	=====================================================================-->

    <!--==================================================================== 
                            end requirement section
    =====================================================================-->

        <section class="requirement-section another-page pt-65 pb-45">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 text-center">
                        <div class="section-title">
                            <h2>Tra cứu thông tin khách hàng</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="requirement-text text-center">
                            <p>Nhập <b>tên khách hàng, tên công ty, số điện thoại hoặc từ khóa</b> để tra cứu thông tin : Thông tin khách hàng, thông tin dịch vụ đã sử dụng</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="search-field">
                            <form id="form-search" onsubmit="return false">
                               <div class="form-group">
                                   <input type="text" class="keyword" id="keyword" name="keyword" placeholder="Nhập tên khách hàng, tên công ty, số điện thoại hoặc từ khóa">
                                   <button class="btn-bg2" type="submit"><i class="fa fa-search"></i>Tra cứu</button>
                               </div>
                           </form>
                        </div>
                    </div>
                </div>
                <div class="row d-none" id="result">
                    <div class="col-lg-12">
                        <table class="table table-bordered hover table-hover table-striped" id="table-search-info">
                        </table>
                    </div>
                </div>

            </div>
        </section>


    <!--==================================================================== 
                            end requirement section
    =====================================================================-->


	<!--==================================================================== 
							Start service-section-style-one
	=====================================================================-->

    
        <section class="featured-area pt-85 rpt-65 pb-100 bg-gray">
            <div class="d-none d-xl-block featured-round"><img src="<?php echo e(route('guest_home')); ?>/themes/guest/img/feature.png" alt=""></div>
            <div class="d-none d-xl-block featured-round-small"><img src="<?php echo e(route('guest_home')); ?>/themes/guest/img/small-feature.png" alt=""></div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 text-center">
                        <div class="section-title">
                            <h2>Dịch Vụ</h2>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <?php $__currentLoopData = getServices(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="featured-item wow  customFadeInUp dalay-0-1s animated" style="visibility: visible; animation-name: customFadeInUp;">
                            <div class="featured-icon violet">
                                <i class="flaticon-cms"></i>
                            </div>
                            <div class="featured-content">
                                <h5><a href="single-feature.html"><?php echo e($item->services_name); ?></a></h5>
                                <p><?php echo $item->services_description; ?></p>
                            </div>
                            <div class="hover"></div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </section>

    <!--==================================================================== 
							End service-section-style-one
	=====================================================================-->

    <!--==================================================================== -->


<?php $__env->stopSection(); ?>

<?php $__env->startSection('jsGuest'); ?>
<script src="<?php echo e(asset('themes/admin/plugins/datatables/jquery.dataTables.js')); ?>"></script>
    <script src="<?php echo e(asset('themes/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.js')); ?>"></script>
    <script src="<?php echo e(asset('themes/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js')); ?>"></script>
    <script src="<?php echo e(asset('themes/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')); ?>"></script>
    <script src="<?php echo e(asset('app/guest/home/home.js')); ?>"></script>
    <script>
        var home = new home();
        home.datas={
            routes:{
                search:"<?php echo e(route('guest_search_info')); ?>"
            }
        }
        home.init();

    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('guest.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\teamcoder\www\trainning\infocare\resources\views/guest/pages/home/home.blade.php ENDPATH**/ ?>