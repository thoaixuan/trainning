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
		var table = $("#table-user").DataTable({
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
				title: "Tên",
				data: "name",
				name: "name",
				className: "",
				
			},
            {
				title: "Ngày sinh",
				data: "date_of_birth",
				name: "date_of_birth",
				className: "",
			},
            {
				title: "Giới tính",
				data: "gender",
				name: "gender",
				className: "",
				render: function (data, type, row, meta) {
					switch (data) {
						case 0:
							return "Nam";
						case 1:
							return "Nữ";
						default:
							return "Chưa có dữ liệu";
					}
				}
			},
            {
				title: "Ngày bắt đầu làm",
				data: "date_start",
				name: "date_start",
				className: "",
			},
			{
				title: "Số điện thoại",
				data: "phone_number",
				name: "phone_number",
				className: "",
			},
			{
				title: "Trạng thái",
				data: "status",
				name: "status",
				className: "",
				render: function (data, type, row, meta) {
					switch (data) {
						case 0:
							return "Đang làm việc";
						case 1:
							return "Nghỉ việc";
						case 2:
							return "Đình chỉ";
						default:
							return "Chưa có dữ liệu";
					}
				}
			},
            {
				title: "Xem chi tiết",
				data: "id",
				name: "id",
				className: "text-center",
				render: function (data, type, row, meta) {
					if (data === null) {
						return 'Chưa có dữ liệu';
					}else{
						return '<button class="badge badge-light btn-view-description" value="'+ row.id + '">Xem thêm</button>';
					}

				}
			},
			{
				title: "Thao tác",
				data: "id",
				name: "id",
				className: "text-center",
				bSortable: false,
				render: function (data, type, row, meta) {
					return renderAction([ {
						class: 'btn-update',
						value: row.id,
						title: 'Chỉnh Sửa',
						icon: 'fas fa-edit',
						color: 'primary'
					},
					{
						class: 'btn-delete',
						value: row.id,
						title: 'Xóa',
						icon: 'fa fa-trash',
						color: 'danger'
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

		$(document).delegate(".btn-view-description", "click", function () {
			var id = $(this).val();
			$('#modal-action-title-view').text("Xem chi tiết");
			$("#modal-action-view-description").modal('show');
			$.ajax({
				url: datas.routes.update,
				data: {
					id: id
				},
				type: 'GET',
				dataType: 'JSON',
				success: function (data) {
					$('#name_detail').html(data.data.name);
					$('#email_detail').html(data.data.email);
					$('#description_detail').html(data.data.description);
					$('#img_before_detail').html('<img src="'+datas.routes.root+'/uploads/'+data.data.img_before+'" class="img-fluid"/>');
					$('#img_after_detail').html('<img src="'+datas.routes.root+'/uploads/'+data.data.img_after+'" class="img-fluid"/>');
				},
				error: function (error) {
					console.log(error);
				}
			});
		});


		$(document).delegate(".btn-update", "click", function () {
			var id = $(this).val();
			$('#modal-action-title-edit').text("Chỉnh sửa");
			$("#modal-action-edit").modal('show');
			$.ajax({
				url: datas.routes.update,
				data: {
					id: id
				},
				type: 'GET',
				dataType: 'JSON',
				success: function (data) {
					console.log(data.data);
					$("#btnSaveEdit").attr('data-url', datas.routes.update);
					$("#btnSaveEdit").attr('data-id', data.data.id);
					$('#phongban_name_edit').val(data.data.phongban_name)
					CKEDITOR.instances['phongban_description_edit'].setData(data.data.phongban_description);
					
				},
				error: function (error) {
					console.log(error);
				}
			});
			
			
		});


        $("#btn-insert").on("click", function () {
            $('#modal-action-title').text("Thêm mới");
			$('#name').val('');
			CKEDITOR.instances['description'].setData('');
			$("#modal-action-add").modal('show');
			
		});

		$('#formActionAdd').validate({
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
                $.ajax({
                    		url: datas.routes.insert,
                    		data: {
                    			phongban_name: $('#phongban_name').val(),
                    			phongban_description: CKEDITOR.instances['phongban_description'].getData()
                    		},
                    		type: 'POST',
                    		dataType: 'JSON',
                    		success: function (data) {
								if(data.status_validate === 1){
									alert(data.data_error);
								}else {
                    				$("#modal-action-add").modal('hide');
                    				toastr.success("Thêm thành công");
                    				table.ajax.reload();
								}
            
                    		},
                    		error: function (error) {
                    			console.log("Lỗi");
                    		}
                    	});
            }
			
		});


        $('#formActionEdit').validate({
			rules: {
				
				phongban_name: {
					required: true,
					validateScript: true
				},
				
			},
			messages: {
				phongban_name:{
					required: "Tên không được trống !"
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
                $.ajax({
                    url: datas.routes.update,
                    data: {
                        id: $("#btnSaveEdit").attr('data-id'),
                        phongban_name: $('#phongban_name_edit').val(),
                        phongban_description: CKEDITOR.instances['phongban_description_edit'].getData()
                    },
                    type: 'POST',
                    dataType: 'JSON',
                    success: function (data) {
						if(data.status_validate === 1){
							alert(data.data_error);
						}else {
							$("#modal-action-edit").modal('hide');
							toastr.success("Sửa thành công");
							table.ajax.reload();
						}
                    },
                    error: function (error) {
                        console.log(error);
                    }
                });
            }
			
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
			var result = AjaxDelete({
				id: id
			}, datas.routes.delete);
			if (result) {
				table.ajax.reload();
				$("#modal-delete").modal('hide');
			} else {
				$("#modal-delete").modal('hide');
			}
		});

		$.ajax({
			type: "get",
			url: datas.routes.get_phongban,
			dataType: 'JSON',
			success: function (response) {
				console.log(response);
				$.each(response.data, function (key, item) {
					$('#phongban_list').append('<option value=' + item.id + '>' + item.phongban_name + '</option');
				});
			}
		});
	
		
	}
}