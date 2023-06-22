     <!--APP-SIDEBAR-->
     <div class="sticky">
                <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
                <div class="app-sidebar">
                    <div class="side-header">
                        <a class="header-brand1" href="index.html">
                            @foreach(json_decode(settings()->website_logo) as $sidear_logo)
                            <img src="{{url('/uploads/website').'/'.$sidear_logo->admin_logo_white}}" class="header-brand-img desktop-logo max-width-100" alt="logo">
                            <img src="{{url('/uploads/website').'/'.$sidear_logo->admin_logo_white}}" class="header-brand-img toggle-logo max-width-100"
                                alt="logo">
                            <img src="{{url('/uploads/website').'/'.$sidear_logo->admin_logo_blue}}" class="header-brand-img light-logo max-width-100" alt="logo">
                            <img src="{{url('/uploads/website').'/'.$sidear_logo->admin_logo_blue}}" class="header-brand-img light-logo1 max-width-100"
                                alt="logo">
                            @endforeach
                        </a>
                        <!-- LOGO -->
                    </div>
                    <div class="main-sidemenu">
                        <div class="slide-left disabled" id="slide-left"><svg xmlns="http://www.w3.org/2000/svg')}}"
                                fill="#7b8191" width="24" height="24" viewBox="0 0 24 24">
                                <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z" />
                            </svg></div>
                        <ul class="side-menu">
                            <li class="sub-category">
                                <h3>Chính</h3>
                            </li>
                            <li class="slide">
                                <a class="side-menu__item" data-bs-toggle="slide" href="{{route('admin.dashboard')}}"><i
                                        class="side-menu__icon fe fe-home"></i><span
                                        class="side-menu__label">Tổng quan</span></a>
                            </li>
                            <li class="sub-category">
                                <h3>Quản lý</h3>
                            </li>
                         
                            <li class="slide">
                                <a class="side-menu__item" data-bs-toggle="slide" href="{{route('admin.news.index')}}"><i
                                        class="side-menu__icon fe fe-package"></i><span
                                        class="side-menu__label">Tin tức</span>
                                        <span class="badge badge-sidebar bg-info side-badge">{{countNews()}}</span>
                                    </a>

                            </li>
                            <li class="slide">
                                <a class="side-menu__item" data-bs-toggle="slide" href="{{route('admin.page.index')}}"><i
                                    class="side-menu__icon fe fe-file-text"></i><span
                                    class="side-menu__label">Trang</span></a>
                            </li>
                            
                         
                            <li class="slide">
                                <a class="side-menu__item" data-bs-toggle="slide" href="{{route('admin.contact.index')}}"><i
                                        class="side-menu__icon fa fa-id-card-o"></i><span
                                        class="side-menu__label">Liên hệ</span>
                                        <span class="badge badge-sidebar bg-info side-badge">{{countContact()}}</span>
                                    </a>
                            </li>

                            <li class="slide">
                                <a class="side-menu__item" data-bs-toggle="slide" href="{{ route('admin.setting.index') }}">
                                    <i class="side-menu__icon fa fa-cog"></i>
                                    <span class="side-menu__label">Cài đặt</span>
                                    </a>
                            </li>
                            <li class="slide">
                                <a class="side-menu__item" data-bs-toggle="slide" href="{{route('admin.auth.logout')}}"><i
                                        class="side-menu__icon fa fa-sign-out"></i><span
                                        class="side-menu__label">Đăng xuất</span></a>
                            </li>

                        </ul>
                        <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg')}}" fill="#7b8191"
                                width="24" height="24" viewBox="0 0 24 24">
                                <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z" />
                            </svg></div>
                    </div>
                </div>
                <!--/APP-SIDEBAR-->
            </div>
