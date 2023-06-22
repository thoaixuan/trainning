<!-- app-Header -->
<div class="hor-header header">
    <div class="container main-container">
        <div class="d-flex">
            <a aria-label="Hide Sidebar" class="app-sidebar__toggle" data-bs-toggle="sidebar"
                href="javascript:void(0)"></a>
            <!-- sidebar-toggle-->
            <a class="logo-horizontal " href="/">
                @foreach(json_decode(settings()->website_logo) as $header_logo)
                <img src="{{url('/uploads/website').'/'.$header_logo->logo_guest}}" class="header-brand-img desktop-logo max-width-150" alt="logo">
                <img src="{{url('/uploads/website').'/'.$header_logo->logo_guest}}" class="header-brand-img light-logo1 max-width-150"
                    alt="logo">
                @endforeach
            </a>
            <!-- LOGO -->
            <div class="d-flex order-lg-2 ms-auto header-right-icons">
                <button class="navbar-toggler navresponsive-toggler d-lg-none ms-auto" type="button"
                    data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent-4"
                    aria-controls="navbarSupportedContent-4" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon fe fe-more-vertical"></span>
                </button>
                <div class="navbar navbar-collapse responsive-navbar p-0">
                    <div class="collapse navbar-collapse bg-white px-0" id="navbarSupportedContent-4">
                        <!-- SEARCH -->
                        <div class="header-nav-right p-5">
                            <a href="register.html" class="btn ripple btn-min w-sm btn-outline-primary me-2 my-auto"
                                target="_blank">New User
                            </a>
                            <a href="login.html" class="btn ripple btn-min w-sm btn-primary me-2 my-auto"
                                target="_blank">Login
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /app-Header -->

<div class="landing-top-header overflow-hidden">
    <div class="top sticky">
        <!--APP-SIDEBAR-->
        <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
        <div class="app-sidebar horizontal-main">
            <div class="container">
                <div class="row">
                    <div class="main-sidemenu navbar px-0">
                        <a class="navbar-brand ps-0 d-none d-lg-block" href="/">
                            @foreach(json_decode(settings()->website_logo) as $header_logo)
                            <img alt="" class="logo-2 max-width-150" src="{{url('/uploads/website').'/'.$header_logo->logo_guest}}">
                            <img src="{{url('/uploads/website').'/'.$header_logo->logo_guest}}" class="logo-3 max-width-150" alt="logo">
                            @endforeach
                        </a>
                        <ul class="side-menu">
                            <li class="slide">
                                <a class="side-menu__item" data-bs-toggle="slide" href="/"><span
                                        class="side-menu__label">Home</span></a>
                            </li>
                            <li class="slide">
                                <a class="side-menu__item" data-bs-toggle="slide" href="{{route('guest.blog.index')}}"><span
                                        class="side-menu__label">Blog</span></a>
                            </li>
                            <li class="slide">
                                <a class="side-menu__item" data-bs-toggle="slide" href="{{route('guest.contact.index')}}"><span
                                        class="side-menu__label">Contact</span></a>
                            </li>
                            @foreach(fetchPage() as $items)
                            <li class="slide">
                                <a class="side-menu__item" data-bs-toggle="slide" href="{{route('guest.page.index',['slug'=>$items->slug])}}"><span class="side-menu__label">{{$items->name}}</span></a>
                            </li>
                            @endforeach
                        </ul>
                        <div class="header-nav-right d-none d-lg-flex">
                            <a href="register.html"
                                class="btn ripple btn-min w-sm btn-outline-primary me-2 my-auto d-lg-none d-xl-block d-block"
                                target="_blank">New User
                            </a>
                            <a href="login.html" class="btn ripple btn-min w-sm btn-primary me-2 my-auto d-lg-none d-xl-block d-block"
                                target="_blank">Login
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/APP-SIDEBAR-->
    </div>
    
</div>

