var toolbarOptions = [
    [{ 'font': [] }, { 'size': [] }],
  [ 'bold', 'italic', 'underline', 'strike' ],
  [{ align: '' }, { align: 'center' }, { align: 'right' }, { align: 'justify' }],
  [{ 'script': 'super' }, { 'script': 'sub' }],
  [{ 'header': '1' }, { 'header': '2' }, 'blockquote', 'code-block' ],
  [{ 'list': 'ordered' }, { 'list': 'bullet'}, { 'indent': '-1' }, { 'indent': '+1' }],
  [ 'link', 'image', 'video', 'formula' ],
  [ 'clean' ]
];

$('#setting_website').validate({
    rules: {
        
        website_name: {
            required: true,
            maxlength: 150
        },
        website_phone_number: {
            required: true,
        }
        
    },
    messages: {
        website_name:{
            required: "Tên không được trống !",
            maxlength: "Tên không quá 150 ký tự !"
        },
        website_phone_number: {
            required: "SĐT không được trống !",
        }
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
    submitHandler: function(e) {
        var url = update_website;
        var formData = new FormData($("#setting_website")[0]);
        formData.append('id', $("#id_setting").val());
        $.ajax({
                    url: url,
                    data: formData,
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        toastr.success(data.message);
                    },
                    error: function (error) {
                        console.log("Lỗi");
                    }
                });
    }
    
});

$('#setting_mail').validate({
    rules: {
        
        mail_username: {
            required: true,
        },
        mail_password: {
            required: true,
        }
        
    },
    messages: {
        mail_username:{
            required: "username không được trống !",
        },
        mail_password: {
            required: "password không được trống !",
        }
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
    submitHandler: function(e) {
        var url = update_mail;
        var formData = new FormData($("#setting_mail")[0]);
        formData.append('id', $("#id_setting").val());
        $.ajax({
                    url: url,
                    data: formData,
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        toastr.success(data.message);
                    },
                    error: function (error) {
                        console.log("Lỗi");
                    }
                });
    }
    
});

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
    submitHandler: function(e) {
        var url = update_google;
        var formData = new FormData($("#setting_google")[0]);
        formData.append('id', $("#id_setting").val());
        $.ajax({
                    url: url,
                    data: formData,
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        toastr.success(data.message);
                    },
                    error: function (error) {
                        console.log("Lỗi");
                    }
                });
    }
    
});