
// add validate select
$.validator.addMethod("ForSelect", function(value, element, param){
    return value != "";
   }, "Trường này là bắt buộc");
$.validator.addMethod("ForSelect", function(value, element, param){
    return value != "";
}, "Trường này là bắt buộc");
$.validator.addMethod("validatePhone", function (value, elemt) {
    return this.optional(elemt) || /^((09|03|07|08|05)+([0-9]{8}))$/im.test(value);
}, "Nhập đúng định dạng số điện thoại")
// $.validator.addMethod("validateName", function (value, elemt) {
//     return this.optional(elemt) || /^[A-Za-z\s\-\.]+$/im.test(value);
// }, "Nhập đúng định dạng Họ và tên")
// Validate
$("#register-form").validate({
    rules: {
        fullName: {
            required: true,
            // validateName: true
        },
        phoneNumber: {
            required: true,
            validatePhone:true,
            maxlength: 10,
        },
        email: {
            required: true,
            email: true
        },
        selectMajor:{
            ForSelect: true
        },
        selectAddress:{
            ForSelect: true
        }
    },
    messages: {
        fullName: "Nhập đầy đủ họ và tên",
        phoneNumber: {
            required: "Nhập đầy đủ số điện thoại",
            maxlength: "Số điện thoại không vượt quá 12 ký tự",
        },
        email: "Nhập đúng định dạng Email",
    },
    submitHandler: function(e) {
        let path = window.location.pathname;
        window.location.href= path + '/thanh-cong';
        $("#register-form")[0].reset();
    }
});

