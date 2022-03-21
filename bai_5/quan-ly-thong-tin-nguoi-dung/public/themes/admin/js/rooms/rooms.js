$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function rooms() {
    this.datas = null;
    var datas = null;
    this.init = function() {
        datas = this.datas;
        var me = this;
        me.datatables();
        // me.ckeditor();
    }
    this.datatables = function() {
        var me = this;
        var table = $("#rooms-table").DataTable({
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
            info: true,
            responsive: true,
            autoWidth: false,
            ajax: {
                url: datas.routes.datatable,
                type: "GET",
                data: function(d) {
                    return $.extend({}, d, {
                        search: $("#search").val(),
                    });

                }
            },
            order: [0, "asc"],
            columns: [{
                    title: "Tên",
                    data: "name",
                    name: "name",
                    className: "",
                },
                {
                    title: "Mô tả",
                    data: "description",
                    name: "description",
                    className: "",
                    render: function(data, type, row, meta) {
                        if (!data) {
                            return 'Chưa có dữ liệu';
                        }
                        return data;

                    }
                },

                {
                    title: "Action",
                    data: "id",
                    name: "id",
                    className: "text-center",
                    bSortable: false,
                    render: function(data, type, row, meta) {
                        return renderAction([{
                            class: 'btn btn-danger mr-2',
                            value: row.id,
                            title: 'delete',
                            icon: 'fa fa-trash',
                        }, {
                            class: 'btn btn-info',
                            value: row.id,
                            title: 'update',
                            icon: 'fa fa-edit',
                        }, ]);
                    }
                }
            ],
        });
        me.action(table);
        me.validator(table);
    }
    this.action = function(table) {
        var me = this;
        $("#btn-search").on('click', function(e) {
            table.ajax.reload();
        });
        $("#search").on('keypress', function(e) {
            if (e.which == 13) {
                table.ajax.reload();
            }
        });

        $(document).on('click', '#open', function() {
            $("#roomForm")[0].reset();

            $("#roomModal").modal("toggle");
            console.log("openModal");

        })

        $(document).ready(function() {
            $('#permission_id').select2({
                dropdownParent: $('#roomModal')
            });
            $('#permission_edit_id').select2({
                dropdownParent: $('#roomEditModal')
            });
            $.ajax({
                type: "get",
                url: datas.routes.get_permision,
                dataType: 'JSON',
                success: function(response) {
                    console.log(response);
                    $.each(response.data, function(key, item) {
                        $('#permission_id').append('<option value=' + item.id + '>' + item.name + '</option');
                    });
                }
            });
            $.ajax({
                type: "get",
                url: datas.routes.get_permision,
                dataType: 'JSON',
                success: function(response) {
                    console.log(response);
                    $.each(response.data, function(key, item) {
                        $('#permission_edit_id').append('<option value=' + item.id + '>' + item.name + '</option');
                    });
                }
            });
            // $('#permission_id').select2();
        });

        // find by id service
        $(document).on('click', '#update', function() {
            $("#roomEditForm")[0].reset();
            console.log("update");
            $.ajax({
                url: datas.routes.updates,
                type: "get",
                dataType: 'json',
                data: {
                    _token: $("input[name=_token]").val(),
                    "id": $(this).data("id"),
                },
                success: function(response) {
                    console.log(response);
                    $('input[name="id"]').val(response.data.id);
                    $('input[name="name"]').val(response.data.name);
                    CKEDITOR.instances['room_detail_edit'].setData(response.data.description);
                    $("select#permission_edit_id").val(response.data.permission_id);
                    $("#roomEditModal").modal("toggle");
                }
            });
        });


        // delete service
        $(document).on('click', '#delete', function() {
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
                    success: function(response) {
                        table.ajax.reload();
                    }
                });
            }
        });


    }


    this.validator = function(table) {
        console.log("validate");
        $("#roomEditForm").validate({
                rules: {
                    "name": {
                        required: true,
                        maxlength: 20,
                        minlength: 3,
                        validateName: true,
                    },
                    "description": {
                        required: true,
                    },
                    "permission_id": {
                        required: true,
                    },
                },
                messages: {
                    name: {
                        required: "Bắt buộc nhập name",
                        maxlength: "Hãy nhập tối đa 15 ký tự",
                        minlength: "Hãy nhập ít nhất 3 ký tự"
                    },
                    description: {
                        required: "Bắt buộc nhập description",
                    },
                    permission_id: {
                        required: "Bắt buộc nhập dữ liệu",
                        minlength: "Hãy nhập ít nhất 1 ký tự",
                    }
                },
                errorElement: "span",
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest(".form-group").append(error);
                },
                highlight: function(element) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element) {
                    $(element).removeClass('is-invalid');
                },
                submitHandler: function() {
                    // update student
                    $(document).ready(function() {
                        $('#roomEditForm').ready(function(e) {
                            var id = $('#id').val();
                            var permission_id = $("select#permission_edit_id").val();
                            var name = $('#name').val();
                            var description = CKEDITOR.instances['room_detail_edit'].getData();
                            var _token = $("input[name=_token]").val();

                            $.ajax({
                                url: datas.routes.updates_data,
                                type: 'put',
                                data: {
                                    id: id,
                                    name: name,
                                    permission_id: permission_id,
                                    description: description,
                                    _token: _token,

                                },
                                success: function(response) {
                                    console.log(response);
                                    $("#roomEditForm")[0].reset();
                                    $('#roomEditModal').modal('hide');
                                    $('.modal-backdrop').remove();
                                    table.ajax.reload();
                                }
                            });
                        });
                    });
                },
            }

        );

        $("#roomForm").validate({

                rules: {
                    "name": {
                        required: true,
                        maxlength: 20,
                        minlength: 3,
                        validateName: true,
                    },
                    "description": {
                        required: true,
                    },
                    "permission_id": {
                        required: true,
                    },
                },
                messages: {
                    name: {
                        required: "Bắt buộc nhập name",
                        maxlength: "Hãy nhập tối đa 15 ký tự",
                        minlength: "Hãy nhập ít nhất 3 ký tự"
                    },
                    description: {
                        required: "Bắt buộc nhập description",
                    },
                    permission_id: {
                        required: "Bắt buộc nhập dữ liệu",
                        minlength: "Hãy nhập ít nhất 1 ký tự",
                    }
                },
                errorElement: "span",
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest(".form-group").append(error);
                },
                highlight: function(element) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element) {
                    $(element).removeClass('is-invalid');
                },
                submitHandler: function() {
                    $(document).ready(function() {
                        $('#roomForm').ready(function(e) {
                            // e.preventDefault();
                            var name = $("input[name=name]").val();
                            var description = CKEDITOR.instances['room_detail'].getData();
                            var permission_id = $("select#permission_id").val();
                            var _token = $("input[name=_token]").val();
                            $('.modal-backdrop').remove();
                            $.ajax({
                                url: datas.routes.insert,
                                type: "POST",
                                data: {
                                    name: name,
                                    description: description,
                                    permission_id: permission_id,
                                    _token: _token
                                },
                                success: function(response) {
                                    if (response.status === 0) {
                                        alert(response.message);
                                    }
                                    if (response.status === 1) {
                                        console.log(response);
                                        $('#roomForm')[0].reset();
                                        $('#roomModal').modal('hide');
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

        $.validator.addMethod("validateName", function(value, elemt) {
            return this.optional(elemt) || /^[\w'\-,.][^0-9_!¡?÷?¿/\\+=@#$%ˆ&*(){}|~<>;:[\]]{2,}$/.test(value);
        }, 'Vui lòng hãy nhập đúng định dạng tên');

    }



}