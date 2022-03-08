<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" href="{{asset('themes/guest/img/icon.png')}}" >
  <title>Trang chủ</title>
  @include('Guest.partials.stylesheet')
</head>
<body>

  <div class="page-wrapper">
    
    @include('Guest.includes.preload')
    
    @include('Guest.includes.header')
  
    @yield('main')
  
    @include('Guest.includes.footer')

    @include('Guest.includes.backtotop')

  </div>

  @include('Guest.partials.scripts')

  @yield('jsGuest')

</body>
</html>
