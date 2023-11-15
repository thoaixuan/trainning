<!-- Row -->
<div class="container">
        <div>
            <div class="card custom-card">
                <div class="card-body pt-0 h-100">
                    <div class="owl-carousel owl-carousel-icons2">
                        @foreach(fecthProducts() as $data)
                        <div class="item">
                            <div class="card overflow-hidden border p-0 mb-0 bg-white">
                            <img class="img-fluid img-product br-7 w-100" src="{{asset('uploads/products/'.$data->id.'/'.array_values(json_decode($data->image))[0])}}" alt="img">
                                <div class="card-footer">
                                <div class="product-content ">
                                <div class="fs-6"><a class="text-dark fs-6 fw-bolder" href="{{route('guest.product.detail',['slug'=>$data->slug])}}">{{$data->name}}</a></div>                            
                                <div class="fs-6 fst-normal">{{currency_format($data->price)?currency_format($data->price):"Liên hệ"}}
                                </div>
                            </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- End Row-->