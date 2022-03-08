

<?php $__env->startSection('content'); ?>
<div class="wrapper">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Room</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
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
            
          <table class="table" id="rooms-table">
          </table>
                       
          <?php echo $__env->make('admin.pages.room.modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div><!-- /.container-fluid -->

      </section>
    <!-- /.content -->
  </div>
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('jsAdmin'); ?>
<script src="<?php echo e(asset('themes/admin/js/rooms/rooms.js')); ?>"></script>
<script>
  var rooms=new rooms();
      rooms.datas={
        routes:{
          datatable:"<?php echo e(route('admin.datatables.room')); ?>",
          insert:"<?php echo e(route('admin.insert.room')); ?>",
          updates:"<?php echo e(route('admin.update.room')); ?>",
          updates_data:"<?php echo e(route('admin.update_data.room')); ?>",
          delete:"<?php echo e(route('admin.delete.room')); ?>", 
          get_permision:"<?php echo e(route('admin.get_permision.room')); ?>" 
        }
      }
      rooms.init();
      CKEDITOR.replace('room_detail');
      CKEDITOR.replace('room_detail_edit');

</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\teamcoder\www\trainning\bai_5\quan-ly-thong-tin-nguoi-dung\resources\views/admin/pages/room/room.blade.php ENDPATH**/ ?>