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
    // Update config home
    $('#setting_home').validate({
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
            var formData = new FormData($("#setting_home")[0]);
            $.ajax({
                url: datas.routes.update_home,
                data: formData,
                type: 'POST',
                dataType: 'JSON',
                processData: false,
                contentType: false,
                success: function (data) {
                    if (data.statusBoolean) {
                        toastr.success(data.msg);
                    }
                    else {
                        toastr.error(data.msg);
                    }
                },
            });
        }
    });

    $('#setting_home_info').validate({
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
            var formData = new FormData($("#setting_home_info")[0]);
            $.ajax({
                url: datas.routes.update_home_info,
                data: formData,
                type: 'POST',
                dataType: 'JSON',
                processData: false,
                contentType: false,
                success: function (data) {
                    if (data.statusBoolean) {
                        toastr.success(data.msg);
                    }
                    else {
                        toastr.error(data.msg);
                    }
                },
            });
        }
    });
        // Update config website
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
                        }
                        else {
                            toastr.error(data.msg);
                        }
                    },
                });
            }
        });

        // Update config mail
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
                        }
                        else {
                            toastr.error(data.msg);
                        }
                    },
                });
            }
        });

        // Update config google
        $('#setting_google').validate({
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
            submitHandler: function (e) {
                var formData = new FormData($("#setting_google")[0]);
                $.ajax({
                    url: datas.routes.update_google,
                    data: formData,
                    type: 'POST',
                    dataType: 'JSON',
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        if (data.statusBoolean) {
                            toastr.success(data.msg);
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