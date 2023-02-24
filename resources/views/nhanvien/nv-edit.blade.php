@extends('layouts.master')
@section('content')
<div>
    @if (session()->has('flash_message'))
    <p class="flash-message">{{session()->get('flash_message')}}</p>
    @endif
</div>
<div class="page-wrapper">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row align-items-center">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">Chỉnh sửa nhân viên</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('nhanvien/xemnv/'.$nhanVien->id)}}">Nhân viên</a></li>
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
                                    <h5 class="form-title student-info">Thông tin nhân viên <span><a href="javascript:;"><i class="feather-more-vertical"></i></a></span></h5>
                                </div>
                                {{-- <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Mã Nhân Viên <span class="login-danger">*</span></label>
                                        <input class="form-control" id="ma_nhan_vien" name="ma_nhan_vien" type="text" value="{{$nhanVien->ma_nhan_vien}}">
                                    </div>
                                </div> --}}
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
                                        {{-- datetimepicker --}}
                                        <label>Ngày sinh<span class="login-danger">*</span></label>
                                        <input class="form-control datetimepicker" type="text" name="ngay_sinh" id="ngay_sinh" placeholder="" value="{{date('d-m-Y', strtotime($nhanVien->ngay_sinh))}}">
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
                                    <div class="form-group local-forms input-number">
                                        <label>Số điện thoại </label>
                                        <input class="form-control" id="so_dt" name="so_dt" type="text" value="{{$nhanVien->so_dt}}">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Địa Chỉ <span class="login-danger">*</span></label>
                                        <input class="form-control" id="dia_chi" name="dia_chi" type="text" value="{{$nhanVien->dia_chi}}">
                                    </div>
                                </div>
                                {{-- <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Lương<span class="login-danger">*</span></label>
                                        <input class="form-control" id="luong" name="luong" type="text" value="{{$nhanVien->luong}}">
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
                        <div class="student-submit pt-10">
                            <button type="submit" class="btn btn-primary">Lưu thông tin</button>
                        </div>
                    </div>
                </div>

                </form>
                <form action="{{url('/nhanvien/cap-nhat-bang-luong/'.$nhanVien->ma_nhan_vien)}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-12 col-sm-12">
                            <div class="heading-detail">
                                <h4>Chi Tiết Bảng Lương</h4>
                                <span id="nv_code" hidden>{{$nhanVien->ma_nhan_vien}}</span>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group local-forms select-year">
                                        <label>Năm</span></label>
                                        {{-- <input type="text" name="nam" id="year-salary"> --}}
                                        <select name="nam" id="year-salary">
                                            <option value="2016">2016</option>
                                            <option value="2017">2017</option>
                                            <option value="2018">2018</option>
                                            <option value="2019">2019</option>
                                            <option value="2020">2020</option>
                                            <option value="2021">2021</option>
                                            <option value="2022">2022</option>
                                            <option value="2023" selected>2023</option>
                                            <option value="2024">2024</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-8">
                                    <div class="form-group local-forms year-total">
                                        
                                        <h6 id="year_salary"></h6>
                                    </div>
                                </div>
                            </div>
                            <div class="row input-number">
                                <div class="col-12 col-sm-3">
                                    <div class="form-group local-forms">
                                        <label>Tháng 1</span></label>
                                        <input class="form-control" id="thang1" name="thang1" type="text" value="">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-3">
                                    <div class="form-group local-forms">
                                        <label>Tháng 2</span></label>
                                        <input class="form-control" id="thang2" name="thang2" type="text" value="">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-3">
                                    <div class="form-group local-forms">
                                        <label>Tháng 3</span></label>
                                        <input class="form-control" id="thang3" name="thang3" type="text" value="">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-3">
                                    <div class="form-group local-forms">
                                        <label>Tháng 4</span></label>
                                        <input class="form-control" id="thang4" name="thang4" type="text" value="">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-3">
                                    <div class="form-group local-forms">
                                        <label>Tháng 5</span></label>
                                        <input class="form-control" id="thang5" name="thang5" type="text" value="">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-3">
                                    <div class="form-group local-forms">
                                        <label>Tháng 6</span></label>
                                        <input class="form-control" id="thang6" name="thang6" type="text" value="">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-3">
                                    <div class="form-group local-forms">
                                        <label>Tháng 7</span></label>
                                        <input class="form-control" id="thang7" name="thang7" type="text" value="">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-3">
                                    <div class="form-group local-forms">
                                        <label>Tháng 8</span></label>
                                        <input class="form-control" id="thang8" name="thang8" type="text" value="">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-3">
                                    <div class="form-group local-forms">
                                        <label>Tháng 9</span></label>
                                        <input class="form-control" id="thang9" name="thang9" type="text" value="">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-3">
                                    <div class="form-group local-forms">
                                        <label>Tháng 10</span></label>
                                        <input class="form-control" id="thang10" name="thang10" type="text" value="">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-3">
                                    <div class="form-group local-forms">
                                        <label>Tháng 11</span></label>
                                        <input class="form-control" id="thang11" name="thang11" type="text" value="">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-3">
                                    <div class="form-group local-forms">
                                        <label>Tháng 12</span></label>
                                        <input class="form-control" id="thang12" name="thang12" type="text" value="">
                                    </div>
                                </div>

                            </div>
                            <div class="luong-submit">
                                <div class="pb-submit student-submit">
                                    <button type="submit" class="btn btn-primary">Lưu Bảng Lương</button>
                                </div>
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