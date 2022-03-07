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
		var table = $("#table-pages").DataTable({
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
				title: "Tên Trang",
				data: "pages_name",
				name: "pages_name",
				className: "",
				
			},
			{
				title: "Đường dẫn",
				data: "pages_slug",
				name: "pages_slug",
				className: "",
			},
			{
				title: "Mô tả",
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
					$('#pages_description_view').html(data.data.pages_content);
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
					$('#pages_name_edit').val(data.data.pages_name)
					CKEDITOR.instances['pages_content_edit'].setData(data.data.pages_content);
					
				},
				error: function (error) {
					console.log(error);
				}
			});
			
			
		});


        $("#btn-insert").on("click", function () {
            $('#modal-action-title').text("Thêm mới");
			$('#pages_name').val('');
			CKEDITOR.instances['pages_content'].setData('');
			$('#pages_content').val('');
			$("#modal-action-add").modal('show');
			
		});

		$('#formActionAdd').validate({
			rules: {
				
				pages_name: {
					required: true,
					validateScript: true,
					maxlength: 150
				},
				
			},
			messages: {
				pages_name:{
					required: "Tên trang không được trống !",
					maxlength: "Tên trang không quá 150 ký tự !"
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
                    			pages_name: $('#pages_name').val(),
                    			pages_content: CKEDITOR.instances['pages_content'].getData()
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
				
				pages_name: {
					required: true,
					validateScript: true
				},
				
			},
			messages: {
				pages_name:{
					required: "Tên trang không được trống !"
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
                        pages_name: $('#pages_name_edit').val(),
                        pages_content: CKEDITOR.instances['pages_content_edit'].getData()
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