$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
function renderDetail(data) {
    var htmlButton = `<div class="btn-group">`;
    $.each(data, function (index, item) {

        htmlButton += '<button data-id="' +
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
            if(data.status){
                table.ajax.reload();
                toastr.success(data.message);
            }else {
                toastr.error(data.message);
            }
		},
		error: function (error) {
			toastr.error("Lỗi")
			console.log(error);
		},
	});
}
function changeDateNews(data) {
    if (data == null || data == "") {
        return "";
    } else {
        return moment(data).format('DD/MM/YYYY HH:mm:ss')
    }
}
function changeDate(data) {
    if (data == null || data == "") {
        return "";
    } else {
        return moment(data,'YYYY-MM-DD HH:mm:ss').format('DD/MM/YYYY')
    }
}
function formatVND(str) {
    return str.split('').reverse().reduce((prev, next, index) => {
        return ((index % 3) ? next : (next + ',')) + prev
    });
}
function input_money_format(e) {
	$(e).val($(e).val().replace(/\D/gm, ""));
	var val = $(e).val().split(",").join("");
	e.value = val
		.toString()
		.split(/(?=(?:\d{3})+(?:\.|$))/g)
		.join(",");
}
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
function ChangeToSlug(text)
{
    var slug;
    
    //Lấy text từ thẻ input title 
    slug = text;
    slug = slug.toLowerCase();
    //Đổi ký tự có dấu thành không dấu
    slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
    slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
    slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
    slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
    slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
    slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
    slug = slug.replace(/đ/gi, 'd');
    //Xóa các ký tự đặt biệt
    slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\“|\”|\:|\;|_/gi, '');
    //Đổi khoảng trắng thành ký tự gạch ngang
    slug = slug.replace(/ /gi, "-");
    //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
    //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
    slug = slug.replace(/\-\-\-\-\-/gi, '-');
    slug = slug.replace(/\-\-\-\-/gi, '-');
    slug = slug.replace(/\-\-\-/gi, '-');
    slug = slug.replace(/\-\-/gi, '-');
    //Xóa các ký tự gạch ngang ở đầu và cuối
    slug = '@' + slug + '@';
    slug = slug.replace(/\@\-|\-\@|\@/gi, '');

    return slug;
}
function removeTextVn(str) {
    var AccentsMap = [
      "aàảãáạăằẳẵắặâầẩẫấậ",
      "AÀẢÃÁẠĂẰẲẴẮẶÂẦẨẪẤẬ",
      "dđ", "DĐ",
      "eèẻẽéẹêềểễếệ",
      "EÈẺẼÉẸÊỀỂỄẾỆ",
      "iìỉĩíị",
      "IÌỈĨÍỊ",
      "oòỏõóọôồổỗốộơờởỡớợ",
      "OÒỎÕÓỌÔỒỔỖỐỘƠỜỞỠỚỢ",
      "uùủũúụưừửữứự",
      "UÙỦŨÚỤƯỪỬỮỨỰ",
      "yỳỷỹýỵ",
      "YỲỶỸÝỴ"    
    ];
    for (var i=0; i<AccentsMap.length; i++) {
      var re = new RegExp('[' + AccentsMap[i].substr(1) + ']', 'g');
      var char = AccentsMap[i][0];
      str = str.replace(re, char);
    }
    return str;
}
// Sidebar menu active
var pathname = window.location.href;
    var elmParent = $('.slide > a[href="' + pathname + '"]');
    elmParent.addClass("active");
    console.log(elmParent);
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