
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
            data: function (d) {
                return $.extend({}, d, {
                    department: $("#search-department").val(),
                    permission: $("#search-permission").val(),
                    search: $("#search").val(),
                });
            },
        },
        order: [0, "desc"],
        columns: [
            {
                title: "ID",
                data: "id",
            },
            {
                title: "Họ và tên" ,
                data : "name",
                render: function (data, type, row) {
                    return (
                        '<span class="text-primary fw-semibold c-click" data-id="'+row.id+'" id="viewDetail">' +
                        data +
                        "</span>"
                    );
                }
            },
            {
                title: "Thông tin",
                data: null,
                bSortable: false,
                render: function (data, type, row) {
                    var html ='<div class="d-flex flex-column">';
                    if(data.permission == 1){
                        html +='<p class="badge bg-primary">' + 'Quản trị viên' + '</p>';
                    } else if(data.permission == 2){
                        html += '<p class="badge bg-success">' + 'Quản lý' + '</p>';
                    } else if(data.permission == 3) {
                        html += '<p class="badge bg-purple-gradient">' + 'Nhân viên' + '</p>';
                    } else{
                        html +='<p class="badge bg-warning">' + 'Thực tập sinh' + '</p>';
                    }

                    if(data.department == 1){
                        html +='<p class="badge bg-secondary mt-2">' + 'Phòng IT' + '</p>';
                    }else if(data.department == 2){
                        html +='<p class="badge bg-secondary mt-2">' + 'Phòng nhân sự' + '</p>';
                    }else if(data.department == 3){
                        html +='<p class="badge bg-secondary mt-2">' + 'Phòng kế toán' + '</p>';
                    }else{
                        html +='<p class="badge bg-secondary mt-2">' + 'Phòng kinh doanh' + '</p>';
                    }
                    return html
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

    // show popup add new
    $("#addNewUsers").on("click", function () {
        $('.modal-title').text("Thêm mới tài khoản");
        $("#img-upload").attr("src", "");
        $('#form-add-users').trigger("reset");
        $("#btnAddUsers").attr('data-url', routeUsers.createPost);
        $("#ModalNewUser").modal("show");
    });

    // Upload Avatar
    let imgUpload = null;
    $("#avatar_input").change(function (e) {
        const file = e.target.files[0];
        if (file && file.type.startsWith("image")) {
            const fileSize = file.size;
            const maxSize = 1024 * 1024;

            if (fileSize > maxSize) {
                toastr.error("Ảnh upload nhỏ hơn 1MB");
                $("#avatar_input").val("");
            } else {
                const reader = new FileReader();
                reader.onload = function (e) {
                    const imageUrl = e.target.result;
                    $("#img-upload").attr("src", imageUrl);

                    // Call Api Upload Image
                    var formData = new FormData();
                    formData.append("image", file);
                    $.ajax({
                        url: routeUsers.image,
                        type: 'POST',
                        data: formData,
                        dataType: 'JSON',
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            if (response.status) {
                                localStorage.setItem("avatar", response.url);
                            } else {
                                toastr.error(response.message);
                            }
                        },
                        error: function(error) {
                            console.log("Lỗi");
                            toastr.error(error.message);
                        }
                    });
                };
                reader.readAsDataURL(file);
            }
        } else {
            toastr.error("Vui lòng chọn Ảnh");
        }
    });
// VALIDATE FORM
    $.validator.addMethod("validateText", function(value, element){
        return !(value.includes("script>") ||
                        value.includes("script&gt;") ||
                        value.includes("<?") ||
                        value.includes("&lt;?"));
    }, "Vui lòng nhập đúng định dạng chữ");
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
                /^[a-zA-Z\s][^_+-.,!?@#$%^&*(){};:\\/|<>\"\']+$/im.test(value)
            );
        },
        "Họ và tên không chứa ký tự đặc biệt"
    );
    $("#form-add-users").validate({
        ignore: ":hidden",
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
                minlength:6,
            },
            repassword: {
                equalTo: '#inputPassword'
            },
            permission: {
                condition: true,
            },
            department: {
                condition: true,
            },
            status:{
                condition: true,
            },
            address:{
                validateText: true,
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
                minlength: "Mật khẩu lớn hơn 6 ký tự",
            },
            repassword:{
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
            var url = $('#btnAddUsers').attr('data-url');
            var formData = new FormData($("#form-add-users")[0]);
            formData.append('id', $('#form-add-users').find("button[type = 'submit']").attr('data-id'));
            formData.append('url',localStorage.getItem("avatar"));
            formData.append('name', $("#inputName").val());
            formData.append('phone', $("#inputPhone").val());
            formData.append('email', $("#inputEmail").val());
            formData.append('sex', $("#inputSex").val());
            formData.append('birthdate', $("#inputBirthDate").val());
            formData.append('password', $("#password").val() ? $("#password").val() : 123456);
            formData.append('repassword', $("#inputRePassword").val());
            formData.append('permission', $("#inputPermission").val());
            formData.append('department', $("#inputDepartment").val());
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
                        toastr.success(response.message);
                        $("#ModalNewUser").modal("hide");
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
// View Detail
$(document).on("click", "#viewDetail", function () {
    var id = $(this).data("id");
    var url =  routeUsers.get;
    $.ajax({
        url: url,
        data: {
            "id": id
        },
        type: 'GET',
        dataType: 'JSON',
        success: function (response) {
            if (response.status == 1) {
            $("#img-show").attr("src", response.data.url);
            $("#view_fullname").text(response.data.name);
            $("#view_birthdate").text(changeDate(response.data.birthdate));
            $("#view_email").text(response.data.email);
            $("#view_phone").text(response.data.phone);
            const sexMap = {
                'female': 'Nữ',
                'male': 'Nam',
                'other': 'Khác'
            };
            const sex = sexMap[response.data.sex];
            $("#view_sex").text(sex);

            if(response.data.status == 1){
                $("#view_status").text("Hoạt động");
            }else{
                $("#view_status").text("Ngừng hoạt động");
            }

            if(response.data.permission == 1){
                $("#view_permission").html('<span class="badge bg-primary">' + 'Quản trị viên' + '</span>');
            } else if(response.data.permission == 2){
                $("#view_permission").html('<span class="badge bg-success">' + 'Quản lý' + '</span>');
            } else if(response.data.permission == 3){
                $("#view_permission").html('<span class="badge bg-purple-gradient">' + 'Nhân viên' + '</span>');
            }else{
                $("#view_permission").html('<span class="badge bg-warning">' + 'Thực tập' + '</span>');
            }

            const departmentMap = {
                1: 'phòng IT',
                2: 'Phòng nhân sự',
                3: 'Phòng kế toán',
                4: 'Phòng kinh doanh',
            };
            const department = departmentMap[response.data.department];
            $("#view_department").html('<span class="badge bg-secondary">' + department + '</span>');

            $("#view_address").html(response.data.address);
            $("#ModalDetail").modal('show');
            }else {
                toastr.error(data.message);
            }
        },
        error: function (error) {
            console.log(error);
        }
    });
});

//  Update Users
    $('#table-users').on('click', '#update', function() {
        var id = $(this).data("id");
        $('.modal-title').text("Cập nhật tài khoản");
        $.ajax({
            url: routeUsers.get,
            data: {
                id: id
            },
            type: 'GET',
            dataType: 'JSON',
            success: function (response) {
                if (response.status) {
                $("#img-upload").attr("src", response.data.url);
                $('#inputName').val(response.data.name);
                $('#inputEmail').val(response.data.email);
                $('#inputPhone').val(response.data.phone);
                $('#inputBirthDate').val(response.data.birthdate);
                $('#inputSex').val(response.data.sex);
                $('#inputStatus').val(response.data.status);
                $('#inputPermission').val(response.data.permission);
                $('#inputDepartment').val(response.data.department);
                $('#inputCity').val(response.data.address);
                $("#btnAddUsers").attr('data-url', routeUsers.updatePost);
                $("#btnAddUsers").attr('data-id', response.data.id);
                $("#ModalNewUser").modal("show");
                }else {
                    toastr.error(response.message);
                }
            },
            error: function (error) {
                console.log(error);
            }
        });
    });



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

    $("#search-department").change(function(){
        UsersTable.ajax.reload();
    })
    $("#search-permission").change(function(){
        UsersTable.ajax.reload();
    })

    $("#search").on('keyup', function (e) {
        UsersTable.ajax.reload();
    });
