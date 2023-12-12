
    var elmentTable = $("#table-users");
    var UsersTable = elmentTable.DataTable({
        serverSide: true,
        stateSave: true,
        responsive: false,
        processing: true,
        paging: true,
        lengthChange: true,
        searching: false,
        ordering: true,
        info: true,
        autoWidth: true,
        ajax: {
            url: routeUsers.table,
            type: "GET",
        },
        order: [0, "desc"],
        columns: [
            {
                title: "ID",
                data: "id",
            },
            {
                title: "Họ và tên" ,
                data : "name"
            },
            {
                title: "Số điện thoại",
                data: "phone",
            },
            {
                title: "Email",
                data: "email",
            },
            {
                title: "Nhóm quyền",
                data: "permission",
                render: function (data, type, row, meta) {
                    if(data == 1){
                        return '<p >' + 'Quản trị viên' + '</p>';
                    } else if(data == 2){
                        return '<p >' + 'Quản trị nội dung' + '</p>';
                    } else {
                        return '<p >' + 'Người dùng' + '</p>';
                    }
                },
            },
            {
                title: "Ngày tạo",
                data: "created_at",
                render: function (data, type, row, meta) {
                    return changeDate(data);
                },
            },
            {
                title: "Trạng thái",
                data: "status",
                render: function (data, type, row, meta) {
                    if(data == 1){
                        return '<span class="badge bg-success-transparent rounded-pill text-success p-2 px-3">' + 'Hoạt động' + '</span>';
                    } else {
                        return '<span class="badge bg-danger-transparent rounded-pill text-danger p-2 px-3">' + 'Ngừng hoạt động' + '</span>';
                    }
                },
            },
            {
                title: "Hành động",
                className: "text-center",
                bSortable: false,
                render: function (data, type, row, meta) {
                    return renderAction([
                        {
                            class: "btn text-primary btn-sm",
                            value: row.id,
                            title: "update",
                            icon: "fe fe-edit fs-14",
                        },
                        {
                            class: "btn text-danger btn-sm",
                            value: row.id,
                            title: "delete",
                            icon: "fe fe-trash-2 fs-14",
                        },
                    ]);
                },
            },
        ],
    });

// VALIDATE FORM
    $.validator.addMethod(
        "condition",
        function (value, element, param) {
            return value != "";
        },
        "Bạn chưa lựa chọn "
    );
    $.validator.addMethod(
        "validatePhone",
        function (value, elemt) {
            return (
                this.optional(elemt) ||
                /([\+84|84|0]+(3|5|7|8|9|1[2|6|8|9]))+([0-9]{8})\b/im.test(value)
            );
        },
        "Nhập đúng định dạng số điện thoại"
    );
    $.validator.addMethod(
        "validateName",
        function (value, elemt) {
            return (
                this.optional(elemt) ||
                /^[a-zA-Z\s][^0-9_+-.,!?@#$%^&*(){};:\\/|<>\"\']+$/im.test(value)
            );
        },
        "Họ và tên không chứa ký tự số và ký tự đặc biệt"
    );
    $("#form-add-users").validate({
        rules: {
            fullname: {
                required: true,
                validateName: true,
                minlength: 5,
                maxlength:255
            },
            phone: {
                required: true,
                maxlength: 11,
                validatePhone: true,
            },
            email: {
                required: true,
                email: true,
                maxlength:255,
            },
            password: {
                required: true,
                minlength:6,
            },
            repassword: {
                required: true,
                equalTo: '#inputPassword'
            },
            permission: {
                condition: true,
            },
            status:{
                condition: true,
            }
        },
        messages: {
            fullname: {
                required: "Họ và tên không được để trống",
                minlength: "Họ và tên không nhỏ hơn 5 ký tự",
            },
            phone: {
                required: "Số điện thoại không được để trống",
                maxlength: "Số điện thoại không vượt quá 11 ký tự",
            },
            email:{
                required: "Email không được để trống",
                email: "Nhập đúng định dạng Email",
            },
            password:{
                required: "Mật khẩu không được để trống",
                minlength: "Mật khẩu lớn hơn 6 ký tự",
            },
            repassword:{
                required: "Xác nhận mật khẩu không được để trống",
                equalTo: "Xác nhận mật khẩu chưa trùng khớp"
            }
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        },
        submitHandler: function () {
            var url = routeUsers.createPost;
            var formData = new FormData($("#form-add-users")[0]);
            formData.append('id', $('#form-add-users').find("button[type = 'submit']").attr('data-id'));
            formData.append('name', $("#inputName").val());
            formData.append('phone', $("#inputPhone").val());
            formData.append('email', $("#inputEmail").val());
            formData.append('password', $("#inputPassword").val());
            formData.append('repassword', $("#inputRePassword").val());
            formData.append('permission', $("#inputPermission").val());
            formData.append('status', $("#inputStatus").val());
            formData.append('address', $("#inputCity").val());
            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                dataType: 'JSON',
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response.status) {
                        window.location.replace('/users');
                        toastr.success(response.message);
                        UsersTable.ajax.reload();
                    } else {
                        toastr.error(response.message);
                    }
                },
                error: function(error) {
                    console.log("Lỗi");
                    toastr.error(error.status);
                }
            });
        },
    });

//  Redirect page Update Users
    $('#table-users').on('click', '#update', function() {
        var id = $(this).data("id");
        window.location.href = routeUsers.update + '/' + id;
    });

    $("#form-update-users").validate({
        rules: {
            fullname: {
                required: true,
                validateName: true,
                minlength: 5,
                maxlength:255
            },
            phone: {
                required: true,
                maxlength: 11,
                validatePhone: true,
            },
            email: {
                required: true,
                email: true,
                maxlength:255,
            },
            permission: {
                condition: true,
            },
            status:{
                condition: true,
            }
        },
        messages: {
            fullname: {
                required: "Họ và tên không được để trống",
                minlength: "Họ và tên không nhỏ hơn 5 ký tự",
            },
            phone: {
                required: "Số điện thoại không được để trống",
                maxlength: "Số điện thoại không vượt quá 11 ký tự",
            },
            email:{
                required: "Email không được để trống",
                email: "Nhập đúng định dạng Email",
            },
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        },
        submitHandler: function () {
            var url = routeUsers.updatePost;
            var formData = new FormData($("#form-update-users")[0]);
            formData.append('id', $('#form-update-users').find("button[type = 'submit']").attr('data-id'));
            formData.append('name', $("#updateName").val());
            formData.append('phone', $("#updatePhone").val());
            formData.append('email', $("#updateEmail").val());
            formData.append('permission', $("#updatePermission").val());
            formData.append('status', $("#updateStatus").val());
            formData.append('address', $("#updateCity").val());
            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                dataType: 'JSON',
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response.status) {
                        window.location.replace('/users');
                        toastr.success(response.message);
                        UsersTable.ajax.reload();
                    } else {
                        toastr.error(response.message);
                    }
                },
                error: function(error) {
                    console.log("Lỗi");
                    toastr.error(error.status);
                }
            });
        },
    })

// Delete

    $(document).delegate("#delete", "click", function () {
        var id = $(this).data("id");
        $('#modal-text-delete').text("Bạn có muốn xóa không ?");
        $("#onDelete").attr('value', id);
        $("#modal-delete").modal('show');
    });

    $("#onDelete").on("click", function (e) {
        e.preventDefault(e);
        var id = $(this).val();
        $.ajax({
            url: routeUsers.delete,
            type: 'GET',
            data: {
                "id": id
            },
            success: function (response) {
                if (response.status) {
                    $("#modal-delete").modal('hide');
                    toastr.success(response.message);
                    UsersTable.ajax.reload();
                } else {
                    toastr.error(response.message);
                }
            },
            error: function () { toastr.error("Xóa không thành công!") }

        });
    });
