$(document).ready(function() {
    
    //--------------------------********** Code Here ***********------------------------
      $('#closeMore').css('display','none');
      $('#clickMore').click(function(){
          $('.footer .container>div').removeClass('shorted');
      });
      $('#closeMore').click(function(){
          $('#closeMore').css('display','none');
      });
  
  
  jQuery( "#btn--Menu" ).click(function() {
    jQuery( "#menuToggle" ).toggle();
  });
  
  //Modal
  // Get the modal
  var modal = document.getElementById("modal-Signup");
  var modal_video = document.getElementById("modal-Video");
  // Get the button that opens the modal

  var btnCourse = document.getElementById("btn-register-course");
  var btnCourse3 = document.getElementById("btn_submit_resource_desktop");
  //var btnBanner = document.getElementById("btn-bannerSignup");
  var btnVideo = document.getElementById("whyImg");
  var btnVideoM = document.getElementById("whyImg2");

  btnVideo.onclick = function() {
    modal_video.style.display = "block";
  }
 
  btnCourse.onclick= function(){
      modal.style.display="block";
  }
  btnCourse3.onclick= function(){
      modal.style.display="block";
  }
  /*Form dao tao */
  //Validate
  var submit_recruitment = jQuery("#form-dk-tuyendung2 #btn-submit-recruiment");
  submit_recruitment.click(function() {
   var sdt = jQuery("#form-dk-tuyendung2 #sdt").val();
   var urlcv = jQuery("#form-dk-tuyendung2 #urlcv").val();
   var email = jQuery("#form-dk-tuyendung2 #email").val();
   var hoTen = jQuery("#form-dk-tuyendung2 #hoTen").val();
  
   var remove_space = jQuery.trim(sdt.replace(/ /g,''));
   var vnf_regex = /((09|03|07|08|05)+([0-9]{8})\b)/g;
   if(sdt=="" || email=="" || hoTen=="" || urlcv==""){
     if(sdt==""){
       jQuery("#form-dk-tuyendung2 .phoneVal").css('display','block');
       jQuery("#form-dk-tuyendung2 #sdt").click(function(){jQuery("#form-dk-tuyendung2 .phoneVal").css('display','none');});
       return false;
     }else {
           jQuery("#form-dk-tuyendung2 .infoVal").css('display','block');
           jQuery("#form-dk-tuyendung2 #email").click(function(){jQuery("#form-dk-tuyendung2 .infoVal").css('display','none');});
           return false;
           }
   }
  
   if(sdt != "" && vnf_regex.test(remove_space) == false)
   {
                       jQuery('#form-dk-tuyendung2.phoneVal').empty().append('<span>Số điện thoại không đúng định dạng!</span>');
                       jQuery("#form-dk-tuyendung2 .phoneVal").css('display','block');
                       jQuery("#form-dk-tuyendung2 #sdt").click(function(){jQuery(".phoneVal").css('display','none');});
                       return false;
   }
   else{
     var data = jQuery('#form-dk-tuyendung2').serialize();
       jQuery.ajax({
                 type : 'GET',
                 url : 'https://script.google.com/macros/s/AKfycbzdNrQ3ahI-CzMQ6TbcSHK88GvDfyw0oT8kUvrhUz0L1ThlwfQ/exec',
                 dataType:'json',
                 crossDomain : true,
                 data : data,
                 header: "Access-Control-Allow-Origin: *",
                 success : function(data){if(data == 'false'){
                     alert('Error');
                  }else{
                    window.location = "";	}}
                 });return false;
   }
  });
  /*----------------------------*/
  //Slick slider
  $('#sliderCustomer').slick({
    centerMode: true,
    centerPadding: '60px',
    slidesToShow: 3
  });
  // Slick slider
  jQuery('#slider-mobile').slick({
    dots: false,
    infinite: true,
    speed: 300,
    slidesToShow: 1,
    adaptiveHeight: true,
      autoplay: true,
    autoplaySpeed: 3000,
  });
  //
  
  // End jQuery Countdown
  })
  