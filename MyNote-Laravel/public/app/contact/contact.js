$('#contactForm').on('submit', function(){
        var form = $(this);
        var formData = form.serialize();
        var detail = CKEDITOR.instances.message.getData();
        formData += '&detail=' + encodeURIComponent(detail);
    
    
        $.ajax({
          url: "contact/sendcontact",
          type: "POST",
          data: formData,
          dataType: "json",
          success: function(response) {
            if (response.success) {
                toastr.success('Gửi liên hệ thành công');
                CKEDITOR.instances.message.setData('');
                $('#name, #email,#phone').val('');
                grecaptcha.reset();
            } else {
              toastr.error("Bạn là robot");
            }
          }
        });
   
})


let table3 = $('.table').DataTable({
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
        url: "getcontacts",
        type: 'GET',
        data: function (d) {
            return $.extend({}, d, {
                search: $("#search").val(),
            });
        }
    },
    columns: [
        { 
            title: "STT" ,
            data: null
        },
        { 
            title: "Name" ,
            data : "name"
        },
        { 
            title: "Email" ,
            data : "email"
        },
        { 
            title: "Phone" ,
            data : "phone"
        },
        { 
            title: "Message" ,
            data : "message"
        },
        {
            title: "Operation",
            className: "text-center",
            bSortable: false,
            render: function (data, type, row, meta) {
                var index = meta.row
                return renderAction([ {
                    class: 'btn btn-sm btn-primary badge text-light',
                    value: index,
                    title: 'update',
                    icon: 'fa fa-edit',
                },
                {
                    class: 'btn btn-sm btn-primary badge text-light',
                    value: index,
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

$(document).delegate('#update', 'click', function(){
    var id = $(this).data("id");
    getContact(id);
    $('#contactFormModal').find("button[type = 'submit']").attr('data-id',$(this).data('id'));
})

$('#contactFormModal').on('submit', function(e){
    e.preventDefault();
    var form = new FormData();
    form.append('id',$('#contactFormModal').find("button[type = 'submit']").attr('data-id'));
    form.append('name',$('#name').val());
    form.append('email',$('#email').val());
    form.append('phone',$('#phone').val());
    form.append('message',CKEDITOR.instances['message'].getData());
   


    $.ajax({
      url: "updatecontact",
      type: "POST",
      data: form,
      processData: false,
      contentType: false,
      success: function(response) {
        $('#exampleModal').modal('hide');
        toastr.success('Sửa thành công');
        table3.ajax.reload();
      },
      error: function(){
        toastr.error('Sửa thất bại');
      }
    });

})

function getContact(id){
    $.ajax({
        url: 'getcontact',
        type: 'GET',
        data: {
            'id': id
        },
        success: function(response){
            $('#name').val(response.name);
            $('#email').val(response.email);
            $('#phone').val(response.phone);
            CKEDITOR.instances['message'].setData(response.message);
        }
    })
}

$(document).on('click', '#delete', function () {
    if (confirm("Bạn có chắc muốn xóa?")) {
        var id = $(this).data("id");
        $.ajax({
            url: "deletecontact",
            type: 'GET',
            data: {
                "id": id
            },
            success: function () {
                toastr.success("Xóa thành công");
                table3.ajax.reload();
            },
            error: function () { toastr.error("Không thể xóa!") }

        });
    }
});