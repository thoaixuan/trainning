<div class="modal fade" id="modal-action" >
	<div class="modal-dialog " role="document">
		<form id="formAction">
		<div class="modal-content">
		<div class="modal-header">
		<h5 class="modal-title" id="modal-action-title"></h5>
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
		</div>
		<div class="modal-body ">
			<div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label> Tên Danh Mục</label>
						<input type="text" name="service_name" id="service_name" class=" form-control form-control-sm "/>
					</div>
					<div class="form-group">
                        <label> Mô Tả</label>
						<textarea  name="service_description" id="service_description" class=" form-control form-control-sm "></textarea>
					</div>
				</div>
				
			</div>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-danger" data-dismiss="modal">Hủy</button>
			<button type="submit" class="btn btn-success" data-action="insert" data-id="" data-url="" id="onSave">Lưu</button>
		</div>
	</div>
	</div>
</form>
</div>