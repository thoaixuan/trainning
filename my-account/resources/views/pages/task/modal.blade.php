<div class="modal fade effect-scale" id="modalTask" aria-labelledby="modalTask" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">&times;</button>
            </div>
            <div class="modal-body">

                <form id="taskForm" autocomplete="off" enctype="multipart/form-data" onsubmit="return false">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Tên công việc <span>*</span></label>
                                <input id="nameTask" type="text" name="nametask" class="form-control mt-1"
                                    placeholder="Tên công việc..." />
                            </div>
                        </div>

                        <div class="col-md-12 mt-3">
                            <div class="form-group">
                                <label class="mb-1">Upload File</label>
                                <input type="file" id="upload-file" class="uploadFile" name="filepond" multiple data-allow-reorder="true" data-max-file-size="6MB" data-max-files="6">
                            </div>
                        </div>
                        <div class="col-md-12 mt-3">
                            @php
							  $getUser = \app\User::get();
							@endphp
                            <label class="mb-1">Thành viên tham gia</label>
                            <select class="form-control" id="userJoin" name="userjoin" multiple>
                                @foreach ($getUser as $listUser)
                                <option value="{{$listUser->name}}">{{$listUser->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 mt-3">
                            <div class="form-group">
                                <label>Ngày bắt đầu <span>*</span></label>
                                <div class="input-group mt-1">
                                    <div class="input-group-text text-muted"> <i class="ri-calendar-line"></i> </div>
                                    <input type="text" class="form-control" name="startdate" id="startDate" placeholder="Chọn ngày">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mt-3">
                            <div class="form-group">
                                <label>Ngày kết thúc <span>*</span></label>
                                <div class="input-group mt-1">
                                    <div class="input-group-text text-muted"> <i class="ri-calendar-line"></i> </div>
                                    <input type="text" class="form-control" name="enddate" id="endDate" placeholder="Chọn ngày">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label class="mb-1">Trạng thái</label>
                            <select class="form-select" name="statusTask" id='statusTask'>
                                <option value="1">Đang thực hiện</option>
                                <option value="2">Đã hoàn thành</option>
                                <option value="3">Trễ Deadline</option>
                            </select>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label>Tiến độ</label>
                            <input type="number" name="progressTask" max="100" min="0" id='progressTask' class="form-control mt-1" placeholder="% tiến độ...">
                        </div>
                        <div class="col-md-12 my-3">
                            <div class="form-group">
                                <label class="mb-1">Mô tả </label>
                                <textarea class="form-control" id="editor_content" name="description"></textarea>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Hủy</button>
                    <button type="submit" id="btnSave" class="btn btn-success" data-name='{{$user->name}}' data-user='{{$user->id}}' data-type=""
                            data-url="">Lưu</button>
                </form>
            </div>

        </div>
    </div>
</div>


{{-- modal detail --}}

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
                            <span class="fw-bold">Công việc: </span> <span id="view_nametask"></span>
                        </div>
                    </div>
                    <div class="col-md-6 mt-3">
                        <div class="form-group">
                            <div class="fw-bold">Thời gian:
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
                    <div class="col-md-12  mt-3">
                        <div class="form-group">
                            <span class="fw-bold">File upload: </span> <span id="view_file"></span>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mt-3">
                        <div class="form-group">
                            <span class="fw-bold">Tiến độ: </span> <span id="view_progress"></span>%
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mt-3">
                        <div class="form-group">
                            <span class="fw-bold">Trạng thái: </span> <span id="view_status"></span>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mt-3">
                        <div class="form-group">
                            <span class="fw-bold">Người tạo : </span> <span id="view_create"></span>
                        </div>
                    </div>
                    <div class="col-md-12 my-3">
                        <div class="form-group">
                            <span class="fw-bold">Tham gia: </span> <span id="view_join"></span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
