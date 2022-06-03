function login() {
    this.datas = null;
    var datas = null;
    this.init = function () {
        datas = this.datas;
        var me = this;
        me.action();
    }
    //Actions
    this.action = function (table) {
        $("#forget-password").on("click", function (e) {
            $.ajax({
                url: datas.routes.password,
                type: "get",
                data: { id: id },
                dataType: "JSON",
                async: false,
                success: function (data) {
                    table.ajax.reload();
                    toastr.success(data.msg);
                },
                error: function (error) {
                    toastr.error(data.msg)
                },
            });
        });

        $("#submit").on("click", function (e) {
            var formData = new FormData($("#login_form")[0]);
            $.ajax({
                url: datas.routes.login,
                type: "post",
                data: formData,
                dataType: "JSON",
                processData: false,
                contentType: false,
                success: function (response) {
                    if (response.status == 1) {
                        toastr.success(response.msg);
                        window.location.replace("/"+datas.routes.redirect_admin);
                    }
                    else {
                        toastr.error(response.msg)
                    }
                },

            });
        });

    }


}