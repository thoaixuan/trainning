$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function user() {
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
            lengthChange: true,
            searching: false,
            ordering: true,
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
            order: [0, "asc"],
            columns: [
                {
                    title: "#",
                    data: "id",
                    name: "id",
                    className: "text-center",
                },
                {
                    title: "Name",
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
                }
            ],
        });
        me.action(table);
        me.validator(table);

    }

    this.action = function (table) {
        $("#search").on('keyup', function (e) {
            table.ajax.reload();
        });

        // find by id student
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
                    $("#userEditModal").modal("toggle");
                }
            });
        });

        // delete student
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
                    minlength: 8,
                    validateEmail: true,
                },

            },
            messages: {
                name: {
                    required: "Bắt buộc nhập name",
                    maxlength: "Nhập tối đa 20 ký tự",
                    minlength: "Hãy nhập ít nhất 3 ký tự"
                },
                email: {
                    required: "Bắt buộc nhập email",
                    minlength: "Hãy nhập ít nhất 8 ký tự",
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
                // update student
                $(document).ready(function () {
                    $('#userEditForm').submit(function (e) {
                        e.preventDefault();
                        var id = $('#id').val();
                        var name = $('#name').val();
                        var email = $('#email').val();
                        var _token = $("input[name=_token]").val();

                        $.ajax({
                            url: datas.routes.updates_data,
                            type: 'PUT',
                            data: {
                                id: id,
                                name: name,
                                email: email,
                                _token: _token,

                            },
                            success: function (response) {
                                console.log(response);
                                $("#userEditForm")[0].reset();
                                $('#userEditModal').modal('hide');
                                $('.modal-backdrop').remove();
                                table.ajax.reload();
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
                    maxlength: 15,
                    minlength: 3,
                    validateName: true,
                },
                "email": {
                    required: true,
                    minlength: 8,
                    validateEmail: true,
                },
                "password": {
                    required: true,
                    minlength: 8,
                    validatePassword: true,
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
                    minlength: "Hãy nhập ít nhất 8 ký tự",
                },
                password: {
                    required: "Bắt buộc nhập password",
                    minlength: "Hãy nhập ít nhất 8 ký tự",
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
                    $('#userForm').submit(function (e) {
                        e.preventDefault();
                        var name = $("input[name=name]").val();
                        var password = $("input[name=password]").val();
                        var email = $("input[name=email]").val();
                        var _token = $("input[name=_token]").val();
                        $('.modal-backdrop').remove();
                        $.ajax({
                            url: datas.routes.insert,
                            type: "POST",
                            data: {
                                name: name,
                                password: password,
                                email: email,
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
            return this.optional(elemt) || /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,16}$/i.test(value);
        }, 'Làm ơn hãy nhập đúng định dạng mật khẩu gồm 8-16 ký tự bao gồm chữ hoa, chữ thường và ít nhất một số');

        $.validator.addMethod("validateEmail", function (value, elemt) {
            return this.optional(elemt) || /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@(?:\S{1,63})$/.test(value);
        }, 'Làm ơn hãy nhập đúng định dạng email');

        $.validator.addMethod("validateName", function (value, elemt) {
            return this.optional(elemt) || /^[\w'\-,.][^0-9_!¡?÷?¿/\\+=@#$%ˆ&*(){}|~<>;:[\]]{2,}$/.test(value);
        }, 'Làm ơn hãy nhập đúng định dạng tên');

    }

}