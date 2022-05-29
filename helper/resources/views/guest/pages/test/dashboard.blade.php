@extends('guest.layouts.main') 
@section('main')  

<!--app-content open-->
<div class="main-content app-content mt-0">
    <div class="bg-main">
        <div class="d-flex justify-content-center align-items-center h-100 w-100">
            <div class="row">
                <h1>
                    Xin chào, Egate có thể giúp gì cho bạn?
                </h1>
                <button class=" btn btn-primary w-24 h-24 col-2 m-auto" type="button"><a class="text-white" href="{{route('guest.contact.index')}}">Liên hệ</a></button>
            </div>
        </div>
    </div>
    <div class="side-app">

        <!-- CONTAINER -->
        <div class="container bg-container">

            <!-- PAGE-HEADER -->
            <div class="page-header">
              <h2>Danh mục</h2>
            </div>
            <div class="row">
                @for($i=0;$i<8;$i++)
                  <div class="col-lg-3 col-md-4 col-sm-6 mt-2">
                      <div class="d-flex bg-content bg-white shadow-sm p-3 bg-body position-relative"> 
                          <div class="position-absolute">
                            <span class="bg-icon d-flex justify-content-center align-items-center rounded-circle ">
                                    <i class="fa fas-home">icon</i>
                              </span>
                          </div>
                          <div class="text-content"> 
                              <span >Lorem ipsum dolor sit amet. </span>
                          </div>
                      </div>
                  </div>
                @endfor
            </div>

            <!-- PAGE-HEADER -->
            <div class="page-header">
              <h2>Câu hỏi thường gặp</h2>
            </div>
            <div class="row">
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    [Cảnh báo lừa đảo] Mua sắm an toàn cùng Shopee
                    </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                      Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque fugiat, sunt quaerat eos ab quos assumenda quidem, numquam obcaecati, ad sint. Incidunt, quidem. Iusto, delectus!
                    </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    [Cảnh báo lừa đảo] Mua sắm an toàn cùng Shopee
                    </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Unde iste laboriosam, magni nobis nam, quia minus maxime ab culpa vitae, iusto molestiae aspernatur earum corrupti!
                    </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    [Cảnh báo lừa đảo] Mua sắm an toàn cùng Shopee
                    </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nihil facilis, quia officia aliquid similique, neque et id distinctio possimus ea pariatur dolores praesentium ipsum quisquam.
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <!-- CONTAINER CLOSED -->

    </div>
</div>
<!--app-content closed-->
@endsection