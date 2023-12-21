$(document).ready(function(){
    $('#login-form').validate({
        rules:{
            email:{
                required: true,
                email: true
            },
            password:{
                required:true
            }
        },
        messages:{
            email:{
                required: "Email không được để trống",
                email: "Email không hợp lệ"
            },
            password:{
                required: "Password không được để trống"
            }
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
           
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
            reset();
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        },
        submitHandler: function(e){
            var formData = new FormData(document.getElementById('login-form'));
            $.ajax({
                url: "/login",
                type: 'post',
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
        }
    })
    
    
    function reset(){
        btnLogin.innerHTML = 'Login'
    }
});
