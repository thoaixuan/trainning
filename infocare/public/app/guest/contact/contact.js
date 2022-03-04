
jQuery.validator.addMethod("validateScript", function(value, element){
    return !(value.includes("script>") ||
                    value.includes("script&gt;") ||
                    value.includes("<?") ||
                    value.includes("&lt;?"));
}, "Vui lòng nhập đúng định dạng chữ");

$('#contact-form').validate({
    rules: {
        contact_name: {
            required: true,
            validateScript: true,
            maxlength: 150
        },
        contact_email: {
            required: true,
            validateScript: true
        },
        contact_content: {
            required: true,
            validateScript: true
        }
        
    },
    messages: {
        contact_name:{
            required: "Tên không được trống !",
            maxlength: "Tên không quá 150 ký tự !"
        },
        contact_email:{
            required: "Email không được trống !"
        },
        contact_content:{
            required: "Nội dung không được trống !"
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
        // var contact = JSON.parse(localStorage.getItem("contact"));
        // if( contact === null){
        //     contact = [];
        //     contact.push({
        //         yourIP: myIP,
        //         contact_name: $('#contact_name').val(),
        //         contact_email: $('#contact_email').val(),
        //         contact_content: $('#contact_content').val()
        //     });
        // }
        // localStorage.setItem("contact", JSON.stringify(contact));
        $.ajax({
                    url: url_submit_contact,
                    data: {
                        contact_name: $('#contact_name').val(),
                        contact_email: $('#contact_email').val(),
                        contact_content: $('#contact_content').val()
                    },
                    type: 'POST',
                    dataType: 'JSON',
                    success: function (data) {
                        alert("Gửi thông tin thành công !");
                    },
                    error: function (error) {
                        console.log("Lỗi");
                        console.log(error);
                    }
                });
    }
    
});