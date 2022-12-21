
<?php $__env->startSection('main'); ?>
<div class="bg-landing pt-3 pb-3">
    <div class="container ">
        <div class="row mt-10 mb-3">
            <div class="card-body bg-white text-dark shadow-lg p-3 mb-5 bg-body ">
                <div class="statistics-info p-4">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                            <div class="">
                                <form  id="contact_form" class="row">
                                    <h2 class="fw-bold">Thông tin liên hệ</h2>
                                    <div class="form-group col-md-6">
                                        <label for="name">Tên</label>
                                        <input type="text" name="name" class="form-control">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="email">Email</label>
                                        <input type="text" name="email" class="form-control">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="phone">Số điện thoại (không bắt buộc nhập)</label>
                                        <input type="text" name="phone" class="form-control">
                                    </div>
                                    <div class="form-group col-md-6">
                                    <label for="phone">Phòng ban</label>
                                        <select class="form-select" aria-label="Default select example" name="rooms_id" id="rooms_id">
                                                <option value="1">Phòng kinh doanh</option>
                                                <option value="2">Phòng kỹ thuật</option>
                                                <option value="3">Phòng kế toán</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="content">Nội dung</label>
                                        <textarea class="form-control" name="content" rows="4"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <?php echo NoCaptcha::renderJs(); ?>

                                        <?php echo NoCaptcha::display(); ?>

                                    </div>
                                    <button type="submit" class="btn btn-primary col-2">Gửi ngay</button>
                                </form>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('jsGuest'); ?>
<script src="<?php echo e(asset('app/Guest/contact/contact.js')); ?>"></script>
<script>
  var contact=new contact();
      contact.datas={
        routes:{
          insert:"<?php echo e(route('guest.contact.send_contacts')); ?>", 
        }
      }
      contact.init();
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('guest.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH M:\2022-ING\trainning\helper.ecommerce_ing\resources\views/guest/pages/contact/contact.blade.php ENDPATH**/ ?>