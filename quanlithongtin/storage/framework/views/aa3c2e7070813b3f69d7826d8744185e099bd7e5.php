
<div class="modal fade" id="modal-action-add" >
	<div class="modal-dialog" role="document">
		<form id="formActionAdd" onsubmit="return false">
		<div class="modal-content">
		<div class="modal-header">
		<h5 class="modal-title" id="modal-action-title"></h5>
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
		</div>
		<div class="modal-body">
			<div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Tên phòng ban</label>
						<input type="text" name="phongban_name" id="phongban_name" class=" form-control form-control-sm " required/>
					</div>
					<div class="form-group">
                        <label>Mô tả</label>
						<textarea name="phongban_description" id="phongban_description" class=" form-control form-control-sm "></textarea>
					</div>
				</div>
				
			</div>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-danger" data-dismiss="modal">Hủy</button>
			<button type="submit" class="btn btn-success" data-id="" data-url="" id="btnSave">Lưu</button>
		</div>
	</div>
	</div>
</form>
</div>


<div class="modal fade" id="modal-action-edit" >
	<div class="modal-dialog" role="document">
		<form id="formActionEdit" onsubmit="return false">
		<div class="modal-content">
		<div class="modal-header">
		<h5 class="modal-title" id="modal-action-title-edit"></h5>
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
		</div>
		<div class="modal-body">
			<div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Tên phòng ban</label>
						<input type="text" name="phongban_name" id="phongban_name_edit" class=" form-control form-control-sm " required/>
					</div>
					<div class="form-group">
                        <label>Mô tả</label>
						<textarea name="phongban_description" id="phongban_description_edit" class=" form-control form-control-sm "></textarea>
					</div>
				</div>
				
			</div>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-danger" data-dismiss="modal">Hủy</button>
			<button type="submit" class="btn btn-success" data-id="" data-url="" id="btnSaveEdit">Lưu</button>
		</div>
	</div>
	</div>
</form>
</div><?php /**PATH C:\laragon\www\trainning\quanlithongtin\resources\views/Admin/pages/phongban/modal.blade.php ENDPATH**/ ?>