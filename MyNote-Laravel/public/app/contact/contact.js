$('#contactForm').validate({
    rules:{
        name:{
            required:true
        },
        email:{
            required:true,
            email: true
        },
        detail:{
            required:true
        },
   },
     messages: {
        name:{
            required:'Tên không được để trống'
        },
        email:{
            required:'Email không được để trống',
            email: 'Email không hợp lệ'
        },
        detail:{
            required:'Tin nhắn không được để trống'
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
        var form = $(this);
        var formData = form.serialize();
        var detail = CKEDITOR.instances.detail.getData();
        formData += '&detail=' + encodeURIComponent(detail);
    
    
        $.ajax({
          url: "contact/sendcontact",
          type: "POST",
          data: formData,
          dataType: "json",
          success: function(response) {
            if (response.success) {
                toastr.success('Gửi liên hệ thành công');
                CKEDITOR.instances.detail.setData('');
                $('#contactForm input[type = "text"], #contactForm input[type = "email"],#contactForm input[type = "number"]').val('');
                grecaptcha.reset();
            } else {
              toastr.error("Bạn là robot");
            }
          }
        });
   
    }
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
        url: "getcontact",
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
                return renderAction([ {
                    class: 'btn btn-sm btn-primary badge text-light',
                    value: row.index,
                    title: 'update',
                    icon: 'fa fa-edit',
                },
                {
                    class: 'btn btn-sm btn-primary badge text-light',
                    value: row.index,
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