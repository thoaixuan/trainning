$.ajax({
    url: '/notes/getnotes',
    type: 'GET',
    dataType: 'json',
    order: [0, "desc"],
    success: function(response) {
        $('.table').DataTable({
            columns: [
                { title: "ID" ,data : "id"},
                { title: "Title" ,data : "title"},
                { title: "Description", data : "description",
                render: function (data, type, row) {
                    return limitStringLength(data, 50); // Giới hạn kí tự là 50
                }},
                { title: "Owner", data : "owner"},
                { title: "Created at", data : "created_at"},
                { title: "Updated at", data : "updated_at"},
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
        }).rows.add(response.notes).draw();
    },
    error: function() {
        console.log('Lỗi khi gửi yêu cầu');
    }
});

let myId = -1;
let myPer = -1;
$.ajax({
    url: 'users/id',
    method: 'GET',
    dataType: 'json',
    success: function(response){
        myId = response.id;
        myPer = response.per_id;
    }
})

function limitStringLength(data, maxLength) {
    return data.length < maxLength ?
        data :
        data.substr(0, maxLength-1) + '&#8230;';
}


let isInsert = 1;


$('#new').on('click',function(){
    isInsert = 1;
    $('#id1').val("")
    $('#title').val("")
    CKEDITOR.instances.description.setData("");
    $('#owner').val(myId)
})

$('#update').on('click', function(event) {
    getNote($(this).data('id'));
});
  
  

$('#formUser1').on('submit', function(e) {
    e.preventDefault();

    if(isInsert == 1){
        insertNote();
    }else{
        updateNote();
    }
   
});

function insertNote(){
    var title = $('#title').val();
    var description = CKEDITOR.instances.description.getData();
    var owner = $('#owner').val();

    if(title == "" || description == "" ){
        toastr.error('Vui lòng nhập đầy đủ thông tin');
        return;
    }

    $.ajax({
    url: 'notes/create',
    method: 'POST',
    data: {title: title, description: description, owner: owner},
    success: function(response) {
        if(response.status){
            $('#exampleModal2').modal('hide');
            $('.table').DataTable().rows.add([response.data]).draw();
            toastr.success('Thêm thành công');
        }else{
            toastr.error('Thêm thất bại');
        }
       
    },
    error: function(error) {
        toastr.error('Có lỗi xảy ra');
    }
    });
}

function updateNote(){
    var id = $('#id1').val();
    var title = $('#title').val();
    var description = CKEDITOR.instances.description.getData();
    var owner = $('#owner').val();

    if(title == "" || description == "" ){
        toastr.error('Vui lòng nhập đầy đủ thông tin');
        return;
    }

    if(myPer !== 1 && myId !== owner){
        toastr.error('Bạn không được phép sửa note này');
        return;
    }
    
    $.ajax({
    url: 'notes/update',
    method: 'POST',
    data: {id: id, title: title, description: description, owner: owner},
    success: function(response) {
        if(response.status){
            $('#exampleModal2').modal('hide');
            toastr.success('Sửa thành công');
            reload();
        }else{
            toastr.error('Sửa thất bại');
        }
       
    },
    error: function(error) {
        toastr.error('Có lỗi xảy ra');
    }
    });
}

function getNote(id){
    isInsert = 0;
    $.ajax({
       url: 'notes/getnote/' + id,
       method: 'GET',
       success: function(response) {
           $('#id1').val(id);
           CKEDITOR.instances.description.setData(response.note.description);
           $('#title').val(response.note.title);
           $('#owner').val(response.note.owner);
       }
   });
}

function deleteNote(id){
    $.ajax({
        url: 'notes/delete/' + id,
        method: 'GET',
        success: function(response){
            toastr.success('Xóa thành công');
            reload();
        },error: function(){
            toastr.error('Xóa thất bại');
        }
    });
}

var id = -1;
function getId(id){
    this.id = id;
};

let del = document.getElementById('delete-btn1')
del.addEventListener('click',function(){
    deleteNote(id);
})


function reload(){
    $.ajax({
        url: 'notes/getnotes',
        method: 'GET',
        dataType: 'json',
        success: function(response) {
            $('.table').DataTable().clear().draw();
            $('.table').DataTable().rows.add(response.notes).draw();
        },
        error: function(error) {
            
        }
        });
        $('#id1').val("")
        $('#title').val("")
        CKEDITOR.instances.description.setData("");
        $('#owner').val("")
}



