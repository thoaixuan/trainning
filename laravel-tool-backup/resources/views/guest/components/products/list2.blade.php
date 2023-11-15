<div class="col-xl-12 col-lg-12 col-md-12">
<div class="card overflow-hidden">
    <div class="card-body">
        <div class="row g-0">
            @foreach($products as $data)
            <div class="col-xl-3 col-lg-12 col-md-12 py-2">
                <div class="product-list">
                    <div class="product-image">
                        <ul class="icons">
                            <li>
                                <a href="{{route('guest.product.detail')}}" class="btn btn-primary"> <i class="fe fe-shopping-cart"></i>  </i> </a>
                            </li>
                        </ul>
                    </div>
                    <div class="br-be-0 br-te-0">
                        <a href="{{route('guest.product.detail')}}" class="">
                           <img class="img-fluid img-product br-7 w-100" src="{{asset('uploads/products/'.$data->id.'/'.array_values(json_decode($data->image))[0])}}" alt="img">
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-12 col-md-12 border-end my-auto">
                <div class="card-body">
                    <div class="mb-3">
                        <a href="{{route('guest.product.detail')}}" class="">
                            <h3 class="fw-bold fs-30 mb-3">{{$data->name}}</h3>
                        </a>
                        <p class="fs-16">
                            {!!$data->description!!}
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-12 col-md-12 my-auto">
                <div class="card-body p-0">
                    <div class="price h3 text-center mb-5 fw-bold">{{currency_format($data->price)?currency_format($data->price):"Liên hệ"}}</div>
                    <span  class="btn btn-primary mb-1 shoppingCart" data-image="{{array_values(json_decode($data->image))[0]}}" data-id="{{$data->id}}" data-name="{{$data->name}}" data-price="{{$data->price}}"><i class="fe fe-shopping-cart mx-2"></i>Thêm vào giỏ hàng</span>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
</div>
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