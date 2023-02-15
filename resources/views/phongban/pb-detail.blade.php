@extends('layouts.master')
@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">Chi Tiết Phòng Ban</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{asset('/phongban')}}">Phòng Ban</a></li>
                            <li class="breadcrumb-item active">Chi Tiết Phòng Ban</li>
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
                                        <h4>Thông tin Phòng Ban :</h4>
                                    </div>

                                    <div class="personal-activity">
                                        <div class="personal-icons">
                                            <img src="{{asset('assets/img/icons/buliding-icon.svg')}}" alt="">
                                        </div>
                                        <div class="views-personal">
                                            <h4>Mã Phòng Ban </h4>
                                            <h5>{{$pb->ma_phong_ban}}</h5>
                                        </div>
                                    </div>
                                    <div class="personal-activity">
                                        <div class="personal-icons">
                                            <i class="feather-user"></i>
                                        </div>
                                        <div class="views-personal">
                                            <h4>Tên</h4>
                                            <h5>{{$pb->ten_phong_ban}}</h5>
                                        </div>
                                    </div>
                                    
                                    <div class="personal-activity">
                                        <div class="personal-icons">
                                            <i class="feather-phone-call"></i>
                                        </div>
                                        <div class="views-personal">
                                            <h4>Số điện thoại</h4>
                                            <h5>{{$pb->sdt_pb}}</h5>
                                        </div>
                                    </div>
                                    {{-- <div class="personal-activity">
                                        <div class="personal-icons">
                                            <i class="feather-mail"></i>
                                        </div>
                                        <div class="views-personal">
                                            <h4>Email</h4>
                                            <h5><a href="/cdn-cgi/l/email-protection" class="__cf_email__"
                                                    data-cfemail="81e5e0e8f2f8c1e6ece0e8edafe2eeec">[email&#160;protected]</a>
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="personal-activity">
                                        <div class="personal-icons">
                                            <i class="feather-user"></i>
                                        </div>
                                        <div class="views-personal">
                                            <h4>Giới Tính</h4>
                                            <h5>Male</h5>
                                        </div>
                                    </div>
                                    <div class="personal-activity">
                                        <div class="personal-icons">
                                            <i class="feather-calendar"></i>
                                        </div>
                                        <div class="views-personal">
                                            <h4>Ngày sinh</h4>
                                            <h5>22 Apr 1995</h5>
                                        </div>
                                    </div>
                                    <div class="personal-activity">
                                        <div class="personal-icons">
                                            <i class="feather-italic"></i>
                                        </div>
                                        <div class="views-personal">
                                            <h4>Language</h4>
                                            <h5>English, French, Bangla</h5>
                                        </div>
                                    </div>
                                    <div class="personal-activity mb-0">
                                        <div class="personal-icons">
                                            <i class="feather-map-pin"></i>
                                        </div>
                                        <div class="views-personal">
                                            <h4>Địa Chỉ</h4>
                                            <h5>480, Estern Avenue, New York</h5>
                                        </div>
                                    </div> --}}
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
                                        
                                        <p>{{{$pb->thongtin_pb}}}</p>
                                        
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