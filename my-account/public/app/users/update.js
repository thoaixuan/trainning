// VALIDATE FORM
$.validator.addMethod(
    "condition",
    function (value, element, param) {
        return value != "";
    },
    "Bạn chưa lựa chọn "
);
$.validator.addMethod(
    "validatePhone",
    function (value, elemt) {
        return (
            this.optional(elemt) ||
            /([\+84|84|0]+(3|5|7|8|9|1[2|6|8|9]))+([0-9]{8})\b/im.test(value)
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

// Validation Configuration
function configureValidation(formId, validationRules, submitHandler) {
    $(formId).validate({
        rules: validationRules,
        submitHandler: submitHandler,
        highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        },
        // Messages, Highlight, Unhighlight...
    });
}
