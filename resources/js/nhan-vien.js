$(document).ready(function ($) {
    jQuery.noConflict();
    dsNhanVien();
function dsNhanVien(){
        $.ajax({
            type: "GET",
            url: "/ds-nhan-vien",
            dataType: "json",
            success: function(response){
                console.log(response.result);
                $('tbody').html("");
                var stt = 1;
                $.each(response.result, function(key, item){
                    $('tbody').append(
                    '<tr>\
                            <td>'+stt+++'</td>\
                            <td>'+item.ma_nhan_vien+'</td>\
                            <td>'+item.ten_nhan_vien+'</td>\
                            <td>'+item.gioi_tinh+'</td>\
                            <td>'+item.ngay_sinh+'</td>\
                            <td><button class="btn btn-success xem-chi-tiet-pb" data-id="'+item.id+'" data-toggle="modal" data-target="#xem-chi-tiet">Xem chi tiết</button> <button class="chinh-sua btn btn-primary" data-id="'+item.id+'"  data-toggle="modal" data-target="#chinh-sua">Chỉnh Sửa</button> <button type="button" data-toggle="modal" href="#xoa-du-lieu" class="btn btn-danger trigger-btn delete-confirm"  data-id="'+item.id+'">Xóa</button>\
                        </tr>'
                    )
                });
            }
        })
    }
    const formatter = new Intl.NumberFormat('en-US', {
        style: 'currency',
        currency: 'VND',
        minimumFractionDigits: 0
    })
    // xem chi tiet
    $(document).on("click", ".xem-chi-tiet-pb" , function() {
        var view_id = $(this).data('id');
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
       // alert(view_id);
        $.ajax({
            url: '/xem-chi-tiet-nhan-vien',
            type: 'get',
            data: {_token: CSRF_TOKEN,view_id:view_id},
            dataType: 'json',
            success: function(response){
                console.log(response);
                if(response.code == 200){
                    $('#ct_ma_nv').val(response.detail.ma_nhan_vien);
                    $('#ct_ten_nv').val(response.detail.ten_nhan_vien);
                    $('#ct_gt_nv').val(response.detail.gioi_tinh);   
                    $('#ct_ngay_sinh_nv').val(response.detail.ngay_sinh);
                    $('#ct_so_dt_nv').val(response.detail.so_dt);
                    $('#ct_dc_nv').val(response.detail.dia_chi);
                    $('#ct_chuc_vu_nv').val(response.detail.chuc_vu);  
                    $('#ct_luong_nv').val(formatter.format(response.detail.luong));  
                }
            }
        });
    });
});
