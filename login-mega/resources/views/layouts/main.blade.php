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
    @include('includes.preload')
    <div class="page">
        @include('includes.header')
        @include('includes.sidebar')
        <div class="main-content app-content">
            <div class="container-fluid">
                @yield('main')
            </div>
        </div>
        @include('includes.footer')
        @include('includes.scrollToTop')
    </div>


    @include('partials.scripts')
    @yield('js')
</body>
</html>
