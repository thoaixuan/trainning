<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="icon" type="image/png" href="{{asset('guest/img/icon.png')}}" >
  <title>Trang chủ</title>
  @include('guest.includes.stylesheet')
</head>
<body>

    @include('guest.includes.header')

    @yield('content')

    @include('guest.includes.footer')

    @include('guest.includes.script')
    <script src="{{asset('guest/js/main.js')}}"></script>
    @yield('jsGuest')

</body>
</html>