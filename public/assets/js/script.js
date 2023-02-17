$(document).ready(function () {
    if ($(".datetimepicker").length > 0) {
        $(".datetimepicker").datepicker({
            shortYearCutoff: 1,
        changeMonth: true,
        changeYear: true,
        dateFormat: 'yy-mm-dd',
        minDate: "-70Y", 
        maxDate: "-15Y",
        yearRange: "1942:2010"
        }
        );
      
    }
    $('#myTable').DataTable({
        "language": {
            "paginate": {
                "previous": "Prev ",
              "next": "Next"
            },
            "info": "Hiện _PAGE_ trên _PAGES_ page",
            "lengthMenu": "Hiện _MENU_ dòng",
            "emptyTable": "Không có dữ liệu!"
          }
      });
    setTimeout(function(){
        $(".flash-message").remove();
    },3000);
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
        $('.message-cd').text('');
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
                    $('.message-cd').text('Mã Phòng Ban đang được sử dụng!');
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
        $('.message-cd').text('');
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
                    $('.message-cd').text('Mã Chức Danh đang được sử dụng!');
                    
                    
                }
            },
        });
    });
});
