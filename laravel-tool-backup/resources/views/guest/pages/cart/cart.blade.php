
@extends('guest.layouts.main')
@section('main')
<div class="page-main">

<!--app-content open-->
<div class="main-content app-content mt-0">
    <div class="side-app">

        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            <!-- ROW-1 OPEN -->
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xl-8">
                    <div class="card cart">
                        <div class="card-header">
                            <h3 class="card-title">Giỏ hàng</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-vcenter" id="tableCart">
                                    <thead>
                                        <tr class="border-top">
                                            <th>Sản phẩm</th>
                                            <th>Tiêu đề</th>
                                            <th>Giá</th>
                                            <th>Số lượng</th>
                                            <th>Tác vụ</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbodyCart">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer">
                        <div class="row">
                            <!-- <div class="col-md-12 col-sm-12 text-end"><a href="javascript:void(0)" class="btn btn-default btn-md" id="updateCart">Cập nhật</a></div> -->
                        </div>
                    </div>
                    </div>
                </div>
                <div class="col-lg-12 col-xl-4 col-sm-12 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Tổng hóa đơn</div>
                        </div>
                        <div class="card-body py-2">
                            <div class="table-responsive">
                                <table class="table table-borderless text-nowrap mb-0">
                                    <tbody class="listCart">
                                    </tbody>
                                    <tbody class="totalCart">
                                    </tbody>
                                </table>
                          
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="btn-list">
                                <a href="{{route('guest.order.index')}}" class="btn btn-success float-sm-end">Thanh toán<i class="fa fa-arrow-right ms-1"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ROW-1 CLOSED -->
        </div>
        <!-- CONTAINER CLOSED -->
    </div>
</div>
<!--app-content closed-->
</div>

@endsection
@section('jsGuest')
<script src="{{asset('app/Guest/product/product.js')}}"></script>
<script>
  var product=new product();
        product.datas={
        routes:{
            send: "{{route('guest.order.send')}}",
        }
      }
      product.init();
    
</script>
@endsection