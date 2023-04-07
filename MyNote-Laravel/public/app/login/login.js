var submit = document.getElementById("btnLogin");
var login_form = document.getElementById('login-form');
submit.onclick = function() {
    if($('.email').val() == "" || 
   $('.password').val() == ""){
        toastr.error('Vui lòng nhập đầy đủ thông tin');
        reset();
        return;
    }

    var formData = new FormData(login_form);
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
};

function reset(){
    btnLogin.innerHTML = 'Login'
}