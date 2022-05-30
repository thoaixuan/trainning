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
		var table = $("#table-product").DataTable({
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
				title: "Giá tiền",
				data: "price",
				name: "price",
				className: "",
                render: function (data, type, row, meta) {
					return formatVND(data)+"đ";
                }
			},
            {
				title: "Số lượng",
				data: "qty",
				name: "qty",
				className: "",
			},
            {
				title: "Mô tả",
				data: "description",
				name: "description",
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

		$(document).delegate(".btn-update", "click", function () {
			var id = $(this).val();
			$('#modal-action-title').text("Chỉnh sửa");
			$("#modal-action").modal('show');
			$.ajax({
				url: datas.routes.update,
				data: {
					id: id
				},
				type: 'GET',
				dataType: 'JSON',
				success: function (data) {
					console.log(data.data);
					$("#btnSave").attr('data-url', datas.routes.update);
					$("#btnSave").attr('data-id', data.data.id);
					$('#name').val(data.data.name);
                    $('#price').val(data.data.price);
                    $('#qty').val(data.data.qty);
					CKEDITOR.instances['description'].setData(data.data.description);
					
				},
				error: function (error) {
					console.log(error);
				}
			});
			
			
		});


        $("#btn-insert").on("click", function () {
            $('#modal-action-title').text("Thêm mới");
			$('#name').val('');
            $('#price').val('');
            $('#qty').val('');
			CKEDITOR.instances['description'].setData('');
            $("#btnSave").attr('data-url', datas.routes.insert);
			$("#modal-action").modal('show');
			
		});

		$('#formAction').validate({
			rules: {
				
				name: {
					required: true,
					validateScript: true,
					maxlength: 150
				},
                price: {
					required: true,
					maxlength: 150
				},
                qty: {
					required: true,
					maxlength: 150
				},
				
			},
			messages: {
				name:{
					required: "Tên không được trống !",
					maxlength: "Tên không quá 150 ký tự !"
				},
                price:{
					required: "Giá không được trống !",
					maxlength: "Tên không quá 150 ký tự !"
				},
                qty:{
					required: "Số lượng không được trống !",
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
				formData.append('description', CKEDITOR.instances['description'].getData());
                $.ajax({
                    		url: url,
                    		data: formData,
                    		type: 'POST',
                    		processData: false,
                            contentType: false,
                    		success: function (data) {
								if(data.status_validate === 1){
									alert(data.data_error);
								}else {
                    				$("#modal-action").modal('hide');
                    				toastr.success(data.message);
                    				table.ajax.reload();
								}
            
                    		},
                    		error: function (error) {
                    			console.log("Lỗi");
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