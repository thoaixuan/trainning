// $(window).ready(function() {
//     $(window).scroll(function() {
//         if ($(this).scrollTop()) {
//             $('header').addClass('sticky');
//         } else {
//             $('header').removeClass('sticky');
//         }
//     });
// });
window.onscroll = function() {myFunction()};

var header = document.getElementById("header");
var sticky = header.offsetTop;

function myFunction() {
  if (window.pageYOffset > sticky) {
    header.classList.add("sticky");
  } else {
    header.classList.remove("sticky");
  }
}

// Slick carousel
$('#banner-slider').slick({
    infinite: true,
    speed: 300,
    autoplay: true,
  autoplaySpeed: 2000,
  dots: true,
  prevArrow:"<button type='button' class='slick-prev'><i class='fa fa-angle-left''></i></button>",
            nextArrow:"<button type='button' class='slick-next'><i class='fa fa-angle-right'></i></button>"
  });




// add validate select
$.validator.addMethod(
    "major",
    function (value, element, param) {
        return value != "";
    },
    "Bạn chưa chọn ngành học"
);
$.validator.addMethod(
    "address",
    function (value, element, param) {
        return value != "";
    },
    "Bạn chưa chọn địa chỉ"
);
$.validator.addMethod(
    "validatePhone",
    function (value, elemt) {
        return (
            this.optional(elemt) ||
            /^((84|0[3|5|7|8|9])+([0-9]{8}))$/im.test(value)
        );
    },
    "Nhập đúng định dạng số điện thoại"
);
$.validator.addMethod(
    "validateName",
    function (value, elemt) {
        return (
            this.optional(elemt) ||
            /^[a-zA-Z\D\s]+$/im.test(value)
        );
    },
    "Họ và tên không chứa ký tự số"
);


 // Validate
$("#register-form").validate({
    rules: {
        fullName: {
            required: true,
            validateName: true,
            minlength: 5,
            maxlength:255
        },
        phoneNumber: {
            required: true,
            maxlength: 11,
            validatePhone: true,
        },
        email: {
            required: true,
            email: true,
            maxlength:255
        },
        selectMajor: {
            major: true,
        },
        selectAddress: {
            address: true,
        },
    },
    messages: {
        fullName: {
            required: "Họ và tên không được để trống",
            minlength: "Họ và tên không nhỏ hơn 5 ký tự",
        },
        phoneNumber: {
            required: "Số điện thoại không được để trống",
            maxlength: "Số điện thoại không vượt quá 11 ký tự",
        },
        email:{
            required: "Email không được để trống",
            email: "Nhập đúng định dạng Email",
        }
    },
    submitHandler: function (form) {
        form.submit();
    },
});
