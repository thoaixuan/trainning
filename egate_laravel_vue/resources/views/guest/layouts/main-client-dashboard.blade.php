<!doctype html>
<html lang="vi" >

<head>
    <meta charset="utf-8">
    <!-- <base href="/"/> -->
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Cung cấp các giải pháp về ứng dụng công nghệ tiên tiến nhất nhằm nâng cao trải nghiệm của người dùng trên hệ thống. Các sản phẩm chất lượng - Bảo vệ môi trường và các sản phẩm công nghệ tiện ích.">
    <meta name="keyword" content="e-Gate, e-Gate Center, e-Gate Vũng Tàu, e-Gate Vung Tau">
    
    <title>e-Gate - Kết nối kỷ nguyên công nghệ</title>
    <link rel="icon" href="{{asset('themes/assets/images/logo/favicon.png')}}" type="image/x-icon"> <!-- Favicon-->
    @include('guest.partials.client_dashboard.stylesheet')
</head>

<body class="vertical-layout vertical-menu-modern 2-columns  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

 
<div id="app-client-dahboard">
    <main-client-dahboard-component></main-client-dahboard-component>
<div id="app"></div>
</div>

@include('guest.partials.client_dashboard.scripts')
@yield('jsGuest')
</body>
</html>








