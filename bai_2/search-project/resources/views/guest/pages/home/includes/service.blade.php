<!--==================================================================== 
                    Start service-section-style-one
=====================================================================-->
@if(count(getService())>0)

<section class="service-section-one pt-85 rpt-65 pb-45 bg-gray">
    <div class="container">
        <div class="row justify-content-center">
            <div class="section-title">
                <h2>Dịch vụ của chúng tôi</h2>
            </div>
        </div>
        <div class="row justify-content-center">
            @foreach(getService() as $item)
            <!-- single-service -->
            <div class="col-lg-3 col-md-6">
                <div class="single-service service-style-one text-center wow animated customFadeInUp delay-0-1s">
                    <div class="service-icon zero">
                         <i class="flaticon-network"></i>
                    </div>
                    <div class="service-content">
                        <h5><a href="single-service.html">{{$item->service_name}}</a></h5>
                        <p>{{$item->service_description}}</p>
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
