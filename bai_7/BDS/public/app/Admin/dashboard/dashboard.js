function dashboard() {
    this.datas = null;
    var datas = null;
    this.init = function () {
        datas = this.datas;
        var me = this;
        me.datatables();
    }
    this.datatables = function () {
       $("#datatable").DataTable({
            language: {
                processing: "Đang tải dữ liệu",
                search: "Placeholder của input tìm kiếm",
                lengthMenu: "Điều chỉnh số lượng bản ghi trên 1 trang _MENU_ ",
                info: "Bản ghi từ _START_ đến _END_ || Tổng cộng _TOTAL_ bản ghi",
                infoEmpty: "Không có dữ liệu, Hiển thị 0 bản ghi trong 0 tổng cộng 0 ",
                infoFiltered: "(Bản ghi tổng cộng:_MAX_)",
                loadingRecords: "",
                zeroRecords: "Không có dữ liệu nào ",
                emptyTable: "Không có dữ liệu",
                paginate: {
                    first: "Trang đầu",
                    previous: "Trang trước",
                    next: "Trang sau",
                    last: "Trang cuối"
                },
                aria: {
                    sortAscending: ": Đang sắp xếp theo column",
                    sortDescending: ": Đang sắp xếp theo column",
                }
            },
            serverSide: true,
            processing: true,
            paging: true,
            lengthMenu: [[10, 25, 50, 100], [10, 25, 50, 100]],
            pagingType: "full_numbers",
            lengthChange: false,
            searching: false,
            ordering: true,
            order: [0, "asc"],
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
            columns: [
                {
                    title: "Tiêu đề",
                    data: "Title",
                    name: "Title",
                    className: "",
                },
                 {
                    title: "Giá tiền",
                    data: "Price",
                    name: "Price",
                    className: "",
                }, 
                {
                    title: "Chi tiết",
                    data: "id",
                    name: "id",
                    className: "",
                    render: function (data, type, row, meta) {
                        return renderDetail([{
                            class: 'btn btn-outline-success',
                            value: row.id,
                            data: data,
                            title: 'detail',
                            icon: 'fa fa-eye'
                        }]);
                    }
    
                }, 
             

            ],
        });
    }
    this.action =function(){}

}