$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
function signin() {
    this.datas = null;
    var datas = null;
    this.init = function () {
        datas = this.datas;
        var me = this;
        me.validate();
    }
    this.action = function () {

    }
    this.validate = function () {

        $("#login-form").validate({

            rules: {
                "email": {
                    required: true,
                    validateEmail: true,
                },
                "password": {
                    required: true,

                    validatePassword: true,
                }

            },
            messages: {

                email: {
                    required: "Bắt buộc nhập email",
                },
                password: {
                    required: "Bắt buộc nhập password",

                },


            },
            errorElement: "span",
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest(".form-group").append(error);
            },
            highlight: function (element) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element) {
                $(element).removeClass('is-invalid');
            },
            submitHandler: function () {
                $(document).ready(function () {
                    var password = $("input[name=password]").val();
                    var email = $("input[name=email]").val();
                    var _token = $("input[name=_token]").val();
                    $.ajax({
                        url: datas.routes.login,
                        type: 'post',
                        data: {
                            password: password,
                            email: email,
                            _token: _token
                        },
                        success: function (response) {
                            if (response.status === 1) {
                                window.location.replace("/admin");
                            } else {
                                alert(response.message);
                            }
                        }
                    });

                });
            },
        }

        );
        $.validator.addMethod("validatePassword", function (value, elemt) {
            return this.optional(elemt) || /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,16})/.test(value);
        }, 'Vui lòng hãy nhập đúng định dạng mật khẩu gồm 8-16 ký tự bao gồm chữ hoa, chữ thường và ít nhất một số');

        $.validator.addMethod("validateEmail", function (value, elemt) {
            return this.optional(elemt) || /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@(?:\S{1,63})$/.test(value);
        }, 'Vui lòng hãy nhập đúng định dạng email');
    }
}