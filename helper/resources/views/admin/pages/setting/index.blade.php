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
                                    <li><a href="#tab3" data-bs-toggle="tab">Cấu hình captcha</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="panel-body tabs-menu-body">
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab1">
                                    <h4>Cài đặt trang chủ</h4>
                                    
                                    <div class="accordion mb-3" id="accordionExample">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="headingOne">
                                                <button class="accordion-button collapsed active" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                                        Chỉnh sửa banner
                                                    </button>
                                            </h2>
                                            <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample" style="">
                                                <div class="accordion-body">
                                                  <form id="setting_home" autocomplete="off" enctype="multipart/form-data">
                                                    @csrf
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
                                                  </form>
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
                                                      <div class="col-md-12">
                                                        <button class="btn btn-success" id="openCategory" type="button">Tạo mới</button>
                                                        <a href="{{route('admin.homeCategory.indexIcon')}}" class="btn btn-info" target="_blank">Danh sách icon</a>
                                                        <div class="table-responsive">
                                                          <table class="table table-bordered text-nowrap border-bottom" id="home-category-table">
                                                          </table>
                                                        </div>
                                                      </div>
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
                                                      <div class="col-md-12">
                                                        <button class="btn btn-success" id="openQuestion" type="button">Tạo mới</button>
                                                        <div class="table-responsive">
                                                          <table class="table table-bordered text-nowrap border-bottom" id="home-question-table">
                                                          </table>
                                                        </div>
                                                      </div>
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
                                                <form id="setting_home" autocomplete="off" enctype="multipart/form-data">
                                                  @csrf
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
                                                </form>
                                              </div>
                                          </div>
                                      </div>
                                    </div>
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
                                            <div class="form-group">
                                                  <label>Link login admin</label>
                                                  <input type="text" name="route_login" class="form-control" value="{{ getConfigMail()->route_login }}"/>
                                                </div>
                                            <div class="form-group">
                                                  <label>Folder Admin</label>
                                                  <input type="text" name="route_admin" class="form-control" value="{{ getConfigMail()->route_admin }}"/>
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
                                    
                                        
                                          
                                          @foreach(json_decode(getConfigMail()->config_mail) as $list_mail)
                                        <div class="col-md-12 mb-3">
                                           <h4>Cài đặt cấu hình gửi mail</h4>
                                         </div>
                                         
                                         <form id="mailForm" method="post">
                                          @csrf
                                          <div class="row">
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
                                           <div class="form-group">
                                            <label>Mail encryption</label>
                                            <input type="text" name="mail_encryption" class="form-control form-control-sm" value="{{ $list_mail->mail_encryption }}"/>
                                          </div>
                                         </div>
                                         <div class="col-md-6">
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
                                           <div class="form-group">
                                            <label>Mail phòng kinh doanh</label>
                                            <input type="text" name="room_kinhdoanh" class="form-control form-control-sm" value="{{ $list_mail->room_kinhdoanh }}"/>
                                          </div>
                                          <div class="form-group">
                                            <label>Mail phòng kỹ thuật</label>
                                            <input type="text" name="room_kythuat" class="form-control form-control-sm" value="{{ $list_mail->room_kythuat }}"/>
                                          </div>
                                          <div class="form-group">
                                            <label>Mail phòng kế toán</label>
                                            <input type="text" name="room_ketoan" class="form-control form-control-sm" value="{{ $list_mail->room_ketoan }}"/>
                                          </div>
                                         </div>
                                         <div class="col-md-1">
                                          <button type="submit" class="btn btn-primary btn-block">Lưu</button>
                                        </div>
                                      </div>  
                                      </form>
                                      <div class="row">
                                         <div class="col-md-12">
                                           <h4 class="mt-2">Quản lý phòng ban</h4>
                                          <div class="table-responsive">
                                            <table class="table table-bordered text-nowrap border-bottom" id="home-department-table">
                                            </table>
                                          </div>
                                         </div>
                                      </div>
                                       @endforeach
                                                  
                                       
                                </div>
                                <div class="tab-pane" id="tab3">
                                    <form id="setting_google">
                                        @csrf
                                        <div class="row">
                                          @foreach(json_decode(getConfigMail()->config_google) as $list_google)
                                         <div class="col-md-12">
                                             <h4>Captcha Google</h4>
                                         </div>
                                         <div class="col-md-6">
                                            <div class="form-group">
                                              <div class="custom-controls-stacked d-flex justify-content-start align-items-center">
                                                <label class="custom-control custom-radio w-50">
                                                        <input type="radio" class="custom-control-input" name="active" value="0" {{$list_google->active==0?'checked':''}}>
                                                        <span class="custom-control-label">Ẩn</span>
                                                    </label>
                                                <label class="custom-control custom-radio w-50">
                                                        <input type="radio" class="custom-control-input" name="active" value="1" {{$list_google->active==1?'checked':''}}>
                                                        <span class="custom-control-label">Kích hoạt</span>
                                                    </label>
                                            </div>
                                            </div>
                                         </div>
                                         <div class="col-md-12">
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

        </div>
        <!-- CONTAINER CLOSED -->

    </div>
</div>
<!--app-content closed-->
@include('admin.pages.home.modal')
@endsection
@section('jsAdmin')
<script src="{{asset('app/Admin/setting/setting.js')}}"></script>
<script src="{{asset('app/Admin/home/category.js')}}"></script>
<script src="{{asset('app/Admin/home/question.js')}}"></script>
<script src="{{asset('app/Admin/department/department.js')}}"></script>
<!--  Quill Editor -->
<script src="{{asset('themes/admin/assets/plugins/quill/quill.min.js')}}"></script>
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

var department=new department();
department.datas={
        routes:{
          datatable:"{{route('admin.department.datatable')}}",
          insert:"{{route('admin.department.insert')}}",
          update:"{{route('admin.department.update')}}",
          get_update:"{{route('admin.department.getUpdate')}}",
          delete:"{{route('admin.department.delete')}}",
        }
      }
      department.init();

var category=new category();
      category.datas={
        routes:{
          datatable:"{{route('admin.homeCategory.datatable')}}",
          insert:"{{route('admin.homeCategory.insert')}}",
          update:"{{route('admin.homeCategory.update')}}",
          get_update:"{{route('admin.homeCategory.getUpdate')}}",
          delete:"{{route('admin.homeCategory.delete')}}",
        }
      }
category.init();

var question=new question();
question.datas={
        routes:{
          datatable:"{{route('admin.homeQuestion.datatable')}}",
          insert:"{{route('admin.homeQuestion.insert')}}",
          update:"{{route('admin.homeQuestion.update')}}",
          get_update:"{{route('admin.homeQuestion.getUpdate')}}",
          delete:"{{route('admin.homeQuestion.delete')}}",
        }
      }
      question.init();
</script>
@endsection
