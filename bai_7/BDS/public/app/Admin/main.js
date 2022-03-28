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


function renderSwitch(data) {
    var htmlSwitch = '<div class="switch-toggle">';
    htmlSwitch += '<div class="onoffswitch2 ">';
    $.each(data, function(index, item) {
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
    $.each(data, function(index, item) {
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
    element["on" + event] = function(e) {
        const output = callback(e);
        if (output === false) return false;

        if (typeof previousEventCallBack === 'function') {
            output = previousEventCallBack(e);
            if (output === false) return false;
        }
    }
};

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

function changeDate(data) {
    if (data == null || data == "") {
        return "";
    } else {
        return moment(data, "YYYY-MM-DD").format('DD/MM/YYYY')
    }
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