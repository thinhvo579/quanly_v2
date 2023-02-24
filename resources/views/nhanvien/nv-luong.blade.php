@extends('layouts.master')
@section('content')


<div>
    @if (session()->has('flash_message'))
    <p class="flash-message">{{session()->get('flash_message')}}</p>
    @endif
</div>

<div class="content container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col">
                <h3 class="page-title">Danh Sách Nhân Viên</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/nhanvien')}}">Danh Sách Nhân Viên</a></li>
                    <li class="breadcrumb-item active">Bảng Lương</li>
                </ul>
            </div>
        </div>
    </div>
    <form action="{{url('/tim-kiem-nhan-vien')}}" method="get">
        <div class="student-group-form">

            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="form-group">
                        <input type="text" class="form-control" name="id_search" placeholder="Tìm kiếm theo mã nhân viên ...">
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="form-group">
                        <input type="text" class="form-control" name="name_search" placeholder="Tìm kiếm theo tên ...">
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="form-group">
                        <select name="" id="search-pb" class="form-control">
                            <option value="">Phòng Ban</option>
                            @foreach ($phongBan as $pb)
                            <option value="{{$pb->ma_phong_ban}}">{{$pb->ten_phong_ban}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="search-student-btn">
                        <button type="btn" class="btn btn-primary w-100">Tìm kiếm</button>
                    </div>
                </div>
            </div>

        </div>
    </form>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="datatable table table-stripped" id="myTable">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Mã Nhân Viên</th>
                                    <th>Tên Nhân Viên</th>
                                    <th>Giới Tính</th>
                                    <th>Ngày Sinh</th>
                                    <th>Hành Động</th>
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

                                            <a href="{{ url('nhanvien/thongke/'.$nv->id)}}" class="btn btn-sm bg-danger-light btn-salary">
                                                Thống Kê Lương
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
                    </div>
                </div>
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
                <button type="button" class="btn btn-danger xoa-nv-btn">Xóa</button>
            </div>
        </div>
    </div>
</div>
@endsection