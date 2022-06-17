$(document).ready(function () {
    $.ajaxSetup({ headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content") } });
});
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
function renderAction2(data) {
    var htmlBtn = '';
    $.each(data, function (index, item) {
        htmlBtn += '<button type="button" class="mr-2 btn btn-' +
            item.color +
            ' ' +
            item.class +
            '" value="' +
            item.value +
            '" title="' +
            item.title +
            '">' +
            '<i class="' +
            item.icon +
            '"></i></button>';
    });
    return htmlBtn;
}
function tableAjaxDelete(table, dataOject, url) {
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
function AjaxDelete(dataOject, url) {
    var checkBool = false;
    $.ajax({
        url: url,
        type: "POST",
        data: dataOject,
        dataType: "JSON",
        async: false,
        success: function (data) {
            if (data.statusBoolean) {
                checkBool = true;
                toastr.success(data.msg);
            }
            else {
                toastr.error(data.msg);
            }
        },
        error: function (error) {
            toastr.error(data.msg)
            console.log(error);
        },
    });
    return checkBool;
}
function AjaxPost(dataOject, url) {
    var checkBool = false;
    $.ajax({
        url: url,
        type: "POST",
        data: dataOject,
        dataType: "JSON",
        async: false,
        success: function (data) {
            checkBool = true;
            toastr.success(data.msg);
        },
        error: function (error) {
            toastr.error(data.msg)
            console.log(error);
        },
    });
    return checkBool;
}
function changeDate(data) {
    if (data == null || data == "") {
        return "";
    } else {
        return moment(data, "YYYY-MM-DD").format('DD/MM/YYYY')
    }
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