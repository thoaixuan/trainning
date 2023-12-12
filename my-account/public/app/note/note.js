
    var elmentTable = $("#table-note");
    var DataTable = elmentTable.DataTable({
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
            url: routeNote.table,
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
                title: "ID",
                data: "id",
            },
            {
                title: "Title" ,
                data : "title"
            },
            {
                title: "Description",
                data: "description",
            },
            {
                title: "Status",
                data: "status",
                render: function (data, type, row, meta) {
                    if(data == 1){
                        return '<span class="badge bg-warning-transparent rounded-pill text-warning p-2 px-3" >' + 'Processing' + '</span>';
                    } else if(data == 2){
                        return '<span class="badge bg-success-transparent rounded-pill text-success p-2 px-3">' + 'Done' + '</span>';
                    } else {
                        return '<span class="badge bg-danger-transparent rounded-pill text-danger p-2 px-3">' + 'Cancel' + '</span>';
                    }
                },
            },
            {
                title: "Created at",
                data: "created_at",
                render: function (data, type, row, meta) {
                    return changeDate(data);
                },
            },
            {
                title: "Updated at",
                data: "updated_at",
                render: function (data, type, row, meta) {
                    return changeDate(data);
                },
            },
            {
                title: "Created by",
                data: "userName",
            },
            {
                title: "Action",
                className: "text-center",
                bSortable: false,
                render: function (data, type, row, meta) {
                    return renderAction([
                        {
                            class: "btn text-primary btn-sm",
                            value: row.id,
                            title: "update",
                            icon: "fe fe-edit fs-14",
                        },
                        {
                            class: "btn text-danger btn-sm",
                            value: row.id,
                            title: "delete",
                            icon: "fe fe-trash-2 fs-14",
                        },
                    ]);
                },
            },
        ],
    });


    // show popup add new
    $("#addNew").on("click", function () {
        $('.modal-title').text("Add New Note");
        $("#id").val("");
        $("#title").val("");
        $("#status").val("");
        CKEDITOR.instances.description.setData("");
        $("#btnSave").attr('data-url', routeNote.createPost);
        $("#modaldemo").modal("show");
    });

    // Validate form note

    jQuery.validator.addMethod("validateTitle", function(value, element){
        return !(value.includes("script>") ||
                        value.includes("script&gt;") ||
                        value.includes("<?") ||
                        value.includes("&lt;?"));
    }, "Vui lòng nhập đúng định dạng chữ");
    $('#form-note').validate({
        rules:{
            title:{
                required:true,
                validateTitle: true
            },
       },
         messages: {
            title:{
                required:"Tiêu đề không được để trống"
            },
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        },

        submitHandler: function(){
            var url = $('#form-note').find("button[type = 'submit']").attr('data-url');
            // var url = routeNote.createPost;
            var formData = new FormData($("#form-note")[0]);
            formData.append('id', $('#form-note').find("button[type = 'submit']").attr('data-id'));
            formData.append('userId', $('#form-note').find("button[type = 'submit']").attr('data-user'));
            formData.append('userName', $('#form-note').find("button[type = 'submit']").attr('data-name'));
            formData.append('title', $("#title").val());
            formData.append('status', $("#status").val());
            formData.append('description', CKEDITOR.instances['description'].getData());
            $.ajax({
                url: url,
                data: formData,
                type: 'POST',
                processData: false,
                contentType: false,
                success: function (response) {
                    if(response.status){
                        $('#modaldemo').modal('hide');
                        toastr.success(response.message)
                        DataTable.ajax.reload();
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

// Update note
$(document).on('click', '#update', function () {
    var id = $(this).data("id");
    $('.modal-title').text("Update My Note");
    $.ajax({
        url: routeNote.update,
        data: {
            id: id
        },
        type: 'GET',
        dataType: 'JSON',
        success: function (data) {
            if (data.status) {
            $("#btnSave").attr('data-url', routeNote.updatePost);
            $("#btnSave").attr('data-id', data.data.id);
            $('#title').val(data.data.title);
            CKEDITOR.instances['description'].setData(data.data.description);
            $('#status').val(data.data.status);
            $("#modaldemo").modal('show');
            }else {
                toastr.error(data.message);
            }
        },
        error: function (error) {
            console.log(error);
        }
    });
});

// Delete

$(document).delegate("#delete", "click", function () {
    var id = $(this).data("id");
    $('#modal-text-delete').text("Bạn có muốn xóa không ?");
    $("#onDelete").attr('value', id);
    $("#modal-delete").modal('show');
});

$("#onDelete").on("click", function (e) {
    e.preventDefault(e);
    var id = $(this).val();
    $.ajax({
        url: routeNote.delete,
        type: 'GET',
        data: {
            "id": id
        },
        success: function (response) {
            if (response.status) {
                $("#modal-delete").modal('hide');
                toastr.success(response.message);
                DataTable.ajax.reload();
            } else {
                toastr.error(response.message);
            }
        },
        error: function () { toastr.error("Xóa không thành công!") }

    });
});


