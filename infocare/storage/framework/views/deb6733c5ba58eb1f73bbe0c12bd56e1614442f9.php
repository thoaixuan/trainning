
<?php $__env->startSection('main'); ?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Cài đặt website</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Admin</a></li>
            <li class="breadcrumb-item active">Settings</li>
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
        <form action="<?php echo e(route('settings_update_mail')); ?>" method="post">
          <?php echo csrf_field(); ?>
          <div class="row">
            
                <input type="hidden" name="id" value="<?php echo e(getConfigMail()->id); ?>">
            <div class="col-md-6">
              <div class="form-group">
                <label>Mail driver</label>
                <input type="text" name="mail_driver" class="form-control form-control-sm" value="<?php echo e(getConfigMail()->mail_driver); ?>"/>
              </div>
              <div class="form-group">
                <label>Mail host</label>
                <input type="text" name="mail_host" class="form-control form-control-sm" value="<?php echo e(getConfigMail()->mail_host); ?>"/>
              </div>
              <div class="form-group">
                <label>Mail port</label>
                <input type="text" name="mail_port" class="form-control form-control-sm" value="<?php echo e(getConfigMail()->mail_port); ?>"/>
              </div>
              <div class="form-group">
                <label>Mail from address</label>
                <input type="text" name="mail_from_address" class="form-control form-control-sm" value="<?php echo e(getConfigMail()->mail_from_address); ?>"/>
              </div>
              <div class="form-group">
                <label>Mail from name</label>
                <input type="text" name="mail_from_name" class="form-control form-control-sm" value="<?php echo e(getConfigMail()->mail_from_name); ?>"/>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Mail encryption</label>
                <input type="text" name="mail_encryption" class="form-control form-control-sm" value="<?php echo e(getConfigMail()->mail_encryption); ?>"/>
              </div>
              <div class="form-group">
                <label>Mail username</label>
                <input type="text" name="mail_username" class="form-control form-control-sm" value="<?php echo e(getConfigMail()->mail_username); ?>"/>
              </div>
              <div class="form-group">
                <label>Mail password</label>
                <input type="text" name="mail_password" class="form-control form-control-sm" value="<?php echo e(getConfigMail()->mail_password); ?>"/>
              </div>
              <div class="form-group">
                <label>Mail người nhận</label>
                <input type="text" name="mail_receive" class="form-control form-control-sm" value="<?php echo e(getConfigMail()->mail_receive); ?>"/>
              </div>
            </div>
          <div class="col-md-1">
            <button type="submit" class="btn btn-primary btn-block">Lưu</button>
          </div>
        </div>
      </form>
      </div>
      <!-- /.card-footer -->
    </div>
    <!-- /.card -->

  </section>

  
  <!-- /.content -->
  <?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\teamcoder\www\trainning\infocare\resources\views/Admin/pages/setting/setting.blade.php ENDPATH**/ ?>