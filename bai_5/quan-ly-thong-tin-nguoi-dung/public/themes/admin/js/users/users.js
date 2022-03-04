
function users() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    this.datas = null;
    var datas = null;
    this.init = function () {
        datas = this.datas;
        var me = this;
        me.datatables();
    }
    this.datatables = function () {
        var me = this;
        var table = $("#users-table").DataTable({
            serverSide: true,
            processing: true,
            paging: true,
            lengthMenu: [[10, 25, 50, 100], [10, 25, 50, 100]],
            pagingType: "full_numbers",
            lengthChange: false,
            searching: false,
            ordering: true,
            order: [0, "asc"],
            info: true,
            responsive: true,
            autoWidth: false,
            ajax: {
                url: datas.routes.datatable,
                type: "GET",
                data: function (d) {
                    return $.extend({}, d, {
                        search: $("#search").val(),
                    });

                }
            },
            columns: [
                {
                    title: "full_name",
                    data: "full_name",
                    name: "full_name",
                    className: "",
                },
                {
                    title: "email",
                    data: "email",
                    name: "email",
                    className: "",
                },
                {
                    title: "address",
                    data: "address",
                    name: "address",
                    className: "",
                }, {
                    title: "phone_number",
                    data: "phone_number",
                    name: "phone_number",
                    className: "",
                }, {
                    title: "note",
                    data: "note",
                    name: "note",
                    className: "",
                }, {
                    title: "keyword",
                    data: "keyword",
                    name: "keyword",
                    className: "",
                },
                {
                    title: "Mặt trước",
                    data: "cover",
                    name: "cover",
                    className: "",
                    render: function (data, type, row, meta) {
                        return renderImage([{
                            folder: 'cover',
                            value: data,
                        }]);
                    }

                },
                {
                    title: "Mặt sau",
                    data: "cover_after",
                    name: "cover_after",
                    className: "",
                    render: function (data, type, row, meta) {
                        return renderImage([{
                            folder: 'cover',
                            value: data,
                        }]);
                    }

                },
                {
                    title: "Action",
                    data: "id",
                    name: "id",
                    className: "text-center",
                    bSortable: false,
                    render: function (data, type, row, meta) {
                        return renderAction([{
                            class: 'btn btn-danger',
                            value: row.id,
                            title: 'delete',
                            icon: 'fa fa-trash',
                        }, {
                            class: 'btn btn-info',
                            value: row.id,
                            title: 'update',
                            icon: 'fa fa-edit',
                        },]);
                    }
                },

            ],
        });
        me.action(table);
        me.validator(table);
    }
    this.action = function (table) {
        // search user
        $("#btn_search").on('click', function (e) {
            table.ajax.reload();
        });
        $("#search").on('keypress', function (e) {
            if (e.which == 13) {
                table.ajax.reload();
            }
        });
        // open dialog user
        $(document).on('click', '#open', function () {
            $("#userForm")[0].reset();
            $("#userModal").modal("toggle");
        })
        // find by id user
        $(document).on('click', '#update', function () {
            console.log("update");
            $.ajax({
                url: datas.routes.updates,
                type: "get",
                dataType: 'json',
                data: {
                    _token: $("input[name=_token]").val(),
                    "id": $(this).data("id"),
                },
                success: function (response) {
                    console.log(response);
                    $('input[name="id"]').val(response.data.id);
                    $('input[name="full_name"]').val(response.data.full_name);
                    $('input[name="email"]').val(response.data.email);
                    $('input[name="address"]').val(response.data.address);
                    $('input[name="phone_number"]').val(response.data.phone_number);
                    $('input[name="note"]').val(response.data.note);
                    $('input[name="keyword"]').val(response.data.keyword);
                    $('input[name="date_start"]').val(response.data.date_start);
                    $('input[name="gender"]').val(response.data.gender);
                    $("#userEditModal").modal("toggle");
                }
            });
        });

        // delete user
        $(document).on('click', '#delete', function () {
            if (confirm("Do you really want to delete this record?")) {
                var id = $(this).data("id");
                console.log(id);
                $.ajax({
                    url: datas.routes.delete,
                    type: 'GET',
                    data: {
                        "id": id,
                        _token: $("input[name=_token]").val()
                    },
                    success: function (response) {
                        table.ajax.reload();
                    }
                });
            }
        });

        //export pdf
        $(document).on('click', '#userExport', function () {
            html2canvas(document.querySelector("#users-table")).then(canvas => {
                document.body.appendChild(canvas);
                var data = canvas.toDataURL();
                var docDefinition = {
                    content: [{
                        image: data,
                        width: 500
                    }]
                };
                pdfMake.createPdf(docDefinition).download("user.pdf");
            });

        });
    }

    this.validator = function (table) {
        console.log("validate");
        $("#userForm").validate({

            rules: {
                "full_name": {
                    required: true,
                    maxlength: 20,
                    minlength: 3,
                    validateName: true,
                },
                "email": {
                    required: true,
                    validateEmail: true,
                },
                "password": {
                    required: true,
                    minlength: 8,
                    validatePassword: true,
                },
                "address": {
                    required: true,
                    validateAddress: true
                },
                "phone_number": {
                    required: true,
                    validatePhone: true,
                    minlength: 10,
                    maxlength: 10,

                },
                "note": {
                    required: true,

                },
                "keyword": {
                    required: true,
                    minlength: 2,
                    maxlength: 10,

                },


            },
            messages: {
                name: {
                    required: "Bắt buộc nhập name",
                    maxlength: "Hãy nhập tối đa 15 ký tự",
                    minlength: "Hãy nhập ít nhất 3 ký tự"
                },
                email: {
                    required: "Bắt buộc nhập email",
                },
                password: {
                    required: "Bắt buộc nhập password",
                    minlength: "Hãy nhập lớn hơn 8 ký tự",
                },
                address: {
                    required: "Bắt buộc nhập địa chỉ",
                },
                phone_number: {
                    required: "Bắt buộc nhập số điện thoại",
                    minlength: "Hãy nhập đủ 10 ký tự",
                    maxlength: "Hãy nhập tối thiểu 10 ký tự"
                },
                note: {
                    required: "Bắt buộc nhập số điện thoại",
                },
                keyword: {
                    required: "Bắt buộc nhập key",
                    minlength: "Hãy nhập hơn 2 ký tự",
                    maxlength: "Hãy nhập không quá 10 ký tự"
                },

            },
            errorElement: "span",
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest(".form-group").append(error);
            },
            highlight: function (element) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element) {
                $(element).removeClass('is-invalid');
            },
            submitHandler: function () {
                $(document).ready(function () {
                    $('#userForm').ready(function (e) {
                        // e.preventDefault();
                        var full_name = $("input[name=full_name]").val();
                        var email = $("input[name=email]").val();
                        var password = $("input[name=password]").val();
                        var address = $("input[name=address]").val();
                        var phone_number = $("input[name=phone_number]").val();
                        var note = $("input[name=note]").val();
                        var gender = $("input[name=gender]").val();
                        var date_start = $("input[name=date_start]").val();
                        var keyword = $("input[name=keyword]").val();
                        var cover = $('#input-file')[0].files[0];
                        var cover_after = $('#input-file-after')[0].files[0];
                        var _token = $("input[name=_token]").val();
                        var formData = new FormData();
                        formData.append('cover', cover);
                        formData.append('full_name', full_name);
                        formData.append('email', email);
                        formData.append('password', password);
                        formData.append('address', address);
                        formData.append('phone_number', phone_number);
                        formData.append('note', note);
                        formData.append('keyword', keyword);
                        formData.append('date_start', date_start);
                        formData.append('gender', gender);
                        formData.append('cover_after', cover_after);
                        formData.append('cover', cover);
                        $('.modal-backdrop').remove();
                        $.ajax({
                            url: datas.routes.insert,
                            type: "POST",
                            contentType: false,
                            processData: false,
                            data: { formData, _token: '{{csrf_token()}}' },
                            success: function (response) {
                                if (response.status === 0) {
                                    $('#userModal').modal('hide');
                                    alert(response.message);
                                }
                                if (response.status === 1) {
                                    console.log(response);
                                    $('#userForm')[0].reset();
                                    $('#userModal').modal('hide');
                                    $('.modal-backdrop').remove();
                                    table.ajax.reload();
                                }
                            }
                        })

                    })
                });
            },
        }

        );

        $("#userEditForm").validate({
            rules: {
                "full_name": {
                    required: true,
                    maxlength: 20,
                    minlength: 3,
                    validateName: true,
                },
                "email": {
                    required: true,
                    validateEmail: true,
                },
                "password": {
                    required: true,
                    minlength: 8,
                    validatePassword: true,
                },
                "address": {
                    required: true,
                    validateAddress: true
                },
                "phone_number": {
                    required: true,
                    validatePhone: true,
                    minlength: 10,
                    maxlength: 10,

                },
                "note": {
                    required: true,

                },
                "keyword": {
                    required: true,
                    minlength: 2,
                    maxlength: 10,

                },


            },
            messages: {
                name: {
                    required: "Bắt buộc nhập name",
                    maxlength: "Hãy nhập tối đa 15 ký tự",
                    minlength: "Hãy nhập ít nhất 3 ký tự"
                },
                email: {
                    required: "Bắt buộc nhập email",
                },
                password: {
                    required: "Bắt buộc nhập password",
                    minlength: "Hãy nhập lớn hơn 8 ký tự",
                },
                address: {
                    required: "Bắt buộc nhập địa chỉ",
                },
                phone_number: {
                    required: "Bắt buộc nhập số điện thoại",
                    minlength: "Hãy nhập đủ 10 ký tự",
                    maxlength: "Hãy nhập tối thiểu 10 ký tự"
                },
                note: {
                    required: "Bắt buộc nhập số điện thoại",
                },
                keyword: {
                    required: "Bắt buộc nhập key",
                    minlength: "Hãy nhập hơn 2 ký tự",
                    maxlength: "Hãy nhập không quá 10 ký tự"
                },
                cover: {
                    required: "Bắt buộc tải chứng minh thư mặt trước",
                },
                cover_after: {
                    required: "Bắt buộc tải chứng minh thư mặt sau",
                },

            },
            errorElement: "span",
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest(".form-group").append(error);
            },
            highlight: function (element) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element) {
                $(element).removeClass('is-invalid');
            },
            submitHandler: function () {
                // update student
                $(document).ready(function () {
                    $('#userEditForm').ready(function (e) {
                        var full_name = $("input[name=full_name]").val();
                        var email = $("input[name=email]").val();
                        var password = $("input[name=password]").val();
                        var address = $("input[name=address]").val();
                        var phone_number = $("input[name=phone_number]").val();
                        var note = $("input[name=note]").val();
                        var gender = $("input[name=gender]").val();
                        var date_start = $("input[name=date_start]").val();
                        var keyword = $("input[name=keyword]").val();
                        var cover = $('#input-file')[0].files[0];
                        var cover_after = $('#input-file-after')[0].files[0];
                        var _token = $("input[name=_token]").val();
                        var formData = new FormData();
                        formData.append('cover', cover);
                        formData.append('full_name', full_name);
                        formData.append('email', email);
                        formData.append('password', password);
                        formData.append('address', address);
                        formData.append('phone_number', phone_number);
                        formData.append('note', note);
                        formData.append('keyword', keyword);
                        formData.append('date_start', date_start);
                        formData.append('gender', gender);
                        formData.append('cover_after', cover_after);
                        formData.append('cover', cover);
                        formData.append('_token', _token);
                        console.log(formData);

                        $.ajax({
                            url: datas.routes.updates_data,
                            type: 'PUT',
                            contentType: false,
                            processData: false,
                            data: formData,
                            success: function (response) {
                                if (response.status === 1) {
                                    console.log(response);
                                    $("#userEditForm")[0].reset();
                                    $('#userEditModal').modal('hide');
                                    $('.modal-backdrop').remove();
                                    table.ajax.reload();
                                }
                                else {
                                    alert(response.message);
                                }

                            }
                        });
                    });
                });
            },
        }

        );

        $.validator.addMethod("validatePassword", function (value, elemt) {
            return this.optional(elemt) || /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,16})/.test(value);
        }, 'Vui lòng hãy nhập đúng định dạng mật khẩu gồm 8-16 ký tự bao gồm chữ hoa, chữ thường và ít nhất một số');

        $.validator.addMethod("validateEmail", function (value, elemt) {
            return this.optional(elemt) || /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@(?:\S{1,63})$/.test(value);
        }, 'Vui lòng hãy nhập đúng định dạng email');

        $.validator.addMethod("validateName", function (value, elemt) {
            return this.optional(elemt) || /^[\w'\-,.][^0-9_!¡?÷?¿/\\+=@#$%ˆ&*(){}|~<>;:[\]]{2,}$/.test(value);
        }, 'Vui lòng hãy nhập đúng định dạng tên');

        $.validator.addMethod("validatePhone", function (value, elemt) {
            return this.optional(elemt) || /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im.test(value);
        }, 'Vui lòng hãy nhập đúng định dạng số điện thoại');
        $.validator.addMethod("validateAddress", function (value, elemt) {
            return this.optional(elemt) || /^[\w'\-,.][^_!¡?÷?¿/\\+=@#$%ˆ&*(){}|~<>;:[\]]{2,}$/.test(value);
        }, 'Vui lòng hãy nhập đúng định dạng địa chỉ');
    }

}