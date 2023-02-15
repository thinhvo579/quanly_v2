@extends('layouts.master')
@section('content')
                       

                       
    <div class="top-action mb-2">

        <div class="add-new">
            <button type="button" class="btn btn-outline-primary me-2"  data-toggle="modal" data-target="#them-nhan-vien-form"><i class="fa-solid fa-plus"></i> Thêm Nhân Viên</button>
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
                                {{-- @foreach ($phongBan as $pb)
                                    <option value="{{$pb->ma_phong_ban}}">{{$pb->ten_phong_ban}}</option>
                               @endforeach --}}
                                </select>
                        </div>
                        <div class="row-f f-100 d-flex"><label for="">Chức Vụ:</label>
                            <select name="select-chuc-danh" id="select-chuc-danh" required>
                                <option selected="true" value=""disabled>Chọn Chức Danh</option>
                                {{-- @foreach ($chucDanh as $cd)
                                    <option value="{{$cd->ma_chuc_danh}}">{{$cd->ten_chuc_danh}}</option>
                               @endforeach --}}
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
      
            @foreach ($nhanVien as $nv)
        
            <tr>
                <td>{{++$i}}</td>
                <td>{{$nv->ma_nhan_vien}}</td>
                <td>{{$nv->ten_nhan_vien}}</td>
                <td>{{$nv->gioi_tinh}}</td>
                <td>{{$nv->ngay_sinh}}</td>
                <td>
                    <div class="actions ">
                    <a href="{{ url('nhanvien/xemnv/'.$nv->id)}}" class="btn btn-sm bg-success-light me-2 ">
                        <i class="feather-eye"></i>
                    </a>
                    <a href="{{ url('nhanvien/suanv/'.$nv->id)}}" class="btn btn-sm bg-danger-light">
                        <i class="feather-edit"></i>
                    </a>
                    <a href="javascript:void(0)" class="btn btn-sm bg-danger-light xoa-nv" data-id="{{$nv->id}}" id="show-popup-confirm"  data-toggle="modal" data-target="#xoa-nv">
                        <i class="feather-trash"></i>
                    </a>
                </div>
            </td>
            </tr>
            {{-- Hiển thị phòng ban --}}
           @endforeach
        </tbody>
    </table>
    {!! $nhanVien->links() !!}

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
              <button type="button" class="btn btn-danger xoa-nv-btn">Xóa</button>
            </div>
          </div>
        </div>
      </div>
   @endsection