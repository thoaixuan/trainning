function question() {
    this.datas = null;
    var datas = null;
    this.init = function() {
        datas = this.datas;
        var me = this;
        me.datatables();
    }
    this.datatables = function() {
        var me = this;
        var table = $("#home-question-table").DataTable({
            serverSide: true,
            processing: true,
            paging: true,
            lengthMenu: [
                [10, 25, 50, 100],
                [10, 25, 50, 100]
            ],
            pagingType: "full_numbers",
            lengthChange: false,
            searching: false,
            ordering: true,
            order: [0, "desc"],
            info: true,
            responsive: false,
            autoWidth: false,
            ajax: {
                url: datas.routes.datatable,
                type: "GET",
                data: function(d) {
                    return $.extend({}, d, {
                        search: $("#search").val(),
                    });

                }
            },
            columns: [
                {
                    title: "Tiêu đề",
                    data: "title",
                    name: "title",
                    className: "",
                    render: function(data, type, row, meta) {
                        return data;
                    }

                },
                {
                    title: "Mô tả",
                    data: "des",
                    name: "des",
                    className: "",
                },
                {
                    title: "Tác vụ",
                    data: "id",
                    name: "id",
                    className: "text-center",
                    bSortable: false,
                    render: function(data, type, row, meta) {
                        return renderAction([{
                            class: 'btn btn-sm btn-primary badge',
                            value: row.id,
                            title: 'updateQuestion',
                            icon: 'fa fa-edit',
                        }, {
                            class: 'btn btn-sm btn-primary badge',
                            value: row.id,
                            title: 'deleteQuestion',
                            icon: 'fa fa-trash',
                        }, ]);
                    }
                },

            ],
        });

        me.action(table);
    }
    this.action = function(table) {
        var submit = document.getElementById("submitHomeQuestion");
        var title = document.getElementById("ModalLabelHomeQuestion");

        var myModal = new bootstrap.Modal(document.getElementById('modalHomeQuestion'), {
            keyboard: true
        });
        var toolbarOptions = [
            [{ 'font': [] }, { 'size': [] }],
          [ 'bold', 'italic', 'underline', 'strike' ],
          [{ 'script': 'super' }, { 'script': 'sub' }],
          [{ 'header': '1' }, { 'header': '2' }, 'blockquote', 'code-block' ],
          [{ align: '' }, { align: 'center' }, { align: 'right' }, { align: 'justify' }],
          [{ 'list': 'ordered' }, { 'list': 'bullet'}, { 'indent': '-1' }, { 'indent': '+1' }],
          [ 'link', 'image', 'video', 'formula' ],
          [ 'clean' ]
        ];
        var quillDescription = new Quill('#quillEditor', {
            modules: {
                toolbar: toolbarOptions
            },
            theme: 'snow',
            placeholder: 'Nhập mô tả',
        });
        //Mở modal thêm dữ liệu
        $(document).on('click', '#openQuestion', function () {
            title.textContent = "Thêm dữ liệu mới";
            submit.textContent = "Thêm dữ liệu";
            quillDescription.root.innerHTML = '';
                        submit.setAttribute('data-url', datas.routes.insert);
                        myModal.show();
        });

        // Mở modal cập nhật dữ liệu
        $(document).on('click', '#updateQuestion', function () {
            submit.textContent = "Chỉnh sửa";
            title.textContent = "Chỉnh sửa";
            $.ajax({
                url: datas.routes.get_update,
                type: "get",
                dataType: 'json',
                data: {
                    "id": $(this).data("id"),
                },
                success: function (response) {
                    if (response.status) {
                        submit.setAttribute('data-url', datas.routes.update);
                        submit.setAttribute('data-id', response.data.id);
                        document.getElementById("question_title").value = response.data.title;
                        quillDescription.root.innerHTML = response.data.des;

                        myModal.show();
                    } else {
                        toastr.error(response.message);
                    }

                },
                error: function () {

                }
            });
        });

        // Xóa dữ liệu
        $(document).delegate("#deleteQuestion", "click", function () {
			var id = $(this).data("id");
			$('#modal-text-delete-question').text("Bạn có muốn xóa không ?");
			$("#onDeleteQuestion").attr('value', id);
			$("#modal-delete-question").modal('show');
		});

		$("#onDeleteQuestion").on("click", function (e) {
			e.preventDefault(e);
			var id = $(this).val();
			var result = tableAjaxDelete(table,{
				id: id
			}, datas.routes.delete);
			if (result) {
				$("#modal-delete-question").modal('hide');
			} else {
				$("#modal-delete-question").modal('hide');
			}
		});

        jQuery.validator.addMethod("validateScript", function(value, element){
			return !(value.includes("script>") ||
							value.includes("script&gt;") ||
							value.includes("<?") ||
							value.includes("&lt;?"));
		}, "Vui lòng nhập đúng định dạng chữ");
        $('#homeQuestionForm').validate({
			rules: {
			},
			messages: {
			},
			errorElement: 'span',
			errorPlacement: function (error, element) {
				error.addClass('invalid-feedback');
				element.closest('.form-group').append(error);
			},
			highlight: function (element, errorClass, validClass) {
				$(element).addClass('is-invalid');
			},
			unhighlight: function (element, errorClass, validClass) {
				$(element).removeClass('is-invalid');
			},
            onfocusout: function(element){ return false; },
            submitHandler: function(e) {
                var getDescription = document.getElementById("question_des").value = quillDescription.root.innerHTML;
				var url = $('#submitHomeQuestion').attr('data-url');
				var formData = new FormData($("#homeQuestionForm")[0]);
				formData.append('id', $("#submitHomeQuestion").attr('data-id'));
                formData.append('des', getDescription);

                $.ajax({
                    		url: url,
                    		data: formData,
                    		type: 'POST',
                    		data: formData,
                            processData: false,
                            contentType: false,
                    		success: function (data) {
                    				myModal.hide();
                    				toastr.success(data.message);
                    				table.ajax.reload();
                    		},
                    		error: function (error) {
                    			console.log("Lỗi");
                    		}
                    	});
            }
			
		});


    }


}