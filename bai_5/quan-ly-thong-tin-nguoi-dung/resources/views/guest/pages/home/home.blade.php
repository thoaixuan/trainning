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
                    <h1>Secure IT Solutions for a more secure environment</h1>
                    <p>Lorem ipsum dummy text are usually use. Replace your text bare usually <br>use in these section. So I used here. replace your text</p>
                    <a href="#" class="btn">GET STARTED</a>
                </div>
            </div>
            
            <div class="d-none d-md-block wow animated customFadeInRight hero-animation-image">
                <img src="{{asset('themes\guest\assets\img\hero-section\hero-right.png')}}" alt="">
            </div>
            <div class="d-none d-md-block wow animated customFadeInLeft tob-animation-image">
                <img src="{{asset('themes\guest\assets\img\hero-section\tob.png')}}" alt="">
            </div>

        </div>
    </div>
</section>
<!--==================================================================== 
                    End hero section
=====================================================================-->

<!--==================================================================== 
                    Start service-section-style-one
=====================================================================-->
<section class="service-section-one pt-85 rpt-65 pb-45 bg-gray">
    <div class="container">
        <div class="row">

            <!-- single-service -->
            <div class="col-lg-3 col-md-6">
                <div class="single-service service-style-one text-center wow animated customFadeInUp delay-0-1s">
                    <div class="service-icon zero">
                        <i class="flaticon-gear"></i>
                    </div>
                    <div class="service-content">
                        <h5><a href="single-service.html">Zero Configuration</a></h5>
                        <p>Elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat,</p>
                    </div>
                </div>
            </div>

            <!-- single-service -->
            <div class="col-lg-3 col-md-6">
                <div class="single-service service-style-one text-center wow animated customFadeInUp delay-0-2s">
                    <div class="service-icon code">
                        <i class="flaticon-shield"></i>
                    </div>
                    <div class="service-content">
                        <h5><a href="single-service.html">Code Security</a></h5>
                        <p>Magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores</p>
                    </div>
                </div>
            </div>

            <!-- single-service -->
            <div class="col-lg-3 col-md-6">
                <div class="single-service service-style-one text-center wow animated customFadeInUp delay-0-3s">
                    <div class="service-icon team">
                        <i class="flaticon-network"></i>
                    </div>
                    <div class="service-content">
                        <h5><a href="single-service.html">Team Management</a></h5>
                        <p>At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no</p>
                    </div>
                </div>
            </div>

            <!-- single-service -->
            <div class="col-lg-3 col-md-6">
                <div class="single-service service-style-one text-center wow animated customFadeInUp delay-0-4s">
                    <div class="service-icon access">
                        <i class="flaticon-login"></i>
                    </div>
                    <div class="service-content">
                        <h5><a href="single-service.html">Access Controlled</a></h5>
                        <p>Have suffered alteration in some form, by injected humour, or randomised words</p>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</section>
<!--==================================================================== 
                    End service-section-style-one
=====================================================================-->

<!--==================================================================== 
                    Start service-section-style-two
=====================================================================-->
<section class="service-section-two pt-75 pb-45 rpt-0 bg-gray">
    <div class="container">
        <div class="animation-round-border">
            <img src="{{asset('themes\guest\assets\img\services\animation-round-border.png')}}" alt="">
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-6 text-center">
                <div class="section-title">
                    <h2>Cloud Hosting Services</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod <br>tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
            </div>
        </div>
        <div class="row">

            <!-- single-service -->
            <div class="col-lg-4 col-md-6">
                <div class="single-service service-style-two wow animated customFadeInUp delay-0-1s">
                    <div class="service-content">
                        <h5><a href="single-service.html">Cloud databases</a></h5>
                        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et</p>
                    </div>
                </div>
            </div>

            <!-- single-service -->
            <div class="col-lg-4 col-md-6">
                <div class="single-service service-style-two wow animated customFadeInUp delay-0-2s">
                    <div class="service-content">
                        <h5><a href="single-service.html">Website hosting</a></h5>
                        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et</p>
                    </div>
                </div>
            </div>

            <!-- single-service -->
            <div class="col-lg-4 col-md-6">
                <div class="single-service service-style-two wow animated customFadeInUp delay-0-3s">
                    <div class="service-content">
                        <h5><a href="single-service.html">File storage</a></h5>
                        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et</p>
                    </div>
                </div>
            </div>

            <!-- single-service -->
            <div class="col-lg-4 col-md-6">
                <div class="single-service service-style-two wow animated customFadeInUp delay-0-4s">
                    <div class="service-content">
                        <h5><a href="single-service.html">Forex trading</a></h5>
                        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et</p>
                    </div>
                </div>
            </div>

            <!-- single-service -->
            <div class="col-lg-4 col-md-6">
                <div class="single-service service-style-two wow animated customFadeInUp delay-0-5s">
                    <div class="service-content">
                        <h5><a href="single-service.html">File backups</a></h5>
                        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et</p>
                    </div>
                </div>
            </div>

            <!-- single-service -->
            <div class="col-lg-4 col-md-6">
                <div class="single-service service-style-two wow animated customFadeInUp delay-0-6s">
                    <div class="service-content">
                        <h5><a href="single-service.html">Remote desktop</a></h5>
                        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--==================================================================== 
                    end service-section-style-two
=====================================================================-->



<!--==================================================================== 
                    Start skill section
=====================================================================-->
<section class="skill-area pt-75 pb-60 bg-gray">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <div class="section-title">
                    <h2>What Our Software Can Do For You</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod <br>tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-7">
                <div class="skill-note-img rmb-50">
                    <img class="skill-bg" src="{{asset('themes\guest\assets\img\skill\skill-bg.png')}}" alt="">
                    <img class="notpad" src="{{asset('themes\guest\assets\img\skill\skill-note.png')}}" alt="">
                    <img class="leaf" src="{{asset('themes\guest\assets\img\skill\leaf.png')}}" alt="">
                </div>
            </div>
            <div class="col-md-5 mt-27">
                <div class="row">
                    <div class="col-lg-10 col-md-12">
                        <div class="skill-item wow animated customFadeInUp delay-0-1s">
                            <i class="flaticon-checked"></i><h5>Responsive design</h5>
                        </div>
                    </div>
                    <div class="col-lg-10 col-md-12">
                        <div class="skill-item wow animated customFadeInUp delay-0-2s">
                            <i class="flaticon-checked"></i><h5>Android apps development</h5>
                        </div>
                    </div>
                    <div class="col-lg-10 col-md-12">
                        <div class="skill-item wow animated customFadeInUp delay-0-3s">
                            <i class="flaticon-checked"></i><h5>iOS apps development</h5>
                        </div>
                    </div>
                    <div class="col-lg-10 col-md-12">
                        <div class="skill-item wow animated customFadeInUp delay-0-4s">
                            <i class="flaticon-checked"></i><h5>UX/UI design</h5>
                        </div>
                    </div>
                    <div class="col-lg-10 col-md-12">
                        <div class="skill-item wow animated customFadeInUp delay-0-5s">
                            <i class="flaticon-checked"></i><h5>E-commerce development</h5>
                        </div>
                    </div>
                    <div class="col-lg-10 col-md-12">
                        <div class="skill-item wow animated customFadeInUp delay-0-6s">
                            <i class="flaticon-checked"></i><h5>Print ready design</h5>
                        </div>
                    </div>
                </div>

            </div>
            
        </div>
    </div>
</section>
<!--==================================================================== 
                    End skill section
=====================================================================-->

<!--==================================================================== 
                    Start Our featureds section
=====================================================================-->
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

            <!-- single-featured -->
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

            <!-- single-featured -->
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

            <!-- single-featured -->
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

            <!-- single-featured -->
            <div class="col-lg-4 col-md-6">
                <div class="featured-item wow animated customFadeInUp delay-0-4s">
                    <div class="featured-icon green">
                        <i class="flaticon-boarding-pass"></i>
                    </div>
                    <div class="featured-content">
                        <h5><a href="single-feature.html">Incredible Infrastructure</a></h5>
                        <p>aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet.</p>
                    </div>
                    <div class="hover"></div>
                </div>
            </div>

            <!-- single-featured -->
            <div class="col-lg-4 col-md-6">
                <div class="featured-item wow animated customFadeInUp delay-0-5s">
                    <div class="featured-icon black">
                        <i class="flaticon-usability"></i>
                    </div>
                    <div class="featured-content">
                        <h5><a href="single-feature.html">Drag and Drop Functionality</a></h5>
                        <p>Sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam</p>
                    </div>
                    <div class="hover"></div>
                </div>
            </div>

            <!-- single-featured -->
            <div class="col-lg-4 col-md-6">
                <div class="featured-item wow animated customFadeInUp delay-0-6s">
                    <div class="featured-icon yeallow">
                        <i class="flaticon-house"></i>
                    </div>
                    <div class="featured-content">
                        <h5><a href="single-feature.html">Best Analytics Audits</a></h5>
                        <p>Sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd</p>
                    </div>
                    <div class="hover"></div>
                </div>
            </div>
        </div>
    </div>
</section>
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

                <!-- single-team member -->
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

                <!-- single-team member -->
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

                <!-- single-team member -->
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

                <!-- single-team member -->
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

                <!-- single-team member -->
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




<!--==================================================================== 
                    Start Fun-fact+cta section
=====================================================================-->

<section class="funfact bg-gray pt-75 pb-130">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <div class="section-title">
                    <h2>We Always Try To Understand Users Expectation</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod <br>tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
            </div>
        </div>
        <div class="row">

                <!-- single-item -->
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="stat-item mb-50 text-center wow animated customFadeInUp fast">
                    <div class="count" data-from="1" data-to="160" data-speed="3000"></div>
                    <p class="text">Downloaded</p>
                </div>
            </div>

                <!-- single-item -->
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="stat-item mb-50 text-center wow animated customFadeInUp">
                    <div class="count" data-from="1" data-to="20" data-speed="3000"></div>
                    <p class="text">Feedback</p>
                </div>
            </div>

                <!-- single-item -->
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="stat-item mb-50 text-center wow animated customFadeInUp slow">
                    <div class="count" data-from="1" data-to="500" data-speed="3000"></div>
                    <p class="text">Feedback</p>
                </div>
            </div>

                <!-- single-item -->
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="stat-item mb-50 text-center wow animated customFadeInUp slower">
                    <div class="count" data-from="1" data-to="65" data-speed="3000"></div>
                    <p class="text">Contrubutors</p>
                </div>
            </div>

        </div>

        <!-- First CTA Section -->
        <div class="cta-action-style-one">
            <div class="row align-items-center">
                <div class="col-lg-8 text-lg-left text-center">
                    <h4 class="cta-title">Have any question about us?</h4>
                    <p class="cta-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
                <div class="col-lg-4 d-flex justify-content-lg-end justify-content-center py-20">
                    <a class="btn-bg" href="#">CONTACT US</a>
                </div>
            </div>
        </div>
        
    </div>
</section>

<!--==================================================================== 
                    End Fun-fact+cta section
=====================================================================-->


<!--==================================================================== 
                    Start portfolio section
=====================================================================-->
<section class="portfolio-area pt-240 pb-75 rpt-195">
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="portfolio-wrapper">

                <div class="row justify-content-center">
                    <div class="col-lg-8 text-center pt-75">
                        <div class="section-title">
                            <h2>Awesome Works</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod <br>tempor incididunt ut labore et dolore magna aliqua.</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="portfolio-menu third-portfolio-menu mb-55">
                            <button class="active" data-filter="*">All</button>
                            <button data-filter=".cat-one">Marketing</button>
                            <button data-filter=".cat-two">Application</button>
                            <button data-filter=".cat-three">Design</button>
                            <button data-filter=".cat-four">Development</button>
                        </div>
                    </div>
                </div>
                <div class="row custom-row portfolio-active">

                    <!-- single-portfolio item-->
                    <div class="col-lg-4 col-md-6 grid-item cat-two cat-four">
                        <div class="single-portfolio-item portfolio-first-item">
                            <img src="{{asset('themes\guest\assets\img\portfolio\bg1.png')}}" class="img-fluid" alt="">
                            <div class="portfolio-hover">
                                <a class="projects-popup-link" href="{{asset('themes\guest\assets\img\portfolio\bg1.png')}}"><i class="flaticon-plus"></i></a>
                            </div>
                        </div>
                    </div>

                    <!-- single-portfolio item-->
                    <div class="col-lg-4 col-md-6 grid-item cat-two cat-four">
                        <div class="single-portfolio-item portfolio-second-item">
                            <img src="{{asset('themes\guest\assets\img\portfolio\bg2.png')}}" class="img-fluid" alt="">
                            <div class="portfolio-hover">
                                <a class="projects-popup-link" href="{{asset('themes\guest\assets\img\portfolio\bg2.png')}}"><i class="flaticon-plus"></i></a>
                            </div>
                        </div>
                    </div>

                    <!-- single-portfolio item-->
                    <div class="col-lg-4 col-md-6 grid-item cat-one cat-five">
                        <div class="single-portfolio-item portfolio-third-item">
                            <img src="{{asset('themes\guest\assets\img\portfolio\bg3.png')}}" class="img-fluid" alt="">
                            <div class="portfolio-hover">
                                <a class="projects-popup-link" href="{{asset('themes\guest\assets\img\portfolio\bg3.png')}}"><i class="flaticon-plus"></i></a>
                            </div>
                        </div>
                    </div>

                    <!-- single-portfolio item-->
                    <div class="col-lg-4 col-md-6 grid-item cat-three cat-five">
                        <div class="single-portfolio-item portfolio-fourth-item">
                            <img src="{{asset('themes\guest\assets\img\portfolio\bg4.png')}}" class="img-fluid" alt="">
                            <div class="portfolio-hover">
                                <a class="projects-popup-link" href="{{asset('themes\guest\assets\img\portfolio\bg4.png')}}"><i class="flaticon-plus"></i></a>
                            </div>
                        </div>
                    </div>

                    <!-- single-portfolio item-->
                    <div class="col-lg-4 col-md-6 grid-item cat-one cat-four">
                        <div class="single-portfolio-item portfolio-fifth-item">
                            <img src="{{asset('themes\guest\assets\img\portfolio\bg5.png')}}" class="img-fluid" alt="">
                            <div class="portfolio-hover">
                                <a class="projects-popup-link" href="{{asset('themes\guest\assets\img\portfolio\bg5.png')}}"><i class="flaticon-plus"></i></a>
                            </div>
                        </div>
                    </div>

                    <!-- single-portfolio item-->
                    <div class="col-lg-4 col-md-6 grid-item cat-five cat-three">
                        <div class="single-portfolio-item portfolio-sixth-item">
                            <img src="{{asset('themes\guest\assets\img\portfolio\bg6.png')}}" class="img-fluid" alt="">
                            <div class="portfolio-hover">
                                <a class="projects-popup-link" href="{{asset('themes\guest\assets\img\portfolio\bg6.png')}}"><i class="flaticon-plus"></i></a>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

</div>
</section>


<!--==================================================================== 
                    End portfolio section
=====================================================================-->

<!--==================================================================== 
                    Start Pricing section
=====================================================================-->

<section class="pricing-section gray-bg4 pt-75 pb-45">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8 text-center">
            <div class="section-title">
                <h2>Pricing Plans</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod <br>tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
        </div>
    </div>
    <div class="row ">

        <!-- Pricing Block -->
        <div class="col-lg-4 col-md-6 wow animated customFadeInLeft">
            <div class="pricing-block">
                <div class="inner-box">
                    <h5>Basic Plan</h5>
                    <h4 class="price">$14.00</h4>
                    <h5 class="time-limit">Per Month</h5>
                    <ul class="featureds">
                        <li>5 GB Bandwidth</li>
                        <li>Highest Speed</li>
                        <li>1 GB Storage</li>
                        <li>24x7 Great Support</li>
                        <li>Data Security backups</li>
                        <li>Monthly Reports Analytics</li>
                    </ul>
                    <div class="btn-box">
                        <a href="contact.html" class="theme-btn">Choose Plan</a>
                    </div>
                    <div class="hover"></div>
                </div>
                
            </div>
        </div>

        <!-- Pricing Block -->
        <div class="pricing-block col-lg-4 col-md-6 wow animated customFadeInUp">
            <div class="inner-box">
                <h5 class="title">Advanced Plan</h5>
                <h4 class="price">$62.00</h4>
                <h5 class="time-limit">Per Month</h5>
                <ul class="featureds">
                    <li>5 GB Bandwidth</li>
                    <li>Highest Speed</li>
                    <li>1 GB Storage</li>
                    <li>24x7 Great Support</li>
                    <li>Data Security backups</li>
                    <li>Monthly Reports Analytics</li>
                </ul>
                <div class="btn-box">
                    <a href="contact.html" class="theme-btn">Choose Plan</a>
                </div>
                <div class="hover"></div>
            </div>
        </div>

        <!-- Pricing Block -->
        <div class="pricing-block col-lg-4 col-md-6 wow animated customFadeInRight">
            <div class="inner-box">
                <h5 class="title">Expert Plan</h5>
                <h4 class="price">$36.00</h4>
                <h5 class="time-limit">Per Month</h5>
                <ul class="featureds">
                    <li>5 GB Bandwidth</li>
                    <li>Highest Speed</li>
                    <li>1 GB Storage</li>
                    <li>24x7 Great Support</li>
                    <li>Data Security backups</li>
                    <li>Monthly Reports Analytics</li>
                </ul>
                <div class="btn-box">
                    <a href="contact.html" class="theme-btn">Choose Plan</a>
                </div>
                <div class="hover"></div>
            </div>
        </div>

    </div>
</div>
</section>


<!--==================================================================== 
                    End Pricing section
=====================================================================-->

<!--==================================================================== 
                    Start Testimonial Section
=====================================================================-->

<section class="testimonial-section pt-75 pb-75">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8 text-center">
            <div class="section-title">
                <h2>What Users Saying</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod <br>tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="testimonial-column">

                <div class="testi-round"><img src="{{asset('themes\guest\assets\img\testimonial\testi-round.png')}}" alt=""></div>
                <div class="testi-small-img"><img src="{{asset('themes\guest\assets\img\testimonial\testi-small-img.png')}}" alt=""></div>

                <div class="testimonial-carousel owl-carousel">

                    <!-- Testimonial Block -->
                    <div class="testimonial-block">
                        <div class="testi-author">
                            <img src="{{asset('themes\guest\assets\img\testimonial\img1.png')}}" alt="">
                        </div>
                        <div class="testi-content-wrap">
                            <div class="testi-content">
                                <p>Voluptatibus, omnis nobis error reprehenderit perferendis velit quasi quos id deserunt accusantium eligendi cum quibusdam, voluptatem, inventore qui repudiandae architecto, accusantium, saepe modi reprehenderit minima incidunt</p>
                            </div>
                            <div class="testi-author-info">
                                <h5 class="name">James H. Cervantez</h5>
                                <span class="designation">Web Developer</span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Testimonial Block -->
                    <div class="testimonial-block">
                        <div class="testi-author">
                            <img src="{{asset('themes\guest\assets\img\testimonial\img2.png')}}" alt="">
                        </div>
                        <div class="testi-content-wrap">
                            <div class="testi-content">
                                <p>Having a home based business is a wonderful asset to your life. The problem still stands, when it comes timeadvertise your business for a cheap cost. I know you have looked for to answer everywhere; I am here to share a few simple creative ways,</p>
                            </div>
                            <div class="testi-author-info">
                                <h5 class="name">Robert Boult</h5>
                                <span class="designation">CO-Founder</span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Testimonial Block -->
                    <div class="testimonial-block">
                        <div class="testi-author">
                            <img src="{{asset('themes\guest\assets\img\testimonial\img3.png')}}" alt="">
                        </div>
                        <div class="testi-content-wrap">
                            <div class="testi-content">
                                <p>Voluptatibus, omnis nobis error reprehenderit perferendis velit quasi quos id deserunt accusantium eligendi cum quibusdam, voluptatem, inventore qui repudiandae architecto, vitae aliquid? Maiores accusantium, saepe modi reprehenderit</p>
                            </div>
                            <div class="testi-author-info">
                                <h5 class="name">Adam Smith</h5>
                                <span class="designation">CO-Founder</span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Testimonial Block -->
                    <div class="testimonial-block">
                        <div class="testi-author">
                            <img src="{{asset('themes\guest\assets\img\testimonial\img4.png')}}" alt="">
                        </div>
                        <div class="testi-content-wrap">
                            <div class="testi-content">
                                <p>Having a home based business is a wonderful asset to your life. The problem still stands, when it comes timeadvertise your business for a cheap cost. I know you have looked for to answer everywhere; I am here to share a few simple creative ways,</p>
                            </div>
                            <div class="testi-author-info">
                                <h5 class="name">Maria Josefine</h5>
                                <span class="designation">Manager</span>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="d-none d-xl-block testi-small-shape"><img src="{{asset('themes\guest\assets\img\testimonial\testi-small-round.png')}}" alt=""></div>
            </div>
        </div>
    </div>
</div>
</section> 

<!--==================================================================== 
                    End Testimonial Section
=====================================================================-->

<!--==================================================================== 
                    Start Blog section
=====================================================================-->
<section class="blog-section gray-bg pt-75">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <div class="section-title">
                    <h2>The News From Our Blog</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod <br>tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
            </div>
        </div>
        <div class="row">
                    
            <!-- single news Block -->
            <div class="col-lg-4 col-sm-6 wow animated customFadeInLeft">
                <div class="news-block mb-30">
                    <div class="blog-thumb">
                        <img src="{{asset('themes\guest\assets\img\blog\home-blog1.png')}}" alt="news">
                    </div>
                    <div class="news-inner">
                        <h5><a href="blog-details.html">3 Advantages of Using Next- Generation Firewalls</a></h5>
                        <div class="news-text">
                            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed</p>
                        </div>
                        <div class="admin-by">
                            <a href="#">Tim J. Hill</a>
                        </div>
                        <div class="post-date">
                            <a href="#">15 June 2019</a>
                        </div>
                    </div>
                    <div class="hover">
                        <div class="hover-inner">
                            <h4><a href="blog-details.html">3 Advantages of Using Next- Generation Firewalls</a></h4>
                            <div class="blog-read-time">5 min Read</div>
                        </div>
                    </div>
                </div>
            </div>
                    
            <!-- single news Block -->
            <div class="col-lg-4 col-sm-6 wow animated customFadeInUp">
                <div class="news-block mb-30">
                    <div class="blog-thumb">
                        <img src="{{asset('themes\guest\assets\img\blog\home-blog2.png')}}" alt="news">
                    </div>
                    <div class="news-inner">
                        <h5><a href="blog-details.html">3 Amazing Apps To Keep Track Of Your Spending</a></h5>
                        <div class="news-text">
                            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed</p>
                        </div>
                        <div class="admin-by">
                            <a href="#">Jonathon B. Banes</a>
                        </div>
                        <div class="post-date">
                            <a href="#">15 June 2019</a>
                        </div>
                    </div>
                    <div class="hover">
                        <div class="hover-inner">
                            <h4><a href="blog-details.html">3 Amazing Apps To Keep Track Of Your Spending</a></h4>
                            <div class="blog-read-time">5 min Read</div>
                        </div>
                    </div>
                </div>
            </div>
                    
            <!-- single news Block -->
            <div class="col-lg-4 col-sm-6 wow animated customFadeInRight">
                <div class="news-block mb-30">
                    <div class="blog-thumb">
                        <img src="{{asset('themes\guest\assets\img\blog\home-blog3.png')}}" alt="news">
                    </div>
                    <div class="news-inner">
                        <h5><a href="blog-details.html">Everything You Need to Know About Cyber Warfare</a></h5>
                        <div class="news-text">
                            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed</p>
                        </div>
                        <div class="admin-by">
                            <a href="#">Edgar A. Selvidge</a>
                        </div>
                        <div class="post-date">
                            <a href="#">15 June 2019</a>
                        </div>
                    </div>
                    <div class="hover">
                        <div class="hover-inner">
                            <h4><a href="blog-details.html">Everything You Need to Know About Cyber Warfare</a></h4>
                            <div class="blog-read-time">5 min Read</div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

</section>

<!--==================================================================== 
                    End Blog section
=====================================================================-->

@endsection



@section('jsGuest')
@endsection