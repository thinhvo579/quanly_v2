$(document).ready(function () {
    const d = new Date();
    var year = d.getFullYear();
    $('#year-salary').on('change', function getYear(){
        var year_selected = $(this).find(":selected").val();
        var ma_nv = $('#nv_code').text();
        $("#overlay").show();
    // alert(year);
        $.ajax({
         type: 'GET',
         url: '/nhanvien/bangluong/'+ma_nv,
         data: {year_selected : year_selected},
         dataType: 'json',
         success: function(response){
            setTimeout(function() {
                $("#overlay").hide();
            }, 500);
          
             console.log(response);
             if(response.code == 200){
             $('#thang1').val(response.detail.thang1);
             $('#thang2').val(response.detail.thang2);
             $('#thang3').val(response.detail.thang3);
             $('#thang4').val(response.detail.thang4);
             $('#thang5').val(response.detail.thang5);
             $('#thang6').val(response.detail.thang6);
             $('#thang7').val(response.detail.thang7);
             $('#thang8').val(response.detail.thang8);
             $('#thang9').val(response.detail.thang9);
             $('#thang10').val(response.detail.thang10);
             $('#thang11').val(response.detail.thang11);
             $('#thang12').val(response.detail.thang11);

             }
             else{
                $('#thang1').val('0');
                $('#thang2').val('0');
                $('#thang3').val('0');
                $('#thang4').val('0');
                $('#thang5').val('0');
                $('#thang6').val('0');
                $('#thang7').val('0');
                $('#thang8').val('0');
                $('#thang9').val('0');
                $('#thang10').val('0');
                $('#thang11').val('0');
                $('#thang12').val('0');
   
                }
         }
         });
    });
    // $("#year-salary").val(year);
    // $("#year-salary").datepicker({
    //     format: "yyyy",
    //     viewMode: "years", 
    //     minViewMode: "years"
    // });
    $('#year-salary').change();
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
