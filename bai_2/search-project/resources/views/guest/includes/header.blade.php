<header class="main-header">

    <!--Header-Upper-->
    <div class="header-upper">
        <div class="container clearfix">

            <div class="header-inner clearfix d-lg-flex">
                <div class="logo-outer">
                    <div class="logo"><a href="index.html"><img src="{{asset('themes\guest\assets\img\logo\logo.png')}}" alt="" title=""></a></div>
                    <div class="fixed-logo"><a href="index.html"><img src="{{asset('themes\guest\assets\img\logo\footer-logo.png')}}" alt="" title=""></a></div>
                </div>

                <!-- Main Menu -->
                <nav class="main-menu navbar-expand-md ml-md-auto">
                    <div class="navbar-header clearfix">
                    <div class="logo"><a href="index.html"><img src="{{asset('themes\guest\assets\img\logo\logo.png')}}" alt="" title=""></a></div>
                    <div class="fixed-logo"><a href="index.html"><img src="{{asset('themes\guest\assets\img\logo\footer-logo.png')}}" alt="" title=""></a></div>
                        <!-- Toggle Button -->
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse-one">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>

                    <div class="navbar-collapse navbar-collapse-one collapse clearfix">
                        <ul class="navigation clearfix">
                            <li class="current dropdown"><a href="{{route('guest.home')}}">Trang chủ</a></li>
                            @foreach(getPage() as $data )
                                @if($data->status==0)
                                    <li>
                                        <a href="{{route('guest.page',$data->slug)}}">{{$data->name}}</a>
                                    </li>
                                @endif
                            @endforeach
                            @auth
                            <li class="dropdown text-uppercase"  data-toggle="modal" data-target="#info"><a href="#">{{Auth::user()->name}}</a>    
                            </li>
                            @endauth

                            @guest
                            <li class="dropdown"><a href="{{route('guest.signin')}}">Đăng nhập</a>    
                            </li>  
                            @endguest
                                
                </nav>
                <!-- Main Menu End-->

            </div>

        </div>
    </div>
    <!--End Header Upper-->

</header>
