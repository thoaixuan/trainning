<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký trực tuyến</title>
    <!-- css -->
    @include('register.partials.stylesheet')
</head>
<body class="Landing-page">
    <!--Page  -->
    <div class='register-online'>
    @include('register.includes.header')
    @yield('main')
    @include('register.includes.footer')
    @include('register.partials.scripts')
    </div>
    @yield('registerJs')
</body>
</html>
