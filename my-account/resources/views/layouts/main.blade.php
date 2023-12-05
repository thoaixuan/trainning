<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
    @include('partials.stylesheet')

</head>
<body>
    <div class="page">
        @include('includes.header')
        @include('includes.sidebar')
        @yield('main')
        @include('includes.footer')
        @include('delete.delete')
    </div>
    {{-- @include('includes.scrollToTop') --}}

    @include('partials.scripts')
    {{-- @include('partials.scripthome') --}}
    {{-- <script src="{{asset('theme/assets/js/home.js')}}"></script> --}}
    @yield('js')
</body>
</html>
