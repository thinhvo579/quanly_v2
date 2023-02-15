@extends('layouts.master')
@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">Chi Tiết Chức Danh</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{asset('/chucdanh')}}">Chức Danh</a></li>
                            <li class="breadcrumb-item active">Chi Tiết Chức Danh</li>
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
                                        <h4>Thông tin Chức Danh :</h4>
                                    </div>

                                    <div class="personal-activity">
                                        <div class="personal-icons">
                                            <img src="{{asset('assets/img/icons/buliding-icon.svg')}}" alt="">
                                        </div>
                                        <div class="views-personal">
                                            <h4>Mã Chức Danh </h4>
                                            <h5>{{$cd->ma_chuc_danh}}</h5>
                                        </div>
                                    </div>
                                    <div class="personal-activity">
                                        <div class="personal-icons">
                                            <i class="feather-user"></i>
                                        </div>
                                        <div class="views-personal">
                                            <h4>Tên Chức Danh</h4>
                                            <h5>{{$cd->ten_chuc_danh}}</h5>
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
                                        
                                        <p>{{$cd->mo_ta}}</p>
                                        
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