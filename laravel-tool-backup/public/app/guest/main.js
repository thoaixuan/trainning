function money_format(e) {
    if (e == null || e == "") {
        return "";
    } else {
        return e
            .toString()
            .split(/(?=(?:\d{3})+(?:\.|$))/g)
            .join(",");
    }
}
function changeDate(data) {
    if (data == null || data == "") {
        return "";
    } else {
        return moment(data, 'YYYY-MM-DD').format('DD/MM/YYYY')
    }
}
function renderAction(data) {
    var htmlButton = `<div class="btn-group align-top">`;
    $.each(data, function (index, item) {

        htmlButton += '<button button="dropdown-item" data-id="' +
            item.value + '" class="' +
            item.class + '" id="' +
            item.title + '">' +
            '<i class="' +
            item.icon + '"></i>' +
            "</button>";
    });
    htmlButton += "</div>";
    return htmlButton;
}
function AjaxDelete(table, dataOject, url) {
    $.ajax({
        url: url,
        type: "GET",
        data: dataOject,
        success: function (data) {
            if (data.status) {
                table.ajax.reload();
                toastr.success(data.message);
            } else {
                toastr.error(data.message);
            }
        },
        error: function (error) {
            toastr.error("Lỗi")
            console.log(error);
        },
    });
}
// Sidebar menu active
var pathname = window.location.href;
var elmParent = $('.slide > a[href="' + pathname + '"]');
elmParent.addClass("active");
var elmParent = $('.slide-menu > li > a[href="' + pathname + '"]');
elmParent.addClass("active");
elmParent.parents(".slide").addClass("is-expanded");
elmParent
    .parent()
    .parent()
    .attr("style", "display: block;")
    .parent()
    .addClass("active");
elmParent.addClass("active ");

function init_tinymce(selector, min_height) {
    var menu_bar = "file edit view insert format tools table image help";
    if (selector == ".tinyMCEQuiz") {
        menu_bar = false;
    }
    tinymce.init({
        selector: selector,
        min_height: min_height,
        menubar: true,
        plugins: [
            "advlist autolink lists link charmap print preview anchor",
            "searchreplace visualblocks table fullscreen",
            "insertdatetime media table paste imagetools image"
        ],
        toolbar:
            "fullscreen  preview | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | numlist bullist | forecolor backcolor removeformat | image media link | outdent indent | table tabledelete tableprops",
        image_title: true,
        automatic_uploads: true,
        file_picker_types: "image",
        setup: function(editor) {
            editor.on('init', function() {
              //load your content here!
              tinymce.activeEditor.setContent(load_content)
            });
        },
        file_picker_callback: function (cb, value, meta) {
            var input = document.createElement("input");
            input.setAttribute("type", "file");
            input.setAttribute("accept", "image/*");
            input.onchange = function () {
                var Kilobyte = 5120;
                var file = this.files[0];
                var imgSize = this.files[0].size;
                var KilobyteImg = Math.round(imgSize / 1024);
                console.log("KilobyteMax", Kilobyte);
                console.log("KilobyteImg", KilobyteImg);
                if (KilobyteImg > Kilobyte) {
                    alert("Hình ảnh không được quá 5 MB");
                    return false;
                } else {
                    var reader = new FileReader();
                    reader.onload = function () {
                        var id = "blobid" + new Date().getTime();
                        var blobCache =
                            tinymce.activeEditor.editorUpload.blobCache;
                        var base64 = reader.result.split(",")[1];
                        var blobInfo = blobCache.create(id, file, base64);
                        blobCache.add(blobInfo);
                        cb(blobInfo.blobUri(), { title: file.name });
                    };
                    reader.readAsDataURL(file);
                }
            };
            input.click();
        },
        content_style:
            "body { font-family:Helvetica,Arial,sans-serif; font-size:14px }",
    });
    tinymce.DOM.loadCSS(editor_ui_css);
    $(document).on('focusin', function(e) {
        if ($(e.target).closest(".tox-tinymce, .tox-tinymce-aux, .moxman-window, .tam-assetmanager-root").length) {
            e.stopImmediatePropagation();
        }
    });
    document.addEventListener('focusin', function (e) { 
        if (e.target.closest('.tox-tinymce-aux, .moxman-window, .tam-assetmanager-root') !== null) { 
          e.stopImmediatePropagation();
        } 
    });
}