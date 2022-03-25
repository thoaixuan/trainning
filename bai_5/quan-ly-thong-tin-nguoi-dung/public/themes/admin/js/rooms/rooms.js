$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function rooms() {
    this.datas = null;
    var datas = null;
    this.init = function () {
        datas = this.datas;
        var me = this;
        me.datatables();
    }
    this.datatables = function () {
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
                data: function (d) {
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
                render: function (data, type, row, meta) {
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
                render: function (data, type, row, meta) {
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
                    },]);
                }
            }
            ],
        });
        me.action(table);
        me.validator(table);
    }
    this.action = function (table) {
        CKEDITOR.replace('description');
        var me = this;
        $("#btn-search").on('click', function (e) {
            table.ajax.reload();
        });
        $("#search").on('keypress', function (e) {
            if (e.which == 13) {
                table.ajax.reload();
            }
        });

        $(document).on('click', '#open', function () {
            $.ajax({
                url: datas.routes.get_insert,
                type: "get",
                success: function (response) {
                    if (response.status) {
                        document.getElementById("roomForm").reset();
                        $("#roomForm")[0].reset();
                        $("#modal-action").modal("show");
                        $("#submit").attr('data-url', datas.routes.insert);
                        $("#ModalLabel").text("Thêm mới phòng ban");
                        $("#name").val('');
                        CKEDITOR.instances['description'].setData("");
                        toastr.success(response.message);
                    } else {
                        toastr.error(response.message);
                    }
                },
                error: function () { }
            })
        })
        // find by id service
        $(document).on('click', '#update', function () {
            var id = $(this).data("id");
            $("#modal-action").validate().resetForm();
            $("#ModalLabel").text("Chỉnh sửa phòng ban");
            $.ajax({
                url: datas.routes.updates,
                type: "get",
                dataType: 'json',
                data: {
                    _token: $("input[name=_token]").val(),
                    id: id,
                },
                success: function (response) {
                    if (response.status) {
                        $("#submit").attr('data-url', datas.routes.updates);
                        $("#submit").attr('data-id', response.data.id);
                        $("#submit").attr('data-action', 'update');
                        $("#name").val(response.data.name);
                        CKEDITOR.instances['description'].setData(response.data.description);
                        $("#modal-action").modal("show");
                        toastr.success(response.message);
                    } else {
                        toastr.error(response.message);
                    }

                },
                error: function () { }
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
    }

    this.validator = function (table) {
        console.log("validate");
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
                    $('#roomForm').ready(function (e) {
                        var formData = new FormData($("#roomForm")[0]);
                        formData.append('description', CKEDITOR.instances['description'].getData());
                        formData.append('id', $("#submit").attr('data-id'));
                        var url = $('#submit').attr('data-url');
                        $.ajax({
                            url: url,
                            type: "POST",
                            data: formData,
                            processData: false,
                            contentType: false,
                            success: function (response) {
                                if (response.status === 0) {
                                    alert(response.message);
                                }
                                if (response.status === 1) {
                                    console.log(response);
                                    $('#roomForm')[0].reset();
                                    $('#modal-action').modal('hide');
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