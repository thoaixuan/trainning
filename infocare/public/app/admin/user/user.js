function user() {
	this.datas = null;
	var datas = null;
	this.init = function () {
		datas = this.datas;
		var me = this;
		me.datatables();
	}
	this.datatables = function () {
		var me = this;
		var table = $("#table-users").DataTable({
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
				title: "Tên KH",
				data: "full_name",
				name: "full_name",
				className: "",
				
			},
			{
				title: "Email",
				data: "email",
				name: "email",
				className: "",
			},
			{
				title: "Địa chỉ",
				data: "address",
				name: "address",
				className: "text-center",
			},
            {
				title: "Số điện thoại",
				data: "phone_number",
				name: "phone_number",
				className: "text-center",
			},
            {
				title: "Ghi chú",
				data: "note",
				name: "note",
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
				title: "Từ khóa",
				data: "keyword",
				name: "keyword",
				className: "text-center",
			},
			{
				title: "Thao tác",
				data: "id",
				name: "id",
				className: "text-center",
				bSortable: false,
				render: function (data, type, row, meta) {
					if(row.is_admin == 0) {
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
					return '<i class="fas fa-ban"></i>';
					
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
		
        $("#btn-insert").on("click", function () {
            $('#modal-action-title').text("Thêm mới");
			$('#pages_name').val('');
			$('#pages_content').val('');
			$("#modal-action-add").modal('show');
			
		});
		jQuery.validator.addMethod("validateScript", function(value, element){
			return !(value.includes("script>") ||
							value.includes("script&gt;") ||
							value.includes("<?") ||
							value.includes("&lt;?"));
		}, "Vui lòng nhập đúng định dạng chữ");

		jQuery.validator.addMethod("validatePhone", function(value, element){
			if (/((09|03|07|08|05)+([0-9]{8})\b)/g.test(value)) {
				return true;  
			} else {
				return false;
			};
		}, "Vui lòng nhập đúng định dạng số điện thoại"); 

		jQuery.validator.addMethod("validatePassword", function(value, element){
			if (/^(?=.*\d)(?=.*[a-zA-Z]).{8,}$/.test(value)) {
				return true;  
			} else {
				return false;
			};
		}, "Password phải bao gồm chữ và số"); 
		
		$('#formActionAdd').validate({
			rules: {
				full_name: {
					required: true,
					validateScript: true
				},
				email: {
					required: true,
					validateScript: true
				},
				password: {
					required: true,
					minlength: 8,
					validatePassword: true
				},
				address: {
					required: true,
					validateScript: true
				},
				phone_number: {
					required: true,
                    validatePhone: true,
                    minlength: 10,
                    maxlength: 10,
				},
				keyword: {
					required: true,
					validateScript: true
				}
				
			},
			messages: {
				full_name:{
					required: "Tên khách hàng/công ty không được trống !"
				},
				email:{
					required: "Email không được trống !"
				},
				address:{
					required: "Địa chỉ không được trống !"
				},
				phone_number:{
					required: "Số điện thoại không được trống !",
                    minlength: "Vui lòng nhập đủ 10 ký tự",
                    maxlength: "Vui lòng nhập tối thiểu 10 ký tự"
				},
				keyword:{
					required: "Từ khóa không được trống !"
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
                    			full_name: $('#full_name').val(),
								email: $('#email').val(),
								password: $('#password').val(),
								address: $('#address').val(),
								phone_number: $('#phone_number').val(),
								keyword: $('#keyword').val(),
								note: CKEDITOR.instances['note'].getData()
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
				full_name: {
					required: true,
					validateScript: true
				},
				email: {
					required: true
				},
				address: {
					required: true,
					validateScript: true
				},
				phone_number: {
					required: true,
                    validatePhone: true,
                    minlength: 10,
                    maxlength: 10,
				},
				keyword: {
					required: true,
					validateScript: true
				}
				
			},
			messages: {
				full_name:{
					required: "Tên khách hàng/công ty không được trống !"
				},
				email:{
					required: "Email không được trống !"
				},
				address:{
					required: "Địa chỉ không được trống !"
				},
				phone_number:{
					required: "Số điện thoại không được trống !",
                    minlength: "Vui lòng nhập đủ 10 ký tự",
                    maxlength: "Vui lòng nhập tối thiểu 10 ký tự"
				},
				keyword:{
					required: "Từ khóa không được trống !"
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
						full_name: $('#full_name_edit').val(),
						email: $('#email_edit').val(),
						address: $('#address_edit').val(),
						phone_number: $('#phone_number_edit').val(),
						keyword: $('#keyword_edit').val(),
						note: CKEDITOR.instances['note_edit'].getData()
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
					$('#users_note_view').html(data.data.note);
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
					$('#full_name_edit').val(data.data.full_name);
					$('#email_edit').val(data.data.email);
					$('#address_edit').val(data.data.address);
					$('#phone_number_edit').val(data.data.phone_number);
					$('#keyword_edit').val(data.data.keyword);
					CKEDITOR.instances['note_edit'].setData(data.data.note);
				},
				error: function (error) {
					console.log(error);
				}
			});
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