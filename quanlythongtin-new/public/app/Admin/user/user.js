function changeDate(data){
	if(data==null||data==""){
		return "";
	}else{
		return moment(data, "YYYY-MM-DD").format('DD/MM/YYYY')
	}
}
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
				render: function (data, type, row, meta) {
					return changeDate(data);
				}
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
				render: function (data, type, row, meta) {
					return changeDate(data);
				}
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
						return '<button class="badge rounded-pill bg-default badge-sm me-1 btn-view-description" value="'+ row.id + '">Xem thêm</button>';
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
						class: 'btn btn-sm btn-primary badge btn-update',
						value: row.id,
						title: 'update',
						icon: 'fa fa-edit',
						color: 'primary'
					},
					{
						class: 'btn btn-sm btn-primary badge btn-delete',
						value: row.id,
						title: 'delete',
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
			var id = $(this).data("id");
			$('#modal-action-title-edit').text("Chỉnh sửa");
			$.ajax({
				url: datas.routes.update,
				data: {
					id: id
				},
				type: 'GET',
				dataType: 'JSON',
				success: function (data) {
					if (data.status) {
					$("#modal-action-edit").modal('show');
					$("#btnSaveEdit").attr('data-url', datas.routes.update);
					$("#btnSaveEdit").attr('data-id', id);
					$('#name_edit').val(data.data.name);
					$('#phone_number_edit').val(data.data.phone_number);
					$('#date_of_birth_edit').val(data.data.date_of_birth);
					$('#date_start_edit').val(data.data.date_start);
					$('#email_edit').val(data.data.email);
					$('#status_edit').val(data.data.status);
					$('#phongban_list_edit').val(data.data.id_phongban);
					$('id_permissions_edit').val(data.data.id_permissions);
					CKEDITOR.instances['description_edit'].setData(data.data.description);
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
					$('#name').val('');
					CKEDITOR.instances['description'].setData('');
					$("#modal-action-add").modal('show');
				} else {
					toastr.error(data.message);
				}
			},
			error: function () { console.log("Lỗi"); }
			});
		});

		$('#formActionAdd').validate({
			rules: {
				name: {
					required: true,
					validateScript: true,
					maxlength: 150
				},
				email: {
					required: true,
					validateScript: true,
					maxlength: 150
				},
				password: {
					required: true,
					minlength: 8,
					maxlength: 150,
					validatePassword: true,
					validateScript: true
				},
				phone_number: {
					required: true,
                    validatePhone: true,
                    minlength: 10,
                    maxlength: 10,
				},
				date_of_birth: {
					required: true
				},
				date_start: {
					required: true
				},
				img_before: {
					required: true
				},
				img_after: {
					required: true
				},
				
			},
			messages: {
				name:{
					required: "Tên không được trống !",
					maxlength: "Tên không quá 150 ký tự !"
				},
				email:{
					required: "Email không được trống !",
					maxlength: "Tên không quá 150 ký tự !"
				},
				password:{
					required: "Password không được trống !",
					minlength: "Password ít nhất 8 kí tự !"
				},
				phone_number:{
					required: "Số điện thoại không được trống !",
                    minlength: "Vui lòng nhập đủ 10 ký tự",
                    maxlength: "Vui lòng nhập tối thiểu 10 ký tự"
				},
				date_of_birth:{
					required: "Vui lòng chọn ngày sinh !"
				},
				date_start:{
					required: "Vui lòng chọn ngày vào làm !"
				},
				img_before: {
					required: "Vui lòng chọn ảnh chứng minh mặt trước !"
				},
				img_after: {
					required: "Vui lòng chọn ảnh chứng minh mặt sau !"
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
				formData.append('id_phongban',$('#phongban_list').val());
				formData.append('date_of_birth',$('#date_of_birth').val());
				formData.append('date_start',$('#date_start').val());
				formData.append('email',$('#email').val());
				formData.append('password',$('#password').val());
				formData.append('id_permissions',$('#id_permissions').val());
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
					validateScript: true,
					maxlength: 150
				},
				email: {
					required: true,
					validateScript: true,
					maxlength: 150
				},
				password: {
					required: true,
					minlength: 8,
					maxlength: 150,
					validatePassword: true,
					validateScript: true
				},
				phone_number: {
					required: true,
                    validatePhone: true,
                    minlength: 10,
                    maxlength: 10,
				},
			},
			messages: {
				name:{
					required: "Tên không được trống !",
					maxlength: "Tên không quá 150 ký tự !"
				},
				email:{
					required: "Email không được trống !",
					maxlength: "Tên không quá 150 ký tự !"
				},
				password:{
					required: "Password không được trống !",
					minlength: "Password ít nhất 8 kí tự !",
					maxlength: "Tên không quá 150 ký tự !"
				},
				phone_number:{
					required: "Số điện thoại không được trống !",
                    minlength: "Vui lòng nhập đủ 10 ký tự",
                    maxlength: "Vui lòng nhập tối thiểu 10 ký tự"
				},
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
				formData.append('id',$("#btnSaveEdit").attr('data-id'));
				formData.append('name',$('#name_edit').val());
				formData.append('phone_number',$('#phone_number_edit').val());
				formData.append('gender',$('#gender_edit').val());
				formData.append('id_phongban',$('#phongban_list_edit').val());
				formData.append('date_of_birth',$('#date_of_birth_edit').val());
				formData.append('date_start',$('#date_start_edit').val());
				formData.append('email',$('#email_edit').val());
				formData.append('id_permissions',$('#id_permissions_edit').val());
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

		//Loadding dữ liệu chức vụ
        $.ajax({
            type: "get",
            url: datas.routes.get_permission,
            dataType: 'JSON',
            success: function(response) {
                var data = response.data
                var list = document.getElementById("id_permissions");
                for (var i in data) {
					if(data[i].id !== 1){
						list.innerHTML += "<option value='" + data[i].id + "'>" + data[i].per_name +"</option>";
					}
                }
            }
        });

		//Loadding dữ liệu chức vụ edit
        $.ajax({
            type: "get",
            url: datas.routes.get_permission,
            dataType: 'JSON',
            success: function(response) {
                var data = response.data
                var list = document.getElementById("id_permissions_edit");
                for (var i in data) {
					if(data[i].id !== 1){
						list.innerHTML += "<option value='" + data[i].id + "'>" + data[i].per_name +"</option>";
					}
                }
            }
        });

		$(document).ready(function () {
			$('#gender').select2({
			  dropdownParent: $('#modal-action-add')
			});
			$('#phongban_list').select2({
				dropdownParent: $('#modal-action-add')
			  });
			$('#id_permissions').select2({
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
			$('#id_permissions_edit').select2({
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