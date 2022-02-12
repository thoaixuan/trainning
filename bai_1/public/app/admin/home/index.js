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
            lengthChange: true,
            searching: false,
            ordering: true,
            info: true,
            responsive: true,
            autoWidth: false,
            ajax: {
                url: "/data",
                type: "GET",
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
    }

    this.action = function (table) {
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
                        console.log(response);
                        $('#userForm')[0].reset();
                        $('#userModal').modal('hide');
                        $('.modal-backdrop').remove();
                        table.ajax.reload();
                    }
                })

            })

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
                        $('#userEditModal').modal("toggle");
                        $('.modal-backdrop').remove();
                        table.ajax.reload();
                    }
                });
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

}