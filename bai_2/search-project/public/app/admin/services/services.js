$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
function services() {
    this.datas = null;
    var datas = null;
    this.init = function () {
        datas = this.datas;
        var me = this;
        me.datatables();
    }
    this.datatables = function () {
        var me = this;
        var table = $("#services-table").DataTable({
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
                },
                {
                    title: "Name",
                    data: "service_name",
                    name: "service_name",
                    className: "",
                },
                {
                    title: "Description",
                    data: "service_description",
                    name: "service_description",
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
            $("#serviceForm")[0].reset();
            $("#serviceModal").modal("toggle");
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
                    $('input[name="service_name"]').val(response.data.service_name);
                    $('input[name="service_description"]').val(response.data.service_description);
                    $('input[name="user_id"]').val(response.data.user_id);
                    $("#serviceEditModal").modal("toggle");
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


    }


    this.validator = function (table) {
        console.log("validate");
        $("#serviceEditForm").validate({
            rules: {
                "service_name": {
                    required: true,
                    maxlength: 20,
                    minlength: 3,
                    validateName: true,
                },
                "service_description": {
                    required: true,
                },

            },
            messages: {
                service_name: {
                    required: "Bắt buộc nhập service_name",
                    maxlength: "Nhập tối đa 20 ký tự",
                    minlength: "Hãy nhập ít nhất 3 ký tự"
                },
                service_description: {
                    required: "Bắt buộc nhập service_description",
                },
                user_id: {
                    required: "Bắt buộc nhập user_id",

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
                    $('#serviceEditForm').ready(function (e) {
                        // e.preventDefault();
                        var id = $('#id').val();
                        var user_id = $('#user_id').val();
                        var service_name = $('#service_name').val();
                        var service_description = $('#service_description').val();
                        var _token = $("input[name=_token]").val();

                        $.ajax({
                            url: datas.routes.updates_data,
                            type: 'PUT',
                            data: {
                                id: id,
                                user_id: user_id,
                                service_name: service_name,
                                service_description: service_description,
                                _token: _token,

                            },
                            success: function (response) {
                                console.log(response);
                                $("#serviceEditForm")[0].reset();
                                $('#serviceEditModal').modal('hide');
                                $('.modal-backdrop').remove();
                                table.ajax.reload();
                            }
                        });
                    });
                });
            },
        }

        );
        $("#serviceForm").validate({

            rules: {
                "service_name": {
                    required: true,
                    maxlength: 20,
                    minlength: 3,
                    validateName: true,
                },
                "service_description": {
                    required: true,
                },
            },
            messages: {
                service_name: {
                    required: "Bắt buộc nhập name",
                    maxlength: "Hãy nhập tối đa 15 ký tự",
                    minlength: "Hãy nhập ít nhất 3 ký tự"
                },
                service_description: {
                    required: "Bắt buộc nhập description",
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
                    $('#serviceForm').ready(function (e) {
                        // e.preventDefault();
                        var service_name = $("input[name=service_name]").val();
                        var service_description = $("input[name=service_description]").val();
                        var user_id = $("input[name=user_id]").val();
                        var _token = $("input[name=_token]").val();
                        $('.modal-backdrop').remove();
                        $.ajax({
                            url: datas.routes.insert,
                            type: "POST",
                            data: {
                                service_name: service_name,
                                service_description: service_description,
                                user_id: user_id,
                                _token: _token
                            },
                            success: function (response) {
                                if (response.status === 0) {
                                    alert(response.message);
                                }
                                if (response.status === 1) {
                                    console.log(response);
                                    $('#serviceForm')[0].reset();
                                    $('#serviceModal').modal('hide');
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