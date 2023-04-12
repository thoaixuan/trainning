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
        url: "users/getusers",
        type: "GET",
        data: function (d) {
            return $.extend({}, d, {
                search: $("#search").val(),
            });
        }
    },
    columns: [
        { 
            title: "ID" ,
            data : "id"
        },
        { 
            title: "Name" ,
            data : "name"
        },
        { 
            title: "Email", 
            data : "email"
        },
        { 
            title: "Permission", 
            data : "per_id"
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
    ]
});

$("#search").on('keyup', function (e) {
    table2.ajax.reload();
});
$("#formSearch").on('submit', function (e) {
    e.preventDefault();
    table2.ajax.reload();
});


$('#new').on('click',function(e){
    $('#name').val("");
    $('#email').val("");
    $('#password').val("");
    $('#submit').attr('data-url',"users/create")
})

$(document).delegate('#update','click', function(e) {
    getUser($(this).data('id'));
    $('#submit').attr('data-url',"users/update");
    $('#submit').attr('data-id',$(this).data('id'));
});

$('#formUser').on('submit', function(e){
    e.preventDefault();
    
    if($('#name').val() == "" || $('#email').val() == ""){
        toastr.error('Vui lòng nhập đầy đủ thông tin');
        return;
    }

    if($('#submit').data('id') == ""){
        if($('#password').val() == ""){
            toastr.error('Vui lòng nhập đầy đủ thông tin');
            return;
        }
    }
   
    var url = $('#submit').attr('data-url');
    var formData = new FormData($("#formUser")[0]);
    formData.append('id', $("#submit").attr('data-id'));
    formData.append('name', $("#name").val());
    formData.append('email', $("#email").val());
    formData.append('password', $("#password").val());
    formData.append('per_id', $("#per_id").val());
    $.ajax({
                url: url,
                data: formData,
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    if(response.status){
                        $('#exampleModal').modal('hide');
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
})

function getUser(id){
    $.ajax({
       url: 'users/getuser',
       method: 'GET',
       data:{id: id},
       success: function(response) {
           $('#name').val(response.user.name);
           $('#email').val(response.user.email);
           $('#per_id').val(response.user.per_id);
       }
   });
}

$(document).on('click', '#delete', function () {
    if (confirm("Bạn có chắc muốn xóa?")) {
        var id = $(this).data("id");
        $.ajax({
            url: "users/delete",
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





