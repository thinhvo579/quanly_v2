@extends('layouts.master')
@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">Chi Tiết Nhân Viên</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{asset('/nhanvien')}}">Nhân Viên</a></li>
                            <li class="breadcrumb-item active">Chi Tiết Nhân Viên</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="about-info">
                            <h4>Thông tin <span><a href="javascript:;"><i
                                            class="feather-more-vertical"></i></a></span></h4>
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="student-personals-grp">
                            <div class="card">
                                <div class="card-body">
                                    <div class="heading-detail">
                                        <h4>Thông tin Nhân Viên :</h4>
                                    </div>

                                    <div class="personal-activity">
                                        <div class="personal-icons">
                                            <img src="{{asset('assets/img/icons/buliding-icon.svg')}}" alt="">
                                        </div>
                                        <div class="views-personal">
                                            <h4>Mã Nhân Viên </h4>
                                            <h5>{{$nv->ma_nhan_vien}}</h5>
                                        </div>
                                    </div>
                                    <div class="personal-activity">
                                        <div class="personal-icons">
                                            <i class="feather-user"></i>
                                        </div>
                                        <div class="views-personal">
                                            <h4>Tên</h4>
                                            <h5>{{$nv->ten_nhan_vien}}</h5>
                                        </div>
                                    </div>
                                    <div class="personal-activity">
                                        <div class="personal-icons">
                                            <i class="feather-code"></i>
                                        </div>
                                        <div class="views-personal">
                                            <h4>Phòng Ban </h4>
                                            <h5>{{$ten_pb}}</h5>
                                        </div>
                                    </div>
                                    <div class="personal-activity">
                                        <div class="personal-icons">
                                            <i class="feather-folder"></i>
                                        </div>
                                        <div class="views-personal">
                                            <h4>Chức Vụ </h4>
                                            <h5>{{$ten_chuc_danh}}</h5>
                                        </div>
                                    </div>
                                    <div class="personal-activity">
                                        <div class="personal-icons">
                                            <i class="feather-phone-call"></i>
                                        </div>
                                        <div class="views-personal">
                                            <h4>Số điện thoại</h4>
                                            <h5>{{$nv->so_dt}}</h5>
                                        </div>
                                    </div>
                                    <div class="personal-activity">
                                        <div class="personal-icons">
                                            <i class="feather-user"></i>
                                        </div>
                                        <div class="views-personal">
                                            <h4>Giới Tính</h4>
                                            <h5>{{$nv->gioi_tinh}}</h5>
                                        </div>
                                    </div>
                                    <div class="personal-activity">
                                        <div class="personal-icons">
                                            <i class="feather-calendar"></i>
                                        </div>
                                        <div class="views-personal">
                                            <h4>Ngày sinh</h4>
                                            <h5>{{$nv->ngay_sinh}}</h5>
                                        </div>
                                    </div>
                                    {{-- <div class="personal-activity">
                                        <div class="personal-icons">
                                            <i class="feather-dollar-sign"></i>
                                        </div>
                                        <div class="views-personal">
                                            <h4>Lương</h4>
                                            
                                            <h5>10.000.000</h5>
                                        </div>
                                    </div> --}}
                                    <div class="personal-activity mb-0">
                                        <div class="personal-icons">
                                            <i class="feather-map-pin"></i>
                                        </div>
                                        <div class="views-personal">
                                            <h4>Địa Chỉ</h4>
                                            <h5>{{$nv->dia_chi}}</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="col-lg-8">
                            <div class="row">
                                <div class="col-12 col-sm-12">
                                    <div class="heading-detail">
                                        <h4>Chi Tiết Bảng Lương</h4>
                                        <span id="nv_code" hidden>{{$nv->ma_nhan_vien}}</span>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group local-forms select-year">
                                                <label>Năm</span></label>
                                                {{-- <input type="text" name="nam" id="year-salary"> --}}
                                                <select  id="year-salary">
                                                   <option value="2019">2019</option>
                                                   <option value="2020">2020</option>
                                                   <option value="2021">2021</option>
                                                   <option value="2022">2022</option>
                                                   <option value="2023" selected>2023</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-8">
                                            <div class="form-group local-forms year-total">
                                                
                                                <h6 id="year_salary"></h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row input-number nv-detail-luong">
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
        
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection