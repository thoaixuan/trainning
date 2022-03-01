{{-- Modal Add --}}
<div class="modal fade" id="modal-action-add" >
	<div class="modal-dialog" role="document">
		<form id="formActionAdd">
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
                        <label>Tên khách hàng / Công ty</label>
						<input type="text" name="full_name" id="full_name" class="form-control form-control-sm"/>
					</div>
					<div class="form-group">
                        <label>Email</label>
						<input type="email" name="email" id="email" class="form-control form-control-sm"/>
					</div>
					<div class="form-group">
                        <label>Password</label>
						<input type="password" name="password" id="password" class="form-control form-control-sm"/>
					</div>
                    <div class="form-group">
                        <label>Địa chỉ</label>
						<input type="text" name="address" id="address" class="form-control form-control-sm"/>
					</div>
                    <div class="form-group">
                        <label>Số điện thoại</label>
						<input type="number" name="phone_number" id="phone_number" class="form-control form-control-sm"/>
					</div>
                    <div class="form-group">
                        <label>Từ khóa</label>
						<input type="text" name="keyword" id="keyword" class="form-control form-control-sm"/>
					</div>
                    <div class="form-group">
                        <label>Ghi chú</label>
						<textarea name="note" id="note" class="form-control form-control-sm"></textarea>
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
                        <label>Tên khách hàng / Công ty</label>
						<input type="text" name="full_name" id="full_name_edit" class="form-control form-control-sm"/>
					</div>
					<div class="form-group">
                        <label>Email</label>
						<input type="email" name="email" id="email_edit" class="form-control form-control-sm"/>
					</div>
					<div class="form-group">
                        <label>Password</label>
						<input type="password" name="password" id="password_edit" class="form-control form-control-sm"/>
					</div>
                    <div class="form-group">
                        <label>Địa chỉ</label>
						<input type="text" name="address" id="address_edit" class="form-control form-control-sm"/>
					</div>
                    <div class="form-group">
                        <label>Số điện thoại</label>
						<input type="number" name="phone_number" id="phone_number_edit" class="form-control form-control-sm"/>
					</div>
                    <div class="form-group">
                        <label>Từ khóa</label>
						<input type="text" name="keyword" id="keyword_edit" class="form-control form-control-sm"/>
					</div>
                    <div class="form-group">
                        <label>Ghi chú</label>
						<textarea name="note" id="note_edit" class="form-control form-control-sm"></textarea>
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
</div>