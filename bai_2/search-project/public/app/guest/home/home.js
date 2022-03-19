$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
function home() {
    this.datas = null;
    var datas = null;
    this.init = function () {
        datas = this.datas;
        var me = this;
        me.datatables();
        me.ckeditor();
    }
    this.datatables = function () {
        var me = this;
        var table = $("#project-table").DataTable({
            serverSide: true,
            processing: true,
            paging: true,
            lengthMenu: [[10, 25, 50, 100], [10, 25, 50, 100]],
            pagingType: "full_numbers",
            lengthChange: false,
            searching: false,
            ordering: true,
            info: true,
            responsive: true,
            autoWidth: false,
            ajax: {
                url: datas.routes.datatable,
                type: "GET",
                data: function (d) {
                    return $.extend({}, d, {
                        search: $("#search").val(),
                    });

                }
            },
            order: [0, "asc"],
            columns: [
                {
                    title: "#",
                    data: "id",
                    name: "id",
                    className: "text-center",
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                {
                    title: "Name user",
                    data: "name",
                    name: "name",
                    className: "",
                },
                {
                    title: "Email",
                    data: "email",
                    name: "email",
                    className: "",
                },
                {
                    title: "Phone",
                    data: "phone",
                    name: "phone",
                    className: "",
                },
                {
                    title: "Name Service",
                    data: "service_name",
                    name: "service_name",
                    className: "",
                    render: function (data, type, row, meta) {
                        if (data == null) {
                            return 'Chưa có dữ liệu';
                        }
                        else {
                            return data;
                        }

                    }
                },
                {
                    title: "Name Project",
                    data: "projects_name",
                    name: "projects_name",
                    className: "",
                    render: function (data, type, row, meta) {
                        if (data == null) {
                            return 'Chưa có dữ liệu'
                        }
                        else {
                            return renderAction([{
                                data: data,
                                value: row.id,
                            }]);
                        }

                    }
                },


            ],
        });

        me.action(table);
    }
    this.action = function (table) {
        $(document).ready(function () {
            $.ajax({
                type: "get",
                url: datas.routes.get_user,
                dataType: 'JSON',
                success: function (response) {
                    $.each(response.data, function (key, item) {
                        $('#select_user').append('<option value=' + item.id + '>' + item.name + '</option');
                    });
                }
            })
        });


        $(document).ready(function () {
            $.ajax({
                type: "get",
                url: datas.routes.get_service,
                dataType: 'JSON',
                success: function (response) {
                    $.each(response.data, function (key, item) {
                        $('#select_service').append('<option value=' + item.id + '>' + item.service_name + '</option');
                    });
                }
            })
        });
        $("#btn-search").on('click', function (e) {
            table.ajax.reload();
        });
<<<<<<< Updated upstream
        $(document).on('click', '#projects', function () {
            $.ajax({
                url: datas.routes.get_data_project,
                type: "get",
                dataType: 'json',
                data: {
                    _token: $("input[name=_token]").val(),
                    "id": $(this).data("id"),
                },
                success: function (response) {
                    // var dat = new Date();
                    console.log(response);
                    $('input[name="id"]').val(response.data.id);
                    $('input[name="projects_name"]').val(response.data.projects_name);
                    $('input[name="time_begin"]').val(response.data.time_begin);
                    // document.getElementById("time_begin").value = "2014-02-09";
                    // document.getElementById("time_end").value = "2014-02-09";
                    $('input[name="time_end"]').val(response.data.time_end);
                    $("select#select_service").val(response.data.service_id);
                    $("select#select_user").val(response.data.user_id);
                    editor.setData(response.data.projects_detail);
                    $("#projectModal").modal("toggle");
                }
            });
        });
        $("#search").on('keypress', function (e) {
            if (e.which == 13) {
                table.ajax.reload();
            }
        });


    }
    this.ckeditor = function () {
        ClassicEditor
            .create(document.querySelector('#projects_detail'), {
                toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote'],
                heading: {
                    options: [
                        { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                        { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                        { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                        { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
                    ]
                }
            }).then(newEditor => {
                editor = newEditor;
                // editor.ui.view.editable.element.style.height = '300px';
            })
            .catch(error => {
                console.log(error);
            });

=======
>>>>>>> Stashed changes
    }
}