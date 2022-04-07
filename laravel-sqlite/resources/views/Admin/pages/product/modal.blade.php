{{-- Modal --}}
<div class="modal fade" id="modal-action" >
	<div class="modal-dialog" role="document">
		<form id="formAction" autocomplete="off" onsubmit="return false">
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
                        <label>Tên sản phẩm</label>
						<input type="text" name="name" id="name" class=" form-control form-control-sm " required/>
					</div>
					<div class="form-group">
                        <label>Giá tiền</label>
						<input type="number" name="price" id="price" class=" form-control form-control-sm " required/>
					</div>
					<div class="form-group">
                        <label>Số lượng</label>
						<input type="number" name="qty" id="qty" class=" form-control form-control-sm " required/>
					</div>
					<div class="form-group">
                        <label>Mô tả</label>
						<textarea name="description" id="description" class=" form-control form-control-sm "></textarea>
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