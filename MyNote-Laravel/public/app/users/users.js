$.ajax({
    url: '/users/getusers',
    type: 'GET',
    dataType: 'json',
    order: [0, "desc"],
    success: function(response) {
        $('.table').DataTable({
            columns: [
                { title: "ID" ,data : "id"},
                { title: "Email" ,data : "email"},
                { title: "Name", data : "name"},
                { title: "Permission", data : "per_id"},
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
        }).rows.add(response.users).draw();
    },
    error: function() {
        console.log('Lỗi khi gửi yêu cầu');
    }
});

let isInsert = 1;

$('#new').on('click',function(){
    isInsert = 1;
    $('#id').val("")
    $('#name').val("")
    $('#email').val("")
    $('#name').val("")
    $('#per_id').val(2)
})

$('#update').on('click', function(event) {
    
    getUser($(this).data('id'));
});
  
  

$('#formUser').on('submit', function(e) {
    e.preventDefault();

    if(isInsert == 1){
        insertUser();
    }else{
        updateUser();
    }
   
});

function insertUser(){
    var name = $('#name').val();
    var email = $('#email').val();
    var password = $('#password').val();
    var per_id = $('#per_id').val();

    if(name == "" || password == "" || email == ""){
        toastr.error('Vui lòng nhập đầy đủ thông tin');
        return;
    }

    if(!checkName(name)){
        toastr.error('Tên không hợp lệ, tên phải là các chữ cái và có độ dài từ 1-50 kí tự!!!');
        return;
    }
    
    if(!checkPassword(password)){
        toastr.error('Mật khẩu phải có ít nhất một số, một chữ cái viết hoa, độ dài từ 6-25 kí tự!!!');
        return;
    }
    
    $.ajax({
    url: 'users/create',
    method: 'POST',
    data: {name: name, email: email, password: password, per_id: per_id},
    success: function(response) {
        if(response.status){
            $('#exampleModal').modal('hide');
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

function updateUser(){
    var id = $('#id').val();
    var name = $('#name').val();
    var email = $('#email').val();
    var password = $('#password').val();
    var per_id = $('#per_id').val();

    
    if(name == "" || email == ""){
        toastr.error('Vui lòng nhập đầy đủ thông tin');
        return;
    }

    if(!checkName(name)){
        toastr.error('Tên không hợp lệ, tên phải là các chữ cái và có độ dài từ 1-50 kí tự!!!');
        return;
    }
    
    if(password != ""){
        if(!checkPassword(password)){
            toastr.error('Mật khẩu phải có ít nhất một số, một chữ cái viết hoa, độ dài từ 6-25 kí tự!!!');
            return;
        }
    }
       
    
    $.ajax({
    url: 'users/update',
    method: 'POST',
    data: {id: id, name: name, email: email, password: password,per_id: per_id},
    success: function(response) {
        if(response.status){
            $('#exampleModal').modal('hide');
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

function getUser(id){
    isInsert = 0;
    $.ajax({
       url: 'users/getuser/' + id,
       method: 'GET',
       success: function(response) {
           $('#id').val(id);
           $('#name').val(response.user.name);
           $('#email').val(response.user.email);
           $('#password').val(response.user.password);
           $('#per_id').val(response.user.per_id);
       }
   });
}

function deleteUser(id){
    $.ajax({
        url: 'users/delete/' + id,
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

let del = document.getElementById('delete-btn')
del.addEventListener('click',function(){
    deleteUser(id);
})


function checkName(input){
    const regex = /[a-zA-Z]{1,50}/
    return regex.test(input)
}
  
function checkPassword (input){
    const regex = /^(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{6,25}$/
    return regex.test(input)
}

function reload(){
    $.ajax({
        url: 'users/getusers',
        method: 'GET',
        dataType: 'json',
        success: function(response) {
            $('.table').DataTable().clear().draw();
            $('.table').DataTable().rows.add(response.users).draw();
        },
        error: function(error) {
            
        }
        });
    $('#id').val("")
    $('#name').val("")
    $('#email').val("")
    $('#name').val("")
    $('#per_id').val(2)
}



