$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function info() {
    this.datas = null;
    var datas = null;
    this.init = function () {
        datas = this.datas;
        var me = this;
        me.action();
    }

    this.action = function () {
        $(document).on('click', '#click-password', function () {
            $("#passwordModal").modal("toggle");
            console.log("validate");
            $("#passwordForm").validate({
                rules: {
                    "password": {
                        required: true,
                        minlength: 8,
                        validatePassword: true,
                    },
                    "reset_password": {
                        required: true,
                        // minlength: 8,
                        // validatePassword: true,
                    },
                    "re_password": {
                        required: true,
                        equalTo: "#reset_password",
                        // minlength: 8
                    }

                },
                messages: {
                    password: {
                        required: "Bắt buộc nhập password",
                        minlength: "Hãy nhập ít nhất 8 ký tự",
                    },
                    reset_password: {
                        required: "Bắt buộc nhập password",
                        // minlength: "Hãy nhập ít nhất 8 ký tự",
                    },
                    re_password: {
                        required: "Bắt buộc nhập password",
                        // minlength: "Hãy nhập ít nhất 8 ký tự",
                        equalTo: "Mật khẩu chưa khớp",
                    }
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
                    // update student
                    $(document).ready(function () {
                        $('#passwordModal').ready(function (e) {
                            // e.preventDefault();


                            var id = $("input[name=id]").val();
                            var password = $("input[name=password]").val();
                            var reset_password = $("input[name=reset_password]").val();
                            var _token = $("input[name=_token]").val();

                            $.ajax({
                                url: datas.routes.updates_data,
                                type: 'PUT',
                                data: {
                                    id: id,
                                    reset_password: reset_password,
                                    password: password,
                                    _token: _token,

                                },
                                success: function (response) {
                                    if (response.status === 1) {
                                        console.log(response);
                                        $("#passwordForm")[0].reset();
                                        $('#passwordModal').modal('hide');
                                        $('.modal-backdrop').remove();
                                        location.reload();
                                    }
                                    else {
                                        alert(response.message);
                                    }

                                }
                            });
                        });
                    });
                },
            }

            );
            $.validator.addMethod("validatePassword", function (value, elemt) {
                return this.optional(elemt) || /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,16})/.test(value);
            }, 'Vui lòng hãy nhập đúng định dạng mật khẩu gồm 8-16 ký tự bao gồm chữ hoa, chữ thường và ít nhất một số');


        })
    }
}

