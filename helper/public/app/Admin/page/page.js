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

                },
                {
                    title: "Đường dẫn",
                    data: "slug",
                    name: "slug",
                    className: "",
                },
                {
                    title: "Mô tả",
                    data: "id",
                    name: "id",
                    className: "text-center",
                    render: function (data, type, row, meta) {
                        if (data === null) {
                            return 'Chưa có dữ liệu';
                        } else {
                            return '<button class="btn btn-outline-secondary" value="' + row.id + '"><i class="fa fa-eye"></i></button>';
                        }

                    }
                },
                {
                    title: "Tác vụ",
                    data: "id",
                    name: "id",
                    className: "text-center",
                    bSortable: false,
                    render: function (data, type, row, meta) {
                        if(data == 1){
                            return renderAction([{
                                class: 'btn btn-sm btn-primary badge',
                                value: row.id,
                                title: 'update',
                                icon: 'fa fa-edit',
                            }]);
                        }
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
        // Quill js
        var toolbarOptions = [
            [{ 'font': [] }, { 'size': [] }],
          [ 'bold', 'italic', 'underline', 'strike' ],
          [{ 'script': 'super' }, { 'script': 'sub' }],
          [{ 'header': '1' }, { 'header': '2' }, 'blockquote', 'code-block' ],
          [{ align: '' }, { align: 'center' }, { align: 'right' }, { align: 'justify' }],
          [{ 'list': 'ordered' }, { 'list': 'bullet'}, { 'indent': '-1' }, { 'indent': '+1' }],
          [ 'link', 'image', 'video', 'formula' ],
          [ 'clean' ]
        ];

        var content = new Quill('#content_quill', {
            modules: {
                toolbar: toolbarOptions
            },
            theme: 'snow'
        });
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
                    document.getElementById("name").value = data.data.name;
                    content.root.innerHTML = data.data.content;

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
            // CKEDITOR.instances['content'].setData('');
            content.root.innerHTML = "";
            $("#pageModal").modal('show');
        });

        // Insert and update data with form
        $('#pageForm').validate({
            rules: {
                name: {
                    required: true,
                    validateScript: true,
                    maxlength: 150
                },

            },
            messages: {
                name: {
                    required: "Tên trang không được trống !",
                    maxlength: "Tên trang không quá 150 ký tự !"
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
            onfocusout: function(element){ return false; },
            submitHandler: function (e) {
                // var getDescription = CKEDITOR.instances['content'].getData();
                var getDescription = document.getElementById('content').value = content.root.innerHTML;

                var formData = new FormData($("#pageForm")[0]);
                formData.append('content', getDescription);
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
			var result = tableAjaxDelete(table,{
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