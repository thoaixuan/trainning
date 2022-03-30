function dashboard() {
    this.datas = null;
    var datas = null;
    this.init = function () {
        datas = this.datas;
        var me = this;
        me.datatables();
    }
    this.datatables = function () {
        var me= this;
        var table=$("#datatable").DataTable({
            language: {
                processing: "Đang tải dữ liệu",
                search: "Placeholder của input tìm kiếm",
                lengthMenu: "Điều chỉnh số lượng bản ghi trên 1 trang _MENU_ ",
                info: "Bản ghi từ _START_ đến _END_ || Tổng cộng _TOTAL_ bản ghi",
                infoEmpty: "Không có dữ liệu, Hiển thị 0 bản ghi trong 0 tổng cộng 0 ",
                infoFiltered: "(Bản ghi tổng cộng:_MAX_)",
                loadingRecords: "",
                zeroRecords: "Không có dữ liệu nào ",
                emptyTable: "Không có dữ liệu",
                paginate: {
                    first: "Trang đầu",
                    previous: "Trang trước",
                    next: "Trang sau",
                    last: "Trang cuối"
                },
                aria: {
                    sortAscending: ": Đang sắp xếp theo column",
                    sortDescending: ": Đang sắp xếp theo column",
                }
            },
            serverSide: true,
            processing: true,
            paging: true,
            lengthMenu: [[10, 25, 50, 100], [10, 25, 50, 100]],
            pagingType: "full_numbers",
            lengthChange: false,
            searching: false,
            ordering: true,
            order: [0, "asc"],
            info: true,
            responsive: true,
            autoWidth: false,
            ajax: {
                url: datas.routes.datatable,
                type: "GET",
                data: function (d) {
                    return $.extend({}, d, {
                        search: $("#search").val(),
                        tinh:$("#tinh").val(),
                        huyen:$("#huyen").val(),
                        xa:$("#xa").val(),
                        dientich:$("#dientich").val(),
                        gia:$("#gia").val(),
                    });

                }
            },
            columns: [
                {
                    title: "Tiêu đề",
                    data: "Title",
                    name: "Title",
                    className: "",
                },
                {
                    title: "Diện tích",
                    data: "Area",
                    name: "Area",
                    className: "",
                }, 
                {
                    title: "Giá tiền",
                    data: "Price",
                    name: "Price",
                    className: "",
                }, 
                {
                    title: "Chi tiết",
                    data: "_id",
                    name: "_id",
                    className: "",
                    render: function (data, type, row, meta) {
                        return renderDetail([{
                            class: 'btn btn-outline-success',
                            value: row._id,
                            data: data,
                            title: 'detail',
                            icon: 'fa fa-eye'
                        }]);
                    }
    
                }, 
             

            ],
        });
        me.action(table);
    }
    this.action =function(table){
        var search =document.getElementById('btn_search');
        search.onclick=function(){
            table.ajax.reload();
        }
        document.getElementById("search").addEventListener("keyup", function (event) {
            if (event.keyCode === 13) {
                table.ajax.reload();
                return false;
            }
        });
        //Loadding dữ liệu tỉnh
        $.ajax({
            type: "get",
            url: datas.routes.get_province,
            dataType: 'JSON',
            success: function (response) {
                    console.log(response);
                    $('#tinh').select2();
                    var data = response
                    var list = document.getElementById("tinh");
                    for (var i in data) {
                        list.add(new Option(data[i], data[i]));
                    }
    
            }
        });
        $('#search').on('click',function(){
            $("#tinh").val(0).trigger('change');
            $("#huyen").empty();
            $("#xa").empty();
        })
        $('#tinh').on('change',function(){
            if(this.value==0){
                $("#huyen").empty();
                $("#xa").empty();
            }
        })
         //Loadding dữ liệu huyện
         $('#tinh').on('change', function() {
            $.ajax({
                type: "get",
                url: datas.routes.get_district,
                data:{name:this.value},
                dataType: 'JSON',
                success: function (response) {
                        console.log(response);
                        $("#huyen").empty();
                        $('#huyen').select2();
                        var data = response
                        var list = document.getElementById("huyen");
                        for (var i in data) {
                            list.add(new Option(data[i], data[i]));
                        }
        
                }
            });
          });
         //Loadding dữ liệu xã
         $("#huyen").on('change',function(){
            $.ajax({
                type: "get",
                url: datas.routes.get_ward,
                data:{name:this.value},
                dataType: 'JSON',
                success: function (response) {
                        console.log(response);
                        $("#xa").empty();
                        $('#xa').select2();
                        var data = response
                        var list = document.getElementById("xa");
                        for (var i in data) {
                            list.add(new Option(data[i], data[i]));
                        }
                }
            });
         });
        //Loadding dữ liệu giá diện tích
            // $.ajax({
            //     type: "get",
            //     url: datas.routes.get_area,
            //     dataType: 'JSON',
            //     success: function (response) {
            //              console.log(response);
            //             $("#dientich").select2();
            //             var data = response
            //             var list = document.getElementById("dientich");
            //             for (var i in data) {
            //                 list.add(new Option(data[i], data[i]));
            //             }
    
            //     }
            // }); 
        //Loadding dữ liệu giá tiền
            // $.ajax({
            //     type: "get",
            //     url: datas.routes.get_price,
            //     dataType: 'JSON',
            //     success: function (response) {
            //             $("#gia").select2();
            //             var data = response
            //             var list = document.getElementById("gia");
            //             for (var i in data) {
            //                 list.add(new Option(data[i], data[i]));
            //             }
    
            //     }
            // });
   
        // find by id user detail.
        var myModal = new bootstrap.Modal(document.getElementById('DetailModal'), {
            keyboard: true
        });
        $(document).on('click', '#detail', function () {
            $.ajax({
                url: datas.routes.get_data,
                type: "get",
                dataType: 'json',
                data: {
                    _token: $("input[name=_token]").val(),
                    "id": $(this).data("id"),
                },
                success: function (response) {
                    // console.log(response[0].Location.Province.province_name);
                    $('#_tieude').html(response[0].Title);
                    $('#_noidung').html(response[0].Content);
                    $('#_tinh').text(response[0].Location.Province.province_name);
                    $('#_quan').text(response[0].Location.District.district_name);
                    $('#_xa').text(response[0].Location.Ward.ward_name);
                    $('#_dientich').text(response[0].Area);
                    $('#_giatien').text(response[0].Price);
                    $('#_thongtin').text(response[0].Ext);
                    $('#_sdt').text(response[0].Phone);
                    $('#_vitri').text(response[0].GoogleMap);
                    $('#img_1').attr('src',response[0].Images[0]);
                    $('#img_2').attr('src',response[0].Images[1]);
                    $('#img_3').attr('src',response[0].Images[2]);
                    $('#img_4').attr('src',response[0].Images[3]);
              
                    myModal.show();
                    }
                });
        });
      
        setInterval(()=>{
            var day=new Date();
            var date=day.getDate()+'-'+(day.getMonth()+1)+'-'+day.getFullYear()+
            '||'+day.getHours()+':'+day.getMinutes()+':'+day.getSeconds();
            document.getElementById("time").innerHTML=date;
        },1000);     
       
    }
 
    

}