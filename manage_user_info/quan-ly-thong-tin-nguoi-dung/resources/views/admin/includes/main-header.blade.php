<nav class="main-header navbar navbar-expand navbar-dark navbar-light sidebar-dark-primary">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link " data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <div class="dropdown my-auto">
        <span class="text-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         @auth
         <b>{{Auth::user()->full_name}}</b></span>
         @endauth
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          <a class="dropdown-item" href=""> <i class="fas fa-user"> </i>   Hồ sơ cá nhân </a>
          <a class="dropdown-item" href="{{route('admin.logout.login')}}"> <i class="fa-solid fa-arrow-right-from-bracket"></i>Đăng xuất</a>
        </div>
      </div>
    </ul>
  </nav>   