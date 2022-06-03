@extends('guest.layouts.main')
@section('main')
<section name="main" >
    @foreach(json_decode(getConfigMail()->home_banner) as $list_banner)
    <div class="bg-primary h-300 p-4 d-flex justify-content-center align-items-center text-white" style="margin-top: 68px;">
            <div class="text-center">
                <h1>
                    {!! $list_banner->banner_title !!}
                </h1>
                <div class="d-flex justify-content-center align-items-center">
                 <a href="{{ route('guest.contact.index') }}" class="btn btn-light btn-lg rounded-pill px-5">{!! $list_banner->banner_cta !!}</a>
                </div>
            </div>
        </div>
    @endforeach
    <div class="container">
        <div class="py-5">
            <h2>Danh mục</h2>
            <div class="row">
                @foreach(fetchCategory() as $list_category)
                  <div class="col-lg-3 col-md-4 col-sm-6 mt-2">
                      <a href="{!! $list_category->url !!}">
                      <div class="d-flex bg-content bg-white shadow-sm p-3 bg-body position-relative p-5 icon-bg border-fix">
                          <div class="position-absolute icon">
                            <span class="bg-icon d-flex justify-content-center align-items-center rounded-circle {!! $list_category->color !!}">
                            <i class="side-menu__icon {!! $list_category->icon !!} text-light"></i>
                              </span>
                          </div>
                          <div class="text-content">
                              <span>{!! $list_category->title !!}</span>
                          </div>
                      </div>
                      </a>
                  </div>
                  
                  @endforeach
            </div>
        </div>
    </div>
    <div class="container">
        <div class="py-5">
            <h2>
                Câu hỏi thường gặp
            </h2>
            <div>
                @foreach(fetchQuestion() as $key => $list_question)
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="heading{{$key}}">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$key}}" aria-expanded="false" aria-controls="collapse{{$key}}">
                            {!! $list_question->title !!}
                        </button>
                        </h2>
                        <div id="collapse{{$key}}" class="accordion-collapse collapse" aria-labelledby="heading{{$key}}" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            {!! $list_question->des !!}
                        </div>
                        </div>
                    </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <h3 class="text-center">Bạn có muốn tìm thêm thông tin gì không?</h3>

        <div class="row d-flex justify-content-center">
            @foreach(json_decode(getConfigMail()->home_info) as $list_info)
            <div class="col-lg-3 col-md-4 col-sm-6 mt-2">
                <div class="d-flex justify-content-start bg-content bg-white shadow-sm p-5 icon-info-bg border-fix">
                    <div class="bg-icon d-flex justify-content-center align-items-center rounded-circle bg-info">
                      <i class="side-menu__icon fe fe-mail text-light"></i>
                    </div>
                    <div class="d-flex flex-column bd-highlight">
                        <div class="px-2 bd-highlight">{!! $list_info->info_title1 !!}</div>
                        <div class="px-2 bd-highlight">{!! $list_info->info_des1 !!}</div>
                      </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-4 col-sm-6 mt-2">
                <div class="d-flex justify-content-start bg-content bg-white shadow-sm p-5 icon-info-bg border-fix">
                    <div class="bg-icon d-flex justify-content-center align-items-center rounded-circle bg-info">
                      <i class="side-menu__icon fe fe-phone text-light"></i>
                    </div>
                    <div class="d-flex flex-column bd-highlight">
                        <div class="px-2 bd-highlight">{!! $list_info->info_title2 !!}</div>
                        <div class="px-2 bd-highlight">{!! $list_info->info_des2 !!}</div>
                      </div>
                </div>
            </div>
            @endforeach
        </div>
        </div>
    </div>

</section>

@endsection
