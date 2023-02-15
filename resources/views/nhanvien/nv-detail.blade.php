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
                                    <div class="personal-activity">
                                        <div class="personal-icons">
                                            <i class="feather-dollar-sign"></i>
                                        </div>
                                        <div class="views-personal">
                                            <h4>Lương</h4>
                                            
                                            <h5>10.000.000</h5>
                                        </div>
                                    </div>
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
                        <div class="student-personals-grp">
                            <div class="card mb-0">
                                <div class="card-body">
                                    <div class="heading-detail">
                                        <h4>Nội dung</h4>
                                    </div>
                                    <div class="hello-park">
                                        
                                        <div class="personal-activity">
                                            <div class="personal-icons">
                                                <i class="feather-code"></i>
                                            </div>
                                            <div class="views-personal">
                                                <h4>Phòng Ban </h4>
                                                <h5>{{$nv->ma_nhan_vien}}</h5>
                                            </div>
                                        </div>
                                        <div class="personal-activity">
                                            <div class="personal-icons">
                                                <img src="{{asset('assets/img/icons/buliding-icon.svg')}}" alt="">
                                            </div>
                                            <div class="views-personal">
                                                <h4>Chức Vụ </h4>
                                                <h5>{{$nv->ma_nhan_vien}}</h5>
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
    </div>

@endsection