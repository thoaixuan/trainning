function setting() {
    this.datas = null;
    var datas = null;
    this.init = function () {
        datas = this.datas;
        var me = this;
        me.action();
    }

    //Actions
    this.action = function () {


        // Insert and Update data categories
        $('#websiteForm').validate({
            rules: {


            },
            messages: {

            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            },
            onfocusout: function (element) { return false; },
            submitHandler: function (e) {
                var formData = new FormData($("#websiteForm")[0]);
                $.ajax({
                    url: datas.routes.update_website,
                    data: formData,
                    type: 'POST',
                    dataType: 'JSON',
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        if (data.statusBoolean) {
                            toastr.success(data.msg);
                            $('#websiteForm')[0].reset();
                            table.ajax.reload();
                        }
                        else {
                            toastr.error(data.msg);
                        }
                    },
                });
            }
        });

        // Insert and Update data categories
        $('#mailForm').validate({
            rules: {
            },
            messages: {
            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            },
            onfocusout: function (element) { return false; },
            submitHandler: function (e) {
                var formData = new FormData($("#mailForm")[0]);
                $.ajax({
                    url: datas.routes.update_mail,
                    data: formData,
                    type: 'POST',
                    dataType: 'JSON',
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        if (data.statusBoolean) {
                            toastr.success(data.msg);
                            table.ajax.reload();
                        }
                        else {
                            toastr.error(data.msg);
                        }
                    },
                });
            }
        });





    }


}