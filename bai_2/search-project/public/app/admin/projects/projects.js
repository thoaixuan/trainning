$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
function projects() {
    this.datas = null;
    var datas = null;
    this.init = function () {
        datas = this.datas;
        var me = this;
        me.datatables();
    }
    this.datatables = function () {
        var me = this;
        var table = $("#projects-table").DataTable({
            serverSide: true,
            processing: true,
            paging: true,
            lengthMenu: [[10, 25, 50, 100], [10, 25, 50, 100]],
            pagingType: "full_numbers",
            lengthChange: false,
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
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                {
                    title: "Name Service",
                    data: "service.service_name",
                    name: "service.service_name",
                    className: "",
                },
                {
                    title: "Name Project",
                    data: "projects_name",
                    name: "projects_name",
                    className: "",
                },
                {
                    title: "Name user",
                    data: "user.name",
                    name: "user.name",
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
        $("#btn-search").on('click', function (e) {
            table.ajax.reload();
        });
        $("#search").on('keypress', function (e) {
            if (e.which == 13) {
                table.ajax.reload();
            }
        });
        $(document).on('click', '#open', function () {
            $("#projectForm")[0].reset();
            $("#projectModal").modal("toggle");
            console.log("openModal");
        })
        // find by id service
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
                    $('input[name="projects_name"]').val(response.data.projects_name);
                    $("select#select_service_edit").val(response.data.service_id)
                    $("select#select_user_edit").val(response.data.user_id)
                    $("#projectEditModal").modal("toggle");
                }
            });
        });


        // delete service
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
                url: datas.routes.get_user,
                dataType: 'JSON',
                success: function (response) {
                    $.each(response.data, function (key, item) {
                        $('#select_user').append('<option value=' + item.id + '>' + item.name + '</option');
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
                    $.each(response.data, function (key, item) {
                        $('#select_service').append('<option value=' + item.id + '>' + item.service_name + '</option');
                    });
                }
            })
        });


        $(document).ready(function () {
            $.ajax({
                type: "get",
                url: datas.routes.get_user,
                dataType: 'JSON',
                success: function (response) {
                    console.log(response);
                    $.each(response.data, function (key, item) {
                        $('#select_user_edit').append('<option value=' + item.id + '>' + item.name + '</option');
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
                    console.log(response);
                    $.each(response.data, function (key, item) {
                        $('#select_service_edit').append('<option value=' + item.id + '>' + item.service_name + '</option');
                    });
                }
            })
        });



    }


    this.validator = function (table) {
        console.log("validate");
        $("#projectEditForm").validate({
            rules: {
                "projects_name": {
                    required: true,
                    maxlength: 20,
                    minlength: 3,
                    validateName: true,
                },
                "service_id": {
                    required: true,
                },
                "user_id": {
                    required: true,
                },

            },
            messages: {
                projects_name: {
                    required: "Bắt buộc nhập name",
                    maxlength: "Nhập tối đa 20 ký tự",
                    minlength: "Hãy nhập ít nhất 3 ký tự"
                },
                service_id: {
                    required: "Bắt buộc nhập service",
                },
                user_id: {
                    required: "Bắt buộc nhập user",

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
                console.log("update data");
                // update student
                $(document).ready(function () {
                    $('#projectEditModal').ready(function (e) {
                        // e.preventDefault();
                        var id = $('#id').val();
                        var projects_name = $('#projects_name').val();
                        var service_id = $("select#select_service_edit").val()
                        var user_id = $("select#select_user_edit").val()
                        var _token = $("input[name=_token]").val();

                        $.ajax({
                            url: datas.routes.updates_data,
                            type: 'PUT',
                            data: {
                                id: id,
                                projects_name: projects_name,
                                service_id: service_id,
                                user_id: user_id,
                                _token: _token,

                            },
                            success: function (response) {
                                console.log(this.data);
                                $("#projectEditForm")[0].reset();
                                $('#projectEditModal').modal('hide');
                                $('.modal-backdrop').remove();
                                table.ajax.reload();
                            }
                        });
                    });
                });
            },
        }

        );
        $("#projectForm").validate({

            rules: {
                "projects_name": {
                    required: true,
                    maxlength: 20,
                    minlength: 3,
                    validateName: true,
                },
                "service_id": {
                    required: true,
                },
                "user_id": {
                    required: true,
                }
            },
            messages: {
                projects_name: {
                    required: "Bắt buộc nhập name",
                    maxlength: "Hãy nhập tối đa 15 ký tự",
                    minlength: "Hãy nhập ít nhất 3 ký tự"
                },
                service_id: {
                    required: "Bắt buộc nhập service",
                },
                user_id: {
                    required: "Bắt buộc nhập dữ liệu",
                    minlength: "Hãy nhập ít nhất 1 ký tự",
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
                    $('#projectForm').ready(function (e) {
                        // e.preventDefault();
                        var projects_name = $("input[name=projects_name]").val();
                        var service_id = $("select#select_service").val()
                        var user_id = $("select#select_user").val()
                        var _token = $("input[name=_token]").val();
                        $('.modal-backdrop').remove();
                        $.ajax({
                            url: datas.routes.insert,
                            type: "POST",
                            data: {
                                projects_name: projects_name,
                                service_id: service_id,
                                user_id: user_id,
                                _token: _token
                            },
                            success: function (response) {
                                console.log(this.data);
                                if (response.status === 0) {
                                    alert(response.message);
                                }
                                if (response.status === 1) {
                                    console.log(response);
                                    $('#projectForm')[0].reset();
                                    $('#projectModal').modal('hide');
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

        $.validator.addMethod("validateName", function (value, elemt) {
            return this.optional(elemt) || /^[\w'\-,.][^0-9_!¡?÷?¿/\\+=@#$%ˆ&*(){}|~<>;:[\]]{2,}$/.test(value);
        }, 'Vui lòng hãy nhập đúng định dạng tên');

    }

}