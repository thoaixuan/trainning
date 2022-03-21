

<?php $__env->startSection('content'); ?>
<div class="wrapper">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Quyền</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid card p-3">
        <div class="row">
          <div class="col-12 row">
            <div class="col-8 row">
              <div class="col-md-8">
               <input class="form-control" id="search"  name="search" vale="" placeholder="Từ khóa tìm kiếm ....">
              </div>
              <div class="col-md-4">
                <button class="btn btn-info text-light" id="btn-search">Tìm kiếm dữ liệu</button>
              </div>  
            </div>
            <div class="col-4">
              <button class="btn btn-success float-sm-right" id="open"><i class="fa fa-plus"></i></button>
            </div>
          </div>
            
          <table class="table table-bordered hover table-hover table-striped" id="roles-table">
          </table>
                       
          <?php echo $__env->make('admin.pages.role.modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div><!-- /.container-fluid -->

      </section>
    <!-- /.content -->
  </div>
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('jsAdmin'); ?>
<script src="<?php echo e(asset('themes/admin/js/roles/roles.js')); ?>"></script>
<script>
  var roles=new roles();
      roles.datas={
        routes:{
          datatable:"<?php echo e(route('admin.datatables.role')); ?>",
          insert:"<?php echo e(route('admin.insert.role')); ?>",
          updates:"<?php echo e(route('admin.update.role')); ?>",
          updates_data:"<?php echo e(route('admin.update_data.role')); ?>",
          delete:"<?php echo e(route('admin.delete.role')); ?>", 
          get_permision:"<?php echo e(route('admin.permission.role')); ?>"
        }
      }
      roles.init();
      CKEDITOR.replace('role_detail');
      CKEDITOR.replace('role_detail_edit');

</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\teamcoder\www\trainning\bai_5\quan-ly-thong-tin-nguoi-dung\resources\views/admin/pages/role/role.blade.php ENDPATH**/ ?>