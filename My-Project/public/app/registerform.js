// add validate select
$.validator.addMethod(
    "ForSelect",
    function (value, element, param) {
        return value != "";
    },
    "Trường này là bắt buộc"
);
$.validator.addMethod(
    "ForSelect",
    function (value, element, param) {
        return value != "";
    },
    "Trường này là bắt buộc"
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
// $.validator.addMethod("validateName", function (value, elemt) {
//     return this.optional(elemt) || /^[A-Za-z\s\-\.]+$/im.test(value);
// }, "Nhập đúng định dạng Họ và tên")
// Validate
$("#register-form").validate({
    rules: {
        fullName: {
            required: true,
            maxlength: 255,
            // validateName: true
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
            ForSelect: true,
        },
        selectAddress: {
            ForSelect: true,
        },
    },
    messages: {
        fullName: "Họ và tên không được để trống",
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
