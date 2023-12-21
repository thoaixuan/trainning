$.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });

function login() {
    this.datas = null;
    var datas = null;
    this.init = function() {
        datas = this.datas;
        var me = this;
        me.action();
    }
    this.action = function() {
        var submit = document.getElementById("submit");
        var login_form = document.getElementById('login_form');
        submit.onclick = function() {
            var formData = new FormData(login_form);
            $.ajax({
                url: datas.routes.login,
                type: 'post',
                data: formData,
                dataType: 'JSON',
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response.status == 1) {
                        toastr.success(response.message);
                        window.location.replace("/"+datas.routes.redirect_admin);

                    } else {
                        toastr.error(response.message);
                    }
                },
                error: function(response) {
                    toastr.error(response.status);
                }
            });
        };
    }
}