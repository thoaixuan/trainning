$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$("#users-table").DataTable({
    serverSide: true,
    processing: true,
    paging: true,
    lengthMenu: [[10, 25, 50, 100], [10, 25, 50, 100]],
    pagingType: "full_numbers",
    lengthChange: true,
    searching: false,
    ordering: true,
    info: true,
    responsive: true,
    autoWidth: false,
    ajax: {
        url: '/any-data',
        type: "GET",
        // data: function (d) {
        //     return $.extend({}, d, {
        //         search: $("#search").val(),
        //     });

        // }
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
            title: "Phone",
            data: "phone",
            name: "phone",
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