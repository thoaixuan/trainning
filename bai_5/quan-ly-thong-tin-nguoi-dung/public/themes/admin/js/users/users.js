function users() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    this.datas = null;
    var datas = null;
    this.init = function () {
        datas = this.datas;
        var me = this;
        me.datatables();

    }
    this.datatables = function () {
        var me = this;
        var table = $("#users-table").DataTable({
            serverSide: true,
            processing: true,
            paging: true,
            lengthMenu: [
                [10, 25, 50, 100],
                [10, 25, 50, 100]
            ],
            pagingType: "full_numbers",
            lengthChange: false,
            searching: false,
            ordering: true,
            order: [0, "asc"],
            info: true,
            responsive: true,
            autoWidth: false,
            ajax: {
                url: datas.routes.datatable,
                type: "GET",
                data: function (d) {
                    return $.extend({}, d, {
                        search: $("#search").val(),
                    });

                }
            },
            columns: [{
                title: "Họ và tên",
                data: "full_name",
                name: "full_name",
                className: "text-center",
            },
            {
                title: "Giới tính",
                data: "gender",
                name: "gender",
                className: "text-center",
                render: function (data, type, row, meta) {
                    switch (data) {
                        case 0:
                            return "Nam";
                        case 1:
                            return "Nữ";
                        default:
                            return "Chưa có dữ liệu"
                    }
                }
            },
            {
                title: "Ngày sinh",
                data: "date",
                name: "date",
                className: "",
                render: function (data, type, row, meta) {
                    return changeDate(data);
                }
            },
            {
                title: "Ngày bắt đầu",
                data: "date_start",
                name: "date_start",
                className: "",
                render: function (data, type, row, meta) {
                    return changeDate(data);
                }
            },
            {
                title: "Số điện thoại",
                data: "phone_number",
                name: "phone_number",
                className: "",
            },
            {
                title: "email",
                data: "email",
                name: "email",
                className: "",
            },
            {
                title: "Phòng ban",
                data: "rooms.name",
                name: "rooms.name",
                className: "",
            },

            {
                title: "Trạng thái",
                data: "status",
                name: "status",
                className: "",
                render: function (data, type, row, meta) {
                    switch (data) {
                        case 0:
                            return "Đang làm việc";
                        case 1:
                            return "Nghỉ việc";
                        case 1:
                            return "Đình chỉ";
                        default:
                            return "Chưa có dữ liệu";
                    }
                }
            },
            {
                title: "Xem chi tiết",
                data: "id",
                name: "id",
                className: "",
                render: function (data, type, row, meta) {
                    return renderDetail([{
                        class: 'btn btn-outline-success',
                        value: row.id,
                        data: data,
                        title: 'detail',
                        icon: 'fa-solid fa-eye'
                    }]);
                }

            },

            {
                title: "Action",
                data: "id",
                name: "id",
                className: "text-center",
                bSortable: false,
                render: function (data, type, row, meta) {
                    return renderAction([{
                        class: 'btn btn-danger',
                        value: row.id,
                        title: 'delete',
                        icon: 'fa fa-trash',
                    }, {
                        class: 'btn btn-info',
                        value: row.id,
                        title: 'update',
                        icon: 'fa fa-edit',
                    },]);

                }
            },

            ],
        });
        me.action(table);
        me.validator(table);
    }
    this.action = function (table) {
        CKEDITOR.replace('description');
        var me = this;
        // search user
        $("#btn_search").on('click', function (e) {
            table.ajax.reload();
        });
        $("#search").on('keypress', function (e) {
            if (e.which == 13) {
                table.ajax.reload();
            }
        });
        // open dialog user
        $(document).on('click', '#open', function () {
            $("#userForm")[0].reset();
            $("#ModalLabel").text("Thêm mới người dùng");
            $("#spanPassword").text('(Mặc định abc123456)');
            $.ajax({
                url: datas.routes.get_insert,
                type: "get",
                success: function (response) {
                    if (response.status) {
                        $("#submit").attr('data-url', datas.routes.insert);
                        $("#submit").attr('data-action', 'insert');
                        $("#userForm")[0].reset();
                        $("#userModal").modal("show");
                        $("#full_name").val('');
                        $("#phone_number").val('');
                        $("#gender").val(0);
                        $("#room_id").val(1);
                        $("#date").val('');
                        $("#date_start").val('');
                        $("#password").val('abc123456');
                        $("#action").val('');
                        $("#position").val('');
                        $("#description").val('');
                        $("#cover").val('');
                        $("#cover_after").val('');
                    }
                    else{
                        toastr.error(response.message);
                    }
                },
                error: function () { }
            });

        })
        // find by id user
        $(document).on('click', '#update', function () {
            var id = $(this).data("id");
            $("#userForm")[0].reset();
            $("#ModalLabel").text("Chỉnh sửa người dùng");
            $("#spanPassword").text('(Nhập mật khẩu để thay đổi)');
            $.ajax({
                url: datas.routes.updates,
                type: "get",
                dataType: 'json',
                data: {
                    _token: $("input[name=_token]").val(),
                    "id": id,
                },
                success: function (response) {
                    if (response.status) {
                        $("#submit").attr('data-url', datas.routes.updates);
                        $("#submit").attr('data-id', response.data.id);
                        $("#submit").attr('data-action', 'update');
                        $('input[name="id"]').val(response.data.id);
                        $('input[name="full_name"]').val(response.data.full_name);
                        $("select#gender_edit").val(response.data.gender);
                        $('input[name="date"]').val(response.data.date);
                        $('input[name="date_start"]').val(response.data.date_start);
                        $('input[name="phone_number"]').val(response.data.phone_number);
                        $('input[name="email"]').val(response.data.email);
                        $("#room_id").val(response.data.room_id);
                        $("#gender").val(response.data.gender);
                        $("#status").val(response.data.status);
                        $("#permission_id").val(response.data.permission_id);
                        CKEDITOR.instances['description'].setData(response.data.description);
                        $("#userModal").modal("toggle");
                    }
                    else{
                        toastr.error(response.message);
                    } 

                },
                error: function (response) {

                }
            });
        });
        // find by id user detail
        $(document).on('click', '#detail', function () {
            $.ajax({
                url: datas.routes.get_detail,
                type: "get",
                dataType: 'json',
                data: {
                    _token: $("input[name=_token]").val(),
                    "id": $(this).data("id"),
                },
                success: function (response) {
                    console.log(response);
                    $('#ten').html(response.data.full_name);
                    $('#mota').html(response.data.description);
                    $('#cmnd_before').attr("src", "http://127.0.0.1:8000/admin/cover/" + response.data.cover);
                    $('#cmnd_after').attr("src", "http://127.0.0.1:8000/admin/cover/" + response.data.cover_after);
                    $("#userDetailModal").modal("toggle");
                }
            });
        });

        // delete user
        $(document).on('click', '#delete', function () {
            if (confirm("Do you really want to delete this record?")) {
                var id = $(this).data("id");
                $.ajax({
                    url: datas.routes.delete,
                    type: 'GET',
                    data: {
                        "id": id,
                        _token: $("input[name=_token]").val()
                    },
                    success: function (response) {
                        if (response.status) {
                            table.ajax.reload();
                            toastr.success(response.message);
                        } else {
                            toastr.error(response.message);
                        }
                    },
                    error: function () { }
                });
            }
        });

        //export pdf
        $(document).on('click', '#userExport', function () {
            html2canvas(document.querySelector("#users-table")).then(canvas => {
                document.body.appendChild(canvas);
                var data = canvas.toDataURL();
                var docDefinition = {
                    content: [{
                        image: data,
                        width: 500
                    }]
                };
                pdfMake.createPdf(docDefinition).download("user.pdf");
            });

        });


        // $('#permission_id').select2({
        //     dropdownParent: $('#userModal'),
        //     theme: "classic"
        // });


        $.ajax({
            type: "get",
            url: datas.routes.get_room,
            dataType: 'JSON',
            success: function (response) {
                console.log(response);
                $.each(response.data, function (key, item) {
                    $('#room_id').append('<option value=' + item.id + '>' + item.name + '</option');
                });
            }
        });
        //Loadding dữ liệu group
        $.ajax({
            type: "get",
            url: datas.routes.data_role,
            dataType: 'JSON',
            success: function (response) {
                console.log(response);

                var data = response.data
                var list = document.getElementById("permission_id");
                for (var i in data) {
                    list.add(new Option(data[i].name, data[i].id));
                }

            }
        });



    }

    this.validator = function (table) {
        console.log("validate");
        $("#userForm").validate({

            rules: {
                "full_name": {
                    required: true,
                    maxlength: 20,
                    minlength: 3,
                    validateName: true,
                },
                "email": {
                    required: true,
                    validateEmail: true,
                },
                "phone_number": {
                    required: true,
                    validatePhone: true,
                    minlength: 10,
                    maxlength: 10,

                },
                "password": {
                    validatePassword: true,
                },

                "date": {
                    required: true,

                },
                "date_start": {
                    required: true,

                },

                "status": {
                    required: true,

                },

                "description": {
                    required: true,
                },

            },
            messages: {
                full_name: {
                    required: "Bắt buộc nhập name",
                    maxlength: "Hãy nhập tối đa 15 ký tự",
                    minlength: "Hãy nhập ít nhất 3 ký tự"
                },
                password: {
                    required: "Bắt buộc nhập password",
                    minlength: "Hãy nhập lớn hơn 8 ký tự",
                },
                email: {
                    required: "Bắt buộc nhập email",
                },
                password: {
                    required: "Bắt buộc nhập password",
                    minlength: "Hãy nhập lớn hơn 8 ký tự",
                },
                address: {
                    required: "Bắt buộc nhập địa chỉ",
                },
                phone_number: {
                    required: "Bắt buộc nhập số điện thoại",
                    minlength: "Hãy nhập đủ 10 ký tự",
                    maxlength: "Hãy nhập tối thiểu 10 ký tự"
                },

                date: {
                    required: "Bắt buộc nhập dữ liệu",
                },
                date_start: {
                    required: "Bắt buộc nhập dữ liệu",
                },


                status: {

                    required: "Bắt buộc nhập dữ liệu",
                },

                description: {
                    required: "Bắt buộc nhập dữ liệu",
                },


            },
            errorElement: "span",
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest(".form-group").append(error);
            },
            highlight: function (element) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element) {
                $(element).removeClass('is-invalid');
            },
            submitHandler: function () {
                $(document).ready(function () {
                    $('#userForm').ready(function (e) {
                        var formData = new FormData($("#userForm")[0]);
                        formData.append('id', $("#submit").attr("data-id"));
                        formData.append('cover', $('#cover')[0].files[0]);
                        formData.append('cover_after', $('#cover_after')[0].files[0]);
                        formData.append('description', CKEDITOR.instances['description'].getData());
                        var url = $('#submit').attr('data-url');
                        $('.modal-backdrop').remove();
                        $.ajax({
                            url: url,
                            type: "POST",
                            contentType: false,
                            processData: false,
                            data: formData,
                            success: function (response) {
                                if (response.status === 0) {
                                    // $('#userModal').modal('hide');
                                    toastr.error(response.message);
                                }
                                if (response.status === 1) {
                                    console.log(response);
                                    $('#userForm')[0].reset();
                                    $('#userModal').modal('hide');
                                    $('.modal-backdrop').remove();
                                    table.ajax.reload();
                                }
                            }
                        })

                    })
                });
            },
        }

        );

        $.validator.addMethod("validatePassword", function (value, elemt) {
            return this.optional(elemt) || /^[\w'\-,.][^_!¡?÷?¿/\\+=@#$%ˆ&*(){}|~<>;:[\]]{8,}$/.test(value);
        }, 'Vui lòng nhập 8 ký tự, có chữ và số');

        $.validator.addMethod("validateEmail", function (value, elemt) {
            return this.optional(elemt) || /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@(?:\S{1,63})$/.test(value);
        }, 'Vui lòng hãy nhập đúng định dạng email');

        $.validator.addMethod("validateName", function (value, elemt) {
            return this.optional(elemt) || /^[\w'\-,.][^0-9_!¡?÷?¿/\\+=@#$%ˆ&*(){}|~<>;:[\]]{2,}$/.test(value);
        }, 'Vui lòng hãy nhập đúng định dạng tên');

        $.validator.addMethod("validatePhone", function (value, elemt) {
            return this.optional(elemt) || /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im.test(value);
        }, 'Vui lòng hãy nhập đúng định dạng số điện thoại');
        $.validator.addMethod("validateAddress", function (value, elemt) {
            return this.optional(elemt) || /^[\w'\-,.][^_!¡?÷?¿/\\+=@#$%ˆ&*(){}|~<>;:[\]]{2,}$/.test(value);
        }, 'Vui lòng hãy nhập đúng định dạng địa chỉ');
    }

}