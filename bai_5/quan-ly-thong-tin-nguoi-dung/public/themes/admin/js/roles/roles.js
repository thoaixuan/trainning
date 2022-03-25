$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function roles() {
    this.datas = null;
    var datas = null;
    this.init = function () {
        datas = this.datas;
        var me = this;
        me.datatables();
    }
    this.datatables = function () {

        var me = this;
        var table = $("#roles-table").DataTable({
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
        CKEDITOR.replace('role_detail');
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
                type: "get",
                url: datas.routes.get_insert,
                success: function (response) {
                    if (response.status) {
                        $("#submit").attr('data-url', datas.routes.insert);
                        $("#modal-title").text("Thêm mới quyền");
                        $("#submit").attr('data-action', 'insert');
                        $("#name").val('');
                        CKEDITOR.instances['role_detail'].setData("");
                        $("#roleForm")[0].reset();
                        $("#roleModal").modal("toggle");
                        $("#permission").multiselect("refresh");
                        toastr.success(response.message);
                    } else {
                        toastr.error(response.message);
                    }

                },
                error: function () { }
            });

        })

        // find by id service
        $(document).on('click', '#update', function () {
            $("#modal-title").text("Sửa mới quyền");
            $.ajax({
                url: datas.routes.updates,
                type: "get",
                dataType: 'json',
                data: {
                    _token: $("input[name=_token]").val(),
                    "id": $(this).data("id"),
                },
                success: function (response) {
                    if (response.status) {
                        $("#submit").attr('data-url', datas.routes.updates);
                        $("#submit").attr('data-action', 'update');
                        $("#submit").attr('data-id', response.data.id);
                        $("#roleForm")[0].reset();
                        $("#name").val(response.data.name);
                        CKEDITOR.instances['role_detail'].setData(response.data.description);
                        var data = response.data.roles_module;
                        $.each(data.split(","), function (i, e) {
                            $("#permission option[value='" + e + "']").prop("selected", true);
                            console.log(e);
                        });
                        $("#roleModal").modal("toggle");
                        toastr.success(response.message);
                        $("#permission").multiselect("refresh");

                    } else {
                        toastr.error(response.message);
                    }

                },
                error: function () {

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
                        if (response.status) {
                            table.ajax.reload();
                            toastr.success(response.message);
                        } else {
                            toastr.error(response.message);

                        }
                    }
                });
            }
        });
        $('#permission').multiselect({
            nonSelectedText: 'Chọn Quyền',
            filterPlaceholder: "Tìm kiếm",
            allSelectedText: "Tất cả",
            selectAllText: 'Chọn tất cả',
            selectAllValue: 'multiselect-all',
            enableClickableOptGroups: true,
            enableCollapsibleOptGroups: true,
            enableFiltering: true,
            includeSelectAllOption: true,
            buttonWidth: '100%',
            maxHeight: 350,
        });

    }


    this.validator = function (table) {
        console.log("validate");
        $("#roleForm").validate({
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
                    $('#roleEditForm').ready(function (e) {
                        var permission_id = document.querySelectorAll("input[type='checkbox']:checked");
                        var permission = [];
                        for (var i = 0; i < permission_id.length; i++) {
                            permission.push($(permission_id[i]).val());
                        }
                        var formData = new FormData($("#roleForm")[0]);
                        formData.append('id', $("#submit").attr('data-id'));
                        formData.append('description', CKEDITOR.instances['role_detail'].getData());
                        formData.append('roles_module', permission);
                        var url = $("#submit").attr('data-url');
                        $.ajax({
                            url: url,
                            type: 'post',
                            data: formData,
                            processData: false,
                            contentType: false,
                            success: function (response) {
                                console.log(response);
                                $('#roleModal').modal('hide');
                                table.ajax.reload();
                            }
                        });
                    });
                });
            },
        }

        );

        // $("#roleForm").validate({

        //     rules: {
        //         "name": {
        //             required: true,
        //             maxlength: 20,
        //             minlength: 3,
        //             validateName: true,
        //         },
        //         "description": {
        //             required: true,
        //         },
        //         "permission_id": {
        //             required: true,
        //         },
        //     },
        //     messages: {
        //         name: {
        //             required: "Bắt buộc nhập name",
        //             maxlength: "Hãy nhập tối đa 15 ký tự",
        //             minlength: "Hãy nhập ít nhất 3 ký tự"
        //         },
        //         description: {
        //             required: "Bắt buộc nhập description",
        //         },
        //         permission_id: {
        //             required: "Bắt buộc nhập dữ liệu",
        //             minlength: "Hãy nhập ít nhất 1 ký tự",
        //         }
        //     },
        //     errorElement: "span",
        //     errorPlacement: function (error, element) {
        //         error.addClass('invalid-feedback');
        //         element.closest(".form-group").append(error);
        //     },
        //     highlight: function (element) {
        //         $(element).addClass('is-invalid');
        //     },
        //     unhighlight: function (element) {
        //         $(element).removeClass('is-invalid');
        //     },
        //     submitHandler: function () {
        //         $('#roleForm').ready(function (e) {
        //             // e.preventDefault();
        //             var name = $("input[name=name]").val();
        //             var description = CKEDITOR.instances['role_detail'].getData();
        //             var permission_id = document.querySelectorAll("input[type='checkbox']:checked");
        //             var permission = [];
        //             for (var i = 0; i < permission_id.length; i++) {
        //                 permission.push($(permission_id[i]).val());
        //             }

        //             var _token = $("input[name=_token]").val();
        //             $('.modal-backdrop').remove();
        //             $.ajax({
        //                 url: datas.routes.insert,
        //                 type: "POST",
        //                 data: {
        //                     name: name,
        //                     description: description,
        //                     permission_id: permission,
        //                     _token: _token
        //                 },
        //                 success: function (response) {
        //                     if (response.status === 0) {
        //                         alert(response.message);
        //                     }
        //                     if (response.status === 1) {
        //                         console.log(response);
        //                         $('#roleForm')[0].reset();
        //                         $('#roleModal').modal('hide');
        //                         $('.modal-backdrop').remove();
        //                         table.ajax.reload();
        //                     }
        //                 }
        //             })

        //         })
        //     },
        // }

        // );

        $.validator.addMethod("validateName", function (value, elemt) {
            return this.optional(elemt) || /^[\w'\-,.][^0-9_!¡?÷?¿/\\+=@#$%ˆ&*(){}|~<>;:[\]]{2,}$/.test(value);
        }, 'Vui lòng hãy nhập đúng định dạng tên');

    }



}