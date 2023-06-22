function department() {
    this.datas = null;
    var datas = null;
    this.init = function() {
        datas = this.datas;
        var me = this;
        me.datatables();
    }
    this.datatables = function() {
        var me = this;
        var table = $("#home-department-table").DataTable({
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
                    title: "Phòng ban",
                    data: "title",
                    name: "title",
                    className: "",
                    render: function(data, type, row, meta) {
                        return data;
                    }

                },
                {
                    title: "Mô tả",
                    data: "des",
                    name: "des",
                    className: "",

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
                            title: 'updateDepartment',
                            icon: 'fa fa-edit',
                        }, {
                            class: 'btn btn-sm btn-primary badge',
                            value: row.id,
                            title: 'deleteDepartment',
                            icon: 'fa fa-trash',
                        }, ]);
                    }
                },

            ],
        });

        me.action(table);
    }
    this.action = function(table) {
        var submit = document.getElementById("submitDepartment");
        var title = document.getElementById("ModalLabelDepartment");

        var myModal = new bootstrap.Modal(document.getElementById('modalDepartment'), {
            keyboard: true
        });

        //Mở modal thêm dữ liệu
        $(document).on('click', '#openDepartment', function () {
            title.textContent = "Thêm dữ liệu mới";
            submit.textContent = "Thêm dữ liệu";
                        submit.setAttribute('data-url', datas.routes.insert);
                        myModal.show();
        });

        // Mở modal cập nhật dữ liệu
        $(document).on('click', '#updateDepartment', function () {
            submit.textContent = "Chỉnh sửa";
            title.textContent = "Chỉnh sửa";
            $.ajax({
                url: datas.routes.get_update,
                type: "get",
                dataType: 'json',
                data: {
                    "id": $(this).data("id"),
                },
                success: function (response) {
                    if (response.status) {
                        submit.setAttribute('data-url', datas.routes.update);
                        submit.setAttribute('data-id', response.data.id);
                        document.getElementById("department_title").value = response.data.title;
                        document.getElementById("department_des").value = response.data.des;
                        myModal.show();
                    } else {
                        toastr.error(response.message);
                    }

                },
                error: function () {

                }
            });
        });

        // Xóa dữ liệu
        $(document).delegate("#deleteDepartment", "click", function () {
			var id = $(this).data("id");
			$('#modal-text-delete-department').text("Bạn có muốn xóa không ?");
			$("#onDeleteDepartment").attr('value', id);
			$("#modal-delete-department").modal('show');
		});

		$("#onDeleteDepartment").on("click", function (e) {
			e.preventDefault(e);
			var id = $(this).val();
			var result = tableAjaxDelete(table,{
				id: id
			}, datas.routes.delete);
			if (result) {
				$("#modal-delete-department").modal('hide');
			} else {
				$("#modal-delete-department").modal('hide');
			}
		});

        jQuery.validator.addMethod("validateScript", function(value, element){
			return !(value.includes("script>") ||
							value.includes("script&gt;") ||
							value.includes("<?") ||
							value.includes("&lt;?"));
		}, "Vui lòng nhập đúng định dạng chữ");
        $('#homeDepartmentForm').validate({
			rules: {
			},
			messages: {
			},
			errorElement: 'span',
			errorPlacement: function (error, element) {
				error.addClass('invalid-feedback');
				element.closest('.form-group').append(error);
			},
			highlight: function (element, errorClass, validClass) {
				$(element).addClass('is-invalid');
			},
			unhighlight: function (element, errorClass, validClass) {
				$(element).removeClass('is-invalid');
			},
            onfocusout: function(element){ return false; },
            submitHandler: function(e) {
				var url = $('#submitDepartment').attr('data-url');
				var formData = new FormData($("#homeDepartmentForm")[0]);
				formData.append('id', $("#submitDepartment").attr('data-id'));
                $.ajax({
                    		url: url,
                    		data: formData,
                    		type: 'POST',
                    		data: formData,
                            processData: false,
                            contentType: false,
                    		success: function (data) {
                    				myModal.hide();
                    				toastr.success(data.message);
                    				table.ajax.reload();
                    		},
                    		error: function (error) {
                    			console.log("Lỗi");
                    		}
                    	});
            }
			
		});


    }


}