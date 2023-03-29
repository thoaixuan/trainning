<!DOCTYPE html>
<html lang="vi">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Caculator</title>
        <link rel="stylesheet" href="{{url('/css/app.css')}}">
        <link href="{{url('/bootstrap-5.3.0-alpha2-dist/css/bootstrap.min.css')}}" rel="stylesheet">
    </head>
    <body>
        <div class="container text-center">
           @yield('main')
        </div>
    </body>
    <script type="text/javascript" src="{{url('/js/app.js')}}"></script>
    <script src="{{url('/bootstrap-5.3.0-alpha2-dist/js/bootstrap.bundle.min.js')}}"></script>
</html>
