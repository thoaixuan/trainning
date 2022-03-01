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
				className: "text-center",
			},
			{
				title: "Ngày bắt đầu",
				data: "time_start",
				name: "time_start",
				className: "text-center",
			},
			{
				title: "Ngày kết thúc",
				data: "time_end",
				name: "time_end",
				className: "text-center",
			},
			{
				title: "Mô tả",
				data: "projects_description",
				name: "projects_description",
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
					$('#projects_name_edit').val(data.data.projects_name);
					$('#userID_edit').val(data.data.userID);
					$('#serviceID_edit').val(data.data.serviceID);
					$('#time_start_edit').val(data.data.time_start),
					$('#time_end_edit').val(data.data.time_end),
					CKEDITOR.instances['projects_description_edit'].setData(data.data.projects_description)					
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
					maxlength:300
				},
				time_start: {
					required: true
				},
				time_end: {
					required: true
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
                    			projects_name: $('#projects_name').val(),
                    			userID: $('#userID').val(),
								serviceID: $('#serviceID').val(),
								time_start: $('#time_start').val(),
								time_end: $('#time_end').val(),
								projects_description: CKEDITOR.instances['projects_description'].getData()
                    		},
                    		type: 'POST',
                    		dataType: 'JSON',
                    		success: function (data) {
                    				console.log(data);
                    				$("#modal-action-add").modal('hide');
                    				toastr.success("Thêm thành công");
                    				table.ajax.reload();
                    		},
                    		error: function (error) {
                    			console.log("Lỗi");
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
					maxlength:300
				},
				time_start: {
					required: true
				},
				time_end: {
					required: true
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
                        projects_name: $('#projects_name_edit').val(),
                        userID: $('#userID_edit').val(),
						serviceID: $('#serviceID_edit').val(),
						time_start: $('#time_start_edit').val(),
						time_end: $('#time_end_edit').val(),
						projects_description: CKEDITOR.instances['projects_description_edit'].getData()
                    },
                    type: 'POST',
                    dataType: 'JSON',
                    success: function (data) {
                        $("#modal-action-edit").modal('hide');
                        toastr.success("Sửa thành công");
                        table.ajax.reload();
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