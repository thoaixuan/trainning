$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
function renderTooltip(data) {
    var htmlButton = `<div class="d-flex">`;

    $.each(data, function (index, item) {
        htmlButton += `<button type="button" class="btn btn-sm btn-light badge rounded-pill button-user" data-toggle="popover" data-trigger="hover"`;
        htmlButton += 'title="' + 'Email: ' + item.value.email + '">';
        htmlButton += '<i class="fa fa-envelope-o" aria-hidden="true"></i>';
        htmlButton += "</button>";

        htmlButton += `<button type="button" class="ms-2 btn btn-sm btn-light badge rounded-pill button-user" data-toggle="popover" data-trigger="hover"`;
        htmlButton += 'title="' + 'SDT: ' + item.value.phone_number + '">';
        htmlButton += '<i class="fa fa-phone" aria-hidden="true"></i>';
        htmlButton += "</button>";

        htmlButton += `<button type="button" class="ms-2 btn btn-sm btn-light badge rounded-pill button-user" data-toggle="popover" data-trigger="hover"`;
        htmlButton += 'title="' + 'Địa chỉ: ' + item.value.address + '">';
        htmlButton += '<i class="fa fa-location-arrow" aria-hidden="true"></i>';
        htmlButton += "</button>";


        htmlButton += `<button type="button" class="ms-2 btn btn-sm btn-light badge rounded-pill button-user" data-toggle="popover" data-trigger="hover"`;
        htmlButton += 'title="' + 'Vai trò: ' + (item.value.type == 'Admin' ? 'Hệ thống' : 'Thành viên') + '">';
        htmlButton += '<i class="fa fa-user-circle-o" aria-hidden="true"></i>';
        htmlButton += "</button>";
    });
    htmlButton += "</div>";

    return htmlButton;
}
function renderTooltipWebLink(data) {
    var htmlButton = `<button type="button" class="btn btn-sm btn-primary badge"
    data-bs-toggle="tooltip" data-bs-placement="bottom"`;
    $.each(data, function (index, item) {
        let data_json = JSON.parse(item.value.sub_title);
        data_json.forEach((item, index) => {
            htmlButton += 'tooltip="' + item.sub_title + '">';
        });
        htmlButton += item.data;

    });
    htmlButton += "</button>";
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

function renderSwitch(data) {
    var htmlSwitch = '<div class="switch-toggle">';
    htmlSwitch += '<div class="onoffswitch2 ">';
    $.each(data, function (index, item) {
        htmlSwitch += '<input type="radio"' +
            ' class="onoffswitch2-checkbox checkbox" id="custom-action-' +
            item.id + '" value="' + item.id + '"data-status=' +
            item.value + ' data-id="' + item.id + '"' +
            (item.value == 1 ? 'checked' : '') + '>';
        htmlSwitch += '<label class="onoffswitch2-label" for="custom-action-' +
            item.id + '"></label>';
    });
    htmlSwitch += '</div>';
    htmlSwitch += '</div>';
    return htmlSwitch;
}

function renderStatus(data) {
    var htmlSwitch = '<div class="switch-toggle">';
    htmlSwitch += '<div class="onoffswitch2 ">';
    $.each(data, function (index, item) {
        htmlSwitch += '<input type="radio"' +
            ' class="onoffswitch2-checkbox checkboxStatus" id="custom-status-' +
            item.id + '" value="' + item.id + '"data-status=' +
            item.value + ' data-id="' + item.id + '"' +
            (item.value == 1 ? 'checked' : '') + '>';
        htmlSwitch += '<label class="onoffswitch2-label" for="custom-status-' +
            item.id + '"></label>';
    });
    htmlSwitch += '</div>';
    htmlSwitch += '</div>';
    return htmlSwitch;
}


function addEvent(element, event, callback) {
    let previousEventCallBack = element["on" + event];
    element["on" + event] = function (e) {
        const output = callback(e);
        if (output === false) return false;

        if (typeof previousEventCallBack === 'function') {
            output = previousEventCallBack(e);
            if (output === false) return false;
        }
    }
};
function AjaxDelete(table, dataOject, url) {
    $.ajax({
        url: url,
        type: "GET",
        data: dataOject,
        success: function (data) {
            if (data.status) {
                $('#tacvu').fadeOut(200);
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
function removeAscent(str) {
    if (str === null || str === undefined) return str;
    str = str.toLowerCase();
    str = str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g, "a");
    str = str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g, "e");
    str = str.replace(/ì|í|ị|ỉ|ĩ/g, "i");
    str = str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g, "o");
    str = str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g, "u");
    str = str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g, "y");
    str = str.replace(/đ/g, "d");
    return str;
}

function getDDMMYYY(dateString) {
    var dateParts = dateString.split("-");
    return new Date(+dateParts[2], dateParts[1] - 1, +dateParts[0]);
}

function changeDateTime(data) {
    if (data == null || data == "") {
        return "";
    } else {
        return moment(data, "YYYY-MM-DD HH:mm").format('DD/MM/YYYY HH:mm')
    }
}
function changeDateTimeUpdate(data) {
    if (data == null || data == "") {
        return "";
    } else {
        return moment(data).format('DD/MM/YYYY HH:mm')
    }
}
function changeDate(data) {
    if (data == null || data == "") {
        return "";
    } else {
        return moment(data).format('DD/MM/YYYY')
    }
}
function changeDateToDate(data) {
    if (data == null || data == "") {
        return "";
    } else {
        return moment(data, "YYYY-MM-DD").format('DD/MM/YYYY')
    }
}
function formatVND(str) {
    return str.split('').reverse().reduce((prev, next, index) => {
        return ((index % 3) ? next : (next + ',')) + prev
    })
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

// Change Theme Light mode / Dark mode
$('.light-layout').click(function () {
    localStorage.setItem("setAdminLightMode", "true");
    localStorage.removeItem("setAdminDarkMode");
});
if (localStorage.setAdminLightMode) {
    document.querySelector('body')?.classList.add('light-mode');
    document.querySelector('body')?.classList.remove('dark-mode');
}
$('.dark-layout').click(function () {
    localStorage.setItem("setAdminDarkMode", "true");
    localStorage.removeItem("setAdminLightMode");
});
if (localStorage.setAdminDarkMode) {
    document.querySelector('body')?.classList.remove('light-mode');
    document.querySelector('body')?.classList.add('dark-mode');
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
