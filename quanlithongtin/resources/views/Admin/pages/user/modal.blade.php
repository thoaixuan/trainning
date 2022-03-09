{{-- Modal Add --}}
<div class="modal fade" id="modal-action-add" >
	<div class="modal-dialog modal-xl" role="document">
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
				<div class="col-6">
				  <div class="row">
					<div class="col-md-6">
					  <div class="form-group">
						<label for="name">Họ tên</label>
						<input type="text" name="name" class="form-control" />
					  </div>
					</div>
					<div class="col-md-6">
					<div class="form-group">
					  <label for="phone_number">Số điện thoại</label>
					  <input type="text" name="phone_number" class="form-control" />
					</div>
					</div>
				  </div>
			  
				  <div class="row">
					<div class="col-md-6">
					  <div class="form-group">
						  <label>Giới tính</label>
						  <select id="gender" class="form-control select-user">
						  <option value=0>Nam</option>
						  <option value=1>Nữ</option>
						  </select>
					  </div>
					</div>
					<div class="col-md-6">
					   <div class="form-group">
						  <label for="status" class="d-block">Phòng ban</label>
						  <select id="phongban_list" class="form-control select-user">
						  </select>
					  </div>
					</div>
				  </div>
			 
			  <div class="row">
				<div class="col-md-6">
				<div class="form-group">
				  <label>Ngày sinh</label>
				  <input type="date" name="date_of_birth" class="form-control" />
				</div>  
				</div>

				<div class="col-md-6">
				<div class="form-group">
					<label for="date_start">Ngày vào làm</label>
					<input type="date" name="date_start" class="form-control" />
				  </div> 
				</div>
			  </div>
			 <div class="row">
			   <div class="col-md-6">
				  <div class="form-group">
					<label>Chứng minh mặt trước</label>
					<input id="input-file" type="file" name="img_before" class="form-control"/>
				  </div>
			   </div>
			   <div class="col-md-6">
				  <div class="form-group">
					<label>Chứng minh mặt sau</label>
					<input id="input-file-after" type="file" name="img_after" class="form-control"/>
				  </div>
			   </div>
			 </div>
		   
				</div>
				<div class="col-6">
				  <div class="row">
					<div class="col-md-6">
					<div class="form-group">
					  <label>Email</label>
					  <input type="text" name="email" class="form-control" />
					</div> 
					</div>
					<div class="col-md-6">
					<div class="form-group">
					  <label>Mật khẩu</label>
					  <input type="text" name="password" class="form-control" />
					</div> 
					</div>
				  </div>
				
			  <div class="row">
				<div class="col-md-6">
				  <div class="form-group">
					<label for="status" class="d-block">Chức vụ</label>
					  <select id="position" class="form-control select-user">
						<option value=0>Nhân viên</option>
						<option value=1>Quản lý</option>
					  </select>
				  </div>
				</div>
				<div class="col-md-6">
				  <div class="form-group">
				  <label for="status" class="d-block">Trạng thái</label>
					<select id="action" class="form-control select-user">
					  <option value=0>Đang làm việc</option>
					  <option value=1>Nghỉ việc</option>
					  <option value=1>Đình chỉ</option>
					</select>
				  </div>
				</div>
			  </div>
			  <div class="form-group ck-editor">
						<label for="description">Mô tả</label>
						<textarea name="description" class="form-group" id="description" rows="8"></textarea>
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
                        <label>Tên phòng ban</label>
						<input type="text" name="phongban_name" id="phongban_name_edit" class=" form-control form-control-sm " required/>
					</div>
					<div class="form-group">
                        <label>Mô tả</label>
						<textarea name="phongban_description" id="description_edit" class=" form-control form-control-sm "></textarea>
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

{{-- Modal view description --}}
<div class="modal fade" id="modal-action-view-description" >
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
		<div class="modal-header">
		<h5 class="modal-title" id="modal-action-title-view"></h5>
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
		</div>
		<div class="modal-body">
			<div class="row">
                <div class="col-md-12">
                    <p><b>Tên:</b> <span id="name_detail"></span></p>
					<p><b>Email:</b> <span id="email_detail"></span></p>
					<p><b>Mô tả:</b> <span id="description_detail"></span></p>
				</div>
				<div class="col-md-6">
					<p><b>Chứng minh mặt trước:</b></p>
					<p><span id="img_before_detail"></span></p>
				</div>
				<div class="col-md-6">
					<p><b>Chứng minh mặt sau:</b></p>
					<p><span id="img_after_detail"></span></p>
				</div>
			</div>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-danger" data-dismiss="modal">Thoát</button>
		</div>
	</div>
	</div>
</div>