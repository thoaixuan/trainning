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
				data: "services_description",
				name: "service_description",
				className: "",
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

		$(document).delegate(".btn-delete", "click", function () {
			var id = $(this).val();
			$('#modal-text-delete').text(" Bạn có muốn xóa không ?");
			$("#onDelete").attr('value', id);
			$("#modal-delete").modal('show');
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
					$('#services_name_edit').val(data.data.services_name)
					CKEDITOR.instances['services_description_edit'].setData(data.data.services_description);
					
				},
				error: function (error) {
					console.log(error);
				}
			});
			
			
		});
		$("#btn-insert").on("click", function () {
			// $("#btnSave").attr('data-url', datas.routes.insert);
            $('#modal-action-title').text("Thêm mới");
			$('#services_name').val('');
			$('#services_description').val('');
			$("#modal-action").modal('show');
			
		});

		$("#btnSaveEdit").on("click", function () {
			console.log('hi');
			
		});
		$('#btnSave').on("click",function(){
			$.ajax({
				url: datas.routes.insert,
				data: {
					services_name: $('#services_name').val(),
					services_description: CKEDITOR.instances['services_description'].getData()
				},
				type: 'POST',
				dataType: 'JSON',
				success: function (data) {
						console.log(data);
						$("#modal-action").modal('hide');
						toastr.success("Thêm thành công");
						table.ajax.reload();

				},
				error: function (error) {
					console.log("Lỗi");
				}
			});
		});
		$('#formAction').validate({
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
			}
			
		});
		$("#formAction").on('submit', function (e) {
			e.preventDefault();
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