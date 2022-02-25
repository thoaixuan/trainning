@extends('guest.main')
@section('main')

	<!--==================================================================== 
						Start hero section
	=====================================================================-->
	<section class="hero-section py-100 bg-img d-flex align-items-center hero-background">
	    <div class="container">
	        <div class="row">
	            <div class="col-md-7">
                    <div class="hero-text">
						<h1>Giải pháp CNTT an toàn cho một môi trường an toàn hơn</h1>
						<p>Chào mừng bạn đến với Công ty tư vấn đầu tư ING <br>Giải pháp công nghệ thông tin cho doanh nghiệp bạn</p>
						<a href="https://google.com" class="btn">Bắt đầu</a>
					</div>
					
	            </div>

	            <div class="d-none d-md-block wow  customFadeInRight hero-animation-image animated" style="visibility: visible; animation-name: customFadeInRight;">
                    <img src="{{route('guest_home')}}/themes/guest/img/hero-right.png" alt="">
                </div>
                <div class="d-none d-md-block wow  customFadeInLeft tob-animation-image animated" style="visibility: visible; animation-name: customFadeInLeft;">
                    <img src="{{route('guest_home')}}/themes/guest/img/tob.png" alt="">
                </div>
	        </div>
	    </div>
	</section>
	<!--==================================================================== 
						End hero section
	=====================================================================-->

    <!--==================================================================== 
                            end requirement section
    =====================================================================-->

        <section class="requirement-section another-page pt-65 pb-45">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 text-center">
                        <div class="section-title">
                            <h2>Tra cứu thông tin dịch vụ</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="requirement-text text-center">
                            <p>Nhập <b>tên khách hàng, tên công ty, số điện thoại hoặc từ khóa</b> để tra cứu thông tin : Thông tin khách hàng, thông tin dịch vụ đã sử dụng - hỗ trợ,...vv</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="search-field">
                            <form action="{{route('guest_home')}}/search" method="get">
                               <div class="form-group">
                                   <input type="text" class="keyword" id="keyword" name="keyword" placeholder="Nhập tên khách hàng, tên công ty, số điện thoại hoặc từ khóa">
                                   <button type="submit"><i class="fa fa-search"></i>Tra cứu</button>
                               </div>
                           </form>
                        </div>
                    </div>
                </div>
                <div class="row d-none" id="result">
                    <div class="col-lg-12">
                        <table class="table table-bordered hover table-hover table-striped" id="table-search">
                        </table>
                    </div>
                </div>

            </div>
        </section>


    <!--==================================================================== 
                            end requirement section
    =====================================================================-->


	<!--==================================================================== 
							Start service-section-style-one
	=====================================================================-->

    
        <section class="featured-area pt-85 rpt-65 pb-100 bg-gray">
            <div class="d-none d-xl-block featured-round"><img src="{{route('guest_home')}}/themes/guest/img/feature.png" alt=""></div>
            <div class="d-none d-xl-block featured-round-small"><img src="{{route('guest_home')}}/themes/guest/img/small-feature.png" alt=""></div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 text-center">
                        <div class="section-title">
                            <h2>Dịch Vụ Của Chúng Tôi</h2>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">

                    <div class="col-lg-4 col-md-6">
                        <div class="featured-item wow  customFadeInUp dalay-0-1s animated" style="visibility: visible; animation-name: customFadeInUp;">
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
                        <div class="featured-item wow  customFadeInUp dalay-0-1s animated" style="visibility: visible; animation-name: customFadeInUp;">
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
                        <div class="featured-item wow  customFadeInUp dalay-0-1s animated" style="visibility: visible; animation-name: customFadeInUp;">
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
                </div>
            </div>
        </section>

    <!--==================================================================== 
							End service-section-style-one
	=====================================================================-->

    <!--==================================================================== -->


@endsection

@section('jsGuest')

    <script>
       
    </script>

@endsection