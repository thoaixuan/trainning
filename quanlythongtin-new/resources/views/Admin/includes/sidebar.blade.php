<!--APP-SIDEBAR-->
<div class="sticky">
    <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
    <div class="app-sidebar">
        <div class="side-header">
            <a class="header-brand1" href="index.html">
                <img src="{{asset('themes/admin/assets/images/brand/logo.png')}}" class="header-brand-img desktop-logo" alt="logo">
                <img src="{{asset('themes/admin/assets/images/brand/logo-1.png')}}" class="header-brand-img toggle-logo" alt="logo">
                <img src="{{asset('themes/admin/assets/images/brand/logo-2.png')}}" class="header-brand-img light-logo" alt="logo">
                <img src="{{asset('themes/admin/assets/images/brand/logo-3.png')}}" class="header-brand-img light-logo1" alt="logo">
            </a>
            <!-- LOGO -->
        </div>
        <div class="main-sidemenu">
            <div class="slide-left disabled" id="slide-left"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24"><path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"/></svg></div>
            <ul class="side-menu">
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="{{ route('dashboard') }}"><i class="side-menu__icon fe fe-home"></i><span class="side-menu__label">Tổng quan</span></a>
                </li>

                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="{{ route('phongban') }}">
                        <i class="side-menu__icon fa fa-users"></i>
                        <span class="side-menu__label">Phòng ban</span>
                        <i class="angle fe fe-chevron-right hor-angle"></i></a>
                </li>

                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="{{ route('users') }}">
                        <i class="side-menu__icon fa fa-user mr-2"></i>
                        <span class="side-menu__label">Người dùng</span>
                        <i class="angle fe fe-chevron-right hor-angle"></i></a>
                </li>
                
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="{{ route('permission') }}">
                        <i class="side-menu__icon fa fa-cog"></i>
                        <span class="side-menu__label">Phân quyền</span>
                        <i class="angle fe fe-chevron-right hor-angle"></i></a>
                </li>

                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="{{ route('logout') }}">
                        <i class="side-menu__icon fa fa-sign-out"></i>
                        <span class="side-menu__label">Đăng xuất</span>
                        <i class="angle fe fe-chevron-right hor-angle"></i></a>
                </li>
             
            </ul>
            <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24"><path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"/></svg></div>
        </div>
    </div>
    <!--/APP-SIDEBAR-->
</div>