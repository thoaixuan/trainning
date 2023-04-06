<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('storage/assets/css/styles.css')}}">
    <link rel="stylesheet" href="{{asset('storage/assets/bootstrap/bootstrap.min.css')}}">
</head>
<body>
   @yield('main')
    
    <script src="{{asset('storage/assets/js/app.js')}}"></script>
    <script src="{{asset('storage/assets/bootstrap/bootstrap.min.js')}}"></script>
</body>

</html>