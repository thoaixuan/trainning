@extends('guest.layouts.main')

@section('main')
@foreach(json_decode(settings()->home_banner) as $list_banner)
<section>
    <div class="guest-banner" style="background: url('{{url('uploads/website')."/".$list_banner->banner_bg}}')">
        <div class="overlay">
        <div class="container px-sm-0">
            <div class="row">
                <div class="col-lg-12 mb-5 pb-5 animation-zidex pos-relative text-white text-center title">
                    <h1 class="text-center fw-bold mt-5">{!! $list_banner->banner_title !!}</h1>
    
                    <a href="{{route('guest.contact.index')}}" target="_blank" class="btn me-2 btn-light fw-bold">{!! $list_banner->banner_cta !!}
                    </a>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
@endforeach

<!--app-content open-->
{{-- <div class="main-content mt-0">
    <div class="side-app">

        <!-- CONTAINER -->
        <div class="main-container ">
            <div class=""> --}}

                <!-- Du an -->
                
                <section>
                <div class="section pb-0">
                    <div class="container">
                        <div class="row">
                            @foreach(json_decode(settings()->home_project) as $list_project)
                            <h2 class="text-center fw-semibold">{!! $list_project->project_title !!}</h2>
                            <span class="landing-title"></span>
                            <h4 class="text-center fw-semibold mb-7">{!! $list_project->project_title_des !!}</h4>
                            @endforeach
                        </div>
                        <div class="row text-center services-statistics landing-statistics">
                            @foreach(fetchHomeProject() as $fetch_list_project )
                            <div class="col-xl-3 col-md-6 col-lg-6">
                                <div class="card">
                                    <div class="card-body {!! $fetch_list_project->color !!}-transparent">
                                        <div class="counter-status counter-status--min__height">
                                            <div class="counter-icon {!! $fetch_list_project->color !!}-transparent box-shadow-primary">
                                                <i class="{!! $fetch_list_project->icon !!} text-success fs-23"></i>
                                            </div>
                                            <div class="test-body text-center">
                                                <div class="counter-text">
                                                    <h5 class="font-weight-normal mb-0 ">{!! $fetch_list_project->content !!}</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            
                        </div>
                    </div>
                </div>
                </section>
                
                <!-- Cam ket -->
                <section>
                <div class="sptb section bg-white" id="Features">
                    <div class="container">
                        <div class="row">
                            @foreach(json_decode(settings()->home_camket) as $list_camket)
                            <h2 class="text-center fw-semibold">{!! $list_camket->camket_title !!}</h2>
                            <span class="landing-title"></span>
                            <h4 class="fw-semibold text-center">{!! $list_camket->camket_title_des !!}</h4>
                            @endforeach
                            <div class="row mt-7">
                                @foreach(fetchHomeCamket() as $fetch_list_camket )
                                <div class="col-xl-6 col-md-6 col-lg-6">
                                    <div class="card features main-features main-features-4 wow fadeInUp" data-wow-delay="0.1s">
                                        <div class="bg-img mb-2 text-left">
                                            <img class="object-contain" src="{{url('uploads/website/')."/".$fetch_list_camket->image}}" alt="">
                                        </div>
                                        <div class="text-left">
                                            <h4 class="fw-bold">{!! $fetch_list_camket->title !!}</h4>
                                            <p class="mb-0">{!! $fetch_list_camket->des !!}</p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            
                            </div>
                        </div>
                    </div>
                </div>
                </section>
                
                <!-- San pham -->
         
                <section>
                    <div class="section p-0">
                    <div class="container">
                        <div class="row">
                            <h2 class="text-center fw-semibold">Sản phẩm </h2>
                            <span class="landing-title"></span>
                            <h4 class="text-center fw-semibold mb-7">Sản phẩm mới </h4>
                            @foreach(fecthProducts() as $data)
                            <div class="col-md-6 col-xl-4 col-sm-6 ">
                                <div class="card shadow-lg bg-white ">
                                    <div class="product-grid6">
                                        <div class="product-image6 p-5">
                                            <ul class="icons">
                                                <li>
                                                    <a href="{{route('guest.product.detail',['slug'=>$data->slug])}}" class="btn btn-primary"> <i class="fe fe-eye mx-2"></i> </a>
                                                </li>
                                            </ul>
                                            <a href="{{route('guest.product.detail',['slug'=>$data->slug])}}">
                                                <img class="img-fluid img-product br-7 w-100" src="{{asset('uploads/products/'.$data->id.'/'.array_values(json_decode($data->image))[0])}}" alt="img">
                                            </a>
                                        </div>
                                        <div class="card-body pt-0">
                                            <div class="product-content ">
                                                <div class="fs-6"><a class="text-dark fs-6 fw-bolder" href="{{route('guest.product.detail',['slug'=>$data->slug])}}">{{$data->name}}</a></div>                            
                                                <div class="fs-6 fst-normal">{{currency_format($data->price)?currency_format($data->price):"Liên hệ"}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer text-center">
                                            <span  class="btn btn-primary mb-1 shoppingCart w-100" data-image="{{array_values(json_decode($data->image))[0]}}" data-id="{{$data->id}}" data-name="{{$data->name}}" data-price="{{$data->price}}"><i class="fe fe-shopping-cart mx-2"></i>Thêm vào giỏ hàng</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            
                        </div>
                    </div>
                </div>

                </section>

                <!-- Blog -->
                <section>
                    <div class="section bg-white" id="Blog">
                        <div class="container">
                            <div class="row">
                                <h2 class="text-center fw-semibold">Tin tức </h2>
                                <span class="landing-title"></span>
                                <h4 class="text-center fw-semibold mb-7">Tin tức mới</h4>
                                @foreach(getNewsMain() as $item)
                                    <div class="col-lg-6">
                                        <div class="card shadow-lg bg-white active">
                                            <div class="card-body px-1">
                                                <div class="d-flex overflow-visible">
                                                    <a href="{{route('guest.blog.detail',['slug'=>$item->slug])}}" class="card-aside-column br-5 cover-image" data-bs-image-src="/uploads/news/{{$item->image}}"></a>
                                                    <div class="ps-3 flex-column">
                                                        <h3 class="text-summary"><a href="{{route('guest.blog.detail',['slug'=>$item->slug])}}">{{$item->title}}</a></h3>
                                                        <div class="text-summary">
                                                            {!!$item->summary!!}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </section>
             

            {{-- </div>
        </div>
        <!-- CONTAINER CLOSED-->
    </div>
</div> --}}
<!--app-content closed-->


@endsection
@section('jsGuest')
<script src="{{asset('app/Guest/product/product.js')}}"></script>
<script>
  var product=new product();
        product.datas={
        routes:{
        }
      }
      product.init();
    
</script>
@endsection