 
<?php $__env->startSection('main'); ?>
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Tổng Quan</h1>
			</div>
			<!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>/">Tổng Quan</a>
					</li></ol>
			</div>
			<!-- /.col -->
		</div>
		<!-- /.row -->
	</div>
	<!-- /.container-fluid -->
</div>
<div class="container-fluid">

	<div class="row">
		<div class="col-md-12">
			<div class="row">
				<div class="col-sm-12 col-md-6 col-lg-4 ">
					<!-- small box -->
					<div class="small-box bg-primary">
						<div class="inner">
							<h5 id="countCustomers">5</h5>
							<p>Tổng Thành Viên</p>
						</div>
						<div class="icon"> <i class="fa fa-users" aria-hidden="true"></i>
						</div>
						<a href="" class="small-box-footer">Xem chi tiết <i class="fas fa-arrow-circle-right"></i></a>
					</div>
				</div>
				<!-- ./col -->
				<div class="col-sm-12 col-md-6 col-lg-4 ">
					<!-- small box -->
					<div class="small-box bg-warning">
						<div class="inner">
							<h5 class="countPublished">1</h5> 
							<p>Tổng Dự án</p>
						</div>
						<div class="icon"> <i class="far fa-file-alt" aria-hidden="true"></i>
						</div>
						<a href="" class="small-box-footer">Xem chi tiết <i class="fas fa-arrow-circle-right"></i></a>
					</div>
				</div>
				
				<div class="col-sm-12 col-md-6 col-lg-4 ">
					<!-- small box -->
					<div class="small-box bg-success">
						<div class="inner">
							<h5 class="countPending">3</h5>
							<p>Tổng Dịch Vụ</p>
						</div>
						<div class="icon"><i class="fas fa-list-alt"></i>
						</div>
						<a href="" class="small-box-footer">Xem chi tiết <i class="fas fa-arrow-circle-right"></i></a>
					</div>
				</div>
				<!-- ./col -->

				<!-- ./col -->
			</div>

		</div>
		
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('jsAdmin'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\trainning\quanlithongtin\resources\views/Admin/pages/dashboard/dashboard.blade.php ENDPATH**/ ?>