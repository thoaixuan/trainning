
<section>
    <div class="section bg-landing p-0">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            </div>
            @foreach($products as $data)
            <div class="col-md-6 col-xl-4 col-sm-6">
                <div class="card">
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
                            <span  class="btn btn-primary mb-1 shoppingCart" data-image="{{array_values(json_decode($data->image))[0]}}" data-id="{{$data->id}}" data-name="{{$data->name}}" data-price="{{$data->price}}"><i class="fe fe-shopping-cart mx-2"></i>Thêm vào giỏ hàng</span>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            
        </div>
    </div>
</div>

</section>

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