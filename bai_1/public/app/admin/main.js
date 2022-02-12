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