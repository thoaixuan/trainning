@extends('guest.main')
@section('content')

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
                    <img src="{{route('guest_home')}}/guest/img/hero-right.png" alt="">
                </div>
                <div class="d-none d-md-block wow  customFadeInLeft tob-animation-image animated" style="visibility: visible; animation-name: customFadeInLeft;">
                    <img src="{{route('guest_home')}}/guest/img/tob.png" alt="">
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
                            <p>Nhập <b>tên khách hàng, tên công ty hoặc số điện thoại</b> để tra cứu thông tin : Thông tin khách hàng, thông tin dịch vụ đã sử dụng, trạng thái bảo hành - hỗ trợ,...vv</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="search-field">
                            <form id="search-form">
                               <div class="form-group">
                                   <input type="text" class="keyword" id="keyword" name="keyword" placeholder="Nhập tên khách hàng, tên công ty hoặc số điện thoại">
                                   <button type="submit" data-loading-text="Vui lòng đợi..."><i class="fa fa-search"></i>Tra cứu</button>
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

    @if(count(getServices())>0)
        <section class="service-section-one pt-85 rpt-65 pb-45 bg-gray">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 text-center">
                        <div class="section-title">
                            <h2>Dịch Vụ Của Chúng Tôi</h2>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">

                    @foreach (getServices() as $item)
    				    <!-- single-service -->
                        <div class="col-lg-3 col-md-6">
                            <div class="single-service service-style-one text-center wow animated customFadeInUp delay-0-{{$loop->index+1}}s">
                                <div class="service-icon zero">
    								<i class="flaticon-gear"></i>
                                </div>
                                <div class="service-content">
                                    <h5><a href="">{{$item->services_name}}</a></h5>
                                    <p>{{$item->services_description}}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
    <!--==================================================================== 
							End service-section-style-one
	=====================================================================-->

    <!--==================================================================== -->


@endsection

@section('jsGuest')

    <script>
       
    </script>

@endsection