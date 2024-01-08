init_tinymce("textarea#editor_content", 150);
const createPond = document.querySelector('.uploadFile');
const filepond = FilePond.create(createPond);
filepond.setOptions({
    maxFiles: 6,
    labelIdle: `Click chọn hoặc kéo thả folder, file tại đây <p class="fs-11 m-0">(PDF,EXCEL,WORD,IMAGE,ZIP)</p>`,
});
window.savedUrl = '';
filepond.onaddfile = (error, file) => {
    if (!error) {
        const files = filepond.getFiles();
        const formData = new FormData();
        files.forEach(fileItem => {
            formData.append('files[]', fileItem.file);
        });

        $.ajax({
            url: routeTask.file,
            type: 'POST',
            data: formData,
            dataType: 'JSON',
            processData: false,
            contentType: false,
            success: function(response) {
                if (response.status == 1) {
                    window.savedUrl = response.url;
                }
            },
            error: function(error) {
                console.log("Lỗi");
                toastr.error(error.message);
            }
        });
    }
};

var elmentTable = $("#table-task");
var TaskTable = elmentTable.DataTable({
    serverSide: true,
    stateSave: true,
    responsive: false,
    processing: true,
    paging: true,
    lengthChange: true,
    searching: false,
    ordering: true,
    info: true,
    autoWidth: true,
    ajax: {
        url: routeTask.table,
        type: "GET",
        data: function (d) {
            return $.extend({}, d, {
                search: $("#search").val(),
            });
        }
    },
    order: [0, "desc"],
    columns: [
        {
            title: "",
            data: "id",
            name: "id",
            className: "overflow-hidden text-center",
            width: "2%",
            orderable: false,
            bSortable: false,
            render: function (data, type, row, meta) {
                return `<label class="container-check">Check
                <input type="checkbox" class="selectOne" value="${data}" name="selectOne">
                <span class="checkmark-full"></span>
                </label>`;
            },
        },
        {
            title: "STT",
            data: "id",
        },
        {
            title: "Thông tin" ,
            data : null,
            bSortable: false,
            render: function (data,type,row) {
                var html ='<p>Công việc: <span class="text-primary fw-semibold c-click" data-id="'+data.id+'" id="viewDetail">' +data.nametask +
                '</span></p>';
                html+= '<span class="time-table">Thời gian: '+changeDate(data.startdate)+ ' - ' + changeDate(data.enddate) +'</span>'
                if(data.status == 1){
                    html +='<span class="badge bg-warning-transparent text-dark">' + 'Đang thực hiện' + '</span>';
                }else if(data.status == 2){
                    html +='<span class="badge bg-success-transparent text-dark">' + 'Đã hoàn thành' + '</span>';
                }else{
                    html +='<span class="badge bg-danger-transparent text-dark">' + 'Trễ Deadline' + '</span>';
                }
                return html;
            }
        },
        {
            title: "Tập tin",
            data: "file",
            bSortable: false,
            render: function (data, type, row) {
                var fileArr = JSON.parse(data);
                if (Array.isArray(fileArr)) {
                    var html = '';
                    fileArr.forEach(function(file) {
                        if (file.fileName) {
                            html += '<a class="show-file text-primary" target="_blank" href="' + file.fileUrl + '">' + file.fileName + '</a>';
                        }
                    });
                    return html;
                }else{
                    return html='';
                }

            },
        },
        {
            title: "Thực hiện",
            data: "userjoin",
            bSortable: false,
        },
        {
            title: "Người gửi",
            data: null,
            bSortable: false,
            render: function (data, type, row) {
                var html ='<p>' +data.userCreate +'</p>';
                html+= '<p>' +changeDate(data.created_at) +'</p>'
                return html;
            }
        },
    ],
});
// View Detail News
$(document).on("click", "#viewDetail", function () {
    var id = $(this).data("id");
    $.ajax({
        url: routeTask.get,
        data: {
            id: id
        },
        type: 'GET',
        dataType: 'JSON',
        success: function (response) {
            if (response.status == 1) {
            $(".modal-title").text(response.data.nametask);
            $("#view_nametask").text(response.data.nametask);
            $("#view_starttime").text(changeDate(response.data.startdate));
            $("#view_endtime").text(changeDate(response.data.enddate));
            $("#view_description").html(response.data.description);
            $("#view_progress").text(response.data.progress);
            $("#view_create").text(response.data.userCreate);
            if(response.data.status == 1){
                $("#view_status").html('<span class="badge bg-warning-transparent text-dark">' + 'Đang thực hiện' + '</span>');
            }else if(response.data.status == 2){
                $("#view_status").html('<span class="badge bg-success-transparent text-dark">' + 'Đã hoàn thành' + '</span>');
            }else{
                $("#view_status").html('<span class="badge bg-danger-transparent text-dark">' + 'Trễ Deadline' + '</span>');
            }
            $("#view_join").html('');
            var userJoinValues = response.data.userjoin.split(',')
            userJoinValues.forEach(function(item) {
                $("#view_join").append('<span class="badge bg-danger-transparent text-dark me-2">' + item + '</span>');
            })
            $("#ModalDetail").modal("show");
            }
        },
        error: function (error) {
            toastr.error(response.message);
            console.log(error);
        }
    });
});

// show popup add new
$("#addNew").on("click", function () {
    $("#btnSave").attr('data-url', routeTask.createPost);
    filepond.removeFile();
    tinyMCE.activeEditor.setContent('');
    $('#taskForm').trigger("reset");
    $("#ModalLabel").text("Thêm mới");
    $("#modalTask").modal("show");
});

// validate form
$.validator.addMethod("validateText", function(value, element){
    return !(value.includes("script>") ||
                    value.includes("script&gt;") ||
                    value.includes("<?") ||
                    value.includes("&lt;?"));
}, "Vui lòng nhập đúng định dạng chữ");
$.validator.addMethod("greaterThan",
function(value, element, params) {

    if (!/Invalid|NaN/.test(new Date(value))) {
        return new Date(value) > new Date($(params).val());
    }

    return isNaN(value) && isNaN($(params).val())
        || (Number(value) > Number($(params).val()));
},'Ngày kết thúc lớn hơn ngày bắt đầu, nhỏ hơn ngày hiện tại');

$('#taskForm').validate({
    rules:{
        nametask:{
            required:true,
            validateText: true
        },
        startdate:{
            required:true,
        },
        enddate:{
            required:true,
            greaterThan: "#startDate"
        },
        description:{
            validateText: true
        }
   },
     messages: {
        nametask:{
            required:"Tiêu đề không được để trống"
        },
        startdate:{
            required:"Chọn ngày bắt đầu"
        },
        enddate:{
            required:"Chọn ngày kết thúc"
        }
    },
    highlight: function (element, errorClass, validClass) {
        $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
    },
    submitHandler: function(){
        var url = $('#btnSave').attr('data-url');
        var formData = new FormData($("#taskForm")[0]);
        formData.append('id', $('#btnSave').attr('data-id'));
        formData.append('userId', $('#btnSave').attr('data-user'));
        formData.append('userCreate', $('#btnSave').attr('data-name'));
        formData.append('userjoin', $("#userJoin").val());
        formData.append('nametask', $("#nameTask").val());
        formData.append('status', $("#statusTask").val());
        formData.append('startdate', changeDateV2($("#startDate").val()));
        formData.append('enddate', changeDateV2($("#endDate").val()));
        formData.append('progress', $("#progressTask").val());
        formData.append('file', JSON.stringify(window.savedUrl));
        formData.append('description', tinymce.get("editor_content").getContent());
        console.log('json', JSON.stringify(window.savedUrl));
        $.ajax({
            url: url,
            data: formData,
            type: 'POST',
            processData: false,
            contentType: false,
            success: function (response) {
                if(response.status){
                    $('#modalTask').modal('hide');
                    toastr.success(response.message)
                    TaskTable.ajax.reload();
                }else{
                    toastr.error(response.message)
                }

            },
            error: function (error) {
                console.log(error.responseJSON)
                toastr.error("Error")
            }
        });
    },
})

// update
$(document).delegate("#update", "click", function () {
    var id = $(this).val();
    $("#ModalLabel").text("Cập nhật");
    $.ajax({
        url: routeTask.get,
        data: {
            id: id
        },
        type: 'GET',
        dataType: 'JSON',
        success: function (response) {
            if (response.status == 1) {
            $('#nameTask').val(response.data.nametask);

            var fileConvert = JSON.parse(response.data.file);
            var filesArray = fileConvert.map(function(file) {
                return {
                    source: file.fileUrl,
                    options: {
                        type: 'local',
                        file: {
                            name: file.fileName,
                            size: file.fileSize
                        }
                    }
                };
            });

            var userJoinValues = response.data.userjoin.split(',').map(function(value) {
                return value.trim();
            });
            $('#userJoin').val(userJoinValues).trigger('change');
            $('#startDate').val(changeDate(response.data.startdate));
            $('#endDate').val(changeDate(response.data.enddate));
            $('#statusTask').val(response.data.status);
            $('#progressTask').val(response.data.progress);
            tinyMCE.activeEditor.setContent(response.data.description);
            $("#btnSave").attr('data-url', routeTask.updatePost);
            $("#btnSave").attr('data-id', response.data.id);
            $("#modalTask").modal("show");
            }
        },
        error: function (error) {
            toastr.error(response.message);
            console.log(error);
        }
    });
});

// delete
$(document).delegate("#delete", "click", function () {
    var id = $(this).val();
    $('#modal-text-delete').text("Bạn có muốn xóa không ?");
    $("#onDelete").attr('value', id);
    $("#modal-delete").modal('show');
});
$("#onDelete").on("click", function (e) {
    e.preventDefault(e);
    var id = $(this).val();
    $.ajax({
        url: routeTask.delete,
        type: 'GET',
        data: {
            "id": id
        },
        success: function (response) {
            if (response.status) {
                $("#modal-delete").modal('hide');
                $("#tacvu").fadeOut(200);
                toastr.success(response.message);
                TaskTable.ajax.reload();
            } else {
                toastr.error(response.message);
            }
        },
        error: function () { toastr.error("Xóa không thành công!") }

    });
});

$(document).on("click keyup", ".selectOne", function (event) {
    var $box = $(this);
    if ($box.is(":checked")) {
        $("#tacvu").fadeIn(200);
        $(".tacvu-footer").fadeIn(100);
        var group = "input:checkbox[name='" + $box.attr("name") + "']";
        $(group).prop("checked", false);
        $box.prop("checked", true);

        $(".button-edit").attr("value", $box.val());
        $(".button-edit").attr("id", "update");
        $(".button-delete").attr("value", $box.val());
        $(".button-delete").attr("id", "delete");

        //Click E to edit
        // if(checkRole('role.edit')){
        //     var keycode = (event.keyCode ? event.keyCode : event.which);
        //     if(event.key == "e" || event.key == "E" || keycode == '101' || keycode == '69' ){
        //         // load edit
        //         $(".button-edit").trigger("click");
        //     }
        // }
    } else {
        $("#tacvu").fadeOut(200);
        $(".tacvu-footer").fadeOut(100);
        $box.prop("checked", false);
    }
});

$(document).ready(function() {
    $('#statusTask').select2({
        dropdownParent: $('#modalTask')
    });
    $('#userJoin').select2({
        dropdownParent: $('#modalTask')
    });


});
