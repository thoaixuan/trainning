<div class="header-nav-right d-none dropdown d-lg-flex shopping-cart">
    <a class="nav-link icon text-center" data-bs-toggle="dropdown">
        <i class="fe fe-shopping-cart"></i><span class="badge bg-default header-badge">0</span>
    </a>
    <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
        <div class="drop-heading border-bottom">
            <div class="d-flex">
                <h6 class="mt-1 mb-0 fs-16 fw-semibold text-dark"> Giỏ hàng của tôi</h6>
                <div class="ms-auto">
                </div>
            </div>
        </div>
        <div class="header-dropdown-list message-menu">
            
        </div>
        <div class="dropdown-divider m-0"></div>
        <div class="dropdown-footer">
            <span class="float-end p-2 fs-17 fw-semibold total-cart"></span>
            <a class="btn btn-primary btn-pill w-sm btn-sm py-2 float-end" href="{{route('guest.cart.index')}}"><i class="fe fe-check-circle"></i>Mua ngay</a>
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