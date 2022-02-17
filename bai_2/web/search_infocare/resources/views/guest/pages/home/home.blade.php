@extends('guest.layouts.main')

@section('content')
    <!-- Preloader -->
    @include('guest.includes.preloader')


<!--==================================================================== 
                    Start header area
=====================================================================-->
    @include('guest.includes.header')

    @include('guest.pages.home.includes.main-header')

<!--=====================================================================-->
    @include('guest.pages.home.includes.service-section')




<!--==================================================================== 
                    Start skill section
=====================================================================-->
    @include('guest.pages.home.includes.skill-area')
<!--==================================================================== 
                    End skill section
=====================================================================-->

<!--==================================================================== 
                    Start Our featureds section
=====================================================================-->
    @include('guest.pages.home.includes.featured-area')
<!--==================================================================== 
                    end Our featureds section
=====================================================================-->


<!--==================================================================== 
                    Start Our Team section
=====================================================================-->

    @include('guest.pages.home.includes.our-team')

<!--==================================================================== 
                    End Our Team section
=====================================================================-->




<!--==================================================================== 
                    Start Fun-fact+cta section
=====================================================================-->

    @include('guest.pages.home.includes.funfact')

<!--==================================================================== 
                    End Fun-fact+cta section
=====================================================================-->


<!--==================================================================== 
                    Start portfolio section
=====================================================================-->
@include('guest.pages.home.includes.portfolio-area')



<!--==================================================================== 
                    End portfolio section
=====================================================================-->

<!--==================================================================== 
                    Start Pricing section
=====================================================================-->
@include('guest.pages.home.includes.pricing')



<!--==================================================================== 
                    End Pricing section
=====================================================================-->

<!--==================================================================== 
                    Start Testimonial Section
=====================================================================-->

@include('guest.pages.home.includes.testimonial')


<!--==================================================================== 
                    End Testimonial Section
=====================================================================-->

<!--==================================================================== 
                    Start Blog section
=====================================================================-->
@include('guest.pages.home.includes.blog')

<!--==================================================================== 
                    End Blog section
=====================================================================-->


<!--==================================================================== 
                    Start Our Partner/logo + CTA2
=====================================================================-->

@include('guest.pages.home.includes.partner')


<!--==================================================================== 
                    End Our Partner/logo CTA2
=====================================================================-->



<!--==================================================================== 
                    Start footer section
=====================================================================-->
@include('guest.includes.footer')


@endsection