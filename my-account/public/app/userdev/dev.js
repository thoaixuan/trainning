
var elmentTable = $("#table-userdev");
var UsersTable = elmentTable.DataTable({
    serverSide: true,
    stateSave: true,
    responsive: false,
    processing: true,
    paging: true,
    lengthChange: true,
    searching: false,
    ordering: true,
    info: true,
    autoWidth: true,
    ajax: {
        url: routeDev.table,
        type: "GET",
        data: function (d) {
            return $.extend({}, d, {
                search: $("#search").val(),
            });
        },
    },
    order: [0, "desc"],
    columns: [
        {
            title: "ID",
            data: "id",
        },
        {
            title: "Phòng ban" ,
            data : "phongban_name",

        },
        {
            title: "Mô tả" ,
            data : "phongban_description",

        },
    ]
})
