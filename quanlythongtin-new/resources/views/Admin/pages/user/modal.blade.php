{{-- Modal Add --}}
<div class="modal fade" id="modal-action-add">
	<div class="modal-dialog modal-xl" role="document">
		<form id="formActionAdd" onsubmit="return false" enctype="multipart/form-data">
			
		<div class="modal-content">
		<div class="modal-header">
		<h5 class="modal-title" id="modal-action-title"></h5>
		<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">&times;</button>
		</div>
		<div class="modal-body">
			<div class="row">
				<div class="col-6">
				  <div class="row">
					<div class="col-md-6">
					  <div class="form-group">
						<label for="name">Họ tên</label>
						<input type="text" name="name" id="name" class="form-control" />
					  </div>
					</div>
					<div class="col-md-6">
					<div class="form-group">
					  <label for="phone_number">Số điện thoại</label>
					  <input type="text" name="phone_number" id="phone_number" class="form-control" />
					</div>
					</div>
				  </div>
			  
				  <div class="row">
					<div class="col-md-6">
					  <div class="form-group">
						  <label>Giới tính</label>
						  <select name="gender" id="gender" class="form-control">
						  <option value=0>Nam</option>
						  <option value=1>Nữ</option>
						  </select>
					  </div>
					</div>
					<div class="col-md-6">
					   <div class="form-group">
						  <label>Phòng ban</label>
						  	@php
							  $getPb = \App\Phongban::get();
							@endphp
						  <select name="id_phongban" id="phongban_list" class="form-control">
							@foreach ($getPb as $listPhongban)
							<option value="{{$listPhongban->id}}">{{$listPhongban->phongban_name}}</option>
							@endforeach
						  </select>
					  </div>
					</div>
				  </div>
			 
			  <div class="row">
				<div class="col-md-6">
				<div class="form-group">
				  <label>Ngày sinh</label>
				  <input type="date" name="date_of_birth" id="date_of_birth" class="form-control" />
				</div>  
				</div>

				<div class="col-md-6">
				<div class="form-group">
					<label for="date_start">Ngày vào làm</label>
					<input type="date" name="date_start" id="date_start" class="form-control" />
				  </div> 
				</div>
			  </div>
			 <div class="row">
			   <div class="col-md-6">
				  <div class="form-group">
					<label>Chứng minh mặt trước</label>
					<input id="img_before" type="file" name="img_before" class="form-control"/>
				  </div>
			   </div>
			   <div class="col-md-6">
				  <div class="form-group">
					<label>Chứng minh mặt sau</label>
					<input id="img_after" type="file" name="img_after" class="form-control"/>
				  </div>
			   </div>
			 </div>
		   
				</div>
				<div class="col-6">
				  <div class="row">
					<div class="col-md-6">
					<div class="form-group">
					  <label>Email</label>
					  <input type="text" name="email" id="email" class="form-control" />
					</div> 
					</div>
					<div class="col-md-6">
					<div class="form-group">
					  <label>Mật khẩu</label>
					  <input type="password" name="password" id="password" class="form-control" />
					</div> 
					</div>
				  </div>
				
			  <div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label class="d-block">Vai trò</label>
						<select name="id_permissions" id="id_permissions" class="form-control">
						</select>
						</div>
				</div>
				<div class="col-md-6">
				  <div class="form-group">
				  <label for="status" class="d-block">Trạng thái</label>
					<select name="status" id="status" class="form-control">
					  <option value=0>Đang làm việc</option>
					  <option value=1>Nghỉ việc</option>
					  <option value=2>Đình chỉ</option>
					</select>
				  </div>
				</div>
			  </div>
			  		<div class="form-group">
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
	<div class="modal-dialog modal-xl" role="document">
		<form id="formActionEdit" onsubmit="return false">
		<input type="hidden" name="group_id" id="group_id_edit"/>
		<div class="modal-content">
		<div class="modal-header">
		<h5 class="modal-title" id="modal-action-title-edit"></h5>
		<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">&times;</button>
		</div>
		<div class="modal-body">
			<div class="row">
				<div class="col-6">
				  <div class="row">
					<div class="col-md-6">
					  <div class="form-group">
						<label for="name">Họ tên</label>
						<input type="text" name="name" id="name_edit" class="form-control" />
					  </div>
					</div>
					<div class="col-md-6">
					<div class="form-group">
					  <label for="phone_number">Số điện thoại</label>
					  <input type="text" name="phone_number" id="phone_number_edit" class="form-control" />
					</div>
					</div>
				  </div>
			  
				  <div class="row">
					<div class="col-md-6">
					  <div class="form-group">
						  <label>Giới tính</label>
						  <select name="gender" id="gender_edit" class="form-control">
						  <option value="0" selected>Nam</option>
						  <option value="1">Nữ</option>
						  </select>
					  </div>
					</div>
					<div class="col-md-6">
					   <div class="form-group">
						  <label>Phòng ban</label>
						  	@php
							  $getPb = \App\Phongban::get();
							@endphp
						  <select name="id_phongban" id="phongban_list_edit" class="form-control">
							  
							  @foreach ($getPb as $listPhongban)
							  <option value="{{$listPhongban->id}}">{{$listPhongban->phongban_name}}</option>
							  @endforeach
						  </select>
					  </div>
					</div>
				  </div>
			 
			  <div class="row">
				<div class="col-md-6">
				<div class="form-group">
				  <label>Ngày sinh</label>
				  <input type="date" name="date_of_birth" id="date_of_birth_edit" class="form-control" />
				</div>  
				</div>

				<div class="col-md-6">
				<div class="form-group">
					<label for="date_start">Ngày vào làm</label>
					<input type="date" name="date_start" id="date_start_edit" class="form-control" />
				  </div> 
				</div>
			  </div>
			 <div class="row">
			   <div class="col-md-6">
				  <div class="form-group">
					<label>Chứng minh mặt trước</label>
					<input id="img_before_edit" type="file" name="img_before" class="form-control"/>
				  </div>
			   </div>
			   <div class="col-md-6">
				  <div class="form-group">
					<label>Chứng minh mặt sau</label>
					<input id="img_after_edit" type="file" name="img_after" class="form-control"/>
				  </div>
			   </div>
			 </div>
		   
				</div>
				<div class="col-6">
				  <div class="row">
					<div class="col-md-6">
					<div class="form-group">
					  <label>Email</label>
					  <input type="text" name="email" id="email_edit" class="form-control" />
					</div> 
					</div>
					<div class="col-md-6">
					</div>
				  </div>
				
			  <div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label class="d-block">Vai trò</label>
						  <select name="id_permissions" id="id_permissions_edit" class="form-control">
						  </select>
						</div>
				</div>
				<div class="col-md-6">
				  <div class="form-group">
				  <label for="status" class="d-block">Trạng thái</label>
					<select name="status" id="status_edit" class="form-control">
					  <option value=0>Đang làm việc</option>
					  <option value=1>Nghỉ việc</option>
					  <option value=2>Đình chỉ</option>
					</select>
				  </div>
				</div>
			  </div>
			  		<div class="form-group">
						<label for="description">Mô tả</label>
						<textarea name="description" class="form-group" id="description_edit" rows="8"></textarea>
					</div>
				</div>
			</div>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-danger" data-dismiss="modal">Hủy</button>
			<button type="submit" class="btn btn-success" data-id-group="" data-id="" data-url="" id="btnSaveEdit">Lưu</button>
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
		<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">&times;</button>
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
			<button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">Thoát</button>
		</div>
	</div>
	</div>
</div>