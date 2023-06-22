function page() {
    // CKEDITOR.replace('content');
    this.datas = null;
    var datas = null;
    this.init = function () {
        datas = this.datas;
        var me = this;
        me.datatables();
    }
    //Datatable
    this.datatables = function () {
        var me = this;
        var table = $("#table-pages").DataTable({
            serverSide: true,
            processing: true,
            paging: true,
            lengthChange: true,
            searching: false,
            ordering: true,
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
            order: [0, "desc"],
            columns: [
                {
                    title: "Tên Trang",
                    data: "name",
                    name: "name",
                    className: "",
                    width: "45%",
                    render: function (data, type, row, meta) {
                        return '<div class="content-break">'+data+'</div>';
                    }
                },
                {
                    title: "Đường dẫn",
                    data: "slug",
                    name: "slug",
                    className: "",
                    width: "45%",
                    render: function (data, type, row, meta) {
                        return '<div class="content-break">'+data+'</div>';
                    }
                },
                // {
                //     title: "Mô tả",
                //     data: "id",
                //     name: "id",
                //     className: "text-center",
                //     render: function (data, type, row, meta) {
                //         if (data === null) {
                //             return 'Chưa có dữ liệu';
                //         } else {
                //             return '<button class="btn btn-outline-secondary" value="' + row.id + '"><i class="fa fa-eye"></i></button>';
                //         }

                //     }
                // },
                {
                    title: "Tác vụ",
                    data: "id",
                    name: "id",
                    className: "text-center",
                    bSortable: false,
                    render: function (data, type, row, meta) {
                        return renderAction([{
                            class: 'btn btn-sm btn-primary badge',
                            value: row.id,
                            title: 'update',
                            icon: 'fa fa-edit',
                        }, {
                            class: 'btn btn-sm btn-primary badge',
                            value: row.id,
                            title: 'delete',
                            icon: 'fa fa-trash',
                        }]);
                    }
                },
            ]
        });
        me.action(table);
    }
    //Actions
    this.action = function (table) {
        init_tinymce("#editor_content",500);
        //search data in keywork
        $("#btn_search").on('click', function (e) {
            table.ajax.reload();
        });
        //search data in keywork
        $("#formSearch").on('submit', function (e) {
            e.preventDefault();
            table.ajax.reload();
        });
        //fetch data in modal deltail
        $(document).delegate(".btn-outline-secondary", "click", function () {
            var id = $(this).val();
            $('#modal-action-title-view').text("Chi tiết mô tả");
            $("#modal-action-view-description").modal('show');
            $.ajax({
                url: datas.routes.fetchUpdate,
                data: {
                    id: id
                },
                type: 'GET',
                dataType: 'JSON',
                success: function (data) {
                    $('#description_view').html(data.data.content);
                },
                error: function (error) {
                    console.log(error);
                }
            });
        });
        // fetch data in modal update
        $(document).delegate("#update", "click", function () {
            var id = $(this).attr('data-id')
            $("#submit").attr('data-url', datas.routes.update);
            $("#modal-title").text("Cập nhật dữ liệu");
            $("#submit").attr('data-action', 'update');
            $("#pageModal").modal('show');
            $.ajax({
                url: datas.routes.fetchUpdate,
                data: {
                    id: id
                },
                type: 'GET',
                dataType: 'JSON',
                success: function (data) {
                    $("#submit").attr('data-url', datas.routes.update);
                    $("#submit").attr('data-id', data.data.id);
                    $('#name').val(data.data.name);
                    document.getElementById("slug").value = data.data.slug;
                    // CKEDITOR.instances['content'].setData(data.data.name);
                    tinyMCE.activeEditor.setContent(data.data.content);

                },
                error: function (error) {
                    console.log(error);
                }
            });


        });
        // fetch data in modal insert
        $("#open").on("click", function () {
            $("#submit").attr('data-url', datas.routes.insert);
            $("#modal-title").text("Thêm mới dữ liệu");
            $("#submit").attr('data-action', 'insert');
            $("#name").val('');
            $("#slug").val('');
            // CKEDITOR.instances['content'].setData('');
            tinyMCE.activeEditor.setContent('');
            $("#pageModal").modal('show');
        });

        //Loadding slug
        $("#name").keyup(function() {
            document.getElementById('slug').value = ChangeToSlug(this.value);
            $.ajax({
                type: "get",
                url: datas.routes.load_slug,
                dataType: 'JSON',
                data: {
                    "slug": document.getElementById("slug").value,
                },
                success: function (response) {
                    if(response.checkSlug){
                        document.getElementById('slug').value = ChangeToSlug(document.getElementById("name").value)+"-"+Math.floor(Math.random() *999);
                    }
                    if(document.getElementById("name").value == ""){
                        document.getElementById('slug').value = "";
                    }
                }
            });
        });

        $("#slug").keyup(function() {
            $.ajax({
                type: "get",
                url: datas.routes.load_slug,
                dataType: 'JSON',
                data: {
                    "slug": document.getElementById("slug").value,
                },
                success: function (response) {
                    if(response.checkSlug){
                        document.getElementById('slug').value = ChangeToSlug(document.getElementById("name").value)+"-"+Math.floor(Math.random() *999);
                    }
                }
            });
        });  
        // Insert and update data with form
        $('#pageForm').validate({
            rules: {
                name: {
                    required: true,
                    validateScript: true,
                    maxlength: 60
                },
                slug: {
                    maxlength: 90,
                    validateScript: true,
                    required: true,
                }
            },
            messages: {
                name: {
                    required: "Tên trang không được trống !",
                    maxlength: "Tên trang không quá 60 ký tự !"
                },
                slug: {
                    required: "URL không được trống !",
                    maxlength: "URL không quá 90 ký tự !"
                }
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
            submitHandler: function (e) {
                // var getDescription = CKEDITOR.instances['content'].getData();

                var formData = new FormData($("#pageForm")[0]);
                formData.append('content',tinyMCE.editors["editor_content"].getContent());
                formData.append('id', $("#submit").attr('data-id'));
                var url = $('#submit').attr('data-url');
                $.ajax({
                    url: url,
                    data: formData,
                    type: 'POST',
                    dataType: 'JSON',
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        toastr.success(data.name);
                        $('#pageForm')[0].reset();
                        $('#pageModal').modal('hide');
                        table.ajax.reload();
                    },
                    error: function (error) {
                        console.log("Lỗi");
                    }
                });
            }

        });
        // Open delete dialog
        $(document).delegate("#delete", "click", function () {
            var id = $("#delete").attr('data-id');
            $('#modal-text-delete').text(" Bạn có muốn xóa không ?");
            $("#onDelete").attr('value', id);
            $("#modal-delete").modal('show');
        });
        //Delete data
        $("#onDelete").on("click", function (e) {
			e.preventDefault(e);
			var id = $(this).val();
			var result = AjaxDelete(table,{
				id: id
			}, datas.routes.delete);
			if (result) {
				$("#modal-delete").modal('hide');
			} else {
				$("#modal-delete").modal('hide');
			}
		});
        // Check validate value text
        jQuery.validator.addMethod("validateScript", function (value, element) {
            return !(value.includes("script>") ||
                value.includes("script&gt;") ||
                value.includes("<?") ||
                value.includes("&lt;?"));
        }, "Vui lòng nhập đúng định dạng chữ");


    }


}