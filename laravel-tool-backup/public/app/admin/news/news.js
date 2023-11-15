function news() {
    this.datas = null;
    var datas = null;
    this.init = function () {
        datas = this.datas;
        var me = this;
        me.datatables();
    }
    this.datatables = function () {
        var me = this;
        var table = $("#news-datatable").DataTable({
            serverSide: true,
            processing: true,
            paging: true,
            lengthMenu: [
                [10, 25, 50, 100],
                [10, 25, 50, 100]
            ],
            pagingType: "full_numbers",
            lengthChange: false,
            searching: false,
            ordering: true,
            order: [0, "desc"],
            info: true,
            responsive: false,
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
                    title: "Tiều đề",
                    data: "title",
                    name: "title",
                    className: "",
                    width: "40%",
                    render: function (data, type, row, meta) {
                        return '<div id="update" class="text-primary c-click btn-title" data-id="'+row.id+'"><div class="content-break">'+data+'</div></div>';
                    }

                },
                {
                    title: "Đường dẫn",
                    data: "slug",
                    name: "slug",
                    className: "",
                    width: "35%",
                    render: function (data, type, row, meta) {
                        return '<div class="content-break">'+data+'</div>'
                    }
                },
                {
                    title: "Ngày tạo",
                    data: "created_at",
                    name: "created_at",
                    className: "",
                    render: function (data, type, row, meta) {
                        return changeDateNews(data);
                    }
                },
                // {
                //     title: "Thông tin",
                //     data: "id",
                //     name: "id",
                //     className: "",
                //     render: function (data, type, row, meta) {
                //         return '<span class="badge bg-primary cursor-pointer btn-view-description" data-view-id="' + row.id + '">xem chi tiết</span>';
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
                        },]);
                    }
                },

            ],
        });

        me.action(table);
    }
    this.action = function (table) {
        init_tinymce("#editor_content",500);
        var submit = document.getElementById("submit");
        var title = document.getElementById("ModalLabel");

        var myModal = new bootstrap.Modal(document.getElementById('myModal'), {
            keyboard: true
        });

        var myModalDetail = new bootstrap.Modal(document.getElementById('myModalDetail'), {
            keyboard: true
        });

        // Tìm kiếm
        search.onkeyup = function () {
            table.ajax.reload();
        };
        //Tìm kiếm bằng phím
        document.getElementById("btn_search").addEventListener("click", function (event) {
            table.ajax.reload();
        });

        //Mở modal thêm dữ liệu
        $(document).on('click', '#open', function () {
            title.textContent = "Thêm dữ liệu mới";
            submit.textContent = "Thêm dữ liệu"
            $.ajax({
                type: "get",
                url: datas.routes.get_insert,
                success: function (response) {
                    if (response.status) {
                        submit.setAttribute('data-url', datas.routes.insert);
                        document.getElementById("newsForm").reset();
                        document.getElementById("title").value = '';
                        tinyMCE.activeEditor.setContent('');
                        myModal.show();
                    } else {
                        toastr.error(response.message);
                    }
                },
                error: function () { }
            });

        })

        //Loadding slug
        $("#title").keyup(function() {
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
                        document.getElementById('slug').value = ChangeToSlug(document.getElementById("title").value)+"-"+Math.floor(Math.random() *999);
                    }
                    if(document.getElementById("title").value == ""){
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
                        document.getElementById('slug').value = ChangeToSlug(document.getElementById("title").value)+"-"+Math.floor(Math.random() *999);
                    }
                }
            });
        });

        // Mở modal cập nhật dữ liệu
        $(document).on('click', '#update', function () {
            submit.textContent = "Chỉnh sửa";
            title.textContent = "Chỉnh sửa tin tức";
            $.ajax({
                url: datas.routes.get_update,
                type: "get",
                dataType: 'json',
                data: {
                    "id": $(this).data("id"),
                },
                success: function (response) {
                    if (response.status) {
                        submit.setAttribute('data-url', datas.routes.update);
                        submit.setAttribute('data-id', response.data.id);
                        document.getElementById("newsForm").reset();
                        document.getElementById('title').setAttribute('value', response.data.title);
                        document.getElementById("category_id").value = response.data.category_id;
                        document.getElementById("slug").value = response.data.slug;
                        document.getElementById("summary").value = response.data.summary;
                        tinyMCE.activeEditor.setContent(response.data.content);
                        document.getElementById("load-images").innerHTML += `<img class="item-image w-50 br-5 me-2" alt="" src="/uploads/news/${response.data.image}">`;
                        myModal.show();
                    } else {
                        toastr.error(response.message);
                    }

                },
                error: function () {

                }
            });
        });

        // Xóa dữ liệu
        $(document).delegate("#delete", "click", function () {
            var id = $(this).data("id");
            $('#modal-text-delete').text("Bạn có muốn xóa không ?");
            $("#onDelete").attr('value', id);
            $("#modal-delete").modal('show');
        });

        $("#onDelete").on("click", function (e) {
            e.preventDefault(e);
            var id = $(this).val();
            var result = AjaxDelete(table, {
                id: id
            }, datas.routes.delete);
            if (result) {
                $("#modal-delete").modal('hide');
            } else {
                $("#modal-delete").modal('hide');
            }
        });

        // View detail
        $(document).delegate(".btn-view-description", "click", function () {
            var id = $(this).attr('data-view-id');
            myModalDetail.show();
            $.ajax({
                url: datas.routes.get_update,
                data: {
                    id: id
                },
                type: 'GET',
                dataType: 'JSON',
                success: function (response) {
                    document.getElementById("view-image").innerHTML = `<img src="/uploads/news/${response.data.image}" class="img-fluid"/>`;
                    document.getElementById("view-title").innerHTML = `<h2>${response.data.title}</h2>`;
                    document.getElementById("view-summary").innerHTML = response.data.summary;
                    document.getElementById("view-content").innerHTML = response.data.content;
                },
                error: function (error) {
                    console.log(error);
                }
            });
        });

        //Loadding dữ liệu Category
        $.ajax({
            type: "get",
            url: datas.routes.get_category,
            dataType: 'JSON',
            success: function (response) {

                if (response.status) {
                    var data = response.data
                    var list = document.getElementById("category_id");
                    for (var i in data) {
                        list.add(new Option(data[i].name, data[i].id));
                    }
                } else {
                    toastr.error(response.message);
                }

            }
        });

        jQuery.validator.addMethod("validateScript", function (value, element) {
            return !(value.includes("script>") ||
                value.includes("script&gt;") ||
                value.includes("<?") ||
                value.includes("&lt;?"));
        }, "Vui lòng nhập đúng định dạng chữ");
        $('#newsForm').validate({
            rules: {
                title: {
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
                title: {
                    required: "Tên không được trống !",
                    maxlength: "Tên không quá 60 ký tự !"
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
            onfocusout: function (element) { return false; },
            submitHandler: function (e) {
                var url = $('#submit').attr('data-url');
                var formData = new FormData($("#newsForm")[0]);
                formData.append('id', $("#submit").attr('data-id'));
                formData.append('content',tinyMCE.editors["editor_content"].getContent());
                $.ajax({
                    url: url,
                    data: formData,
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        if (data.status_validate === 0) {
                            toastr.warning(data.message_error);
                        } else {
                            myModal.hide();
                            toastr.success(data.message);
                            table.ajax.reload();
                        }
                    },
                    error: function (error) {
                        console.log("Lỗi");
                    }
                });
            }

        });

        $("#myModal").on("hidden.bs.modal", function () {
            $(".item-image").remove();
        });

    }


}