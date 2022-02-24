$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
function users() {
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
            lengthMenu: [[10, 25, 50, 100], [10, 25, 50, 100]],
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
            columns: [
                {
                    title: "Name user",
                    data: "name",
                    name: "name",
                    className: "",
                },
                {
                    title: "Email",
                    data: "email",
                    name: "email",
                    className: "",
                },
                {
                    title: "Phone",
                    data: "phone",
                    name: "phone",
                    className: "",
                },
                {
                    title: "Name Service",
                    data: "service.service_name",
                    name: "service.service_name",
                    className: "",
                    render: function (data, type, row, meta) {
                        if (data == null) {
                            return 'Chưa có dữ liệu'
                        } else {
                            return data;
                        }
                    }
                },
                {
                    title: "Name Project",
                    data: "project.projects_name",
                    name: "project.projects_name",
                    className: "",
                    render: function (data, type, row, meta) {
                        if (data == null) {
                            return 'Chưa có dữ liệu'
                        } else {
                            return data;
                        }
                    }
                },


            ],
        });
        me.action(table);
        me.validator(table);
    }
    this.action = function (table) {
        $("#search").on('keyup', function (e) {
            table.ajax.reload();
        });

        $(document).on('click', '#open', function () {
            $("#userModal").modal("toggle");

        })
        // find by id user
        $(document).on('click', '#update', function () {
            console.log("update");
            $.ajax({
                url: datas.routes.updates,
                type: "get",
                dataType: 'json',
                data: {
                    _token: $("input[name=_token]").val(),
                    "id": $(this).data("id"),
                },
                success: function (response) {
                    console.log(response);
                    $('input[name="id"]').val(response.data.id);
                    $('input[name="name"]').val(response.data.name);
                    $('input[name="email"]').val(response.data.email);
                    $('input[name="phone"]').val(response.data.phone);
                    $("#userEditModal").modal("toggle");
                }
            });
        });


        // delete user
        $(document).on('click', '#delete', function () {
            if (confirm("Do you really want to delete this record?")) {
                var id = $(this).data("id");
                console.log(id);
                $.ajax({
                    url: datas.routes.delete,
                    type: 'GET',
                    data: {
                        "id": id,
                        _token: $("input[name=_token]").val()
                    },
                    success: function (response) {
                        table.ajax.reload();
                    }
                });
            }
        });


        $(document).ready(function () {
            $.ajax({
                type: "get",
                url: datas.routes.get_project,
                dataType: 'JSON',
                success: function (response) {
                    $.each(response.data, function (key, item) {
                        $('#select_project').append('<option value=' + item.id + '>' + item.name + '</option');
                    });
                }
            })
        });


        $(document).ready(function () {
            $.ajax({
                type: "get",
                url: datas.routes.get_service,
                dataType: 'JSON',
                success: function (response) {
                    console.log(response.data);
                    $.each(response.data, function (key, item) {
                        $('#select_service').append('<option value=' + item.id + '>' + item.service_name + '</option');
                    });
                }
            })
        });


    }


    this.validator = function (table) {
        console.log("validate");
        $("#userEditForm").validate({
            rules: {
                "name": {
                    required: true,
                    maxlength: 20,
                    minlength: 3,
                    validateName: true,
                },
                "email": {
                    required: true,
                    validateEmail: true,
                },
                "phone": {
                    required: true,
                    validatePhone: true,
                    minlength: 10,
                    maxlength: 10,

                }
            },
            messages: {
                name: {
                    required: "Bắt buộc nhập name",
                    maxlength: "Hãy nhập tối đa 15 ký tự",
                    minlength: "Hãy nhập ít nhất 3 ký tự"
                },
                email: {
                    required: "Bắt buộc nhập email",
                },
                phone: {
                    required: "Bắt buộc nhập số điện thoại",
                    minlength: "Hãy nhập đủ 10 ký tự",
                    maxlength: "Hãy nhập tối thiểu 10 ký tự"
                }

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
                // update student
                $(document).ready(function () {
                    $('#userEditForm').ready(function (e) {
                        // e.preventDefault();
                        var id = $('#id').val();
                        var name = $('#name').val();
                        var email = $('#email').val();
                        var phone = $('#phone').val();
                        var _token = $("input[name=_token]").val();

                        $.ajax({
                            url: datas.routes.updates_data,
                            type: 'PUT',
                            data: {
                                id: id,
                                name: name,
                                email: email,
                                phone: phone,
                                _token: _token,

                            },
                            success: function (response) {
                                if (response.status === 1) {
                                    console.log(response);
                                    $("#userEditForm")[0].reset();
                                    $('#userEditModal').modal('hide');
                                    $('.modal-backdrop').remove();
                                    table.ajax.reload();
                                }
                                else {
                                    alert(response.message);
                                }

                            }
                        });
                    });
                });
            },
        }

        );
        $("#userForm").validate({

            rules: {
                "name": {
                    required: true,
                    maxlength: 20,
                    minlength: 3,
                    validateName: true,
                },
                "email": {
                    required: true,
                    validateEmail: true,
                },
                "password": {
                    required: true,
                    minlength: 8,
                    validatePassword: true,
                },
                "phone": {
                    required: true,
                    validatePhone: true,
                    minlength: 10,
                    maxlength: 10,

                }
            },
            messages: {
                name: {
                    required: "Bắt buộc nhập name",
                    maxlength: "Hãy nhập tối đa 15 ký tự",
                    minlength: "Hãy nhập ít nhất 3 ký tự"
                },
                email: {
                    required: "Bắt buộc nhập email",
                },
                password: {
                    required: "Bắt buộc nhập password",
                    minlength: "Hãy nhập ít nhất 8 ký tự",
                },
                phone: {
                    required: "Bắt buộc nhập số điện thoại",
                    minlength: "Hãy nhập đủ 10 ký tự",
                    maxlength: "Hãy nhập tối thiểu 10 ký tự"
                }

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
                        // e.preventDefault();
                        var name = $("input[name=name]").val();
                        var password = $("input[name=password]").val();
                        var email = $("input[name=email]").val();
                        var phone = $("input[name=phone]").val();
                        var _token = $("input[name=_token]").val();
                        $('.modal-backdrop').remove();
                        $.ajax({
                            url: datas.routes.insert,
                            type: "POST",
                            data: {
                                name: name,
                                password: password,
                                email: email,
                                phone: phone,
                                _token: _token
                            },
                            success: function (response) {
                                if (response.status === 0) {
                                    alert(response.message);
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
            return this.optional(elemt) || /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,16})/.test(value);
        }, 'Vui lòng hãy nhập đúng định dạng mật khẩu gồm 8-16 ký tự bao gồm chữ hoa, chữ thường và ít nhất một số');

        $.validator.addMethod("validateEmail", function (value, elemt) {
            return this.optional(elemt) || /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@(?:\S{1,63})$/.test(value);
        }, 'Vui lòng hãy nhập đúng định dạng email');

        $.validator.addMethod("validateName", function (value, elemt) {
            return this.optional(elemt) || /^[\w'\-,.][^0-9_!¡?÷?¿/\\+=@#$%ˆ&*(){}|~<>;:[\]]{2,}$/.test(value);
        }, 'Vui lòng hãy nhập đúng định dạng tên');

        $.validator.addMethod("validatePhone", function (value, elemt) {
            return this.optional(elemt) || /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im.test(value);
        }, 'Vui lòng hãy nhập đúng định dạng số điện thoại');
    }


}