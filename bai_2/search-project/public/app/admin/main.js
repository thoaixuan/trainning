function renderAction(data) {
    var htmlButton = `<div class="btn-group">`;
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
function renderSwitch(data) {
    console.log(data);
    var htmlSwitch = '<div class="custom-control custom-switch custom-switch-on-success custom-switch-off-danger">';
    $.each(data, function (index, item) {
        htmlSwitch += '<input type="checkbox"'
            + (item.value == 0 ? 'checked' : '')
            + ' class="custom-control-input" id="custom-action-'
            + item.id + '" value="' + item.id + '"data-status='
            + item.value + '>';
        htmlSwitch += '<label class="custom-control-label" for="custom-action-'
            + item.id + '"></label>';
    });
    htmlSwitch += '</div>';
    return htmlSwitch;
}