$(document).ready(function () {
	$.ajaxSetup({ headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content") } });
});
function renderAction(data) {
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
			'" data-id-group="'+
			item.idGroup +
			'">' +
			'<i class="'+
			item.icon +
			'"></i></button>';
	});
	return htmlBtn;
}
function formatVND(str) {
    return str.split('').reverse().reduce((prev, next, index) => {
        return ((index % 3) ? next : (next + ',')) + prev
    })
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
			checkBool=true;
			toastr.success("Đã xóa thành công");
		},
		error: function (error) {
			toastr.error("Lỗi")
			console.log(error);
		},
	});
	return checkBool;
}