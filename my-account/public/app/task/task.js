var elmentTable = $("#table-task");
var DataTable = elmentTable.DataTable({
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
        url: routeTask.table,
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
            title: "",
            data: "_id",
            name: "id",
            className: "overflow-hidden text-center",
            width: "2%",
            orderable: false,
            bSortable: false,
            render: function (data, type, row, meta) {
                return `<label class="container-check">Check
                <input type="checkbox" class="selectOne" value="${data}" name="selectOne">
                <span class="checkmark"></span>
                </label>`;
            },
        },
        {
            title: "STT",
            data: "id",
        },
        {
            title: "Thông tin" ,
            data : "title"
        },
        {
            title: "Tập tin",
            data: "",
        },
        {
            title: "Thực hiện",
            data: "",
        },
        {
            title: "Người gửi",
            data: "userName",
        },
    ],
});

// show popup add new
$("#addNew").on("click", function () {
    $("#btnSave").attr('data-url', routeTask.createPost);
    $("#ModalLabel").text("Thêm mới");
    $("#modalTask").modal("show");
});
