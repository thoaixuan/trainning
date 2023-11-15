$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function renderAction(data) {
    var htmlButton = `<div class="btn-group align-top">`;
    $.each(data, function(index, item) {

        if(item.title == 'update'){
            htmlButton += '<button data-bs-toggle="modal" data-bs-target="#exampleModal" button="dropdown-item" data-id="' +
            item.value + '" class="' +
            item.class + '" id="' +
            item.title + '">' +
            '<i class="' +
            item.icon + '"></i>' +
            "</button>";
        }else{
            htmlButton += '<button button="dropdown-item" data-id="' +
            item.value + '" class="' +
            item.class + '" id="' +
            item.title + '">' +
            '<i class="' +
            item.icon + '"></i>' +
            "</button>";
        }

       
    });
    htmlButton += "</div>";
    return htmlButton;
}

function changeDate(data) {
    if (data == null || data == "") {
        return "";
    } else {
        return moment(data, "YYYY-MM-DD").format('DD/MM/YYYY')
    }
}