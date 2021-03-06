function handleDate(date){
	var d1 = new Date();
	var d2 = new Date(date);
	return d1<d2;
}
function changeDate(data){
	if(data==null||data==""){
		return "";
	}else{
		return moment(data, "YYYY-MM-DD").format('DD/MM/YYYY')
	}
}
function project() {
	this.datas = null;
	var datas = null;
	this.init = function () {
		datas = this.datas;
		var me = this;
		me.datatables();
	}
	this.datatables = function () {
		var me = this;
		var table = $("#table-projects").DataTable({
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
				title: "Khách hàng/Công ty",
				data: "full_name",
				name: "full_name",
				className: "",
				
			},
			{
				title: "Dịch vụ",
				data: "services_name",
				name: "services_name",
				className: "",
			},
			{
				title: "Tên dự án",
				data: "projects_name",
				name: "projects_name",
				className: "",
			},
			{
				title: "Ngày bắt đầu",
				data: "time_start",
				name: "time_start",
				className: "",
				render: function (data, type, row, meta) {
					return changeDate(data);
				}
			},
			{
				title: "Ngày kết thúc",
				data: "time_end",
				name: "time_end",
				className: "",
				render: function (data, type, row, meta) {
					return changeDate(data);
				}
			},
			{
				title: "Trạng Thái",
				data: "time_end",
				name: "time_end",
				className: "",
				render: function (data, type, row, meta) {
					if(data == null){
						return data;
					}else{
						if(handleDate(data)){
							return 'Còn Hiệu Lực';
						}else{
							return '<span class="text-danger">Hết Hiệu Lực</span>';
						}
					}
				}
			},
			{
				title: "Mô tả",
				data: "id",
				name: "id",
				className: "",
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
				className: "",
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
					$('#projects_description_view').html(data.data.projects_description);
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
					console.log(data);
					$("#btnSaveEdit").attr('data-url', datas.routes.update);
					$("#btnSaveEdit").attr('data-id', data.data.id);
					$('#projects_name_edit').val(data.data.projects_name);
					$('#userID_edit').val(data.data.userID);
					$('#serviceID_edit').val(data.data.serviceID);
					$('#time_start_edit').val(data.data.time_start),
					$('#time_end_edit').val(data.data.time_end),
					CKEDITOR.instances['projects_description_edit'].setData(data.data.projects_description),
					$('#projects_file_old').val(data.data.projects_file)
				},
				error: function (error) {
					console.log(error);
				}
			});
			
			
		});


        $("#btn-insert").on("click", function () {
            $('#modal-action-title').text("Thêm mới");
			$('#projects_name').val('');
			$('#time_start').val('');
			$('#time_end').val('');
			$('#projects_file').val('');
			CKEDITOR.instances['projects_description'].setData('');
			$("#modal-action-add").modal('show');
			
		});

		$('#formActionAdd').validate({
			rules: {
				serviceID:{
					required: true
				},
				userID:{
					required: true
				},
				projects_name: {
					required: true,
					maxlength:150,
					validateScript: true
				},
				time_start: {
					required: true
				},
				time_end: {
					required: true
				},
				projects_file: {
					required: false,
            		extension: "jpeg|png|jpg|gif|pdf|doc|docx|xls|xlxs|zip|rar|txt"
				}
			},
			messages: {
				serviceID:{
					required: "Vui lòng chọn dịch vụ!"
				},
				userID:{
					required: "Vui lòng chọn Công Ty!"
				},
				projects_name: {
					required: "Vui lòng nhập tên dự án !",
					maxlength: "Tên dự án không quá 150 ký tự !"
				},
				time_start: {
					required: "Vui lòng chọn ngày bắt đầu !"
				},
				time_end: {
					required: "Vui lòng chọn ngày kết thúc !"
				},
				projects_file: {
					extension: "Vui lòng chọn file jpeg,png,jpg,gif,pdf,doc,docx,xls,xlxs,zip,rar,txt"
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
				let input_file = $('#projects_file')[0].files[0];
				let formData = new FormData();
				formData.append('projects_name',$('#projects_name').val());
				formData.append('userID',$('#userID').val());
				formData.append('serviceID',$('#serviceID').val());
				formData.append('time_start',$('#time_start').val());
				formData.append('time_end', $('#time_end').val());
				formData.append('projects_file',input_file ? input_file : null);
				formData.append('projects_description', CKEDITOR.instances['projects_description'].getData());
                $.ajax({
                    		url: datas.routes.insert,
							data: formData,
                    		type: 'POST',
							contentType: false,
							processData: false,
                    		success: function (data) {
								console.log(data);
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
								console.log(error);
                    		}
                    	});
            }
			
		});
        
        $('#formActionEdit').validate({
			rules: {
				serviceID:{
					required: true
				},
				userID:{
					required: true
				},
				projects_name: {
					required: true,
					maxlength:300,
					validateScript: true
				},
				time_start: {
					required: true
				},
				time_end: {
					required: true
				},
				projects_file: {
					required: false,
            		extension: "jpeg|png|jpg|gif|pdf|doc|docx|xls|xlxs|zip|rar|txt"
				}
			},
			messages: {
				serviceID:{
					required: "Vui lòng chọn dịch vụ!"
				},
				userID:{
					required: "Vui lòng chọn Công Ty!"
				},
				projects_name: {
					required: "Vui lòng nhập tên dự án !",
					maxlength: "Tên dự án không quá 300 ký tự !"
				},
				time_start: {
					required: "Vui lòng chọn ngày bắt đầu !"
				},
				time_end: {
					required: "Vui lòng chọn ngày kết thúc !"
				},
				projects_file: {
					extension: "Vui lòng chọn file jpeg,png,jpg,gif,pdf,doc,docx,xls,xlxs,zip,rar,txt"
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
				let input_file = $('#projects_file_edit')[0].files[0];
				let file_old = $('#projects_file_old').val();
				console.log(input_file);
				let formData = new FormData();
				formData.append('id',$("#btnSaveEdit").attr('data-id'));
				formData.append('projects_name',$('#projects_name_edit').val());
				formData.append('userID',$('#userID_edit').val());
				formData.append('serviceID',$('#serviceID_edit').val());
				formData.append('time_start',$('#time_start_edit').val());
				formData.append('time_end', $('#time_end_edit').val());
				if(input_file != null){
					formData.append('projects_file',input_file);
				}else {
					formData.append('projects_file_old',file_old);
				}
				formData.append('projects_description', CKEDITOR.instances['projects_description_edit'].getData());
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
	
		
	}


}