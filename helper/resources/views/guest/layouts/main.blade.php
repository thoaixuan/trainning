<!doctype html>
<html lang="en" dir="ltr">

<head>

    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="robots" content="noindex">
    <meta name="googlebot" content="noindex">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('themes/admin/assets/images/brand/favicon.ico')}}" />
    <!-- TITLE -->
    <title>{{$title}}</title>
    @include('guest.partials.stylesheet')

   
</head>

<body >

    <!-- /GLOBAL-LOADER -->
    @include('guest.includes.preload')

    @include('guest.includes.header')
    @yield('main')
    @include('guest.includes.footer')
    @include('guest.partials.scripts')
    <script src="{{asset('app/Guest/main.js')}}"></script>
    @yield('jsGuest')
</body>

</html>