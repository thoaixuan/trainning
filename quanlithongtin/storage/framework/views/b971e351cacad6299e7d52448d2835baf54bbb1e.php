
<?php $__env->startSection('main'); ?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Quản lí phòng ban</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Admin</a></li>
            <li class="breadcrumb-item active">Phòng ban</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card card-solid">
      <div class="card-body pb-0">
          <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                    <input class="form-control" id="search" name="search" placeholder="Nội dung tìm kiếm ...">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group row">
                <button type="submit" class="btn btn-info formSearch">Tìm kiếm</button>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group text-right">
                    <button type="button" class="btn btn-success" id="btn-insert"><i class="fa fa-plus" aria-hidden="true"></i> Thêm Mới</button>
                </div>
              </div>
          </div>

          <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered hover table-hover table-striped" id="table-phongban">
                </table>
            </div>
        </div>

      </div>
      <!-- /.card-footer -->
    </div>
    <!-- /.card -->

  </section>
    <?php echo $__env->make('Admin.pages.phongban.modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php $__env->startSection('jsAdmin'); ?>
    <script src="<?php echo e(asset('app/admin/phongban/phongban.js')); ?>"></script>
<script>
  
var page = new page(); 
	    page.datas={
	        routes:{
	            datatable:"<?php echo e(route('phongban_datatable')); ?>",
                insert:"<?php echo e(route('phongban_insert')); ?>",
	            update:"<?php echo e(route('phongban_update')); ?>",
			    delete:"<?php echo e(route('phongban_delete')); ?>"
	        }
	    }   
	    page.init();

    CKEDITOR.replace('phongban_description');
    CKEDITOR.replace('phongban_description_edit');
      
</script>
<?php $__env->stopSection(); ?>
  
  <!-- /.content -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\trainning\quanlithongtin\resources\views/Admin/pages/phongban/phongban.blade.php ENDPATH**/ ?>