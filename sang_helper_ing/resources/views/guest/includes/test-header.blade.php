        <!-- app-Header -->
        <div class="app-header sticky bg-white position-fixed top-header">
                <div class="container-fluid main-container">
                    <div class="d-flex">
                        <a aria-label="Hide Sidebar" class="app-sidebar__toggle" data-bs-toggle="sidebar" href="javascript:void(0)"></a>
                        <!-- sidebar-toggle-->
                        <a class="logo-horizontal " href="{{route('guest.home.index')}}">
                            <img src="{{asset('uploads/icon.png')}}" class="header-brand-img desktop-logo" alt="logo" width="120" height="120">
                        </a>
                        <!-- LOGO -->
                        <div class="main-header-center ms-3 d-none d-lg-block cusor-point">
                            <div class="text-title" >
                                <a href="{{route('guest.home.index')}}">
                                 Trung tâm Hỗ trợ eGate
                                </a>
                            </div>
                        </div>
                        <div class="text-menu">
                            <ul >
                                <li><a class="dropdown-item" href="{{route('guest.contact.index')}}">Liên hệ</a></li>
                            </ul>
                        </div>
                            
                        
                        <div class="d-flex order-lg-2 ms-auto header-right-icons">
                            <div class="dropdown d-none">
                                <div class="dropdown-menu header-search dropdown-menu-start">
                                </div>
                            </div>
                            <!-- SEARCH -->
                            <button class="navbar-toggler navresponsive-toggler d-lg-none ms-auto" type="button"
                                data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent-4"
                                aria-controls="navbarSupportedContent-4" aria-expanded="false"
                                aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon fe fe-more-vertical"></span>
                            </button>
                            <div class="navbar navbar-collapse responsive-navbar p-0">
                                <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
                                    <div class="d-flex order-lg-2">
                                        <div class="dropdown d-lg-none d-flex">
                                        <li><a  href="{{route('guest.contact.index')}}">Liên hệ</a></li>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /app-Header -->
