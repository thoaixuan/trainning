<!doctype html>
<html lang="vi" >

<head>
    <meta charset="utf-8">
    <!-- <base href="/"/> -->
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Cung cấp các giải pháp về ứng dụng công nghệ tiên tiến nhất nhằm nâng cao trải nghiệm của người dùng trên hệ thống. Các sản phẩm chất lượng - Bảo vệ môi trường và các sản phẩm công nghệ tiện ích. ">
    <meta name="keyword" content="e-Gate, e-Gate Center, e-Gate Vũng Tàu, e-Gate Vung Tau">
    
    <title>e-Gate - Kết nối kỷ nguyên công nghệ</title>
    <link rel="icon" href="{{asset('themes/assets/images/logo/favicon.png')}}" type="image/x-icon"> <!-- Favicon-->
    @include('guest.partials.client_dashboard.stylesheet')
</head>

<body class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="blank-page">

 
<!-- BEGIN: Content-->
<div class="app-content"  id="app-client-dahboard">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="container">
                <!-- maintenance -->
                <section class="row">
                    <div class="col-12 text-center">
                                    <img src="{{asset('themes/app-assets/images/svg/error.svg')}}" class="img-fluid align-self-center" alt="branding logo">
                                    <h1 class="font-large-2 my-1">Under Maintenance! 🛠</h1>
                                    <p class="px-2">
                                        Sorry for the inconvenience but we're performing some maintenance at the moment
                                    </p>
                                    <a class="btn btn-primary btn-lg mt-1" href="{{route('guest.home')}}">Back to Home</a>
                    </div>
                </section>
                <!-- maintenance end -->

            </div>
        </div>
    </div>
    <!-- END: Content-->

@include('guest.partials.client_dashboard.scripts')
@yield('jsGuest')
</body>
</html>








