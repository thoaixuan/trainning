let table2 = $('.table').DataTable({
    serverSide: true,
    processing: true,
    paging: true,
    lengthChange: true,
    searching: false,
    ordering: true,
    info: true,
    responsive: true,
    autoWidth: false,
    order: [0, "desc"],
    ajax: {
        url: "notes/getnotes",
        type: "GET",
        data: function (d) {
            return $.extend({}, d, {
                search: $("#search").val(),
            });
        }
    },
    columns: [
        { 
            title: "STT" ,
            data : null
        },
        { 
            title: "ID" ,
            data : "id"
        },
        { 
            title: "Title" ,
            data : "title"
        },
        { 
            title: "Description", 
            data : "description",
            render: function (data, type, row) {
                return limitStringLength(data, 30); // Giới hạn kí tự là 50
            }
        },
        { 
            title: "Owner", 
            data : "owner"
        },
        { 
            title: "Created at", 
            data : "created_at",
            render: function (data, type, row, meta) {
                return changeDate(data);
            }
        },
        { 
            title: "Updated at", 
            data : "updated_at",
            render: function (data, type, row, meta) {
                return changeDate(data);
            }
        },
        {
            title: "Operation",
            className: "text-center",
            bSortable: false,
            render: function (data, type, row, meta) {
                return renderAction([ {
                    class: 'btn btn-sm btn-primary badge text-light',
                    value: row.id,
                    title: 'update',
                    icon: 'fa fa-edit',
                },
                {
                    class: 'btn btn-sm btn-primary badge text-light',
                    value: row.id,
                    title: 'delete',
                    icon: 'fa fa-trash',
                }]);
            }
        },
    ],
    rowCallback: function(row, data, index) {
        // Set the row number as empty string for the first column, which is the STT column.
        $('td:eq(0)', row).html(index + 1);
      }
});

$("#search").on('keyup', function (e) {
    table2.ajax.reload();
});
$("#formSearch").on('submit', function (e) {
    e.preventDefault();
    table2.ajax.reload();
});


function limitStringLength(data, maxLength) {
    return data.length < maxLength ?
        data :
        data.substr(0, maxLength-1) + '&#8230;';
}


$('#new').on('click',function(e){
    $('#id1').val("");
    $('#title').val("");
    CKEDITOR.instances.description.setData("");
    $('#formNote').find("button[type = 'submit']").attr('data-url',"notes/create")
})

$(document).delegate('#update','click', function(e) {
    getNote($(this).data('id'));
    $('#formNote').find("button[type = 'submit']").attr('data-url',"notes/update");
    $('#formNote').find("button[type = 'submit']").attr('data-id',$(this).data('id'));
});

$('#formNote').validate({
    rules:{
        title:{
            required:true
        },
   },
   messages: {
        title:{
            required:"Tiêu đề không được để trống"
        },
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
       
    },
    highlight: function (element, errorClass, validClass) {
        $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
    },
    submitHandler: function(e){
        var url = $('#formNote').find("button[type = 'submit']").attr('data-url');
        var formData = new FormData($("#formNote")[0]);
        formData.append('id', $('#formNote').find("button[type = 'submit']").attr('data-id'));
        formData.append('title', $("#title").val());
        formData.append('description', CKEDITOR.instances['description'].getData());
        $.ajax({
                    url: url,
                    data: formData,
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        if(response.status){
                            $('#exampleModal2').modal('hide');
                            toastr.success(response.message)
                            table2.ajax.reload();
                        }else{  
                            toastr.error(response.message)
                        }

                    },
                    error: function (error) {
                        console.log(error.responseJSON)
                        toastr.error("Error")
                    }
                });
        }
})

function getNote(id){
    $.ajax({
       url: 'notes/getnote',
       method: 'GET',
       data:{id: id},
       success: function(response) {
           $('#id1').val(id);
           CKEDITOR.instances.description.setData(response.note.description);
           $('#title').val(response.note.title);
           $('#owner').val(response.note.owner);
       }
   });
}

$(document).on('click', '#delete', function () {
    if (confirm("Bạn có chắc muốn xóa?")) {
        var id = $(this).data("id");
        $.ajax({
            url: "notes/delete",
            type: 'GET',
            data: {
                "id": id
            },
            success: function (response) {
                if (response.status) {
                    toastr.success(response.message);
                    table2.ajax.reload();
                } else {
                    toastr.error(response.message);
                }
            },
            error: function () { toastr.error("Không thể xóa!") }

        });
    }
});

$('#exampleModal2').on('show.bs.modal', function () {
    $('#formNote').validate().resetForm();
})





