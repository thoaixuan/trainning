@extends('guest.layouts.main')

@section('content')
    <!-- Preloader -->
    @include('guest.includes.preloader')
    <!-- Main Header -->

   
<!--==================================================================== 
                            Start breadcumb section
    =====================================================================-->
    <section class="banner-section pt-200 pb-175">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="page-title text-center">
                            <h1>{{$page->name}}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <!--==================================================================== 
                            end breadcumb section
    =====================================================================-->
    
    <!--==================================================================== 
                            Start about-us section
    =====================================================================-->
        <section class="about-page-content another-page pt-90 pb-40">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10">
                        <div class="about-content">
                            <h2>{{$page->name}}</h2>

                            <p>{!!$page->content!!}</p>

                        </div>
                    </div>
                    <div class="about-content-img">
                    <img src="{{asset('themes\guest\assets\img\hero-section\hero-right.png')}}" alt="">
                </div>
            </div>
        </section>
    <!--==================================================================== 
                            end about-us section
    =====================================================================-->
    <!--Service-->
    @include('guest.pages.home.includes.service')
@endsection
@section('jsGuest')

@endsection