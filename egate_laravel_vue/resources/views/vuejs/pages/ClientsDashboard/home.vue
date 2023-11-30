<template>
  <div>
<!-- Dashboard Analytics Start -->
    <div class="alert alert-primary alert-dismissible fade show position-relative" role="alert">
 e-Gate nay đã có trên  Android <a href="https://play.google.com/store/apps/details?id=com.ing.vn" target="_blank"><img class="inline image_store--width" src="/themes/assets/images/store/icon-google-play.png" alt=""/></a>, iphone <a href="https://apps.apple.com/vn/app/e-gate/id1590817074?l=vi" target="_blank"><img class="inline image_store--width" src="/themes/assets/images/store/icon-app-store.png" alt=""/></a>
    <!-- <span class="position-absolute top-0 end-0" data-bs-dismiss="alert" aria-label="Close"><svg viewBox="0 0 24 24" width="12" height="12" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></span> -->
    </div>
    <section id="dashboard-analytics">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-12">
                <div class="card">
                    <div class="card-header d-flex flex-column align-items-start pb-0">
                        <div class="avatar bg-rgba-primary p-50 m-0">
                            <div class="avatar-content">
                                <i class="feather icon-users text-primary font-medium-5"></i>
                            </div>
                        </div>
                        <h2 class="text-bold-700 mt-1 mb-25">92.6k</h2>
                        <p class="mb-0">Subscribers Gained</p>
                    </div>
                    <div class="card-content">
                        <div id="subscribe-gain-chart"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <div class="card">
                    <div class="card-header d-flex flex-column align-items-start pb-0">
                        <div class="avatar bg-rgba-warning p-50 m-0">
                            <div class="avatar-content">
                                <i class="feather icon-package text-warning font-medium-5"></i>
                            </div>
                        </div>
                        <h2 class="text-bold-700 mt-1 mb-25">97.5K</h2>
                        <p class="mb-0">Orders Received</p>
                    </div>
                    <div class="card-content">
                        <div id="orders-received-chart"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
</template>

<script>

export default {
components: {
    },
}
</script>

<style>
.image_store--width{
    width: 24px;
    height: 24px;
}

</style>