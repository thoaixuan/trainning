$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function permissions() {
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
        var table = $("#permission-table").DataTable({
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
        // me.action(table);
        // me.validator(table);
    }

}