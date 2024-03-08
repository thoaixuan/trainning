<!doctype html>
<html lang="vi" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light" data-menu-styles="light" data-toggled="close">

<head>

    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="robots" content="noindex">
    <meta name="googlebot" content="noindex">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- TITLE -->
    <title>Login Mega</title>

    <!-- Favicon -->
    <link rel="icon" href="{{url('themes/assets/images/brand-logos/favicon.ico')}}" type="image/x-icon">

    <!-- Main Theme Js -->
    <script src="{{url('themes/assets/js/authentication-main.js')}}"></script>

    <!-- Bootstrap Css -->
    <link id="style" href="{{url('themes/assets/libs/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" >

    <!-- Style Css -->
    <link href="{{url('themes/assets/css/styles.min.css')}}" rel="stylesheet" >

    <!-- Icons Css -->
    <link href="{{url('themes/assets/css/icons.min.css')}}" rel="stylesheet" >

    <link rel="stylesheet" href="{{asset('themes/assets/libs/toastr/toastr.min.css')}}">

</head>

<body>
    @yield('main')
    <!-- Bootstrap JS -->
    <script src="{{url('themes/assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    {{-- Jquery --}}
    <script src="{{asset('themes/assets/js/jquery.min.js')}}"></script>
    {{-- Axios --}}
    <script src="{{asset('themes/assets/js/axios.min.js')}}"></script>
    {{-- <script src="{{asset('app/admin/main.js')}}?v={{time()}}"></script> --}}
    <!-- Show Password JS -->
    <script src="{{url('themes/assets/js/show-password.js')}}"></script>
    
    <script src="{{url('themes/assets/libs/toastr/toastr.min.js')}}"></script>

    <script src="https://unpkg.com/megajs@1/dist/main.browser-umd.js"></script>

    <script type="module" src="{{ asset('app/login/loginmega.js') }}"></script>

    @yield('jsAdmin')
</body>

</html>
