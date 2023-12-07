

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
$("#form-contact").validate({
    ignore: [],
    rules: {
        email: {
            required: true,
            email: true,
            maxlength:255,
        },
        phone: {
            required: true,
            maxlength: 11,
            validatePhone: true,
        },
        title:{
            required: true
        },
        description:{
            required: function(textarea) {
                CKEDITOR.instances[textarea.id].updateElement();
                var editorcontent = textarea.value.replace(/<[^>]*>/gi, '');
                return editorcontent.length === 0;
            }
        }
    },
    messages: {
        title: {
            required: "Họ và tên không được để trống",
        },
        phone: {
            required: "Số điện thoại không được để trống",
            maxlength: "Số điện thoại không vượt quá 11 ký tự",
        },
        email:{
            required: "Email không được để trống",
            email: "Nhập đúng định dạng Email",
        },
        description:{
            required: "Nội dung không được để trống",
        }
    },
    highlight: function (element, errorClass, validClass) {
        $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
    },
    submitHandler: function () {
        var url = 'https://sys-api.e-gate.vn/api/ticket/anonymous/send';
        const postData = {
            title: $("#title").val(),
            phone: $("#phone").val(),
            email: $("#email").val(),
            body: CKEDITOR.instances['description'].getData(),
          }
        axios.post(url, postData)
            .then(function(response) {
                toastr.success(response.message);
                $('#form-contact').resetForm();
            })
            .catch(function(error) {
                console.error(error);
            });
    },
});
