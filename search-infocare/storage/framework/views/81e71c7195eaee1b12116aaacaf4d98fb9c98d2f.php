
<?php $__env->startSection('content'); ?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Khách hàng</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Admin</a></li>
            <li class="breadcrumb-item active">Khách hàng</li>
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
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-add"><i class="fa fa-plus" aria-hidden="true"></i> Thêm Mới</button>
                </div>
              </div>
          </div>

          <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered hover table-hover table-striped" id="table-users">
                    <thead>
                        <tr>
                          <th>Công ty</th>
                          <th>Tên dịch vụ</th>
                          <th>Tên dự án</th>
                          <th>Hành động</th>
                        </tr>
                        </thead>
                        <tbody>
                           
                        <?php $__currentLoopData = $projects_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $projects_list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                          <td><?php echo e($projects_list->full_name); ?></td>
                          <td><?php echo e($projects_list->services_name); ?></td>
                          <td><?php echo e($projects_list->projects_name); ?></td>
                          <td>
                            <button onclick="idEdit('<?php echo e($projects_list->full_name); ?>','<?php echo e($projects_list->services_name); ?>','<?php echo e($projects_list->projects_name); ?>',<?php echo e($projects_list->id); ?>)"
                              type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-edit">
                              <i class="fas fa-edit"></i>
                            </button>
                            <button type="button" class="btn btn-danger" id="btn-delete"
                            data-url="<?php echo e(route('project-delete')."/".$projects_list->id); ?>">
                              <i class="fa fa-trash" aria-hidden="true"></i>
                            </button>
                          </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </tbody>
                </table>
            </div>
        </div>

      </div>
      <!-- /.card-footer -->
    </div>
    <!-- /.card -->

     <!-- modal add -->
     <div class="modal fade" id="modal-add">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Thêm mới</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="" data-url="<?php echo e(route('project-add')); ?>" id="form-add" method="post">
              <?php echo csrf_field(); ?>
            <div class="form-group">
              <label>Tên dự án</label>
              <input class="form-control form-control-sm" type="text" name="projects_name">
              <label for="">Khách hàng / Công ty</label>
              <select class="custom-select" name="userID">
                <?php $__currentLoopData = $users_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $users_list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($users_list->id); ?>"><?php echo e($users_list->full_name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
              <label for="">Dịch vụ</label>
              <select class="custom-select">
                <?php $__currentLoopData = $services_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $services_list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($services_list->id); ?>"><?php echo e($services_list->services_name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
          </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
            <button type="submit" class="btn btn-primary">Thêm mới</button>
          </div>
          </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>

    <!-- modal edit -->
    <div class="modal fade" id="modal-edit">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Cập nhật</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="" data-url="<?php echo e(route('service-update')); ?>" id="form-edit" method="post">
              <?php echo csrf_field(); ?>
              <input type="hidden" name="id" id="id_services">
            <div class="form-group">
              <label>Tên dịch vụ</label>
              <input id="services_name" class="form-control form-control-sm" type="text" name="services_name">

          </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
            <button type="submit" class="btn btn-primary">Lưu lại</button>
          </div>
          </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>

  </section>
    <?php $__env->startSection('jsComponent'); ?>
<script>
    $(function () {
    $("#table-users").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false
    });
    });
</script>
<?php $__env->stopSection(); ?>
  
  <!-- /.content -->
  <?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\search-infocare\resources\views/admin/pages/projects/projects.blade.php ENDPATH**/ ?>