<!--==================================================================== 
                    Start header area
=====================================================================-->

<header class="main-header">

    <!--Header-Upper-->
    <div class="header-upper">
        <div class="container clearfix">

            <div class="header-inner clearfix d-lg-flex">
                <div class="logo-outer">
                    <div class="logo"><a href="{{route('guest_home')}}"><img src="{{route('guest_home')}}/themes/guest/img/logo.png" alt="" title=""></a></div>
                    <div class="fixed-logo"><a href="{{route('guest_home')}}"><img src="{{route('guest_home')}}/themes/guest/img/logo.png" alt="" title=""></a></div>
                </div>

                <!-- Main Menu -->
                <nav class="main-menu navbar-expand-md ml-md-auto">
                    <div class="navbar-header clearfix">
                    <div class="logo"><a href="{{route('guest_home')}}"><img src="{{route('guest_home')}}/themes/guest/img/logo.png" alt="" title=""></a></div>
                    <div class="fixed-logo"><a href="{{route('guest_home')}}"><img src="{{route('guest_home')}}/themes/guest/img/logo.png" alt="" title=""></a></div>
                        <!-- Toggle Button -->
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse-one">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>

                    <div class="navbar-collapse navbar-collapse-one collapse clearfix">
                        <ul class="navigation clearfix">
                            <li><a href="{{route('guest_home')}}">Trang chủ</a></li>
                            @foreach (getPages() as $item)
                                    <li>
                                        <a href="{{route('guest_pages',$item->pages_slug)}}">{{$item->pages_name}}</a>
                                    </li>
                            @endforeach
                        </ul>
                    </div>
                </nav>
                <!-- Main Menu End-->
            </div>

        </div>
    </div>
    <!--End Header Upper-->

</header>

<!--==================================================================== 
                    End header area
=====================================================================-->
