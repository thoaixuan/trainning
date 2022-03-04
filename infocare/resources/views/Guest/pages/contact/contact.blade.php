@extends('Guest.main') 
@section('main')

<!--==================================================================== 
                            Start breadcumb section
    =====================================================================-->
        <section class="banner-section pt-200 pb-175">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="page-title text-center">
                            <h1>Liên hệ</h1>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <!--==================================================================== 
                            end breadcumb section
    =====================================================================-->
    
 <!--==================================================================== 
                            Start Map Section
    =====================================================================-->
    <section class="map-section another-page pt-95 pb-100">
        <div class="container">

            <div class="row">
                <div class="col-lg-7 form-wrapper">
                    <div class="form-box">
                       <div class="contact-form">
                           <form id="contact-form" onsubmit="return false">
                               <div class="form-group">
                                   <input type="text" id="contact_name" name="contact_name" placeholder="Họ và tên" required="">
                               </div>
                               <div class="form-group">
                                   <input type="email" id="contact_email" name="contact_email" placeholder="Nhập email" required="">
                               </div>
                               <div class="form-group">
                                   <textarea name="contact_content" id="contact_content" placeholder="Lời nhắn"></textarea>
                               </div>
                               <div class="form-group ">
                                   <button id="submitContact" class="btn-bg" type="submit" data-loading-text="Please wait...">Gửi ngay</button>
                               </div>
                           </form>
                       </div>
                    </div>
                </div>
                <div class="col-lg-5 map-wrapper">
                    <div class="map" style="padding-top: 0">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3924.6922742059796!2d107.08750261474535!3d10.366471392600515!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31756fc8c7863579%3A0x2a959d34ca70a288!2zQ8O0bmcgVHkgVE5ISCBUxrAgduG6pW4gxJHhuqd1IFTGsCBJTkc!5e0!3m2!1svi!2s!4v1646297997690!5m2!1svi!2s" style="border:0" allowfullscreen=""></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--==================================================================== 
                        End Map Section
=====================================================================-->

<!--==================================================================== 
                        Start Get in Touch section
=====================================================================-->
    <section class="get-in-touch-section pt-95">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <div class="section-title">
                        <h2>Get in Touch</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="get-in-touch-service-wrap">
                        <div class="row">
                            <div class="col-lg-4 col-md-6">
                                <div class="contact-item text-center wow animated customFadeInUp delay-0-1s">
                                    <div class="service-icon zero">
                                        <i class="flaticon-placeholder"></i>
                                    </div>
                                    <div class="service-content">
                                        <span>1301 Hoffman Avenue, <br>Brooklyn New York, NY-11206</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="contact-item text-center wow animated customFadeInUp delay-0-2s">
                                    <div class="service-icon code">
                                        <i class="flaticon-phone-call"></i>
                                    </div>
                                    <div class="service-content">
                                        <span>+1 (856) 456-1256 <br>+1 (256) 385-8564</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="contact-item text-center wow animated customFadeInUp delay-0-3s">
                                    <div class="service-icon team">
                                        <i class="flaticon-message"></i>
                                    </div>
                                    <div class="service-content">
                                        <span>info@website.com <br>sales@website.com</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--==================================================================== 
                        End Get in Touch section
=====================================================================-->
@endsection
@section('jsGuest')
<?php
function get_client_ip() {
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_X_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if(isset($_SERVER['REMOTE_ADDR']))
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}

?>
<script>
    var url_submit_contact = "{{route('guest_insert_contact')}}";
    var getIP = "<?php echo $_SERVER['REMOTE_ADDR']?>'";

</script>
<script src="{{asset('app/guest/contact/contact.js')}}"></script>
@endsection