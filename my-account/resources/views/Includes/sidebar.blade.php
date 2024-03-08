<!-- Start::app-sidebar -->
<aside class="app-sidebar sticky" id="sidebar">

    <!-- Start::main-sidebar-header -->
    <div class="main-sidebar-header">
            <img src="{{ asset('themes/assets/images/brand-logos/desktop-logo.png')}}" alt="logo" class="desktop-logo">
            {{-- <img src="{{ asset('themes/assets/images/brand-logos/toggle-logo.')}}" alt="logo" class="toggle-logo">
            <img src="{{ asset('themes/assets/images/brand-logos/desktop-dark.')}}" alt="logo" class="desktop-dark">
            <img src="{{ asset('themes/assets/images/brand-logos/toggle-dark.')}}" alt="logo" class="toggle-dark">
            <img src="{{ asset('themes/assets/images/brand-logos/desktop-white.')}}" alt="logo" class="desktop-white">
            <img src="{{ asset('themes/assets/images/brand-logos/toggle-white.')}}" alt="logo" class="toggle-white"> --}}
        </a>
    </div>
    <!-- End::main-sidebar-header -->

    <!-- Start::main-sidebar -->
    <div class="main-sidebar" id="sidebar-scroll">

        <!-- Start::nav -->
        <nav class="main-menu-container nav nav-pills flex-column sub-open">
            <div class="slide-left" id="slide-left">
                <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24"> <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"></path> </svg>
            </div>
            <ul class="main-menu">
                <!-- Start::slide__category -->
                <li class="slide__category"><span class="category-name">Main</span></li>
                <!-- End::slide__category -->
                <!-- Start::slide -->
                <li class="slide slide-item {{ request()->is('admin/home', 'guest/home') ? 'active' : '' }}">
                    <a href="{{route((Auth::user()->permission == '1') ? 'admin.home.index' : 'guest.home.index')}}" class="side-menu__item">
                        <i class="fe fe-home side-menu__icon"></i>
                        <span class="side-menu__label">Dashboard</span>
                    </a>
                </li>
                <!-- End::slide -->

                <li class="slide slide-item {{ request()->is('admin/mynote', 'guest/mynote') ? 'active' : '' }}">
                    <a href="{{route((Auth::user()->permission == '1') ? 'admin.note.index' : 'guest.note.index')}}" class="side-menu__item">
                        <i class="fe fe-file-text side-menu__icon"></i>
                        <span class="side-menu__label">My Notes</span>
                    </a>
                </li>
                <li class="slide slide-item {{ request()->is('admin/users*') ? 'active' : '' }}">
                    <a href="{{route('admin.users.index')}}" class="side-menu__item">
                        <i class="fe fe-users side-menu__icon"></i>
                        <span class="side-menu__label">User</span>
                    </a>
                </li>
                <li class="slide slide-item {{ request()->is('admin/users-dev*') ? 'active' : '' }}">
                    <a href="{{route('admin.userdev.index')}}" class="side-menu__item">
                        <i class="fe fe-users side-menu__icon"></i>
                        <span class="side-menu__label">User Dev</span>
                    </a>
                </li>
                <li class="slide slide-item {{ request()->is('admin/task', 'guest/mytask') ? 'active' : '' }}">
                    <a href="{{route((Auth::user()->permission == '1') ? 'admin.task.index' : 'guest.task.index')}}" class="side-menu__item">
                        <i class="fe fe-users side-menu__icon"></i>
                        <span class="side-menu__label">My Task</span>
                    </a>
                </li>
                <li class="slide slide-item {{ request()->is('admin/contact', 'guest/contact') ? 'active' : '' }}">
                    <a href="{{route('guest.contact.index')}}" class="side-menu__item">
                        <i class="fe fe-phone-call side-menu__icon"></i>
                        <span class="side-menu__label">Contact</span>
                    </a>
                </li>
                <li class="slide slide-item">
                    <a href="{{route('logout')}}" class="side-menu__item">
                        <i class="fe fe-log-out side-menu__icon"></i>
                        <span class="side-menu__label">Logout</span>
                    </a>
                </li>
            </ul>
            <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24"> <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"></path> </svg></div>
        </nav>
        <!-- End::nav -->

    </div>
    <!-- End::main-sidebar -->

</aside>
<!-- End::app-sidebar -->

{{-- <script>
    $('nav li').on('click',function(e){
      e.preventDefault();
       //first remove active class from lists and aside elements
       $('nav li a').removeClass('active');
       //add active class on clicked menu item
       $(this).addClass('active');
       //add active class on relevant aside element
      var itemClass = this.classList;//eg. artists active
       $('a.'+itemClass[0]).addClass('active');//eg. add active on aside.artists
    });
</script> --}}

