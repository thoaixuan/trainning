<div class="modal fade" id="modal-action" >
	<div class="modal-dialog" role="document">
		<form id="formAction" onsubmit="return false">
		<div class="modal-content">
		<div class="modal-header">
		<h5 class="modal-title" id="modal-action-title"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">&times;</button>
		</div>
		<div class="modal-body">
			<div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Tên phòng ban</label>
						<input type="text" name="phongban_name" id="phongban_name" class=" form-control " required/>
					</div>
					<div class="form-group">
                        <label>Mô tả</label>
						<textarea name="phongban_description" id="phongban_description" class=" form-control "></textarea>
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

{{-- Modal Edit --}}
{{-- <div class="modal fade" id="modal-action-edit" >
	<div class="modal-dialog" role="document">
		<form id="formActionEdit" onsubmit="return false">
		<div class="modal-content">
		<div class="modal-header">
		<h5 class="modal-title" id="modal-action-title-edit"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">&times;</button>
		</div>
		<div class="modal-body">
			<div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Tên phòng ban</label>
						<input type="text" name="phongban_name" id="phongban_name_edit" class=" form-control " required/>
					</div>
					<div class="form-group">
                        <label>Mô tả</label>
						<textarea name="phongban_description" id="phongban_description_edit" class=" form-control "></textarea>
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
</div> --}}