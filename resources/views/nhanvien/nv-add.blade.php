@extends('layouts.master')
@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row align-items-center">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">Thêm nhân viên</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('nhanvien')}}">Nhân viên</a></li>
                            <li class="breadcrumb-item active">Thêm Nhân Viên</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card comman-shadow">
                    <div class="card-body">
                        <form action="{{ url('nhanvien/themnv/')}}" method="POST" class="needs-validation">
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
                                        <input class="form-control" id="ma_nhan_vien" name="ma_nhan_vien" type="text" value="" required>
                                        
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Tên Nhân Viên <span class="login-danger">*</span></label>
                                        <input class="form-control" id="ten_nhan_vien" name="ten_nhan_vien" type="text" value=""required>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Giới tính <span class="login-danger">*</span></label>
                                        <select class="form-control select" name="gioi_tinh" id="gioi_tinh" required>
                                            <option selected="true" disabled="disabled">Chọn giới tính</option>
                                            <option value="Nam" >Nam</option>
                                            <option value="Nữ">Nữ</option>
                                            <option value="Khác">Khác</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms calendar-icon">
                                        <label>Ngày sinh<span class="login-danger">*</span></label>
                                        <input class="form-control datetimepicker" type="text" name="ngay_sinh" id="ngay_sinh"
                                            placeholder="DD-MM-YYYY" value="" required>
                                    </div>
                                </div>
                                
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Phòng ban<span class="login-danger">*</span></label>
                                        <select class="form-control select" name="ma_phong_ban" id="ma_phong_ban" required>
                                            <option selected="true" disabled="disabled">Chọn Phòng Ban </option>
                                            @foreach ($phongBan as $item)
                                            
                                            <option value="{{$item->ma_phong_ban}}">{{$item->ten_phong_ban}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Chức Vụ <span class="login-danger">*</span></label>
                                        <select class="form-control select" name="ma_chuc_danh" id="ma_chuc_danh" required>
                                            <option selected="true" disabled="disabled">Chọn chức vụ </option>
                                            @foreach ($chucDanh as $item)
                                            
                                            <option value="{{$item->ma_chuc_danh}}">{{$item->ten_chuc_danh}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Số điện thoại </label>
                                        <input class="form-control" id="so_dt" name="so_dt" type="text" value="" required>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Địa Chỉ <span class="login-danger">*</span></label>
                                        <input class="form-control"id="dia_chi" name="dia_chi" type="text" value="" required>
                                    </div>
                                </div>
                                {{-- <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Lương<span class="login-danger">*</span></label>
                                        <input class="form-control" id="luong" name="luong" type="text" value="">
                                    </div>
                                </div> --}}
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