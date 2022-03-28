<!doctype html>
<html lang="vi">
<head>
    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('themes/admin/assets/images/brand/favicon.ico')}}" />
    <!-- TITLE -->
    <title>Admin</title>
    @include('Admin.partials.stylesheet')
</head>

<body class="app sidebar-mini ltr">
    @include('Admin.includes.preload')
    <!-- PAGE -->
    <div class="page">
        <div class="page-main">
            @include('Admin.includes.header')
            @include('Admin.includes.sidebar')
            @yield('main')
        </div>
    @include('Admin.includes.footer')
    </div>
    @include('Admin.includes.backtotop')
    @include('Admin.partials.scripts')
    <script src="{{asset('app/Admin/main.js')}}"></script>
    @yield('jsAdmin')
</body>
</html>
