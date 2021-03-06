function support() {
    this.datas = null;
    var datas = null;
    this.init = function () {
        datas = this.datas;
        var me = this;
        me.datatables();
    }
    //Datatables
    this.datatables = function () {
        var me = this;
        var table = $("#supportTable").DataTable({
            serverSide: true,
            processing: true,
            paging: true,
            lengthChange: true,
            searching: false,
            ordering: true,
            info: true,
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
            order: [0, "desc"],
            columns: [
                {
                    title: "Họ và tên",
                    data: "support_name",
                    name: "support_name",
                    className: "",

                },
                {
                    title: "Số điện thoại",
                    data: "support_phone",
                    name: "support_phone",
                    className: "",
                },
                {
                    title: "Email",
                    data: "support_email",
                    name: "support_email",
                    className: "",
                },
                {
                    title: "Nội dung",
                    data: "support_content",
                    name: "support_content",
                    className: "text-center",
                },
                {
                    title: "Phòng ban",
                    data: "roomName",
                    name: "roomName",
                    className: "text-center",
                },
                {
                    title: "Thao tác",
                    data: "id",
                    name: "id",
                    className: "text-center",
                    bSortable: false,
                    render: function (data, type, row, meta) {
                        return renderAction([
                            {
                                class: 'btn-delete',
                                value: row.id,
                                title: 'Xóa',
                                icon: 'fa fa-trash',
                                color: 'danger'
                            }]);
                    }
                },]
        });
        me.action(table);
    }
    //Actions
    this.action = function (table) {
        $("#search").on('keyup', function (e) {
            table.ajax.reload();
        });
        $("#btn_search").on('click', function (e) {
            e.preventDefault();
            table.ajax.reload();
        });

        $(document).delegate(".btn-delete", "click", function () {
            var id = $(this).val();
            $('#modal-text-delete').text(" Bạn có muốn xóa không ?");
            $("#onDelete").attr('value', id);
            $("#modal-delete").modal('show');
        });

        $("#onDelete").on("click", function (e) {
            e.preventDefault(e);
            var id = $(this).val();
            $.ajax({
                url: datas.routes.delete,
                type: "get",
                data: { id: id },
                dataType: "JSON",
                async: false,
                success: function (data) {
                    table.ajax.reload();
                    toastr.success(data.msg);
                },
                error: function (error) {
                    toastr.error(data.msg)
                    console.log(error);
                },
            });
        });


    }


}