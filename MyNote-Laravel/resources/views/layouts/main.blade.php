<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
    @include('partials.stylesheet')
    <link rel="stylesheet" href="{{asset('theme/assets/css/home.css')}}">
    
</head>
<body>
    <div class="test container-fluid row position-relative d-flex">
        @include('includes.sidebar')
        <div class="cont col-lg-10  p-4 ps-5 z-0">
            <div class="dashboard h-100 container-fluid p-3 ps-4 ">
                @include('includes.dashboardnav')
                @yield('main')
            </div>
        </div>
    </div>
        @include('pages.users.modal')
        @include('pages.users.modaldel')
        @include('pages.notes.modal')
        @include('pages.notes.modaldel')
        @include('partials.script')
        <script src="{{asset('theme/assets/js/home.js')}}"></script>
        @yield('js')
</body>
</html>