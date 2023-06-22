function contact() {
    this.datas = null;
    var datas = null;
    this.init = function() {
        datas = this.datas;
        var me = this;
        me.datatables();
    }
    this.datatables = function() {
        var me = this;
        var table = $("#contact-datatable").DataTable({
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
            lengthMenu: [
                [10, 25, 50, 100],
                [10, 25, 50, 100]
            ],
            pagingType: "full_numbers",
            lengthChange: false,
            searching: false,
            ordering: true,
            order: [0, "desc"],
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
            columns: [
                {
                    title: "Tên",
                    data: "name",
                    name: "name",
                    className: "",

                },
                {
                    title: "Thông tin",
                    data: "id",
                    name: "id",
                    className: "",
                    render: function(data, type, row, meta) {
                        let html = 'SĐT: '+row.phone+' | Email: '+row.email;
                        return html;
                    }
                },
                {
                    title: "Nội dung",
                    data: "content",
                    name: "content",
                    className: "",
                },
                {
                    title: "Link",
                    data: "link",
                    name: "link",
                    className: "",
                },
                {
                    title: "Trạng thái",
                    data: "status",
                    name: "status",
                    className: "",
                    render: function(data, type, row, meta) {
                        if(data == 0){
                            return "<span class='badge badge-handle bg-danger c-click' data-id='"+row.id+"' title='Click để thay đổi đã xử lý'>Chưa xử lý</span>";
                        }else {
                            return '<span class="badge bg-success">Đã xử lý</span>';
                        }
                    }
                },
                {
                    title: "Tác vụ",
                    data: "id",
                    name: "id",
                    className: "text-center",
                    bSortable: false,
                    render: function(data, type, row, meta) {
                        return renderAction([{
                            class: 'btn btn-sm btn-primary badge',
                            value: row.id,
                            title: 'delete',
                            icon: 'fa fa-trash',
                        }, ]);
                    }
                },

            ],
        });

        me.action(table);
    }
    this.action = function(table) {
        // Tìm kiếm news
        search.onkeyup = function() {
            table.ajax.reload();
        };
        //Tìm kiếm bằng phím
        document.getElementById("btn_search").addEventListener("click", function(event) {
                table.ajax.reload();
        });

        $(document).on('click', '.badge-handle', function () {
            $.ajax({
                url: datas.routes.change_status,
                type: "get",
                dataType: 'json',
                data: {
                    "id": $(this).data("id"),
                },
                success: function (response) {
                    if (response.status) {
                        toastr.success(response.message);
                        table.ajax.reload();
                    } else {
                        toastr.error(response.message);
                    }

                },
                error: function (e) {
                    console.log(e);
                }
            });
        });

        // Xóa dữ liệu
        $(document).delegate("#delete", "click", function () {
			var id = $(this).data("id");
			$('#modal-text-delete').text("Bạn có muốn xóa không ?");
			$("#onDelete").attr('value', id);
			$("#modal-delete").modal('show');
		});

		$("#onDelete").on("click", function (e) {
			e.preventDefault(e);
			var id = $(this).val();
			var result = AjaxDelete(table,{
				id: id
			}, datas.routes.delete);
			if (result) {
				$("#modal-delete").modal('hide');
			} else {
				$("#modal-delete").modal('hide');
			}
		});


    }


}