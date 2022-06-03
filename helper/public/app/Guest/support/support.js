$.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });

function support() {
    this.datas = null;
    var datas = null;
    this.init = function () {
        datas = this.datas;
        var me = this;
        me.validator();
    }

    this.validator = function () {
        $("#support_form").validate({
            rules: {
                "email": {
                    required: false,
                    validateEmail: true,
                },
                "name": {
                    required: true,
                    validateScript: true,

                },
                "rooms_id": {
                    required: true,
                },
                "content": {
                    required: true,
                    validateScript: true,
                },
                "phone": {
                    validatePhone: true,
                    required: true,
                    validateScript: true,
                }
            },
            messages: {
                name: {
                    required: "Bắt buộc nhập tên",
                },
                content: {
                    required: "Bắt buộc nhập nội dung",
                },
                phone: {
                    required: "Bắt buộc nhập số điện thoại",
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
            submitHandler: function (e) {
                var formData = new FormData($("#support_form")[0]);
                $.ajax({
                    url: datas.routes.insert,
                    type: 'post',
                    data: formData,
                    dataType: 'JSON',
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        if (response.status == 1) {
                            swal(response.message, "" , "success");
                            $("#support_form")[0].reset();
                        } else {
                            swal(response.message, "" , "error");
                        }
                    },
                    error: function (response) {
                        toastr.error(response.status);
                    }
                });
            },
        }

        );
        $.validator.addMethod("validateEmail", function (value, elemt) {
            return this.optional(elemt) || /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@(?:\S{1,63})$/.test(value);
        }, 'Vui lòng hãy nhập đúng định dạng email');

        $.validator.addMethod("validateName", function (value, elemt) {
            return this.optional(elemt) || /^[\w'\-,.][^0-9_!¡?÷?¿/\\+=@#$%ˆ&*(){}|~<>;:[\]]{2,}$/.test(value);
        }, 'Vui lòng hãy nhập đúng định dạng tên');

        $.validator.addMethod("validatePhone", function (value, elemt) {
            return this.optional(elemt) || /^((09|03|07|08|05)+([0-9]{8}))$/im.test(value);
        }, 'Vui lòng hãy nhập đúng định dạng số điện thoại');

        jQuery.validator.addMethod("validateScript", function (value, element) {
            return !(value.includes("script>") ||
                value.includes("script&gt;") ||
                value.includes("<?") ||
                value.includes("&lt;?"));
        }, "Vui lòng nhập đúng định dạng chữ");

    }


}