 
<?php $__env->startSection('main'); ?>  

<!--app-content open-->
<div class="main-content app-content mt-0">

    <div class="side-app">

        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            <!-- PAGE-HEADER -->
            <div class="page-header">
                <h1 class="page-title">Quản lý hỗ trợ</h1>
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Trang chủ</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Support</li>
                    </ol>
                </div>

            </div>
            <!-- PAGE-HEADER END -->
            <div class="row row-sm">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                <div class="col-md-4">
                    <input type="text" class="form-control" id="search">
                </div>
                <div class="col-md-2">
                    <button class="btn btn-info btn-block" id="btn_search">Tra cứu</button>
                </div>
                <div class="col-md-2">
                    <button class="btn btn-success btn-block" id="open" type="button">Tạo mới</button>
                </div>
                </div>
                </div>
            </div>
            </div>
            <!-- Row -->
            <div class="row row-sm">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered text-nowrap border-bottom" id="supportTable">
                                </table>
                            </div>
                        </div>
                    </div>
            </div>
            <!-- End Row -->

        </div>
        <!-- CONTAINER CLOSED -->

    </div>
</div>
<!--app-content closed-->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('jsAdmin'); ?>
<script src="<?php echo e(asset('app/Admin/support/support.js')); ?>"></script>
<script>
var support = new support(); 
	    support.datas={
	        routes:{
	            datatable:"<?php echo e(route('admin.support.datatable')); ?>",
			    delete:"<?php echo e(route('admin.support.delete')); ?>"
	        }
	    }   
support.init();
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\trainning\helper\resources\views/admin/pages/support/index.blade.php ENDPATH**/ ?>