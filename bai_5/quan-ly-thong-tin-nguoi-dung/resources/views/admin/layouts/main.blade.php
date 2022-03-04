<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Tổng quan|Project Thanh Sơn</title>
  @include('admin.partials.stylesheet')
 
</head>

<body class="hold-transition sidebar-mini layout-fixed">
<!-- Preloader -->
<!-- @include('admin.includes.preloader') -->

<!-- Navbar -->
@include('admin.includes.main-header')
<!-- /.navbar -->

<!-- Main Sidebar Container -->
@include('admin.includes.main-sidebar')

@yield('content')

<!-- /.content-wrapper -->
@include('admin.includes.footer')
<script src="{{asset('themes/admin/js/main.js')}}"></script>
@include('admin.partials.script')
@yield('jsAdmin')
</body>
</html>
