 
<?php $__env->startSection('main'); ?>  

<!--app-content open-->
<div class="main-content app-content mt-0">

    <div class="side-app">

        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            <!-- PAGE-HEADER -->
            <div class="card card-solid">
                <div class="card-body">
                    <div class="panel panel-primary">
                        <div class=" tab-menu-heading">
                            <div class="tabs-menu1">
                                <!-- Tabs -->
                                <ul class="nav panel-tabs">
                                    <li><a href="#tab1" class="active" data-bs-toggle="tab">Cài đặt website</a></li>
                                    <li><a href="#tab2" data-bs-toggle="tab">Cấu hình mail</a></li>
                                    <li><a href="#tab3" data-bs-toggle="tab">Cấu hình google</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="panel-body tabs-menu-body">
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab1">
                                    <h4>Cài đặt trang chủ</h4>
                                    <form id="setting_home" autocomplete="off" enctype="multipart/form-data">
                                        <?php echo csrf_field(); ?>
                                    <div class="accordion mb-3" id="accordionExample">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="headingOne">
                                                <button class="accordion-button collapsed active" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                                        Chỉnh sửa banner
                                                    </button>
                                            </h2>
                                            <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample" style="">
                                                <div class="accordion-body">
                                                   <div class="row">
                                                    <?php $__currentLoopData = json_decode(getConfigMail()->home_banner); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list_banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="col-md-6">
                                                      <div class="form-group">
                                                        <label>Tiêu đề</label>
                                                        <input type="text" name="home_banner_title" class="form-control" value="<?php echo e($list_banner->banner_title); ?>"/>
                                                      </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                      <div class="form-group">
                                                        <label>Call to action</label>
                                                        <input type="text" name="home_banner_cta" class="form-control" value="<?php echo e($list_banner->banner_cta); ?>"/>
                                                      </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                      <div class="form-group">
                                                      <button type="submit" class="btn btn-primary" id="submit_setting_home">Lưu</button>
                                                    </div>
                                                  </div>
                                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                   </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="headingTwo">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                        Chỉnh sửa danh mục
                                                    </button>
                                            </h2>
                                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    <div class="row">
                                                      <?php $__currentLoopData = json_decode(getConfigMail()->home_category); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                      <div class="col-md-6">
                                                        <div class="form-group">
                                                          <input type="text" name="category1" class="form-control" value="<?php echo e($list_category->category1); ?>">
                                                        </div>
                                                        <div class="form-group">
                                                          <input type="text" name="category2" class="form-control" value="<?php echo e($list_category->category2); ?>">
                                                        </div>
                                                        <div class="form-group">
                                                          <input type="text" name="category3" class="form-control" value="<?php echo e($list_category->category3); ?>">
                                                        </div>
                                                        <div class="form-group">
                                                          <input type="text" name="category4" class="form-control" value="<?php echo e($list_category->category4); ?>">
                                                        </div>
                                                      </div>
                                                      <div class="col-md-6">
                                                        <div class="form-group">
                                                          <input type="text" name="category5" class="form-control" value="<?php echo e($list_category->category5); ?>">
                                                        </div>
                                                        <div class="form-group">
                                                          <input type="text" name="category6" class="form-control" value="<?php echo e($list_category->category6); ?>">
                                                        </div>
                                                        <div class="form-group">
                                                          <input type="text" name="category7" class="form-control" value="<?php echo e($list_category->category7); ?>">
                                                        </div>
                                                      </div>
                                                      <div class="col-md-12">
                                                        <div class="form-group">
                                                        <button type="submit" class="btn btn-primary">Lưu</button>
                                                      </div>
                                                    </div>
                                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="headingThree">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                        Chỉnh sửa câu hỏi thường gặp
                                                    </button>
                                            </h2>
                                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    <div class="row">
                                                      <?php $__currentLoopData = json_decode(getConfigMail()->home_question); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list_question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                      <div class="col-md-6">
                                                        <div class="form-group">
                                                          <label>Câu hỏi 1</label>
                                                          <input type="text" name="question_title1" class="form-control" value="<?php echo e($list_question->question_title1); ?>">
                                                        </div>
                                                        <div class="form-group">
                                                          <label>Trả lời 1</label>
                                                          <input type="text" name="question_des1" class="form-control" value="<?php echo e($list_question->question_des1); ?>">
                                                        </div>
                                                      </div>
                                                      <div class="col-md-6">
                                                        <div class="form-group">
                                                          <label>Câu hỏi 2</label>
                                                          <input type="text" name="question_title2" class="form-control" value="<?php echo e($list_question->question_title2); ?>">
                                                        </div>
                                                        <div class="form-group">
                                                          <label>Trả lời 2</label>
                                                          <input type="text" name="question_des2" class="form-control" value="<?php echo e($list_question->question_des2); ?>">
                                                        </div>
                                                      </div>
                                                      <div class="col-md-12">
                                                        <div class="form-group">
                                                        <button type="submit" class="btn btn-primary">Lưu</button>
                                                      </div>
                                                    </div>
                                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                          <h2 class="accordion-header" id="heading4">
                                              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
                                                      Chỉnh sửa thông tin
                                                  </button>
                                          </h2>
                                          <div id="collapse4" class="accordion-collapse collapse" aria-labelledby="heading4" data-bs-parent="#accordionExample">
                                              <div class="accordion-body">
                                                <div class="row">
                                                  <?php $__currentLoopData = json_decode(getConfigMail()->home_info); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list_info): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                  <div class="col-md-6">
                                                    <div class="form-group">
                                                      <label>Tiêu đề 1</label>
                                                      <input type="text" name="info_title1" class="form-control" value="<?php echo e($list_info->info_title1); ?>">
                                                    </div>
                                                    <div class="form-group">
                                                      <label>Mô tả 1</label>
                                                      <input type="text" name="info_des1" class="form-control" value="<?php echo e($list_info->info_des1); ?>">
                                                    </div>
                                                  </div>
                                                  <div class="col-md-6">
                                                    <div class="form-group">
                                                      <label>Tiêu đề 2</label>
                                                      <input type="text" name="info_title2" class="form-control" value="<?php echo e($list_info->info_title2); ?>">
                                                    </div>
                                                    <div class="form-group">
                                                      <label>Mô tả 2</label>
                                                      <input type="text" name="info_des2" class="form-control" value="<?php echo e($list_info->info_des2); ?>">
                                                    </div>
                                                  </div>
                                                  <div class="col-md-12">
                                                    <div class="form-group">
                                                    <button type="submit" class="btn btn-primary">Lưu</button>
                                                  </div>
                                                </div>
                                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </div>
                                              </div>
                                          </div>
                                      </div>
                                    </div>
                                    </form>
                                    <form autocomplete="off"  enctype="multipart/form-data" id="websiteForm">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="id" value="<?php echo e(getConfigMail()->id); ?>">
                                        <div class="row">
                                            <?php $__currentLoopData = json_decode(getConfigMail()->website_logo); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list_logo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                            <label>Logo website</label>
                                            <?php if(!empty($list_logo->logo_guest)): ?>
                                            <p><img class="w-25" src="<?php echo e(route('guest.home.index')); ?>/uploads/<?php echo e($list_logo->logo_guest); ?>"/></p>
                                            <?php else: ?>
                                            <?php endif; ?>
                                            <input type="file" name="guest_logo_header" id="guest_logo_header" class="w-100"/>
                                            </div>
                                            <div class="form-group">
                                                <label>Tên website</label>
                                                <input type="text" name="website_name" class="form-control" value="<?php echo e(getConfigMail()->website_name); ?>"/>
                                              </div>
                                            <div class="form-group">
                                                  <label>Root color</label>
                                                  <input type="text" name="root_color" class="form-control" value="<?php echo e(getConfigMail()->root_color); ?>"/>
                                                </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Favicon website</label>
                                                <?php if(!empty($list_logo->favicon)): ?>
                                                 <p><img class="w-25" src="<?php echo e(route('guest.home.index')); ?>/uploads/<?php echo e($list_logo->favicon); ?>"/></p>
                                                 <?php else: ?>
                                                 <?php endif; ?>
                                                <input type="file" name="website_favicon" class="form-control"/>
                                              </div>
                                              <div class="form-group">
                                                <label>Logo admin light mode</label>
                                                <?php if(!empty($list_logo->admin_logo_blue)): ?>
                                                <p><img class="w-25" src="<?php echo e(route('guest.home.index')); ?>/uploads/<?php echo e($list_logo->admin_logo_blue); ?>"/></p>
                                                <?php else: ?>
                                                <?php endif; ?>
                                                <input type="file" name="admin_logo_blue" class="form-control"/>
                                              </div>
                                              <div class="form-group">
                                               <label>Logo admin dark mode</label>
                                               <?php if(!empty($list_logo->admin_logo_white)): ?>
                                                <p><img class="w-25" src="<?php echo e(route('guest.home.index')); ?>/uploads/<?php echo e($list_logo->admin_logo_white); ?>"/></p>
                                                <?php else: ?>
                                                <?php endif; ?>
                                               <input type="file" name="admin_logo_white" class="form-control"/>
                                             </div>
                                        </div>
                                        <div class="p-3">
                                            <button type="submit" class="btn btn-primary" id="submitWeb">Lưu</button>
                                        </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                        </form>
                                </div>
                                <div class="tab-pane" id="tab2">
                                    <form id="mailForm" method="post">
                                        <?php echo csrf_field(); ?>
                                        <div class="row">
                                          <?php $__currentLoopData = json_decode(getConfigMail()->config_mail); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list_mail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="col-md-12 mb-3">
                                           <h4>Cài đặt cấu hình gửi mail</h4>
                                         </div>
                                         <div class="col-md-6">
                                           <div class="form-group">
                                             <label>Mail driver</label>
                                             <input type="text" name="mail_driver" class="form-control form-control-sm" value="<?php echo e($list_mail->mail_driver); ?>"/>
                                           </div>
                                           <div class="form-group">
                                             <label>Mail host</label>
                                             <input type="text" name="mail_host" class="form-control form-control-sm" value="<?php echo e($list_mail->mail_host); ?>"/>
                                           </div>
                                           <div class="form-group">
                                             <label>Mail port</label>
                                             <input type="text" name="mail_port" class="form-control form-control-sm" value="<?php echo e($list_mail->mail_port); ?>"/>
                                           </div>
                                           <div class="form-group">
                                             <label>Mail from address</label>
                                             <input type="text" name="mail_from_address" class="form-control form-control-sm" value="<?php echo e($list_mail->mail_from_address); ?>"/>
                                           </div>
                                           <div class="form-group">
                                             <label>Mail from name</label>
                                             <input type="text" name="mail_from_name" class="form-control form-control-sm" value="<?php echo e($list_mail->mail_from_name); ?>"/>
                                           </div>
                                         </div>
                                         <div class="col-md-6">
                                           <div class="form-group">
                                             <label>Mail encryption</label>
                                             <input type="text" name="mail_encryption" class="form-control form-control-sm" value="<?php echo e($list_mail->mail_encryption); ?>"/>
                                           </div>
                                           <div class="form-group">
                                             <label>Mail username</label>
                                             <input type="text" id="mail_username" name="mail_username" class="form-control form-control-sm" value="<?php echo e($list_mail->mail_username); ?>"/>
                                           </div>
                                           <div class="form-group">
                                             <label>Mail password</label>
                                             <input type="text" id="mail_password" name="mail_password" class="form-control form-control-sm" value="<?php echo e($list_mail->mail_password); ?>"/>
                                           </div>
                                           <div class="form-group">
                                             <label>Mail người nhận</label>
                                             <input type="text" name="mail_receive" class="form-control form-control-sm" value="<?php echo e($list_mail->mail_receive); ?>"/>
                                           </div>
                                         </div>
                                       <div class="col-md-1">
                                         <button type="submit" class="btn btn-primary btn-block">Lưu</button>
                                       </div>
                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>            
                                       </form>
                                </div>
                                <div class="tab-pane" id="tab3">
                                    <form id="setting_google">
                                        <?php echo csrf_field(); ?>
                                        <div class="row">
                                          <?php $__currentLoopData = json_decode(getConfigMail()->config_google); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list_google): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                         <div class="col-md-12">
                                             <h4>Captcha Google</h4>
                                           <div class="form-group">
                                             <label>Nocaptcha Secret</label>
                                             <input type="text" name="nocaptcha_secret" class="form-control form-control-sm" value="<?php echo e($list_google->nocaptcha_secret); ?>"/>
                                           </div>
                                           <div class="form-group">
                                             <label>Nocaptcha Sitekey</label>
                                             <input type="text" name="nocaptcha_sitekey" class="form-control form-control-sm" value="<?php echo e($list_google->nocaptcha_sitekey); ?>"/>
                                           </div>
                                           
                                         </div>
                                       <div class="col-md-1">
                                         <button type="submit" class="btn btn-primary btn-block">Lưu</button>
                                       </div>
                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>            
                                       </form>
                                </div>
                                
                            </div>
                        </div>
                    </div>

                    
                </div>
            </div>
       
            

        </div>
        <!-- CONTAINER CLOSED -->

    </div>
</div>
<!--app-content closed-->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('jsAdmin'); ?>
<script src="<?php echo e(asset('app/admin/setting/setting.js')); ?>"></script>
<script>
var setting = new setting(); 
	    setting.datas={
	        routes:{
                update_home: "<?php echo e(route('admin.setting.update_home')); ?>",
			    update_website:"<?php echo e(route('admin.setting.update_website')); ?>",
			    update_mail:"<?php echo e(route('admin.setting.update_mail')); ?>",
                update_google: "<?php echo e(route('admin.setting.update_google')); ?>"
	        }
	    }   
setting.init();
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\trainning\helper\resources\views/admin/pages/setting/index.blade.php ENDPATH**/ ?>