@extends('admin.layouts.main') 
@section('main')  

<!--app-content open-->
<div class="main-content app-content mt-0">

    <div class="side-app">

        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            <!-- PAGE-HEADER -->
            <div class="card card-solid">
                <div class="card-body">
                    <div class="panel panel-primary">
                        <div class=" tab-menu-heading">
                            <div class="tabs-menu1">
                                <!-- Tabs -->
                                <ul class="nav panel-tabs">
                                    <li><a href="#tab1" class="active" data-bs-toggle="tab">Cài đặt website</a></li>
                                    <li><a href="#tab2" data-bs-toggle="tab">Cấu hình mail</a></li>
                                    <li><a href="#tab3" data-bs-toggle="tab">Cấu hình google</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="panel-body tabs-menu-body">
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab1">
                                    <h4>Cài đặt trang chủ</h4>
                                    <form id="setting_home" autocomplete="off" enctype="multipart/form-data">
                                        @csrf
                                    <div class="accordion mb-3" id="accordionExample">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="headingOne">
                                                <button class="accordion-button collapsed active" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                                        Chỉnh sửa banner
                                                    </button>
                                            </h2>
                                            <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample" style="">
                                                <div class="accordion-body">
                                                   <div class="row">
                                                    @foreach(json_decode(getConfigMail()->home_banner) as $list_banner)
                                                    <div class="col-md-6">
                                                      <div class="form-group">
                                                        <label>Tiêu đề</label>
                                                        <input type="text" name="home_banner_title" class="form-control" value="{{$list_banner->banner_title}}"/>
                                                      </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                      <div class="form-group">
                                                        <label>Call to action</label>
                                                        <input type="text" name="home_banner_cta" class="form-control" value="{{$list_banner->banner_cta}}"/>
                                                      </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                      <div class="form-group">
                                                      <button type="submit" class="btn btn-primary" id="submit_setting_home">Lưu</button>
                                                    </div>
                                                  </div>
                                                  @endforeach
                                                   </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="headingTwo">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                        Chỉnh sửa danh mục
                                                    </button>
                                            </h2>
                                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    <div class="row">
                                                      @foreach(json_decode(getConfigMail()->home_category) as $list_category)
                                                      <div class="col-md-6">
                                                        <div class="form-group">
                                                          <input type="text" name="category1" class="form-control" value="{{$list_category->category1}}">
                                                        </div>
                                                        <div class="form-group">
                                                          <input type="text" name="category2" class="form-control" value="{{$list_category->category2}}">
                                                        </div>
                                                        <div class="form-group">
                                                          <input type="text" name="category3" class="form-control" value="{{$list_category->category3}}">
                                                        </div>
                                                        <div class="form-group">
                                                          <input type="text" name="category4" class="form-control" value="{{$list_category->category4}}">
                                                        </div>
                                                      </div>
                                                      <div class="col-md-6">
                                                        <div class="form-group">
                                                          <input type="text" name="category5" class="form-control" value="{{$list_category->category5}}">
                                                        </div>
                                                        <div class="form-group">
                                                          <input type="text" name="category6" class="form-control" value="{{$list_category->category6}}">
                                                        </div>
                                                        <div class="form-group">
                                                          <input type="text" name="category7" class="form-control" value="{{$list_category->category7}}">
                                                        </div>
                                                      </div>
                                                      <div class="col-md-12">
                                                        <div class="form-group">
                                                        <button type="submit" class="btn btn-primary">Lưu</button>
                                                      </div>
                                                    </div>
                                                      @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="headingThree">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                        Chỉnh sửa câu hỏi thường gặp
                                                    </button>
                                            </h2>
                                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    <div class="row">
                                                      @foreach(json_decode(getConfigMail()->home_question) as $list_question)
                                                      <div class="col-md-6">
                                                        <div class="form-group">
                                                          <label>Câu hỏi 1</label>
                                                          <input type="text" name="question_title1" class="form-control" value="{{$list_question->question_title1}}">
                                                        </div>
                                                        <div class="form-group">
                                                          <label>Trả lời 1</label>
                                                          <input type="text" name="question_des1" class="form-control" value="{{$list_question->question_des1}}">
                                                        </div>
                                                      </div>
                                                      <div class="col-md-6">
                                                        <div class="form-group">
                                                          <label>Câu hỏi 2</label>
                                                          <input type="text" name="question_title2" class="form-control" value="{{$list_question->question_title2}}">
                                                        </div>
                                                        <div class="form-group">
                                                          <label>Trả lời 2</label>
                                                          <input type="text" name="question_des2" class="form-control" value="{{$list_question->question_des2}}">
                                                        </div>
                                                      </div>
                                                      <div class="col-md-12">
                                                        <div class="form-group">
                                                        <button type="submit" class="btn btn-primary">Lưu</button>
                                                      </div>
                                                    </div>
                                                      @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                          <h2 class="accordion-header" id="heading4">
                                              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
                                                      Chỉnh sửa thông tin
                                                  </button>
                                          </h2>
                                          <div id="collapse4" class="accordion-collapse collapse" aria-labelledby="heading4" data-bs-parent="#accordionExample">
                                              <div class="accordion-body">
                                                <div class="row">
                                                  @foreach(json_decode(getConfigMail()->home_info) as $list_info)
                                                  <div class="col-md-6">
                                                    <div class="form-group">
                                                      <label>Tiêu đề 1</label>
                                                      <input type="text" name="info_title1" class="form-control" value="{{$list_info->info_title1}}">
                                                    </div>
                                                    <div class="form-group">
                                                      <label>Mô tả 1</label>
                                                      <input type="text" name="info_des1" class="form-control" value="{{$list_info->info_des1}}">
                                                    </div>
                                                  </div>
                                                  <div class="col-md-6">
                                                    <div class="form-group">
                                                      <label>Tiêu đề 2</label>
                                                      <input type="text" name="info_title2" class="form-control" value="{{$list_info->info_title2}}">
                                                    </div>
                                                    <div class="form-group">
                                                      <label>Mô tả 2</label>
                                                      <input type="text" name="info_des2" class="form-control" value="{{$list_info->info_des2}}">
                                                    </div>
                                                  </div>
                                                  <div class="col-md-12">
                                                    <div class="form-group">
                                                    <button type="submit" class="btn btn-primary">Lưu</button>
                                                  </div>
                                                </div>
                                                  @endforeach
                                                </div>
                                              </div>
                                          </div>
                                      </div>
                                    </div>
                                    </form>
                                    <form autocomplete="off"  enctype="multipart/form-data" id="websiteForm">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ getConfigMail()->id }}">
                                        <div class="row">
                                            @foreach(json_decode(getConfigMail()->website_logo) as $list_logo)
                                        <div class="col-md-6">
                                            <div class="form-group">
                                            <label>Logo website</label>
                                            @if(!empty($list_logo->logo_guest))
                                            <p><img class="w-25" src="{{route('guest.home.index')}}/uploads/{{ $list_logo->logo_guest }}"/></p>
                                            @else
                                            @endif
                                            <input type="file" name="guest_logo_header" id="guest_logo_header" class="w-100"/>
                                            </div>
                                            <div class="form-group">
                                                <label>Tên website</label>
                                                <input type="text" name="website_name" class="form-control" value="{{ getConfigMail()->website_name }}"/>
                                              </div>
                                            <div class="form-group">
                                                  <label>Root color</label>
                                                  <input type="text" name="root_color" class="form-control" value="{{ getConfigMail()->root_color }}"/>
                                                </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Favicon website</label>
                                                @if(!empty($list_logo->favicon))
                                                 <p><img class="w-25" src="{{route('guest.home.index')}}/uploads/{{ $list_logo->favicon }}"/></p>
                                                 @else
                                                 @endif
                                                <input type="file" name="website_favicon" class="form-control"/>
                                              </div>
                                              <div class="form-group">
                                                <label>Logo admin light mode</label>
                                                @if(!empty($list_logo->admin_logo_blue))
                                                <p><img class="w-25" src="{{route('guest.home.index')}}/uploads/{{ $list_logo->admin_logo_blue }}"/></p>
                                                @else
                                                @endif
                                                <input type="file" name="admin_logo_blue" class="form-control"/>
                                              </div>
                                              <div class="form-group">
                                               <label>Logo admin dark mode</label>
                                               @if(!empty($list_logo->admin_logo_white))
                                                <p><img class="w-25" src="{{route('guest.home.index')}}/uploads/{{ $list_logo->admin_logo_white }}"/></p>
                                                @else
                                                @endif
                                               <input type="file" name="admin_logo_white" class="form-control"/>
                                             </div>
                                        </div>
                                        <div class="p-3">
                                            <button type="submit" class="btn btn-primary" id="submitWeb">Lưu</button>
                                        </div>
                                        @endforeach
                                        </div>
                                        </form>
                                </div>
                                <div class="tab-pane" id="tab2">
                                    <form id="mailForm" method="post">
                                        @csrf
                                        <div class="row">
                                          @foreach(json_decode(getConfigMail()->config_mail) as $list_mail)
                                        <div class="col-md-12 mb-3">
                                           <h4>Cài đặt cấu hình gửi mail</h4>
                                         </div>
                                         <div class="col-md-6">
                                           <div class="form-group">
                                             <label>Mail driver</label>
                                             <input type="text" name="mail_driver" class="form-control form-control-sm" value="{{ $list_mail->mail_driver }}"/>
                                           </div>
                                           <div class="form-group">
                                             <label>Mail host</label>
                                             <input type="text" name="mail_host" class="form-control form-control-sm" value="{{ $list_mail->mail_host }}"/>
                                           </div>
                                           <div class="form-group">
                                             <label>Mail port</label>
                                             <input type="text" name="mail_port" class="form-control form-control-sm" value="{{ $list_mail->mail_port }}"/>
                                           </div>
                                           <div class="form-group">
                                             <label>Mail from address</label>
                                             <input type="text" name="mail_from_address" class="form-control form-control-sm" value="{{ $list_mail->mail_from_address }}"/>
                                           </div>
                                           <div class="form-group">
                                             <label>Mail from name</label>
                                             <input type="text" name="mail_from_name" class="form-control form-control-sm" value="{{ $list_mail->mail_from_name }}"/>
                                           </div>
                                         </div>
                                         <div class="col-md-6">
                                           <div class="form-group">
                                             <label>Mail encryption</label>
                                             <input type="text" name="mail_encryption" class="form-control form-control-sm" value="{{ $list_mail->mail_encryption }}"/>
                                           </div>
                                           <div class="form-group">
                                             <label>Mail username</label>
                                             <input type="text" id="mail_username" name="mail_username" class="form-control form-control-sm" value="{{ $list_mail->mail_username }}"/>
                                           </div>
                                           <div class="form-group">
                                             <label>Mail password</label>
                                             <input type="text" id="mail_password" name="mail_password" class="form-control form-control-sm" value="{{ $list_mail->mail_password }}"/>
                                           </div>
                                           <div class="form-group">
                                             <label>Mail người nhận</label>
                                             <input type="text" name="mail_receive" class="form-control form-control-sm" value="{{ $list_mail->mail_receive }}"/>
                                           </div>
                                         </div>
                                       <div class="col-md-1">
                                         <button type="submit" class="btn btn-primary btn-block">Lưu</button>
                                       </div>
                                       @endforeach
                                        </div>            
                                       </form>
                                </div>
                                <div class="tab-pane" id="tab3">
                                    <form id="setting_google">
                                        @csrf
                                        <div class="row">
                                          @foreach(json_decode(getConfigMail()->config_google) as $list_google)
                                         <div class="col-md-12">
                                             <h4>Captcha Google</h4>
                                           <div class="form-group">
                                             <label>Nocaptcha Secret</label>
                                             <input type="text" name="nocaptcha_secret" class="form-control form-control-sm" value="{{ $list_google->nocaptcha_secret }}"/>
                                           </div>
                                           <div class="form-group">
                                             <label>Nocaptcha Sitekey</label>
                                             <input type="text" name="nocaptcha_sitekey" class="form-control form-control-sm" value="{{ $list_google->nocaptcha_sitekey }}"/>
                                           </div>
                                           
                                         </div>
                                       <div class="col-md-1">
                                         <button type="submit" class="btn btn-primary btn-block">Lưu</button>
                                       </div>
                                       @endforeach
                                        </div>            
                                       </form>
                                </div>
                                
                            </div>
                        </div>
                    </div>

                    
                </div>
            </div>
       
            {{-- <!-- Row -->
            <div class="card card-solid mt-4">
                <div class="card-body">
                    <form  method="post" id="mailForm">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 mb-3">
                        <h4>Cài đặt cấu hình gửi mail</h4>
                        </div>
                            <input type="hidden" name="id" value="{{ getConfigMail()->id }}">
                        <div class="col-md-6">
                        <div class="form-group">
                            <label>Mail driver</label>
                            <input type="text" name="mail_driver" class="form-control form-control-sm" value="{{ getConfigMail()->mail_driver }}"/>
                        </div>
                        <div class="form-group">
                            <label>Mail host</label>
                            <input type="text" name="mail_host" class="form-control form-control-sm" value="{{ getConfigMail()->mail_host }}"/>
                        </div>
                        <div class="form-group">
                            <label>Mail port</label>
                            <input type="text" name="mail_port" class="form-control form-control-sm" value="{{ getConfigMail()->mail_port }}"/>
                        </div>
                        <div class="form-group">
                            <label>Mail from address</label>
                            <input type="text" name="mail_from_address" class="form-control form-control-sm" value="{{ getConfigMail()->mail_from_address }}"/>
                        </div>
                        <div class="form-group">
                            <label>Mail from name</label>
                            <input type="text" name="mail_from_name" class="form-control form-control-sm" value="{{ getConfigMail()->mail_from_name }}"/>
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                            <label>Mail encryption</label>
                            <input type="text" name="mail_encryption" class="form-control form-control-sm" value="{{ getConfigMail()->mail_encryption }}"/>
                        </div>
                        <div class="form-group">
                            <label>Mail username</label>
                            <input type="text" name="mail_username" class="form-control form-control-sm" value="{{ getConfigMail()->mail_username }}"/>
                        </div>
                        <div class="form-group">
                            <label>Mail password</label>
                            <input type="text" name="mail_password" class="form-control form-control-sm" value="{{ getConfigMail()->mail_password }}"/>
                        </div>
                        <div class="form-group">
                            <label>Mail người nhận</label>
                            <input type="text" name="mail_receive" class="form-control form-control-sm" value="{{ getConfigMail()->mail_receive }}"/>
                        </div>
                        </div>
                    <div class="col-md-1">
                        <button type="submit" class="btn btn-primary btn-block">Lưu</button>
                    </div>
                    </div>
                </form>
                </div>
            <!-- /.card-footer -->
            </div>
            <!-- End Row --> --}}

        </div>
        <!-- CONTAINER CLOSED -->

    </div>
</div>
<!--app-content closed-->
@endsection
@section('jsAdmin')
<script src="{{asset('app/admin/setting/setting.js')}}"></script>
<script>
var setting = new setting(); 
	    setting.datas={
	        routes:{
                update_home: "{{ route('admin.setting.update_home') }}",
			    update_website:"{{route('admin.setting.update_website')}}",
			    update_mail:"{{route('admin.setting.update_mail')}}",
                update_google: "{{route('admin.setting.update_google')}}"
	        }
	    }   
setting.init();
</script>
@endsection
