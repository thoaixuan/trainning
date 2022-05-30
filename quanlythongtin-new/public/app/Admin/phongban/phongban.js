function page() {
	this.datas = null;
	var datas = null;
	this.init = function () {
		datas = this.datas;
		var me = this;
		me.datatables();
	}
	this.datatables = function () {
		var me = this;
		var table = $("#table-phongban").DataTable({
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
				title: "Tên phòng ban",
				data: "phongban_name",
				name: "phongban_name",
				className: "",
				
			},
			{
				title: "Mô tả",
				data: "phongban_description",
				name: "phongban_description",
				className: "",
			},
			{
				title: "Thao tác",
				data: "id",
				name: "id",
				className: "text-center",
				bSortable: false,
				render: function (data, type, row, meta) {
					return renderAction([ {
						class: 'btn btn-sm btn-primary badge',
						value: row.id,
						title: 'update',
						icon: 'fa fa-edit',
					},
					{
						class: 'btn btn-sm btn-primary badge',
						value: row.id,
						title: 'delete',
						icon: 'fa fa-trash',
					}]);
				}
			}, ]
		});
		me.action(table);
	}

	this.action = function (table) {
		$("#search").on('keyup', function (e) {
			table.ajax.reload();
		});
		$("#formSearch").on('submit', function (e) {
			e.preventDefault();
			table.ajax.reload();
		});

		jQuery.validator.addMethod("validateScript", function(value, element){
			return !(value.includes("script>") ||
							value.includes("script&gt;") ||
							value.includes("<?") ||
							value.includes("&lt;?"));
		}, "Vui lòng nhập đúng định dạng chữ");

		$(document).delegate("#update", "click", function () {
			var id = $(this).data("id");
			$('#modal-action-title').text("Chỉnh sửa");
			$.ajax({
                url: datas.routes.update,
				data: {
                    id: id
				},
				type: 'GET',
				dataType: 'JSON',
				success: function (data) {
                    if (data.status) {
                    $("#modal-action").modal('show');
					$("#btnSave").attr('data-url', datas.routes.update);
					$("#btnSave").attr('data-id', data.data.id);
					$('#phongban_name').val(data.data.phongban_name)
					CKEDITOR.instances['phongban_description'].setData(data.data.phongban_description);
                    }else {
                        toastr.error(data.message);
                    }
				},
				error: function (error) {
					console.log(error);
				}
			});
			
			
		});


        $("#btn-insert").on("click", function () {
            $.ajax({
                url: datas.routes.insert,
                type: "get",
                success: function (data) {
                    if (data.status) {
                        $('#modal-action-title').text("Thêm mới");
                        $('#phongban_name').val('');
                        CKEDITOR.instances['phongban_description'].setData('');
                        $("#modal-action").modal('show');
						$("#formAction")[0].reset();
						$("#btnSave").attr('data-url', datas.routes.insert);
                        } else {
                            toastr.error(data.message);
                        }
                },
                error: function () { console.log("Lỗi"); }
            })
            
		});

		$('#formAction').validate({
			rules: {
				
				phongban_name: {
					required: true,
					validateScript: true,
					maxlength: 150
				},
				
			},
			messages: {
				phongban_name:{
					required: "Tên không được trống !",
					maxlength: "Tên không quá 150 ký tự !"
				}
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
            submitHandler: function(e) {
				var url = $('#btnSave').attr('data-url');
				var formData = new FormData($("#formAction")[0]);
				formData.append('id', $("#btnSave").attr('data-id'));
				formData.append('phongban_description', CKEDITOR.instances['phongban_description'].getData());
                $.ajax({
                    		url: url,
                    		data: formData,
                    		type: 'POST',
                    		data: formData,
                            processData: false,
                            contentType: false,
                    		success: function (data) {
								if(data.status_validate === 1){
									alert(data.data_error);
								}else {
                    				$("#modal-action").modal('hide');
                    				toastr.success(data.name);
                    				table.ajax.reload();
								}
            
                    		},
                    		error: function (error) {
                    			console.log("Lỗi");
                    		}
                    	});
            }
			
		});


        // $('#formActionEdit').validate({
		// 	rules: {
				
		// 		phongban_name: {
		// 			required: true,
		// 			validateScript: true
		// 		},
				
		// 	},
		// 	messages: {
		// 		phongban_name:{
		// 			required: "Tên không được trống !"
		// 		}
		// 	},
		// 	errorElement: 'span',
		// 	errorPlacement: function (error, element) {
		// 		error.addClass('invalid-feedback');
		// 		element.closest('.form-group').append(error);
		// 	},
		// 	highlight: function (element, errorClass, validClass) {
		// 		$(element).addClass('is-invalid');
		// 	},
		// 	unhighlight: function (element, errorClass, validClass) {
		// 		$(element).removeClass('is-invalid');
		// 	},
        //     submitHandler: function(e) {
        //         var formData = new FormData($("#roomForm")[0]);
        //         formData.append('phongban_name', $('#phongban_name_edit').val());
        //         formData.append('phongban_description', CKEDITOR.instances['phongban_description_edit'].getData());
        //         formData.append('id', $("#btnSaveEdit").attr('data-id'));
        //         var url = $("#btnSaveEdit").attr('data-url');
        //         $.ajax({
        //             url: url,
        //             type: "POST",
        //             data: formData,
        //             processData: false,
        //             contentType: false,
        //             success: function (data) {
		// 				if(data.status_validate === 1){
		// 					alert(data.data_error);
		// 				}else {
		// 					$("#modal-action-edit").modal('hide');
		// 					toastr.success("Sửa thành công");
		// 					table.ajax.reload();
		// 				}
        //             },
        //             error: function (error) {
        //                 console.log(error);
        //             }
        //         });
        //     }
			
		// });

		//Xóa dữ liệu
        $(document).on('click', '#delete', function () {
            if (confirm("Bạn có chắc muốn xóa?")) {
                var id = $(this).data("id");
                $.ajax({
                    url: datas.routes.delete,
                    type: 'GET',
                    data: {
                        "id": id
                    },
                    success: function (response) {
                        if (response.status) {
                            table.ajax.reload();
                            toastr.success(response.message);
                        } else {
                            toastr.error(response.message);
                        }
                    },
                    error: function () { toastr.error("Không thể xóa!") }

                });
            }
        });
	
		
	}


}