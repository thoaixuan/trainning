<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CodePen - A Pen by Mohithpoojary</title>
  @include('admin.partials.stylesheet')

</head>
<body id="signin">
@yield('content')
<!-- partial -->
<script src="{{asset('themes/admin/js/main.js')}}"></script>
@include('admin.partials.script')
@yield('jsAdmin')
</body>
</html>
