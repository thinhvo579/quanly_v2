$(document).ready(function () {
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
    });
    $(document).on("click", ".xoa-pb-btn", function (e) {
        $("#overlay").show();
        e.preventDefault();
        var id_del = $("#id_del").val();
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr("content");
        $.ajax({
            url: "/xoa-phong-ban/" + id_del,
            type: "delete",
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
                    $(".text-response").addClass("alert alert-danger");
                    $(".text-response").text(response.message);
                    //myAlertTop();
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
                    $(".text-response").addClass("alert alert-danger");
                    $(".text-response").text(response.message);
                    //myAlertTop();
                }
            },
        });
    });
    // // xoa chuc danh
    $(document).on("click", ".xoa-cd", function (e) {
        e.preventDefault();
        var view_id = $(this).data("id");
        $("#id_del").val(view_id);
    });
    $(document).on("click", ".xoa-cd-btn", function (e) {
        $("#overlay").show();
        e.preventDefault();
        var id_del = $("#id_del").val();
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr("content");
        $.ajax({
            url: "/chucdanh/xoacd/" + id_del,
            type: "delete",
            data: {
                _token: CSRF_TOKEN,
                id: id_del,
            },
            success: function (response) {
                console.log(response);
                if (response.code == 200) {
                    $("#overlay").hide();
                    window.location.href = "/chucdanh";
                } else {
                    $(".text-response").addClass("alert alert-danger");
                    $(".text-response").text(response.message);
                }
            },
        });
    });
});
