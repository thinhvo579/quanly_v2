



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
                            {{-- Thêm phòng ban --}}
                            <div class="add-new">
                                <button type="button" class="btn btn-success"  data-toggle="modal" data-target="#them-chuc-danh"><i class="fa-solid fa-plus"></i> Thêm Chức Danh</button>
                                <div class="modal fade" id="them-chuc-danh" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <form action="themphongban" method="POST" id="them-chuc-danh" role="form">
                                        @csrf
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Thêm Chức Danh</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body new-pb form-flex width-100">
                                                <div class="row-f f-50"><input type="text" id="new_ma_cd" name="new_ma_cd" value="" placeholder="Nhập mã chức danh *" required></div>
                                                <div class="row-f f-50"><input type="text" id ="new_ten_cd" name="new_ten_cd" value="" placeholder="Nhập tên chức danh *" required></div>
                                                <div class="row-f f-100"><textarea name="new_mo_ta" id="new_mo_ta" cols="30" rows="5" value="" placeholder="Nhập mô tả *"  required></textarea></div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                                                <button type="submit" class="btn btn-success them-chuc-danh" >Lưu thay đổi</button>
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
                        
                        <div class="text-response"></div>
                        <table class="table-full-width table">
                            <thead class="thead-primary">
                                <tr>
                                    <th>STT</th>
                                    <th>Mã Chức Danh</th>
                                    <th>Tên Chức Danh</th>
                                    <th>Hành Động</th>
                                </tr>
                            </thead>
                            <tbody>
                          
                                {{-- Hiển thị chức danh --}}
                               
                            </tbody>
                        </table>
                     </div>
                     
                    </div>
        
                    <!-- Content Row -->
        
                    
        
                </div>
                <!-- /.container-fluid -->
                
        
            </div>
            <!-- End of Main Content -->
        
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Quản lý nhân sự 2023</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->
            
        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    {{-- <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a> --}}
    <div class="modal fade" id="xem-chi-tiet" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Chi Tiết Chức Danh</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body new-pb form-flex">
                <div class="row-f f-100"><label for="">Mã Chức Danh:</label><input type="text" id="ct_ma_cd" name="ct_ma_cd" value="" disabled></div>
                <div class="row-f f-100"><label for="">Tên Chức Danh:</label><input type="text" id ="ct_ten_cd" name="ct_ten_cd" value=""  disabled></div>
                <div class="row-f f-100"><label for="">Mô Tả:</label><textarea name="ct_mo_ta" id="ct_mo_ta" cols="30" rows="5" value="" disabled></textarea></div>
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
                <h5 class="modal-title" id="exampleModalLabel">Chỉnh Sửa Chức Danh</h5>
                <span id="id_cd"></span>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body new-pb form-flex">
                <div class="row-f f-100"><label for="">Mã Chức Danh:</label><input type="text" id="edit_ma_cd" name="edit_ma_cd" value="" ></div>
                <div class="row-f f-100"><label for="">Tên Chức Danh:</label><input type="text" id ="edit_ten_cd" name="edit_ten_cd" value="" ></div>
                <div class="row-f f-100"><label for="">Mô Tả:</label><textarea id="edit_mo_ta" name="edit_mo_ta" cols="30" rows="5" value=""></textarea></div>
              </div>
              <div  class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                  <button  class="edit-save btn btn-success" >Lưu thay đổi</button>
                    <!-- delete confirm -->
              </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
<div class="modal fade" id="xoa-chuc-danh" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
          <button type="button" class="btn btn-danger xoa-pb-btn" data-id="">Xóa</button>
        </div>
      </div>
    </div>
  </div>
   
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
</body>

@include('backend.footer')
<script>

    $(document).ready(function ($) {
        
        jQuery.noConflict();
        dsChucDanh();
        // $(document).ajaxSend(function() {
        //     $("#overlay").fadeIn(300);　
        // });
        
        function dsChucDanh(){
            $('#overlay').show();
            $.ajax({
                type: "GET",
                url: "/ds-chuc-danh",
                dataType: "json",
                success: function(response){
                    console.log(response);
                    $('tbody').html("");
                    var stt = 1;
                    $.each(response.ds_chuc_danh, function(key, item){
                        $('tbody').append(
                        '<tr>\
                                <td>'+stt+++'</td>\
                                <td>'+item.ma_chuc_danh+'</td>\
                                <td>'+item.ten_chuc_danh+'</td>\
                                <td><button class="xem-chi-tiet-cd btn btn-success" data-id="'+item.id+'" data-toggle="modal" data-target="#xem-chi-tiet">Xem chi tiết</button>\
                                    <button class="chinh-sua btn btn-primary" data-id="'+item.id+'" data-toggle="modal" data-target="#chinh-sua">Chỉnh Sửa</button>\
                                    <button class="xoa-chuc-danh btn btn-danger trigger-btn"  data-id="'+item.id+'" data-toggle="modal" data-target="#xoa-chuc-danh">Xóa</button>\
                            </tr>'
                        )
                    });
                    $('#overlay').hide();
                }

            });
        }
       
        $('#them-chuc-danh').submit(function(e){
            e.preventDefault();  
          //  $('#overlay').show();
            var new_ma_cd = $('#new_ma_cd').val();
            var new_ten_cd = $('#new_ten_cd').val();
            var new_mo_ta = $('#new_mo_ta').val();
            console.log(new_ma_cd, new_ten_cd, new_mo_ta);

            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            if(new_ma_cd != '' && new_ten_cd != '' ){
                $.ajax({
                type: 'POST',
                url:'/them-chuc-danh',
                data: {_token: CSRF_TOKEN,new_ma_cd: new_ma_cd,new_ten_cd: new_ten_cd,new_mo_ta: new_mo_ta},
                dataType: 'json',
                success: function(response) {
                if(response.code == 200){
                    $('#overlay').hide();
                    $('.text-response').addClass('alert alert-success');
                    $('.text-response').text(response.message);
                    $('#them-chuc-danh').modal("hide");
                    $('#them-chuc-danh').find('input').val("");
                    $('#them-chuc-danh').find('textarea').val("");
                    dsChucDanh();
                   
                    
                }
                else{
                    
                    $('.text-response').addClass('alert alert-danger');
                    $('.text-response').text(response.message);
                    $('#them-chuc-danh').modal("hide");
                   
                    
                    
                }
                
                }
                })
            }
        });
        // xoa phong ban
        $(document).on("click", ".xoa-chuc-danh", function(e){
            e.preventDefault();
            var view_id = $(this).data('id');
           $('#id_del').val(view_id);

        });
        $(document).on("click", ".xoa-pb-btn" , function(e) {
        //    $('#overlay').show();
            e.preventDefault();
            var id_del = $('#id_del').val();
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: '/xoa-chuc-danh/'+id_del,
                type: 'delete',
                data: {
                    _token: CSRF_TOKEN, "id": id_del
            },
                success: function(response){
                    console.log(response);
                    if(response.code == 200){
                        $('#overlay').hide();
                        $('.text-response').addClass('alert alert-success');
                        $('.text-response').text(response.message);    
                        $('#xoa-chuc-danh').modal('hide');
                        dsChucDanh();
                       
                    }
                    else{
                        $('.text-response').addClass('alert alert-danger');
                        $('.text-response').text(response.message);
                        //myAlertTop();
                    }
                }
            });
           
        });
        
        // xem chi tiet
        $(document).on("click", ".xem-chi-tiet-cd" , function() {
            var view_id = $(this).data('id');
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
           // alert(view_id);
            $.ajax({
                url: '/xem-chi-tiet-chuc-danh',
                type: 'get',
                data: {_token: CSRF_TOKEN,view_id:view_id},
                dataType: 'json',
                success: function(response){
                    console.log(response);
                    if(response.code == 200){
                        $('#ct_ma_cd').val(response.detail.ma_chuc_danh);
                        $('#ct_ten_cd').val(response.detail.ten_chuc_danh);
                        $('#ct_mo_ta').val(response.detail.mo_ta);
                        //console.log(response.detail);
                    }
                }
            });
        });
        $(document).on("click", ".chinh-sua", function(){
            var view_id = $(this).data('id');
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
           //alert(view_id);
            $.ajax({
                url: '/chinh-sua-chuc-danh',
                type: 'get',
                data: {_token: CSRF_TOKEN,view_id:view_id},
                dataType: 'json',
                success: function(response){
                    //console.log(response);
                    if(response.code == 200){
                        $('#id_cd').text(response.detail.id);
                        $('#edit_ma_cd').val(response.detail.ma_chuc_danh);
                        $('#edit_ten_cd').val(response.detail.ten_chuc_danh);
                        $('#edit_mo_ta').val(response.detail.mo_ta);
                        //console.log(response.detail);
                        
                    }
                    else{
                        $('.text-response').addClass('alert alert-danger');
                        $('.text-response').text(response.message);
                    }
                }
            });
        });
        
        $(document).on('click', '.edit-save', function(e){
            e.preventDefault();
            var id_cd =  $('#id_cd').text();
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
           var  edit_ma_cd= $('#edit_ma_cd').val();
           var  edit_ten_cd= $('#edit_ten_cd').val();
           var  edit_mo_ta= $('#edit_mo_ta').val();

            $.ajax({
                url: '/cap-nhat-chuc-danh',
                type: 'put',
                data: {_token: CSRF_TOKEN,edit_ma_cd:edit_ma_cd,edit_ten_cd:edit_ten_cd,edit_mo_ta:edit_mo_ta, id_cd:id_cd},
                dataType: 'json',
                success: function(response){
                    if(response.code == 200){
                        //console.log(response);
                        $(".text-response").html('');
                        $('.text-response').addClass('alert alert-success');
                        $('.text-response').text(response.message);
                        dsChucDanh();
                        $('#chinh-sua').modal('hide');
                    }
                    else{
                        $('.text-response').addClass('alert alert-danger');
                        $('.text-response').text(response.message);  
                    }
                    
                  
                }
            });
        });
        // $('#search-input-text').on('keyup', function(){
        //     search();
        // });
        // search();
        // function search(){
        //     var keyword = $('#search-input-text').val();
        //     var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        //     $.ajax({
        //         url: '/tim-kiem-phong-ban',
        //         type: 'post',
        //         data: {_token: CSRF_TOKEN, keyword:keyword},
        //         dataType: 'json',
        //         success: function(response){
        //             console.log(response);
        //             $('tbody').html("");
        //             var stt = 1;
        //             if(response.phongban.length <= 0){
        //                 $('tbody').append(
        //                     '<tr>\
        //                         <td colspan="4">Không có dữ liệu.</td>\
        //                     </tr>'
        //                 )}
        //             $.each(response.phongban, function(key, item){
        //                 $('tbody').append(
        //                 '<tr>\
        //                         <td>'+stt+++'</td>\
        //                         <td>'+item.ma_phong_ban+'</td>\
        //                         <td>'+item.ten_phong_ban+'</td>\
        //                         <td><button class="btn btn-success xem-chi-tiet-cd" data-id="'+item.id+'" data-toggle="modal" data-target="#xem-chi-tiet">Xem chi tiết</button>\
        //                             <button class="chinh-sua btn btn-primary" data-id="'+item.id+'"  data-toggle="modal" data-target="#chinh-sua">Chỉnh Sửa</button>\
        //                             <button class="btn btn-danger trigger-btn xoa-chuc-danh" data-toggle="modal" data-target="#xoa-chuc-danh"  data-id="'+item.id+'">Xóa</button>\
        //                     </tr>'
        //                 )
        //             });
        //         }

        //     });
        // }
        
        // table row with ajax
// function table_post_row(res){
// let htmlView = '';
// if(res.phongban.length <= 0){
//     htmlView+= `
//        <tr>
//           <td colspan="4">Không có dữ liệu.</td>
//       </tr>`;
// }
// for(let i = 0; i < res.phongban.length; i++){
//     htmlView += `
//         <tr>
//            <td>`+ (i+1) +`</td>
//               <td>`+res.phongban[i].ma_phong_ban+`</td>
//                <td>`+res.phongban[i].ten_phong_ban+`</td>
//                <td><button class="btn btn-success xem-chi-tiet-cd" data-id="'+item.id+'" data-toggle="modal" data-target="#xem-chi-tiet">Xem chi tiết</button> <button class="chinh-sua btn btn-primary" data-id="'+item.id+'"  data-toggle="modal" data-target="#chinh-sua">Chỉnh Sửa</button> <button type="button" data-toggle="modal" href="#xoa-du-lieu" class="btn btn-danger trigger-btn delete-confirm"  data-id="'+item.id+'">Xóa</button>\
//         </tr>`;
// }
//      $('tbody').html(htmlView);
// }
   });
    </script>
</html>