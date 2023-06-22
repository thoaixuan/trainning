function page() {
    // CKEDITOR.replace('content');
    this.datas = null;
    var datas = null;
    this.init = function () {
        datas = this.datas;
        var me = this;
        me.action();
    }
    //Actions
    this.action = function (table) {
        init_tinymce("#editor_content",500);
        $(window).on('load', function() {
            $('#update').click();
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

        // fetch data in modal update
        $(document).delegate("#update", "click", function () {
            $("#submit").attr('data-url', datas.routes.update);
            $("#modal-title").text("Cập nhật dữ liệu");
            $("#submit").attr('data-action', 'update');
            $("#pageModal").modal('show');
            $.ajax({
                url: datas.routes.fetchUpdate,
                data: {
                    id: updateID
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
            onfocusout: function (element) { return false; },
            submitHandler: function (e) {
                // var getDescription = CKEDITOR.instances['content'].getData();

                var formData = new FormData($("#pageForm")[0]);
                formData.append('id', $("#submit").attr('data-id'));
                formData.append('content',tinyMCE.editors["editor_content"].getContent());
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
                        // $('#pageForm')[0].reset();
                        $('#pageModal').modal('hide');
                        window.location.replace("/pages/"+document.getElementById("slug").value);
                    },
                    error: function (error) {
                        console.log("Lỗi");
                    }
                });
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