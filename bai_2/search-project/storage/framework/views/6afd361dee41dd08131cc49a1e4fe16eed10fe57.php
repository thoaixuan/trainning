

<?php $__env->startSection('content'); ?>
    <!-- Preloader -->
    <?php echo $__env->make('guest.includes.preloader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- Main Header -->
    <?php echo $__env->make('guest.pages.home.includes.main-header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- Tra cứu -->
    <br/>
    <div class="tracuu text-center container">
        <h2>Tra Thông Tin Dịch Vụ</h2><br/>
        <p>Nhập <b>tên khách hàng hoặc số điện thoại</b> để tra cứu thông tin: Thông tin khách hàng, thông tin dịch vụ đã sử dụng, trạng thái bảo hành - hỗ trợ,..v.v</p><br/>
        <div class="input-group">
        <input type="search" id="search" class="form-control" placeholder="Nhập tên khách hàng, tên công ty hoặc số điện thoại"><button class="btn btn-outline-secondary p-1" id="btn-search">Tra cứu</button>
        </div>
        <table class="table table-striped table-hover" id="project-table">

        </table>
    </div>
    <!--Service-->
    <?php echo $__env->make('guest.pages.home.includes.service', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('guest.pages.home.includes.modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  

<?php $__env->stopSection(); ?>



<?php $__env->startSection('jsGuest'); ?>
<script src="<?php echo e(asset('app/guest/home/home.js')); ?>"></script>
<script>
  var home=new home();
      home.datas={
        routes:{
          datatable:"<?php echo e(route('guest.datatables.home')); ?>",
          get_data_project:"<?php echo e(route('guest.get_data_project.home')); ?>",
          get_user:"<?php echo e(route('admin.get_user.project')); ?>",
          get_service:"<?php echo e(route('admin.get_service.project')); ?>",
        }
      }
      home.init();
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('guest.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\teamcoder\www\trainning\bai_2\search-project\resources\views/guest/pages/home/home.blade.php ENDPATH**/ ?>