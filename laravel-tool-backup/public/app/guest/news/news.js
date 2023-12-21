function news() {
this.datas = null;
var datas = null;
this.init = function () {
datas = this.datas;
init_tinymce("#editor_content",500);
$(window).on('load', function() {
$('#update').click();
});
var submit = document.getElementById("submit");
var title = document.getElementById("ModalLabel");

var myModal = new bootstrap.Modal(document.getElementById('myModal'), {
    keyboard: true
});

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
            "id": updateID,
        },
        success: function (response) {
            if (response.status) {
                submit.setAttribute('data-url', datas.routes.update);
                submit.setAttribute('data-id', response.data.id);
                document.getElementById("newsForm").reset();
                document.getElementById('title').setAttribute('value', response.data.title);
                document.getElementById("category_id").value = response.data.category_id;
                document.getElementById("slug").value = response.data.slug;
                document.getElementById('summary').value = response.data.summary;
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
                    window.location.replace("/blog/"+document.getElementById("slug").value);
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