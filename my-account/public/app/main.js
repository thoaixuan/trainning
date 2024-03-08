$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function renderAction(data) {
    var htmlButton = `<div class="btn-group align-top">`;
    $.each(data, function(index, item) {

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

function renderTdTable(data) {
    var htmlButton = `<div class="per_users" id='per_users'></div>`;
    return htmlButton;
}

function changeDate(data) {
    if (data == null || data == "") {
        return "";
    } else {
        return moment(data, "YYYY-MM-DD").format('DD/MM/YYYY')
    }
}
function changeDateV2(data) {
    if (data == null || data == "") {
        return "";
    } else {
        return moment(data).format('YYYY/MM/DD')
    }
}
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
                  'advlist', 'autolink',   "lists",  "link",  "image",  "charmap", " preview",  "anchor" , "pagebreak",
                  "searchreplace", "visualblocks",  "code",  "fullscreen", "wordcount",
                  "insertdatetime",  "media",  "table",  "code",  "help",  "wordcount",  "emoticons"
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
