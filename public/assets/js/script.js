$(document).ready(function () {
    // $('.vertical .progress-fill span').each(function(){
    //     var percent = $(this).html();
    //     var pTop = 100 - ( percent.slice(0, percent.length - 1) ) + "%";
    //     $(this).parent().css({
    //       'height' : percent,
    //       'top' : pTop
    //     });
    //   });
 
    $('.menu-slide').on('click', function(e){
        $('#wrapper .navbar-nav, #page-top').toggleClass('active');
    })
    $(".input-number input").keypress(function (e) {
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
            //  $("#errmsg").html("Number Only").stop().show().fadeOut("slow");
            return false;
        }
    });
    function getNumberWithCommas(number) {
        return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    }
   
    function showGraph(){

        const ctx = document.getElementById('chartBar1');

        new Chart(ctx, {
          type: 'bar',
          data: {
            labels: ['1', '2', '3', '4', '5', '6','7', '8', '9', '10', '11', '12'],
            datasets: [{
              label: '# of Votes',
              data: total,
              borderWidth: 1
            }]
          },
          options: {
            scales: {
              y: {
                beginAtZero: true
              }
            }
          }
        });
        
    }
    $("#year-salary").on("change", function () {
        var year_selected = $(this).find(":selected").val();
        var ma_nv = $("#nv_code").text();
        $("#overlay").show();
        $.ajax({
            type: "GET",
            url: "/nhanvien/bangluong/" + ma_nv,
            data: { year_selected: year_selected },
            dataType: "json",
            success: function (response) {
                setTimeout(function () {
                    $("#overlay").hide();
                }, 400);
                //console.log(response.luong_nam.total);
                if (response.code == 200) {
                    // ================
                    $("#thang1").val(
                        getNumberWithCommas(response.detail.thang1)
                    );

                    $("#thang2").val(
                        getNumberWithCommas(response.detail.thang2)
                    );
                    $("#thang3").val(
                        getNumberWithCommas(response.detail.thang3)
                    );
                    $("#thang4").val(
                        getNumberWithCommas(response.detail.thang4)
                    );
                    $("#thang5").val(
                        getNumberWithCommas(response.detail.thang5)
                    );
                    $("#thang6").val(
                        getNumberWithCommas(response.detail.thang6)
                    );
                    $("#thang7").val(
                        getNumberWithCommas(response.detail.thang7)
                    );
                    $("#thang8").val(
                        getNumberWithCommas(response.detail.thang8)
                    );
                    $("#thang9").val(
                        getNumberWithCommas(response.detail.thang9)
                    );
                    $("#thang10").val(
                        getNumberWithCommas(response.detail.thang10)
                    );
                    $("#thang11").val(
                        getNumberWithCommas(response.detail.thang11)
                    );
                    $("#thang12").val(
                        getNumberWithCommas(response.detail.thang11)
                    );
                    $("#year_salary").text(
                        "Tổng Lương Trong Năm: " +
                            getNumberWithCommas(response.luong_nam.total)
                    );
                    // 
                   
                   var total = [response.detail.thang1,response.detail.thang2,response.detail.thang3,response.detail.thang4,response.detail.thang5,response.detail.thang6,
                    response.detail.thang7,response.detail.thang8,response.detail.thang9,response.detail.thang10,response.detail.thang11,response.detail.thang12]; 

                    console.log(total);
                    $("canvas#chartBar1").remove();
                    $("div.chartreport").append('<canvas id="chartBar1" class="animated fadeIn" height="120"></canvas>');

                    const ctx = document.getElementById('chartBar1');

                    chartreport=   new Chart(ctx, {
          type: 'bar',
          data: {
            labels: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6','Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'],
            datasets: [{
              label: response.detail.nam,
              data: total,
              borderWidth: 1,
              backgroundColor: "#664dc9",
            }]
          },
          options: {
            scales: {
              y: {
                beginAtZero: true
              }
            }
          }
        });
                    
                    // 
                    
                } else {
                    $("#thang1").val("0");
                    $("#thang2").val("0");
                    $("#thang3").val("0");
                    $("#thang4").val("0");
                    $("#thang5").val("0");
                    $("#thang6").val("0");
                    $("#thang7").val("0");
                    $("#thang8").val("0");
                    $("#thang9").val("0");
                    $("#thang10").val("0");
                    $("#thang11").val("0");
                    $("#thang12").val("0");
                    $("#year_salary").text("Tổng Lương Trong Năm: 0");
                }
            },
        });
    });
    $("#thongkeluong").submit(function (e) {
        $("#overlay").show();
        e.preventDefault();
        var pb_select = $("#salary-pb").find(":selected").val();
        var year_select = $("#salary-nam").find(":selected").val();
        console.log(pb_select, year_select);
        if (pb_select && year_select) {
            $.ajax({
                type: "get",
                url: "/thongkeluong1/",
                data: { pb_select: pb_select, year_select: year_select },
                dataType: "json",
                success: function (response) {
                    setTimeout(function () {
                        $("#overlay").hide();
                    }, 400);

                    console.log(response);
                    $("#text-result").html(
                        "Kết quả thống kê lương " +
                            response.phongban +
                            " năm " +
                            response.nam +
                            " là: " +
                            response.total +
                            " VNĐ"
                    );
                },
            });
        } else {
            setTimeout(function () {
                $("#overlay").hide();
            }, 400);
        }
    });
    // $("#year-salary").val(year);
    // $("#year-salary").datepicker({
    //     format: "yyyy",
    //     viewMode: "years",
    //     minViewMode: "years"
    // });
    $("#year-salary").change();
    if ($(".datetimepicker").length > 0) {
        $(".datetimepicker").datepicker({
            shortYearCutoff: 1,
            changeMonth: true,
            changeYear: true,
            dateFormat: "yy-mm-dd",
            minDate: "-70Y",
            maxDate: "-15Y",
            yearRange: "1942:2010",
        });
    }
    $("#myTable").DataTable({
        language: {
            paginate: {
                previous: "Prev ",
                next: "Next",
            },
            info: "Hiện _PAGE_ trên _PAGES_ trang",
            lengthMenu: "Hiện _MENU_ dòng",
            emptyTable: "Không có dữ liệu!",
        },
    });
    setTimeout(function () {
        $(".flash-message").remove();
    }, 3000);
    $(".submenu a").on("click", function (e) {
        if ($(this).parent().hasClass("submenu")) {
            e.preventDefault();
        }
        if (!$(this).hasClass("subdrop")) {
            $("ul", $(this).parents("ul:first")).slideUp(350);
            $("a", $(this).parents("ul:first")).removeClass("subdrop");
            $(this).next("ul").slideDown(350);
            $(this).addClass("subdrop");
        } else if ($(this).hasClass("subdrop")) {
            $(this).removeClass("subdrop");
            $(this).next("ul").slideUp(350);
        }
    });
    // // xoa phong ban
    $(document).on("click", ".xoa-phong-ban", function (e) {
        e.preventDefault();
        var view_id = $(this).data("id");
        // alert(view_id);
        $("#id_del").val(view_id);
        $(".message-cd").text("");
    });
    $(document).on("click", ".xoa-pb-btn", function (e) {
        $("#overlay").show();
        e.preventDefault();
        var id_del = $("#id_del").val();
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr("content");
        $.ajax({
            url: "/phongban/xoa-phong-ban/" + id_del,
            type: "post",
            data: {
                _token: CSRF_TOKEN,
                id: id_del,
            },
            success: function (response) {
                console.log(response);
                if (response.code == 200) {
                    $("#overlay").hide();
                    window.location.href = "/phongban";
                } else {
                    $("#overlay").hide();
                    $(".message-cd").text("Mã Phòng Ban đang được sử dụng!");
                }
            },
        });
    });
    // // xoa phong ban
    $(document).on("click", ".xoa-nv", function (e) {
        e.preventDefault();
        var view_id = $(this).data("id");
        // alert(view_id);
        $("#id_del").val(view_id);
    });
    $(document).on("click", ".xoa-nv-btn", function (e) {
        $("#overlay").show();
        e.preventDefault();
        var id_del = $("#id_del").val();
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr("content");
        $.ajax({
            url: "/nhanvien/xoanv/" + id_del,
            type: "delete",
            data: {
                _token: CSRF_TOKEN,
                id: id_del,
            },
            success: function (response) {
                console.log(response);
                if (response.code == 200) {
                    $("#overlay").hide();
                    window.location.href = "/nhanvien";
                } else {
                }
            },
        });
    });
    // // xoa chuc danh
    $(document).on("click", ".xoa-cd", function (e) {
        e.preventDefault();
        var view_id = $(this).data("id");
        $("#id_del").val(view_id);
        $(".message-cd").text("");
    });
    $(document).on("click", ".xoa-cd-btn", function (e) {
        $("#overlay").show();
        e.preventDefault();
        var id_del = $("#id_del").val();
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr("content");
        //alert(id_del, CSRF_TOKEN);
        $.ajax({
            url: "/chucdanh/xoacd/" + id_del,
            type: "post",
            data: {
                _token: CSRF_TOKEN,
                id: id_del,
            },
            success: function (response) {
                //console.log(response);
                if (response.code == 200) {
                    $("#overlay").hide();
                    window.location.href = "/chucdanh";
                } else {
                    $("#overlay").hide();
                    $(".message-cd").text("Mã Chức Danh đang được sử dụng!");
                }
            },
        });
    });
});
