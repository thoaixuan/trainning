<div class="modal fade effect-scale" id="modaldemo" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered text-center" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title"></h6>
                <button aria-label="Close" class="btn-close"
                    data-bs-dismiss="modal"></button>
            </div>
            <form id="form-note" autocomplete="off" enctype="multipart/form-data" onsubmit="return false">
            @csrf
            <div class="modal-body">
                <div class="mb-3">
                    <label for="title" class="col-form-label">Title</label>
                    <input type="text" class="form-control" id="title" name='title'>
                </div>
                <div class="mb-3">
                    <label for="message-text" class="col-form-label">Description</label>
                    <textarea type="text" name ="description" class="form-control" id="description"></textarea>
                </div>
                <div class="mb-3">
                    <label for="status" class="col-form-label">Status</label>
                    <select class="form-select mb-3" name="status" id='status'>
                        <option value="">Choose status</option>
                        <option value="2">Done</option>
                        <option value="1">Processing</option>
                        <option value="0">Cancel</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" id="btnSave" data-name='{{$user->name}}' data-user='{{$user->id}}' data-url='' data-id="">Save changes</button>
                <button type="button" class="btn btn-light"
                    data-bs-dismiss="modal">Close</button>
            </div>
        </form>
        </div>
    </div>
</div>


<div class="modal fade" id="ModalDetail" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6  mt-3">
                        <div class="form-group">
                            <span class="fw-bold">Title: </span> <span id="view_title"></span>
                        </div>
                    </div>
                    <div class="col-md-6  mt-3">
                        <div class="form-group">
                            <span class="fw-bold">Trạng thái: </span> <span id="view_status"></span>
                        </div>
                    </div>
                    <div class="col-md-12 mt-3">
                        <div class="form-group">
                            <div class="fw-bold">Thời gian tạo:
                                <span class="fw-normal" id="view_starttime">
                                </span> -
                                <span class="fw-normal" id="view_endtime">
                                </span>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-12 mt-3">
                        <div class="form-group">
                            <span class="fw-bold">Mô tả: </span> <span id="view_description"></span>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

