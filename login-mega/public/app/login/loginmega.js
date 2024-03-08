import { Storage } from "https://cdn.skypack.dev/megajs";

$(document).on("click", "#btnLogin", function () {
    const storage = new Storage({
        email: $("#signin-email").val(),
        password: $("#signin-password").val(),
        userAgent: "ExampleApplication/1.0",
    });
    storage.login((err) => {
        if (err) {
            toastr.error("Email hoặc mật khẩu không đúng");
            console.log("Lỗi", err);
        } else {
            var nameUser = storage.name;
            var url = $("#btnLogin").attr("data-url");
            var formData = new FormData($("#login-form")[0]);
            formData.append('email', $("#signin-email").val());
            formData.append('password', $("#signin-password").val());
            formData.append('name', nameUser);
            $.ajax({
                url: url,
                type: "POST",
                data: formData,
                dataType: "JSON",
                processData: false,
                contentType: false,
                success: function (response) {
                    if (response.status === 1) {
                        toastr.success(response.message);
                        sessionStorage.setItem('email', $("#signin-email").val())
                        sessionStorage.setItem('password', btoa($("#signin-password").val()))
                        window.location.href = "/my-folder";
                    }
                },
                error: function (response) {
                    console.log("Lỗi", response);
                    toastr.error(response);
                },
            });
        }
    });
});
