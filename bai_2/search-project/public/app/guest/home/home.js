$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
function home() {
    this.datas = null;
    var datas = null;
    this.init = function () {
        datas = this.datas;
        var me = this;
        me.datatables();
    }
    this.datatables = function () {
        var me = this;
        var table = $("#project-table").DataTable({
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
                    title: "Name user",
                    data: "user.name",
                    name: "user.name",
                    className: "",
                },
                {
                    title: "Email",
                    data: "user.email",
                    name: "user.name",
                    className: "",
                },
                {
                    title: "Phone",
                    data: "user.phone",
                    name: "user.phone",
                    className: "",
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


            ],
        });
        me.action(table);
    }
    this.action = function (table) {
        $("#search").on('keyup', function (e) {
            table.ajax.reload();
        });

    }
}