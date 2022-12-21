
<?php $__env->startSection('main'); ?>
<section name="main" >
    <?php $__currentLoopData = json_decode(getConfigMail()->home_banner); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list_banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="bg-primary h-300 p-4 d-flex justify-content-center align-items-center text-white" style="margin-top: 68px;">
            <div class="text-center">
                <h1>
                    <?php echo $list_banner->banner_title; ?>

                </h1>
                <div class="d-flex justify-content-center align-items-center">
                 <a href="<?php echo e(route('guest.contact.index')); ?>" class="btn btn-light btn-lg rounded-pill px-5"><?php echo $list_banner->banner_cta; ?></a>
                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <div class="container">
        <div class="py-5">
            <h2>Danh mục</h2>
            <div class="row">
                <?php $__currentLoopData = json_decode(getConfigMail()->home_category); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <div class="col-lg-3 col-md-4 col-sm-6 mt-2">
                      <div class="d-flex bg-content bg-white shadow-sm p-3 bg-body position-relative p-5 icon-bg">
                          <div class="position-absolute icon">
                            <span class="bg-icon d-flex justify-content-center align-items-center rounded-circle bg-primary">
                            <i class="side-menu__icon fe fe-home text-light"></i>
                              </span>
                          </div>
                          <div class="text-content">
                              <span><?php echo $list_category->category1; ?></span>
                          </div>
                      </div>
                  </div>
                  <div class="col-lg-3 col-md-4 col-sm-6 mt-2">
                      <div class="d-flex bg-content bg-white shadow-sm p-3 bg-body position-relative p-5 icon-bg">
                          <div class="position-absolute icon">
                            <span class="bg-icon d-flex justify-content-center align-items-center rounded-circle bg-teal">
                            <i class="side-menu__icon fe fe-grid text-light"></i>
                              </span>
                          </div>
                          <div class="text-content">
                              <span><?php echo $list_category->category2; ?></span>
                          </div>
                      </div>
                  </div>
                  <div class="col-lg-3 col-md-4 col-sm-6 mt-2">
                      <div class="d-flex bg-content bg-white shadow-sm p-3 bg-body position-relative p-5 icon-bg">
                          <div class="position-absolute icon">
                            <span class="bg-icon d-flex justify-content-center align-items-center rounded-circle bg-azure">
                            <i class="side-menu__icon fe fe-shopping-cart text-light"></i>
                              </span>
                          </div>
                          <div class="text-content">
                              <span><?php echo $list_category->category3; ?></span>
                          </div>
                      </div>
                  </div>
                  <div class="col-lg-3 col-md-4 col-sm-6 mt-2">
                      <div class="d-flex bg-content bg-white shadow-sm p-3 bg-body position-relative p-5 icon-bg">
                          <div class="position-absolute icon">
                            <span class="bg-icon d-flex justify-content-center align-items-center rounded-circle bg-yellow">
                                 <i class="fe fe-gitlab text-light"></i>
                              </span>
                          </div>
                          <div class="text-content">
                              <span><?php echo $list_category->category4; ?></span>
                          </div>
                      </div>
                  </div>
                  <div class="col-lg-3 col-md-4 col-sm-6 mt-2">
                      <div class="d-flex bg-content bg-white shadow-sm p-3 bg-body position-relative p-5 icon-bg">
                          <div class="position-absolute icon">
                            <span class="bg-icon d-flex justify-content-center align-items-center rounded-circle bg-red">
                                 <i class="fe fe-credit-card text-light"></i>
                              </span>
                          </div>
                          <div class="text-content">
                              <span><?php echo $list_category->category5; ?></span>
                          </div>
                      </div>
                  </div>
                  <div class="col-lg-3 col-md-4 col-sm-6 mt-2">
                      <div class="d-flex bg-content bg-white shadow-sm p-3 bg-body position-relative p-5 icon-bg">
                          <div class="position-absolute icon">
                            <span class="bg-icon d-flex justify-content-center align-items-center rounded-circle bg-orange">
                            <i class="fe fe-check-circle text-info text-light"></i>
                              </span>
                          </div>
                          <div class="text-content">
                              <span><?php echo $list_category->category6; ?></span>
                          </div>
                      </div>
                  </div>
                  <div class="col-lg-3 col-md-4 col-sm-6 mt-2">
                      <div class="d-flex bg-content bg-white shadow-sm p-3 bg-body position-relative p-5 icon-bg">
                          <div class="position-absolute icon">
                            <span class="bg-icon d-flex justify-content-center align-items-center rounded-circle bg-green">
                            <i class="side-menu__icon fe fe-users text-light"></i>
                              </span>
                          </div>
                          <div class="text-content">
                              <span><?php echo $list_category->category7; ?></span>
                          </div>
                      </div>
                  </div>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="py-5">
            <h2>
                Câu hỏi thường gặp
            </h2>
            <div>
                <?php $__currentLoopData = json_decode(getConfigMail()->home_question); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list_question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        <?php echo $list_question->question_title1; ?>

                        </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <?php echo $list_question->question_des1; ?>

                        </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            <?php echo $list_question->question_title2; ?>

                        </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <?php echo $list_question->question_des2; ?>

                        </div>
                        </div>
                    </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <h3 class="text-center">Bạn có muốn tìm thêm thông tin gì không?</h3>

        <div class="row d-flex justify-content-center">
            <?php $__currentLoopData = json_decode(getConfigMail()->home_info); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list_info): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-3 col-md-4 col-sm-6 mt-2">
                <div class="d-flex justify-content-start bg-content bg-white shadow-sm p-5 icon-info-bg">
                    <div class="bg-icon d-flex justify-content-center align-items-center rounded-circle bg-info">
                      <i class="side-menu__icon fe fe-mail text-light"></i>
                    </div>
                    <div class="d-flex flex-column bd-highlight">
                        <div class="px-2 bd-highlight"><?php echo $list_info->info_title1; ?></div>
                        <div class="px-2 bd-highlight"><?php echo $list_info->info_des1; ?></div>
                      </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-4 col-sm-6 mt-2">
                <div class="d-flex justify-content-start bg-content bg-white shadow-sm p-5 icon-info-bg">
                    <div class="bg-icon d-flex justify-content-center align-items-center rounded-circle bg-info">
                      <i class="side-menu__icon fe fe-phone text-light"></i>
                    </div>
                    <div class="d-flex flex-column bd-highlight">
                        <div class="px-2 bd-highlight"><?php echo $list_info->info_title2; ?></div>
                        <div class="px-2 bd-highlight"><?php echo $list_info->info_des2; ?></div>
                      </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        </div>
    </div>

</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('guest.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\teamcoder\www\trainning\sang_helper_ing\resources\views/guest/pages/dashboard/dashboard.blade.php ENDPATH**/ ?>