<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('guest.includes.stylesheet')
    <title>Search InfoCare</title>
</head>
<body>
    @include('guest.includes.header')

    @yield('content')

    @include('guest.includes.footer')

    @include('guest.includes.script')
</body>
</html>