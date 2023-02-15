@extends('layouts.master')
@section('content')
                       
                        <div class="top-action mb-2">
                            {{-- Thêm phòng ban --}}
                            <div class="add-new">
                                <button type="button" class="btn btn-outline-primary me-2"  data-toggle="modal" data-target="#them_phongban"><i class="fa-solid fa-plus"></i> Thêm Phòng Ban</button>
                                <div class="modal fade" id="them_phongban" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <form action="themphongban" method="POST" id="them-phong-ban" role="form">
                                        @csrf
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Thêm Phòng Ban</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body new-pb form-flex">
                                                <div class="row-f f-50"><input type="text" id="new_ma_phong_ban" name="new_ma_phong_ban" value="" placeholder="Nhập mã phòng ban *" required></div>
                                                <div class="row-f f-50"><input type="text" id ="new_ten_phong_ban" name="new_ten_phong_ban" value="" placeholder="Nhập tên phòng ban *" required></div>
                                                <div class="row-f f-100"><textarea name="new_mo_ta" id="new_mo_ta" cols="30" rows="5" value="" placeholder="Nhập mô tả *"  required></textarea></div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                                                <button type="submit" class="btn btn-primary them-phong-ban" >Lưu thay đổi</button>
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
                                    <th>Mã Phòng Ban</th>
                                    <th>Tên Phòng Ban</th>
                                    <th>Hành Động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($phongBan as $pb)
                                <tr>
                                    <td>{{++$i}}</td>
                                    <td>{{$pb->ma_phong_ban}}</td>
                                    <td>{{$pb->ten_phong_ban}}</td>
                                    <td>
                                        <div class="actions ">
                                        <a href="{{ url('phongban/xempb/'.$pb->id)}}" class="btn btn-sm bg-success-light me-2 ">
                                            <i class="feather-eye"></i>
                                        </a>
                                        <a href="{{ url('phongban/suaphongban/'.$pb->id)}}" class="btn btn-sm bg-danger-light">
                                            <i class="feather-edit"></i>
                                        </a>
                                        <a href="javascript:void(0)" class="btn btn-sm bg-danger-light xoa-phong-ban" data-id="{{$pb->id}}" id="show-popup-confirm"  data-toggle="modal" data-target="#xoa-phong-ban">
                                            <i class="feather-trash"></i>
                                        </a>
                                    </div>
                                </td>
                                </tr>
                                {{-- Hiển thị phòng ban --}}
                               @endforeach
                            </tbody>
                        </table>
                        {!! $phongBan->links() !!}
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


<div class="modal fade" id="xoa-phong-ban" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
          <button type="button" class="btn btn-danger xoa-pb-btn">Xóa</button>
        </div>
      </div>
    </div>
  </div>

   @endsection