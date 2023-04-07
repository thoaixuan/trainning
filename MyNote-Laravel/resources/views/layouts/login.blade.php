<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @include('partials.stylesheet')
    <link rel="stylesheet" href="{{asset('theme/assets/css/styles.css')}}">
</head>
<body>
    @yield('main')
    @include('partials.script')
    <script src="{{asset('theme/assets/js/app.js')}}"></script>
    @yield('js')
</body>
    
</html>