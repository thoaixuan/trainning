@extends('guest.layouts.main')

@section('content')
    <!-- Tra cứu -->

<!-- Preloader -->
<!--==================================================================== 
                    Start hero section
=====================================================================-->
<section class="hero-section py-100 bg-img d-flex align-items-center" style="background-image:url(themes/guest/assets/img/hero-section/hero-bg.png);">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <div class="hero-text">
                    <h1>Tra cứu thông tin </h1>
                    <p>Hỗ trợ và tra cứu thông tin</p>
                    @guest
                    <div class="sup-log">
                        <a href="{{route('guest.signin.home')}}" class="color-btn color-btn5">Bắt đầu ngay</a>
                    </div>
                    @endguest
                </div>
            </div>
            
            <div class="d-flex justify-content-end wow animated customFadeInRight hero-animation-image">
                <img src="{{asset('themes\guest\assets\img\hero-section\hero-right.png')}}" alt="">
            </div>
            <div class="d-flex justify-content-end wow animated customFadeInLeft tob-animation-image">
                <img src="{{asset('themes\guest\assets\img\hero-section\tob.png')}}" alt="">
            </div>

        </div>
    </div>
</section>
<!--==================================================================== 
                    End hero section
=====================================================================-->
@auth
@if(Auth::user()->position==1)
<section class="featured-area pt-75 pb-45">
    <div class="container">
    <div class="col-12 row">
            <div class="col-8 row">
              <div class="col-md-8 m-auto">
               <input class="form-control" id="search"  name="search" vale="" placeholder="Từ khóa tìm kiếm ....">
              </div>
              <div class="col-md-4">
                <button class="size-btn size-btn5" id="btn_search">Tìm kiếm dữ liệu</button>
              </div>  
            </div>
        <table id="userstable">
        </table>
    </div>
</section>
@endif
<section class="featured-area pt-75 pb-45">
    <div class="d-none d-xl-block featured-round"><img src="{{asset('themes\guest\assets\img\feature\feature.png')}}" alt=""></div>
    <div class="d-none d-xl-block featured-round-small"><img src="{{asset('themes\guest\assets\img\feature\small-feature.png')}}" alt=""></div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 text-center">
                <div class="section-title">
                    <h2>Our featureds</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod <br>tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
            </div>
        </div>
        <div class="row">

            <div class="col-lg-4 col-md-6">
                <div class="featured-item wow animated customFadeInUp dalay-0-1s">
                    <div class="featured-icon violet">
                        <i class="flaticon-cms"></i>
                    </div>
                    <div class="featured-content">
                        <h5><a href="single-feature.html">Incredible Infrastructure</a></h5>
                        <p>aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet.</p>
                    </div>
                    <div class="hover"></div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="featured-item wow animated customFadeInUp delay-0-2s">
                    <div class="featured-icon skay">
                        <i class="flaticon-conversation"></i>
                    </div>
                    <div class="featured-content">
                        <h5><a href="single-feature.html">Email Notifications</a></h5>
                        <p>At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur</p>
                    </div>
                    <div class="hover"></div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="featured-item wow animated customFadeInUp delay-0-3s">
                    <div class="featured-icon yeallow">
                        <i class="flaticon-layers"></i>
                    </div>
                    <div class="featured-content">
                        <h5><a href="single-feature.html">Simple Dashboard</a></h5>
                        <p>Sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd</p>
                    </div>
                    <div class="hover"></div>
                </div>
            </div>



        </div>
    </div>
</section>
@include('guest.pages.home.modal')

@endauth



<!--==================================================================== 
                    Start Our featureds section
=====================================================================-->

<!--==================================================================== 
                    end Our featureds section
=====================================================================-->


<!--==================================================================== 
                    Start Our Team section
=====================================================================-->

<section class="our-team-section py-75 bg-gray">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 text-center">
                <div class="section-title">
                    <h2>Our Awesome Team</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod <br>tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 team-slider owl-carousel">

                <div class="single-team-member wow animated customFadeInUp delay-0-1s">
                    <div class="team-thumb thumb-bg-1"></div>
                    <div class="team-info">
                        <h5>Waylon Dalton</h5>
                        <h6>CEO & Founder</h6>
                        <p>Elitr, sed diam nonumy eirmod tempor invidunt ut labore et</p>
                        <div class="team-social-link">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                        </div>
                    </div>
                </div>

                <div class="single-team-member wow animated customFadeInUp delay-0-2s">
                    <div class="team-thumb thumb-bg-2"></div>
                    <div class="team-info">
                        <h5>Stefan Harary</h5>
                        <h6>Marketing Manager</h6>
                        <p>Elitr, sed diam nonumy eirmod tempor invidunt ut labore et</p>
                        <div class="team-social-link">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                        </div>
                    </div>
                </div>

                <div class="single-team-member wow animated customFadeInUp delay-0-3s">
                    <div class="team-thumb thumb-bg-3"></div>
                    <div class="team-info">
                        <h5>Moises Teare</h5>
                        <h6>CEO & Founder</h6>
                        <p>Elitr, sed diam nonumy eirmod tempor invidunt ut labore et</p>
                        <div class="team-social-link">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                        </div>
                    </div>
                </div>

                <div class="single-team-member wow animated customFadeInUp delay-0-4s">
                    <div class="team-thumb thumb-bg-4"></div>
                    <div class="team-info">
                        <h5>Gabriel Bernal</h5>
                        <h6>CEO & Founder</h6>
                        <p>Elitr, sed diam nonumy eirmod tempor invidunt ut labore et</p>
                        <div class="team-social-link">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                        </div>
                    </div>
                </div>

                <div class="single-team-member wow animated customFadeInUp delay-0-5s">
                    <div class="team-thumb thumb-bg-4"></div>
                    <div class="team-info">
                        <h5>Mashok Khan</h5>
                        <h6>Sr.Developer</h6>
                        <p>Elitr, sed diam nonumy eirmod tempor invidunt ut labore et</p>
                        <div class="team-social-link">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</section>

<!--==================================================================== 
                    End Our Team section
=====================================================================-->

@endsection



@section('jsGuest')
<script src="{{asset('themes/guest/js/homes/homes.js')}}"></script>
<script>
  var homes=new homes();
      homes.datas={
        routes:{
          datatable:"{{route('guest.anydata.home')}}",
          updates:"{{route('guest.update.user')}}",
          updates_data:"{{route('guest.update_data.user')}}",
          delete:"{{route('guest.delete.user')}}",  
          get_room:"{{route('guest.get_room.user')}}",
        }
      }
      homes.init();
      CKEDITOR.replace('user_description_edit');
</script>
@endsection