
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="icon" type="image/png" href="" >
  <title>Admin </title>
  @include('admin.includes.stylesheet')
</head>
<body class="sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed text-sm">
    <div class="wrapper">
        @include('admin.includes.header')
        @include('admin.includes.sidebar')
        <div class="content-wrapper">
            <section class="content">
                  @yield('content')
          </section>
        </div>
        </div>
        @include('admin.includes.scripts')
        @yield('jsComponent')
</body>
</html>
