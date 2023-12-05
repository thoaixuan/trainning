
$.validator.addMethod(
    "StrongPassword",
    function (value, elemt) {
        return (
            this.optional(elemt) ||
            /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}/im.test(value)
        );
    },
    "Mật khẩu tối thiểu tám ký tự, ít nhất một chữ hoa, một chữ thường và một số"
);
// validate form register
    $('#register-form').validate({
        rules: {
            fullname:{
                required: true,
                minlength:5,
            },
            email: {
                required: true,
                email: true,
                maxlength:255
            },
            signuppassword:{
                required: true,
                StrongPassword: true,

            },
            confirmpassword:{
                required: true,
                equalTo: '#signup-password'
            },
            term:{
                required: true,
            }
        },
        messages: {
            fullname: {
                required:"Họ và tên không được để trống",
                minlength: "Họ và tên lớn hơn 5 ký tự"
            },
            email:{
                required: "Email không được để trống",
                email: "Nhập đúng định dạng Email",
            },
            signuppassword: {
                required: "Mật khẩu không được để trống",
            },
            confirmpassword: {
                required: "Mật khẩu không được để trống",
                equalTo: "Xác nhận mật khẩu chưa trùng khớp"
            },
            term:{
                required: "Bạn chưa xác nhận điều khoản",
            }
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        },
        submitHandler: function () {
            var url = $('#register-form').attr('action');;
            var formData = new FormData($("#register-form")[0]);
            formData.append('id', $('#register-form').find("button[type = 'submit']").attr('data-id'));
            formData.append('name', $("#signup-fullname").val());
            formData.append('email', $("#signup-email").val());
            formData.append('password', $("#signup-password").val());
            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                dataType: 'JSON',
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response.status) {
                        toastr.success(response.message);
                        window.location.replace("/login");
                    } else {
                        toastr.error(response.message);
                    }
                },
                error: function(error) {
                    console.log("Lỗi");
                    toastr.error(error.status);
                }
            });
        },
    })

    // Validate form login

    $('#login-form').validate({
        rules: {
            email: {
                required: true,
                email: true,
            },
            password:{
                required: true,
            }
        },
        messages: {
            email:{
                required: "Email không được để trống",
                email: "Nhập đúng định dạng Email",
            },
            password: {
                required: "Mật khẩu không được để trống",
            },
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        },
        submitHandler: function () {
            var url = $('#login-form').attr('action');
            var formData = new FormData(document.getElementById('login-form'));
            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                dataType: 'JSON',
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response.status) {
                        toastr.success(response.message);
                        window.location.replace("/home");
                    } else {
                        reset();
                        toastr.error(response.message);

                    }
                },
                error: function(response) {
                    console.log("Lỗi");
                    toastr.error(response.status);
                }
            });
        },

    })
    function reset(){
        btnLogin.innerHTML = 'Login'
    }


