<!doctype html>
<html lang="vi">

<head>

    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('themes/admin/assets/images/brand/favicon.ico')}}" />

    <!-- TITLE -->
    <title>Admin Login</title>

    <!-- BOOTSTRAP CSS -->
    <link id="style" href="{{asset('themes/admin/assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" />

    <!-- STYLE CSS -->
    <link href="{{asset('themes/admin/assets/css/style.css')}}" rel="stylesheet" />
    <link href="{{asset('themes/admin/assets/css/dark-style.css')}}" rel="stylesheet" />
    <link href="{{asset('themes/admin/assets/css/transparent-style.css')}}" rel="stylesheet">
    <link href="{{asset('themes/admin/assets/css/skin-modes.css')}}" rel="stylesheet" />
    <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('themes/admin/assets/plugins/toastr/toastr.min.css')}}">
    <!--- FONT-ICONS CSS -->
    <link href="{{asset('themes/admin/assets/css/icons.css')}}" rel="stylesheet" />

    <!-- COLOR SKIN CSS -->
    <link id="theme" rel="stylesheet" type="text/css" media="all" href="{{asset('themes/admin/assets/colors/color1.css')}}" />

</head>

<body class="app sidebar-mini ltr">
    @yield('main')

    <!-- JQUERY JS -->
    <script src="{{asset('themes/admin/assets/js/jquery.min.js')}}"></script>

    <!-- BOOTSTRAP JS -->
    <script src="{{asset('themes/admin/assets/plugins/bootstrap/js/popper.min.js')}}"></script>
    <script src="{{asset('themes/admin/assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>

    <!-- SHOW PASSWORD JS -->
    <script src="{{asset('themes/admin/assets/js/show-password.min.js')}}"></script>

    <!-- GENERATE OTP JS -->
    <script src="{{asset('themes/admin/assets/js/generate-otp.js')}}"></script>

    <!-- Color Theme js -->
    <script src="{{asset('themes/admin/assets/js/themeColors.js')}}"></script>

    <!-- CUSTOM JS -->
    <script src="{{asset('themes/admin/assets/js/custom.js')}}"></script>
    <!-- Toastr -->
    <script src="{{ asset('themes/admin/assets/plugins/toastr/toastr.min.js')}}"></script>
    <script src="{{asset('themes/admin/assets/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('themes/admin/assets/plugins/jquery-validation/additional-methods.min.js')}}"></script>
    @yield('jsAdmin')

</body>

</html>