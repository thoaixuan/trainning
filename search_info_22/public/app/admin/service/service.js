function service() {
	this.datas = null;
	var datas = null;
	this.init = function () {
		datas = this.datas;
		var me = this;
		me.datatables();
	}
	this.datatables = function () {
		var me = this;
		var table = $("#table-services").DataTable({
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
				title: "Tên Dịch Vụ",
				data: "services_name",
				name: "services_name",
				className: "",
				
			},
			{
				title: "Mô Tả",
				data: "id",
				name: "id",
				className: "text-center",
				render: function (data, type, row, meta) {
					if (data === null) {
						return 'Chưa có dữ liệu';
					}else{
						return '<button class="badge badge-light btn-view-description" value="'+ row.id + '">Xem chi tiết</button>';
					}

				}
			},
			{
				title: "Đường dẫn",
				data: "services_slug",
				name: "services_slug",
				className: "text-center",
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
						title: 'Sửa',
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
			$('#modal-action-title-view').text("Chi tiết mô tả");
			$("#modal-action-view-description").modal('show');
			$.ajax({
				url: datas.routes.update,
				data: {
					id: id
				},
				type: 'GET',
				dataType: 'JSON',
				success: function (data) {
					$('#services_description_view').html(data.data.services_description);
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
					$("#btnSaveEdit").attr('data-url', datas.routes.update);
					$("#btnSaveEdit").attr('data-id', data.data.id);
					$('#services_name_edit').val(data.data.services_name)
					CKEDITOR.instances['services_description_edit'].setData(data.data.services_description);
					
				},
				error: function (error) {
					console.log(error);
				}
			});
			
			
		});


		$("#btn-insert").on("click", function () {
            $('#modal-action-title').text("Thêm mới");
			$('#services_name').val('');
			$('#services_description').val('');
			$("#modal-action-add").modal('show');
			
		});

		$('#formActionAdd').validate({
			rules: {
				
				services_name: {
					required: true,
					maxlength: 150,
					validateScript: true
				},
				
			},
			messages: {
				services_name:{
					required: "Tên dịch vụ không được trống !",
					maxlength:"Tên dịch vụ không được quá 150 ký tự !"
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
						services_name: $('#services_name').val(),
						services_description: CKEDITOR.instances['services_description'].getData()
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
				
				services_name: {
					required: true,
					maxlength: 150
				},
				
			},
			messages: {
				services_name:{
					required: "Tên dịch vụ không được trống !",
					maxlength:"Tên dịch vụ không được quá 150 ký tự !"
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
						services_name: $('#services_name_edit').val(),
						services_description: CKEDITOR.instances['services_description_edit'].getData()
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
	
		
	}


}