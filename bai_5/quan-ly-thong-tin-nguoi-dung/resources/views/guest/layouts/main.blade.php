<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conzex</title>
    <link rel="shortcut icon" href="{{asset('themes\guest\assets\img\favicon.png')}}" type="image/x-icon">
    @include('guest.partials.stylesheet')
</head>
<body>
@include('guest.includes.preloader')

<div class="page-wrapper">
@include('guest.includes.header')
    @yield('content')
</div>
@include('guest.includes.footer')
@include('guest.partials.script')

</body>
<script src="{{asset('themes/guest/js/main.js')}}"></script>
@yield('jsGuest')

</html>