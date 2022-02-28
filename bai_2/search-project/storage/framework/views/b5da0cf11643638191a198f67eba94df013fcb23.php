

<?php $__env->startSection('content'); ?>
<div class="wrapper">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Project</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Project</a></li>
            </ol>
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
              <div class="col-md-8"> <input class="form-control" id="search"  name="search" vale="" placeholder="Từ khóa tìm kiếm ...."></div>
              <div class="col-md-4"><button class="btn btn-primary" id="btn-search">Tìm kiếm dữ liệu</button></div>
            </div>
            <div class="col-4">
              <!-- <button class="btn btn-primary float-sm-left" id="btn-search"><i class="fa fa-plus"></i></button> -->
              <button class="btn btn-success float-sm-right" id="open"><i class="fa fa-plus"></i></button>
            </div>
          </div>
            
          <table class="table" id="projects-table">
          </table>
          <?php echo $__env->make('admin.pages.project.modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>;
        </div><!-- /.container-fluid -->
      </section>
    <!-- /.content -->
  </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('jsAdmin'); ?>
<script src="<?php echo e(asset('app/admin/projects/projects.js')); ?>"></script>
<script>
  var projects=new projects();
      projects.datas={
        routes:{
          datatable:"<?php echo e(route('admin.datatables.project')); ?>",
          insert:"<?php echo e(route('admin.insert.project')); ?>",
          updates:"<?php echo e(route('admin.update.project')); ?>",
          updates_data:"<?php echo e(route('admin.update_data.project')); ?>",
          delete:"<?php echo e(route('admin.delete.project')); ?>",
          get_user:"<?php echo e(route('admin.get_user.project')); ?>",
          get_service:"<?php echo e(route('admin.get_service.project')); ?>",
        }
      }
      projects.init();
</script>
<?php $__env->stopSection(); ?>





<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\teamcoder\www\trainning\bai_2\search-project\resources\views/admin/pages/project/project.blade.php ENDPATH**/ ?>