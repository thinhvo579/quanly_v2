
<!DOCTYPE html>
<html lang="en">

<head>

@include('backend.head')

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('sidebar.sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column  col-xl-10 col-md-10">

            <!-- Main Content -->
            <div id="content">
        
                <!-- Topbar -->
                @include('backend.topbar')
                <!-- End of Topbar -->
        
                <!-- Begin Page Content -->
                <div class="container-fluid">
        
                    <!-- Page Heading -->
                    <div class="main-content d-sm-flex align-items-center justify-content-between mb-2">
                        <h1 class=" mb-0 text-gray-800 first-title-main"></h1>
                        {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
                    </div>
        
                    <!-- Content Row -->
                    <div class="row">
        
                     <div class="col-xl-12 col-md-12">
                       
                        <div class="top-action mb-2">

                            <div class="add-new">
                                <button type="button" class="btn btn-success"  data-toggle="modal" data-target="#them-nhan-vien-form"><i class="fa-solid fa-plus"></i> Thêm Nhân Viên</button>
                                <div class="modal fade div-add" id="them-nhan-vien-form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <form action="them-moi-nhan-vien" method="POST" id="them-nhan-vien" role="form">
                                        @csrf
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Thêm Nhân Viên</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <div class="modal-body new-pb form-flex">
                                            <div class="row-f f-100 d-flex"><label for="">Tên Phòng Ban:</label>
                                                <select name="select-phong-ban" id="select-phong-ban" required>
                                                    <option selected="true" value=""disabled>Chọn Phòng Ban</option>
                                                    <?php foreach ($phongban as $key => $value) { ?>
                                                        <option value="<?php echo $value->ma_phong_ban; ?>"><?php echo $value->ten_phong_ban; ?></option>
                                                   <?php } ?>
                                                    </select>
                                            </div>
                                            <div class="row-f f-100 d-flex"><label for="">Chức Vụ:</label>
                                                <select name="select-chuc-danh" id="select-chuc-danh" required>
                                                    <option selected="true" value=""disabled>Chọn Chức Danh</option>
                                                    <?php foreach ($chucvu as $key => $value) { ?>
                                                        <option value="<?php echo $value->ma_chuc_danh; ?>"><?php echo $value->ten_chuc_danh; ?></option>
                                                   <?php } ?>
                                                </select>
                                            </div>
                                            <div class="row-f f-100 d-flex inputMaNv"><label for="">Mã Nhân Viên:</label>
                                                <span class="check_ma_nv"></span>
                                                <input type="text" id="new_ma_nv" name="new_ma_nv" value="" required></div>
                                            <div class="row-f f-100 d-flex"><label for="">Tên Nhân Viên:</label><input type="text" id ="new_ten_nv" name="new_ten_nv" value="" required></div>
                                            <div class="row-f f-100 d-flex"><label for="">Giới Tính:</label>
                                                <select name="new_gt_nv" id="new_gt_nv">
                                                    <option value="Nam">Nam</option>
                                                    <option value="Nữ">Nữ</option></div>
                                                </select>
                                            </div>
                                            <div class="row-f f-100 d-flex"><label for="">Ngày Sinh:</label><input type="date" id="new_ngay_sinh_nv" name="new_ngay_sinh_nv" value=""  required></div>
                                            <div class="row-f f-100 d-flex"><label for="">Số Điện Thoại:</label><input type="text" id="new_so_dt_nv" name="new_so_dt_nv" value=""  required></div>
                                            <div class="row-f f-100 d-flex"><label for="">Địa Chỉ:</label><textarea name="new_dc_nv" id="new_dc_nv" cols="30" rows="2" value=""  required></textarea></div>
                                            
                                            <div class="row-f f-100 d-flex"><label for="">Lương:</label><input type="text" id="new_luong_nv" name="new_luong_nv" value="" required></div>
                                            
                                          </div>
                                          <div  class="modal-footer">
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                                                <button type="submit" class="btn btn-success">Lưu thay đổi</button>
                                            </div>
                                          </div>
                                        </div>
                                    </div>
                                </form>
                                </div>
                            </div>
                            {{-- - --}}
                        <div class="input-group live-search">
                            <div class="form-outline">
                                <input id="search-input-text" type="search" class="form-control" placeholder="Tìm kiếm"/>
                                
                            </div>
                           
                            </div>
                        </div>
                        
                        
                        <table class="table-full-width table"  id="fid_table">
                            <thead class="thead-primary">
                                <tr class="t_head">
                                    <th style="width:5%;">STT</th>
                                    <th style="width:15%;">Mã Nhân Viên</th>
                                    <th style="width:30%;">Tên Nhân Viên</th>
                                    <th style="width:10%;">Giới Tính</th>
                                    <th style="width:10%;">Ngày Sinh</th>
                                    <th style="width:30%;">Hành Động</th>
                                </tr>
                            </thead>
                            <tbody>
                          
                                {{-- Hiển thị phòng ban --}}
                               
                            </tbody>
                        </table>
                     </div>
                     
                    </div>
        
                    <!-- Content Row -->
        
                    
        
                </div>
                <!-- /.container-fluid -->
                
        
            </div>
            <!-- End of Main Content -->
            <div class="modal fade div-add" id="xem-chi-tiet" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Chi Tiết Nhân Viên</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body new-pb form-flex">
                        <div class="row-f f-100 d-flex"><label for="">Mã Nhân Viên:</label><input type="text" id="ct_ma_nv" name="ct_ma_nv" value="" disabled></div>
                        <div class="row-f f-100 d-flex"><label for="">Tên Nhân Viên:</label><input type="text" id ="ct_ten_nv" name="ct_ten_nv" value=""  disabled></div>
                        <div class="row-f f-100 d-flex"><label for="">Giới Tính:</label><input type="text" id ="ct_gt_nv" name="ct_gt_nv" value=""  disabled></div>
                        <div class="row-f f-100 d-flex"><label for="">Ngày Sinh:</label><input type="text" id="ct_ngay_sinh_nv" name="ct_ngay_sinh_nv" value="" disabled></div>
                        <div class="row-f f-100 d-flex"><label for="">Số Điện Thoại:</label><input type="text" id="ct_so_dt_nv" name="ct_so_dt_nv" value="" disabled></div>
                        <div class="row-f f-100 d-flex"><label for="">Địa Chỉ:</label><textarea name="ct_dc_nv" id="ct_dc_nv" cols="30" rows="2" value="" disabled></textarea></div>
                        <div class="row-f f-100 d-flex"><label for="">Chức Vụ:</label><input type="text" id="ct_chuc_vu_nv" name="ct_chuc_vu_nv" value="" disabled></div>
                        <div class="row-f f-100 d-flex"><label for="">Lương:</label><input type="text" id="ct_luong_nv" name="ct_luong_nv" value="" disabled></div>
                        
                      </div>
                      <div  class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                            <!-- delete confirm -->
                      </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="chinh-sua" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Chỉnh Sửa Nhân Viên</h5>
                        <span id="id_cd" ></span>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body new-pb form-flex">
                        <div class="row-f f-100 d-flex"><label for="">Tên Phòng Ban:</label>
                            <select name="edit-phong-ban-nv" id="edit-phong-ban-nv" required>
                                <option selected="true" value="">Chọn Phòng Ban</option>
                                <?php foreach ($phongban as $key => $value) { ?>
                                    <option value="<?php echo $value->ma_phong_ban; ?>"><?php echo $value->ten_phong_ban; ?></option>
                               <?php } ?>
                                </select>
                        </div>
                        <div class="row-f f-100 d-flex"><label for="">Chức Vụ:</label>
                            <select name="edit-chuc-danh" id="edit-chuc-danh" required>
                                <option selected="true" value="">Chọn Chức Danh</option>
                                <?php foreach ($chucvu as $key => $value) { ?>
                                    <option value="<?php echo $value->ma_chuc_danh; ?>"><?php echo $value->ten_chuc_danh; ?></option>
                               <?php } ?>
                                </select>
                        </div>
                        <div class="row-f f-100 d-flex"><label for="">Mã Nhân Viên:</label><input type="text" id="edit_ma_nv" name="edit_ma_nv" value="" ></div>
                        <div class="row-f f-100 d-flex"><label for="">Tên Nhân Viên:</label><input type="text" id ="edit_ten_nv" name="edit_ten_nv" value=""  ></div>
                        <div class="row-f f-100 d-flex"><label for="">Giới Tính:</label>
                            <select name="edit_gt_nv" id="edit_gt_nv">
                                <option value="Nam">Nam</option>
                                <option value="Nữ">Nữ</option></div>
                            </select>
                        </div>
                        <div class="row-f f-100 d-flex"><label for="">Ngày Sinh:</label><input type="date" id="edit_ngay_sinh_nv" name="edit_ngay_sinh_nv" value="" ></div>
                        <div class="row-f f-100 d-flex"><label for="">Số Điện Thoại:</label><input type="text" id="edit_so_dt_nv" name="edit_so_dt_nv" value="" ></div>
                        <div class="row-f f-100 d-flex"><label for="">Địa Chỉ:</label><textarea name="edit_dc_nv" id="edit_dc_nv" cols="30" rows="2" value="" ></textarea></div>
                        
                        <div class="row-f f-100 d-flex"><label for="">Lương:</label><input type="text" id="edit_luong_nv" name="edit_luong_nv" value="" ></div>
                      </div>
                      <div  class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                          <button  class="edit-save btn btn-success" >Lưu thay đổi</button>
                            <!-- delete confirm -->
                      </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="xoa-nv" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Xác nhận xóa</h5>
                      <input type="text" value="" id="id_del" hidden> 
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    {{-- <div class="modal-body">
                      Xác nhận xóa
                    </div> --}}
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                      <button type="button" class="btn btn-danger xoa-nv-btn" data-id="">Xóa</button>
                    </div>
                  </div>
                </div>
              </div>
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Quản lý nhân sự 2023</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->
            <div class="text-response"></div>
        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Xác nhận</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Bạn có muốn đăng xuất khỏi tài khoản <b>{{Auth::user()->email}}</b> không ?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Hủy</button>
                    <a class="btn btn-primary" href="/logout">Đăng xuất</a>
                </div>
            </div>
        </div>
    </div>

    <div id="overlay">
        <div class="cv-spinner">
          <span class="spinner"></span>
        </div>
    </div>
</body>
@include('backend.footer')
<script>
    $(document).ready(function ($) {

        jQuery.noConflict();

                dsNhanVien();
        const formatter = new Intl.NumberFormat('en-US', {
                style: 'currency',
                currency: 'VND',
                minimumFractionDigits: 0
            });
            $("#new_so_dt_nv, #new_luong_nv, #edit_so_dt_nv, #edit_luong_nv").keypress(function (e) {
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
      
      return false;
    }
   });
        function dsNhanVien(){
            $('#overlay').show();
            $.ajax({
                type: "GET",
                url: "/ds-nhan-vien",
                dataType: "json",
                success: function(response){
                   // console.log(response.nhan_vien);

                   $('#overlay').hide();
                    $('tbody').html("");
                    var stt = 1;
                    $.each(response.nhan_vien, function(key, item){
                       
                        $('tbody').append(
                        '<tr>\
                                <td>'+stt+++'</td>\
                                <td>'+item.ma_nhan_vien+'</td>\
                                <td>'+item.ten_nhan_vien+'</td>\
                                <td>'+item.gioi_tinh+'</td>\
                                <td>'+moment(item.ngay_sinh).format("DD-MM-YYYY")+'</td>\
                                <td><button class="btn btn-success xem-chi-tiet-pb" data-id="'+item.id+'" data-toggle="modal" data-target="#xem-chi-tiet">Xem chi tiết</button> <button class="chinh-sua btn btn-primary" data-id="'+item.id+'"  data-toggle="modal" data-target="#chinh-sua">Chỉnh Sửa</button> <button type="button" data-toggle="modal" href="#xoa-nv" class="btn btn-danger trigger-btn xoa-nv"  data-id="'+item.id+'">Xóa</button>\
                            </tr>'
                        )
                    });
                    // $.each(response.phong_ban, function(key, item){
                    //     $('#edit-phong-ban-nv, #select-phong-ban').append(
                    //      '<option value="'+item.ma_phong_ban+'">'+item.ten_phong_ban+'</option>'
                    //     )
                        
                    // });
                    // $.each(response.chuc_danh, function(key, item){
                    //     $('#edit-chuc-danh, #select-chuc-danh').append(
                    //      '<option value="'+item.ma_chuc_danh+'">'+item.ten_chuc_danh+'</option>'   
                    //     )
                        
                    // });
                }
            })
        }
            
            
        
        // xem chi tiet
        $(document).on("click", ".xem-chi-tiet-pb" , function() {
            var view_id = $(this).data('id');
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
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
                        $('#ct_ngay_sinh_nv').val(moment(response.detail.ngay_sinh).format("DD-MM-YYYY"));
                        $('#ct_so_dt_nv').val(response.detail.so_dt);
                        $('#ct_dc_nv').val(response.detail.dia_chi);
                        $('#ct_chuc_vu_nv').val(response.detail.ma_chuc_vu);  
                        $('#ct_luong_nv').val(response.detail.bac_luong);  
                    }
                }
            });
        });
       
//         $('#search-input-text').on('keyup', function() {
//     var value = $(this).val();
//     var patt = new RegExp(value, "i");
  
//     $('#fid_table').find('tr').each(function() {
//       var $table = $(this);
      
//       if (!($table.find('td').text().search(patt) >= 0)) {
//         $table.not('.t_head').hide();
//       }
//       if (($table.find('td').text().search(patt) >= 0)) {
//         $(this).show();
//       }
      
//     });
   
//   });
        $('#search-input-text').on('keyup', function(){
            searchNv();
        });
        searchNv();
        function searchNv(){
            var keyword = $('#search-input-text').val();
            var patt = new RegExp(keyword, "i");
            jQuery.ajax({
                type: 'POST',
                url: '/tim-kiem-nv',
                data: keyword,
                cache: false,
                success: function(response){
                    console.log(response);
                    // $('tbody').html("");
                    // var stt = 1;
                    // if(response.nhanvien.length <= 0){
                    //     $('tbody').append(
                    //         '<tr>\
                    //             <td colspan="4">Không có dữ liệu.</td>\
                    //         </tr>'
                    //     )}
                    // $.each(response.nhanvien, function(key, item){
                    //     $('tbody').append(
                    //         '<tr>\
                    //             <td>'+stt+++'</td>\
                    //             <td>'+item.ma_nhan_vien+'</td>\
                    //             <td>'+item.ten_nhan_vien+'</td>\
                    //             <td>'+item.gioi_tinh+'</td>\
                    //             <td>'+item.ngay_sinh+'</td>\
                    //             <td><button class="btn btn-success xem-chi-tiet-pb" data-id="'+item.id+'" data-toggle="modal" data-target="#xem-chi-tiet">Xem chi tiết</button> <button class="chinh-sua btn btn-primary" data-id="'+item.id+'"  data-toggle="modal" data-target="#chinh-sua">Chỉnh Sửa</button> <button type="button" data-toggle="modal" href="#xoa-nv" class="btn btn-danger trigger-btn xoa-nv"  data-id="'+item.id+'">Xóa</button>\
                    //         </tr>'
                    //     )
                    // });
    //                 $('#fid_table').find('tr').each(function() {
    //   var $table = $(this);
      
    //   if (!($table.find('td').text().search(response) >= 0)) {
    //     $table.not('.t_head').hide();
    //   }
    //   if (($table.find('td').text().search(response) >= 0)) {
    //     $(this).show();
    //   }
      
    //});
            }
            });
        }
        $('#new_ma_nv').on('keyup', function(){
            checkHasMaNv();
        });

        function checkHasMaNv(){
            var maNv = $('#new_ma_nv').val();
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            
                $.ajax({
                url: '/kiem-tra-ton-tai',
                type: 'post',
                data: {_token: CSRF_TOKEN, maNv:maNv},
                dataType: 'json',
                success: function(response){
                    if(response.code == 500){
                        //console.log(response);
                        $('.check_ma_nv').text(response.message);
                        $('.check_ma_nv').removeClass('alert alert-success');
                       $('.check_ma_nv').addClass('alert alert-danger');

                        //$('.check_ma_nv').show('slow').delay(3500).fadeOut();
                        //removeClassDanger();
                        return 1;
                    }
                    if(response.code == 505){
                        //console.log(response);
                        $('.check_ma_nv').text(response.message);
                        $('.check_ma_nv').removeClass('alert alert-success');
                        $('.check_ma_nv').addClass('alert alert-danger');
                        //$('.check_ma_nv').show('slow').delay(3500).fadeOut();
                        //removeClassDanger();
                    
                    }
                    else{
                        $('.check_ma_nv').text(response.message);
                        $('.check_ma_nv').removeClass('alert alert-danger');
                        $('.check_ma_nv').addClass('alert alert-success');
                        return 0;
                    }

                }

            });
            
            
        }
        $('#them-nhan-vien').submit(function(e){
            e.preventDefault();
            $('#overlay').show();
            var select_pb = $('#select-phong-ban').find(":selected").val();
            var select_cv = $('#select-chuc-danh').find(":selected").val();
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            
                $.ajax({
                type: 'POST',
                url:'/them-moi-nhan-vien',
                data: {_token: CSRF_TOKEN, 
                    select_pb: select_pb,
                    select_ma_cv: select_cv,
                    new_ma_nv: $('#new_ma_nv').val(),
                    new_ten_nv: $('#new_ten_nv').val(),
                    new_gt_nv: $('#new_gt_nv').val(),
                    new_ngay_sinh_nv: $('#new_ngay_sinh_nv').val(),
                    new_so_dt_nv: $('#new_so_dt_nv').val(),
                    new_dc_nv: $('#new_dc_nv').val(),
                    new_luong_nv: $('#new_luong_nv').val()
                },
                dataType: 'json',
                success: function(response) {
                    console.log(response);
                    if(response.code == 200){
                        $('#overlay').hide();
                        $('.text-response').addClass('alert alert-success');
                        $('.text-response').text(response.message);
                        $('.text-response').show().delay(3000).fadeOut("slow");
                        $('#them-nhan-vien-form').modal("hide");
                        $('#them-nhan-vien-form').find('input').val("");
                        $('#them-nhan-vien-form').find('textarea').val("");
                        $('#select-phong-ban').prop('selectedIndex',0);
                        $('#select-chuc-danh').prop('selectedIndex',0);
                        dsNhanVien();
                        $('.text-response').show('slow').delay(3500).fadeOut();
                        
                    }
                    else{
                        
                        $('.text-response').addClass('alert alert-danger');
                        $('.text-response').text(response.message);
                        $('#them-nhan-vien').modal("hide"); 
                        $('.text-response').show('slow').delay(3500).fadeOut();
                    }
                
                },   
                error: (error) => {
                     console.log(JSON.stringify(error));
                }        
                    
        });
        });
        $(document).on("click", ".chinh-sua", function(){
            
            var view_id = $(this).data('id');
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: '/chinh-sua-nhan-vien',
                type: 'get',
                data: {_token: CSRF_TOKEN,view_id:view_id},
                dataType: 'json',
                success: function(response){        
                    if(response.code == 200){
                        $('#id_cd').text(response.detail.id);
                        $('#edit_ma_nv').val(response.detail.ma_nhan_vien);
                        $('#edit_ten_nv').val(response.detail.ten_nhan_vien);
                        $('#edit_gt_nv').val(response.detail.gioi_tinh).change();
                        $('#edit_ngay_sinh_nv').val(response.detail.ngay_sinh);
                        $('#edit_so_dt_nv').val(response.detail.so_dt);
                        $('#edit_dc_nv').val(response.detail.dia_chi);
                        $('#edit_chuc_vu_nv').val(response.detail.ma_chuc_vu);
                        $('#edit_luong_nv').val(response.detail.bac_luong);
                        $('#select-phong-ban').find(":selected").val(response.detail.ma_phong_ban);
                        $('#edit-phong-ban-nv').val(response.detail.ma_phong_ban).change();
                        $('#edit-chuc-danh').val(response.detail.ma_chuc_vu).change();                    
                    }
                }
            });
        });
        $(document).on('click', '.edit-save', function(e){
            e.preventDefault();
            var id_cd =  $('#id_cd').text();
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
           var  edit_pb_nv= $('#edit-phong-ban-nv').find(":selected").val();
           var  edit_cv_nv= $('#edit-chuc-danh').find(":selected").val();
           var  edit_ma_nv= $('#edit_ma_nv').val();
           var  edit_ten_nv= $('#edit_ten_nv').val();
           var  edit_gt_nv= $('#edit_gt_nv').val();
           var  edit_ngay_sinh_nv= $('#edit_ngay_sinh_nv').val();
           var  edit_sdt_nv= $('#edit_so_dt_nv').val();
           var  edit_dc_nv= $('#edit_dc_nv').val();
           var  edit_luong_nv= $('#edit_luong_nv').val();
    
            $.ajax({
                url: '/cap-nhat-danh-sach-nv',
                type: 'put',
                data: {_token: CSRF_TOKEN,
                    edit_pb_nv:edit_pb_nv,
                    edit_cv_nv:edit_cv_nv,
                    edit_ma_nv:edit_ma_nv,
                    edit_ten_nv:edit_ten_nv,
                    edit_gt_nv:edit_gt_nv,
                    edit_ngay_sinh_nv:edit_ngay_sinh_nv,
                    edit_sdt_nv:edit_sdt_nv,
                    edit_dc_nv:edit_dc_nv,
                    edit_luong_nv:edit_luong_nv, 
                    id_cd:id_cd},
                dataType: 'json',
                success: function(response){
                    if(response.code == 200){
                        //console.log(response);
                        $(".text-response").html('');
                        $('.text-response').addClass('alert alert-success');
                        $('.text-response').text(response.message);
                        dsNhanVien();
                        $('#chinh-sua').modal('hide');$('.text-response').show('slow').delay(3500).fadeOut();
                    }
                    else{
                        $('.text-response').addClass('alert alert-danger');
                        $('.text-response').text(response.message);  $('.text-response').show('slow').delay(3500).fadeOut();
                    }
                    
                  
                }
            });
        });
        $(document).on("click", ".xoa-nv", function(e){
            e.preventDefault();
            var view_id = $(this).data('id');
           $('#id_del').val(view_id);
           //console.log(view_id);

        });
        $(document).on("click", ".xoa-nv-btn" , function(e) {
        //    $('#overlay').show();
            e.preventDefault();
            var id_del = $('#id_del').val();
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: '/xoa-danh-sach-nv/'+id_del,
                type: 'delete',
                data: {
                    _token: CSRF_TOKEN, "id": id_del
            },
                success: function(response){
                    //console.log(response);
                    if(response.code == 200){
                        $('#overlay').hide();
                        $('.text-response').addClass('alert alert-success');
                        $('.text-response').text(response.message);    
                        $('#xoa-nv').modal('hide');
                        dsNhanVien();
                        $('.text-response').show('slow').delay(3500).fadeOut();
                       
                    }
                    else{
                        $('.text-response').addClass('alert alert-danger');
                        $('.text-response').text(response.message);
                       $('.text-response').show('slow').delay(3500).fadeOut();
                    }
                }
            });
           
        });
    });
    
</script>
</html>