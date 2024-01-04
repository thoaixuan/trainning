<div class="modal fade effect-scale" id="modalTask" tabindex="-1" aria-labelledby="modalTask" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">&times;</button>
            </div>
            <div class="modal-body">

                <form id="usersForm" autocomplete="off" enctype="multipart/form-data" onsubmit="return false">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Tên công việc</label>
                                <input id="nameTask" type="text" name="nameTask" class="form-control mt-1"
                                    placeholder="Tên công việc..." />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Mô tả </label>
                                <textarea class="form-control mt-1" id="editor_content" name="description"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Upload File</label>
                                <input type="file" name="uploadFile" id="uploadFile">
                            </div>
                        </div>
                        <div class="col-md-6 mt-3">
                            <div class="form-group">
                                <label>Ngày bắt đầu</label>
                                <input id="startDate" type="date" name="startDate" class="form-control mt-1"
                                    placeholder="dd/mm/yyyy" />
                            </div>
                        </div>
                        <div class="col-md-6 mt-3">
                            <div class="form-group">
                                <label>Ngày kết thúc</label>
                                <input type="date" name="endDate" id="endDate" placeholder="dd/mm/yyyy"
                                    class="form-control mt-1">
                            </div>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label>Trạng thái</label>
                            <select class="form-select mt-1" name="statusTask" id='statusTask'>
                                <option value="1">Đang thực hiện</option>
                                <option value="2">Đã hoàn thành</option>
                                <option value="3">Trễ Deadline</option>
                            </select>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label>Tiến độ</label>
                            <input type="text" name="progressTask" max="100" min="0" id='progressTask' class="form-control mt-1">
                        </div>
                        <div class="col-md-12 my-3">
                            <label>Thành viên tham gia</label>
                            <select class="js-example-basic-multiple" name="states[]" multiple="multiple">
                                <option value="m-1">Multiple-1</option>
                                <option value="m-2">Multiple-2</option>
                                <option value="m-3">Multiple-3</option>
                                <option value="m-4">Multiple-4</option>
                                <option value="m-5">Multiple-5</option>
                            </select>
                        </div>
                    </div>
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Hủy</button>
                    <button type="submit" id="btnSave" class="btn btn-success" data-type=""
                            data-url="">Lưu</button>
                </form>
            </div>

        </div>
    </div>
</div>
