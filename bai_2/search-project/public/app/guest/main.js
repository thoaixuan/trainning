function renderAction(data) {
    var htmlModal = `<div>`;
    $.each(data, function (index, item) {

        htmlModal += '<span data-id="' + item.value

            + '" id="projects">' +
            item.data
            + "</span>";
    });
    htmlModal += "</div>";
    return htmlModal;
}