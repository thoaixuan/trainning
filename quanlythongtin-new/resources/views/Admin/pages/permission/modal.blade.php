{{-- Modal Add --}}
<div class="modal fade" id="modal-action-add" >
	<div class="modal-dialog" role="document">
		<form id="formActionAdd" onsubmit="return false">
		<div class="modal-content">
		<div class="modal-header">
		<h5 class="modal-title" id="modal-action-title"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">&times;</button>
		</div>
		<div class="modal-body">
			<div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Chức vụ</label>
						<input type="text" name="per_name" id="per_name" class=" form-control " required/>
					</div>
					<div class="form-group">
                        <label>Phân quyền</label>
						<select name="permissions[]" id="permission" multiple="multiple">
							<optgroup label="Tổng quan">
								<option value="dashboard_view">- Xem tổng quan </option>
							</optgroup>
							<optgroup label="Phòng ban">
								<option value="phongban_view">- Xem Phòng ban </option>
								<option value="phongban_insert">- Thêm Phòng ban </option>
								<option value="phongban_update">- Sửa Phòng ban </option>
								<option value="phongban_delete">- Xóa Phòng ban </option>
							</optgroup>
							<optgroup label="Người dùng">
								<option value="user_view">- Xem người dùng </option>
								<option value="user_insert">- Thêm người dùng </option>
								<option value="user_update">- Sửa người dùng </option>
								<option value="user_delete">- Xóa người dùng </option>
							</optgroup>
							<optgroup label="Phân quyền">
								<option value="permission_view">- Xem phân quyền </option>
								<option value="permission_insert">- Thêm phân quyền </option>
								<option value="permission_update">- Sửa phân quyền </option>
								<option value="permission_delete">- Xóa phân quyền </option>
							</optgroup>							
						</select>
					</div>
				</div>
				
			</div>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">Hủy</button>
			<button type="submit" class="btn btn-success" data-id="" data-url="" id="btnSave">Lưu</button>
		</div>
	</div>
	</div>
</form>
</div>

{{-- Modal Edit --}}
<div class="modal fade" id="modal-action-edit" >
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
                        <label>Chức vụ</label>
						<input type="text" name="per_name" id="per_name_edit" class=" form-control " required/>
					</div>
					<div class="form-group">
                        <label>Phân quyền</label>
						<select name="permissions[]" multiple id="permission_edit">
							<optgroup label="Tổng quan">
								<option value="dashboard_view">- Xem tổng quan </option>
							</optgroup>
							<optgroup label="Phòng ban">
								<option value="phongban_view">- Xem Phòng ban </option>
								<option value="phongban_insert">- Thêm Phòng ban </option>
								<option value="phongban_update">- Sửa Phòng ban </option>
								<option value="phongban_delete">- Xóa Phòng ban </option>
							</optgroup>
							<optgroup label="Người dùng">
								<option value="user_view">- Xem người dùng </option>
								<option value="user_insert">- Thêm người dùng </option>
								<option value="user_update">- Sửa người dùng </option>
								<option value="user_delete">- Xóa người dùng </option>
							</optgroup>
							<optgroup label="Phân quyền">
								<option value="permission_view">- Xem phân quyền </option>
								<option value="permission_insert">- Thêm phân quyền </option>
								<option value="permission_update">- Sửa phân quyền </option>
								<option value="permission_delete">- Xóa phân quyền </option>
							</optgroup>							
						</select>
					</div>
				</div>
				
			</div>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">Hủy</button>
			<button type="submit" class="btn btn-success" data-id="" data-url="" id="btnSaveEdit">Lưu</button>
		</div>
	</div>
	</div>
</form>
</div>