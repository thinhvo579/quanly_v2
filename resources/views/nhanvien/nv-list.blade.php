@extends('layouts.master')
@section('content')
                       

                       
    <div class="top-action mb-2">

        <div class="add-new">
            <a href="{{ url('nhanvien/themnv') }}" target="_blank" class="btn btn-outline-primary me-2 btn-add-new"><i class="fa-solid fa-plus"></i> Thêm Nhân Viên</a>
            
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
           
            @if (count($nhanVien) != 0)
                @foreach ($nhanVien as $nv)
            
                <tr>
                    <td>{{++$i}}</td>
                    <td>{{$nv->ma_nhan_vien}}</td>
                    <td>{{$nv->ten_nhan_vien}}</td>
                    <td>{{$nv->gioi_tinh}}</td>
                    <td>{{date('d-m-Y', strtotime($nv->ngay_sinh))}}</td>
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
                @endforeach
           @else
<p>Dữ liệu hiện đang trống!</p>
               
           @endif
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