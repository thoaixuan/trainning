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
				data: "userID",
				name: "userID",
				className: "text-center",
				render: function (data, type, row, meta) {
					if (data === null) {
						return 'Chưa có dữ liệu';
					}else{
						return '<button class="badge badge-light btn-view-description" value="'+ row.userID + '">Xem thêm</button>';
					}

				}
			},
			{
				title: "Thao tác",
				data: "userID",
				name: "userID",
				className: "text-center",
				bSortable: false,
				render: function (data, type, row, meta) {
					return renderAction([ {
						class: 'btn-update',
						value: row.userID,
						idGroup: row.idGroup,
						title: 'Chỉnh Sửa',
						icon: 'fas fa-edit',
						color: 'primary'
					},
					{
						class: 'btn-delete',
						value: row.userID,
						idGroup: row.idGroup,
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
					console.log(data);
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
			var idGroup = $(this).attr('data-id-group');
			console.log(idGroup);
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
					$('#group_id_edit').val(idGroup);
					$("#btnSaveEdit").attr('data-url', datas.routes.update);
					$("#btnSaveEdit").attr('data-id', id);
					$('#name_edit').val(data.data.name);
					$('#phone_number_edit').val(data.data.phone_number);
					$('#date_of_birth_edit').val(data.data.date_of_birth);
					$('#date_start_edit').val(data.data.date_start);
					$('#email_edit').val(data.data.email);
					$('#status_edit').val(data.data.status);
					$('#phongban_list_edit').val(data.data.phongban_id);
					$('position_id_edit').val(data.data.position_id);
					CKEDITOR.instances['description_edit'].setData(data.data.description);
					
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
				let img_before = $('#img_before')[0].files[0];
				let img_after = $('#img_after')[0].files[0];
				let formData = new FormData();
				formData.append('name',$('#name').val());
				formData.append('phone_number',$('#phone_number').val());
				formData.append('gender',$('#gender').val());
				formData.append('phongban_id',$('#phongban_list').val());
				formData.append('date_of_birth',$('#date_of_birth').val());
				formData.append('date_start',$('#date_start').val());
				formData.append('email',$('#email').val());
				formData.append('password',$('#password').val());
				formData.append('position_id',$('#position_id').val());
				formData.append('status',$('#status').val());
				formData.append('description',CKEDITOR.instances['description'].getData());
				formData.append('img_before',img_before ? img_before : null);
				formData.append('img_after',img_after ? img_after : null);
				
                $.ajax({
                    		url: datas.routes.insert,
                    		data: formData,
                    		type: 'POST',
                    		contentType: false,
							processData: false,
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
				
				name: {
					required: true,
					validateScript: true
				},
				
			},
			messages: {
				name:{
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
				let img_before = $('#img_before_edit')[0].files[0];
				let img_after = $('#img_after_edit')[0].files[0];
				let formData = new FormData();
				formData.append('group_id',$("#btnSaveEdit").attr('data-id-group'));
				formData.append('id',$("#btnSaveEdit").attr('data-id'));
				formData.append('name',$('#name_edit').val());
				formData.append('phone_number',$('#phone_number_edit').val());
				formData.append('gender',$('#gender_edit').val());
				formData.append('phongban_id',$('#phongban_list_edit').val());
				formData.append('date_of_birth',$('#date_of_birth_edit').val());
				formData.append('date_start',$('#date_start_edit').val());
				formData.append('email',$('#email_edit').val());
				formData.append('position_id',$('#position_id_edit').val());
				formData.append('status',$('#status_edit').val());
				formData.append('description',CKEDITOR.instances['description_edit'].getData());
				formData.append('img_before',img_before ? img_before : null);
				formData.append('img_after',img_after ? img_after : null);
                $.ajax({
                    url: datas.routes.update,
                    data: formData,
                    type: 'POST',
                    contentType: false,
					processData: false,
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
				$.each(response.data, function (key, item) {
					$('#phongban_list').append('<option value=' + item.id + '>' + item.phongban_name + '</option');
				});
			}
		});

		$(document).ready(function () {
			$('#gender').select2({
			  dropdownParent: $('#modal-action-add')
			});
			$('#phongban_list').select2({
				dropdownParent: $('#modal-action-add')
			  });
			$('#position_id').select2({
				dropdownParent: $('#modal-action-add')
			});
			$('#status').select2({
				dropdownParent: $('#modal-action-add')
			});

			$('#gender_edit').select2({
			  dropdownParent: $('#modal-action-edit')
			});
			$('#phongban_list_edit').select2({
				dropdownParent: $('#modal-action-edit')
			  });
			$('#position_id_edit').select2({
				dropdownParent: $('#modal-action-edit')
			});
			$('#status_edit').select2({
				dropdownParent: $('#modal-action-edit')
			});
		  });
		//export pdf
		$(document).on('click', '#userExportPDF', function () {
			html2canvas(document.querySelector("#table-user")).then(canvas => {
				document.body.appendChild(canvas);
				var data = canvas.toDataURL();
				var docDefinition = {
					content: [{
						image: data,
						width: 500
					}]
				};
				pdfMake.createPdf(docDefinition).download("user-info.pdf");
			});

		});
		
	}
}