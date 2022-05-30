

<?php $__env->startSection('content'); ?>
<div class="wrapper">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">User</h1>
          </div>
         
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
                <button class="btn btn-primary" id="btn-search">Tìm kiếm dữ liệu</button>
              </div>  
            </div>
            <div class="col-4">
              <button class="btn btn-success float-sm-right" id="open"><i class="fa fa-plus"></i></button>
           
            </div>
          </div>
            
          <table class="table table-hover table-striped" id="users-table">
          </table>
          <div class="row">
            <div class="col-md-4">
                <input type="button" id="userExport" value="Export" class="btn btn-success"/>
            </div>
          </div>

          <?php echo $__env->make('admin.pages.user.modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div><!-- /.container-fluid -->

      </section>
    <!-- /.content -->
  </div>
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('jsAdmin'); ?>
<script src="<?php echo e(asset('themes/admin/js/users/users.js')); ?>"></script>
<script>
  var users=new users();
      users.datas={
        routes:{
          datatable:"<?php echo e(route('admin.datatables.user')); ?>",
          insert:"<?php echo e(route('admin.insert.user')); ?>",
          updates:"<?php echo e(route('admin.update.user')); ?>",
          updates_data:"<?php echo e(route('admin.update_data.user')); ?>",
          delete:"<?php echo e(route('admin.delete.user')); ?>",  
          get_room:"<?php echo e(route('admin.get_room.user')); ?>",  
          data_role:"<?php echo e(route('admin.data_role.user')); ?>",  
          get_detail:"<?php echo e(route('admin.get_detail.user')); ?>",
          get_insert:"<?php echo e(route('admin.get_insert.user')); ?>",
 
        }
      }
      users.init();

</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\trainning\bai_5\quan-ly-thong-tin-nguoi-dung\resources\views/admin/pages/user/user.blade.php ENDPATH**/ ?>