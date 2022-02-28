{{-- Modal Add --}}
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
                        <label>Tên dự án</label>
						<input type="text" name="projects_name" id="projects_name" class="form-control form-control-sm" required/>
					</div>
					<div class="form-group">
                        @php
                            $company = getCompany();
                        @endphp
                        <select name="userID" id="userID" class="form-control form-control-sm">
                            <option value="">Chọn Khách hàng / Công ty</option>
                            @foreach ($company as $item)
                                <option value="{{$item->id}}">{{$item->full_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        @php
                            $service = getServices();
                        @endphp
                        <select name="serviceID" id="serviceID" class="form-control form-control-sm">
                            <option value="">Chọn dịch vụ</option>
                            @foreach ($service as $item)
                                <option value="{{$item->id}}">{{$item->services_name}}</option>
                            @endforeach
                        </select>
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
                        <label>Tên dự án</label>
						<input type="text" name="projects_name" id="projects_name_edit" class="form-control form-control-sm" required/>
					</div>
					<div class="form-group">
                        @php
                            $company = getCompany();
							$getUserID = "<script>$('#userID_edit').val();</script>";
                        @endphp
                        <select name="userID" id="userID_edit" class="form-control form-control-sm">
                            <option value="">Chọn Khách hàng / Công ty</option>
                            @foreach ($company as $item)
                                <option {{$item->id == $getUserID?'selected':''}} value="{{$item->id}}">{{$item->full_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        @php
                            $service = getServices();
							$getUserID = "<script>$('#userID_edit').val();</script>";
                        @endphp
                        <select name="serviceID" id="serviceID_edit" class="form-control form-control-sm">
                            <option value="">Chọn dịch vụ</option>
                            @foreach ($service as $item)
                                <option {{$item->id == $getUserID?'selected':''}} value="{{$item->id}}">{{$item->services_name}}</option>
                            @endforeach
                        </select>
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