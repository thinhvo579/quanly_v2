@extends('layouts.master')
@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row align-items-center">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">Chỉnh sửa nhân viên</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="students.html">Nhân viên</a></li>
                            <li class="breadcrumb-item active">Chỉnh sửa</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card comman-shadow">
                    <div class="card-body">
                        <form action="{{ url('nhanvien/suanv/'.$nhanVien->id)}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <h5 class="form-title student-info">Thông tin nhân viên <span><a
                                                href="javascript:;"><i
                                                    class="feather-more-vertical"></i></a></span></h5>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Mã Nhân Viên <span class="login-danger">*</span></label>
                                        <input class="form-control" id="ma_nhan_vien" name="ma_nhan_vien" type="text" value="{{$nhanVien->ma_nhan_vien}}">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Tên Nhân Viên <span class="login-danger">*</span></label>
                                        <input class="form-control" id="ten_nhan_vien" name="ten_nhan_vien" type="text" value="{{$nhanVien->ten_nhan_vien}}">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Giới tính <span class="login-danger">*</span></label>
                                        <select class="form-control select" name="gioi_tinh" id="gioi_tinh">
                                            <option selected="true" disabled="disabled">Chọn giới tính</option>
                                            <option value="Nam" {{$nhanVien->gioi_tinh == 'Nam' ? 'selected' : ''}}>Nam</option>
                                            <option value="Nữ" {{$nhanVien->gioi_tinh == 'Nữ' ? 'selected' : ''}}>Nữ</option>
                                            <option value="Khác" {{$nhanVien->gioi_tinh == 'Khác' ? 'selected' : ''}}>Khác</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms calendar-icon">
                                        <label>Ngày sinh<span class="login-danger">*</span></label>
                                        <input class="form-control datetimepicker" type="text" name="ngay_sinh" id="ngay_sinh"
                                            placeholder="DD-MM-YYYY" value="{{$nhanVien->ngay_sinh}}">
                                    </div>
                                </div>
                                
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Phòng ban<span class="login-danger">*</span></label>
                                        <select class="form-control select" name="ma_phong_ban" id="ma_phong_ban">
                                            <option selected="true" disabled="disabled">Chọn Phòng Ban </option>
                                            @foreach ($phongBan as $item)
                                            
                                            <option value="{{$item->ma_phong_ban}}" {{$nhanVien->ma_phong_ban == $item->ma_phong_ban ? "selected" : '' }}>{{$item->ten_phong_ban}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Chức Vụ <span class="login-danger">*</span></label>
                                        <select class="form-control select" name="ma_chuc_danh" id="ma_chuc_danh">
                                            <option selected="true" disabled="disabled">Chọn chức vụ </option>
                                            @foreach ($chucDanh as $item)
                                            
                                            <option value="{{$item->ma_chuc_danh}}" {{$nhanVien->ma_chuc_danh == $item->ma_chuc_danh ? 'selected' : ''}}>{{$item->ten_chuc_danh}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Số điện thoại </label>
                                        <input class="form-control" id="so_dt" name="so_dt" type="text" value="{{$nhanVien->so_dt}}">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Địa Chỉ <span class="login-danger">*</span></label>
                                        <input class="form-control"id="dia_chi" name="dia_chi" type="text" value="{{$nhanVien->dia_chi}}">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Lương<span class="login-danger">*</span></label>
                                        <input class="form-control" id="luong" name="luong" type="text" value="{{$nhanVien->luong}}">
                                    </div>
                                </div>
                                {{-- <div class="col-12 col-sm-4">
                                    <div class="form-group students-up-files">
                                        <label>Upload ảnh (150px X 150px)</label>
                                        <div class="uplod">
                                            <label class="file-upload image-upbtn mb-0">
                                                Chọn file <input type="file">
                                            </label>
                                        </div>
                                    </div>
                                </div> --}}
                                <div class="col-12">
                                    <div class="student-submit">
                                        <button type="submit" class="btn btn-primary">Lưu thông tin</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection