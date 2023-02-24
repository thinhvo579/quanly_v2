@extends('layouts.master')
@section('content')


<div class="content container-fluid">

    <div class="page-header">
        <div class="row">
            <div class="col">
                <h3 class="page-title">Hồ Sơ Quản Trị Viên</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{asset('/')}}">Trang Chủ</a></li>
                    <li class="breadcrumb-item active">Hồ Sơ Quản Trị Viên</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="profile-header">
                <div class="row align-items-center">
                    <div class="col-auto profile-image">
                        <a href="#">
                            <img class="rounded-circle" alt="User Image"
                                src="{{Auth::user()->profile_pic}}" style="width: 100px; height:100px;">
                        </a>
                    </div>
                    <div class="col ms-md-n2 profile-user-info">
                        <h4 class="user-name mb-0">{{Auth::user()->name}}</h4>
                        <h6 class="text-muted">{{Auth::user()->email}}</h6>
                        <div class="user-Location"><i class="fas fa-map-marker-alt"></i> {{Auth::user()->ad_address}}</div>
                        <div class="about-text"></div>
                    </div>
                    {{-- <div class="col-auto profile-btn">
                        <a href="" class="btn btn-primary">
                            Edit
                        </a>
                    </div> --}}
                </div>
            </div>
            <div class="profile-menu">
                <ul class="nav nav-tabs nav-tabs-solid">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#per_details_tab">Thông Tin</a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#password_tab">Password</a>
                    </li> --}}
                </ul>
            </div>
            <div class="tab-content profile-tab-cont">

                <div class="tab-pane fade show active" id="per_details_tab">

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title d-flex justify-content-between">
                                        <span>Chi Tiết Quản Trị Viên</span>
                                            {{-- <a class="edit-link" data-bs-toggle="modal"
                                                href="#edit_personal_details"><i
                                                    class="far fa-edit me-1"></i>Edit</a> --}}
                                    </h5>
                                    <div class="row">
                                        <p class="col-sm-3 text-muted text-sm-end mb-0 mb-sm-3">Tên</p>
                                        <p class="col-sm-9">{{Auth::user()->name}}</p>
                                    </div>
                                    <div class="row">
                                        <p class="col-sm-3 text-muted text-sm-end mb-0 mb-sm-3">Ngày Sinh</p>
                                        <p class="col-sm-9">{{Auth::user()->ad_birthday}}</p>
                                    </div>
                                    <div class="row">
                                        <p class="col-sm-3 text-muted text-sm-end mb-0 mb-sm-3">Email</p>
                                        <p class="col-sm-9"><a href="mailto:{{Auth::user()->email}}">{{Auth::user()->email}}</a>
                                        </p>
                                    </div>
                                    <div class="row">
                                        <p class="col-sm-3 text-muted text-sm-end mb-0 mb-sm-3">Số Điện Thoại</p>
                                        <p class="col-sm-9">{{Auth::user()->ad_phone}}</p>
                                    </div>
                                    <div class="row">
                                        <p class="col-sm-3 text-muted text-sm-end mb-0">Địa Chỉ</p>
                                        <p class="col-sm-9 mb-0">{{Auth::user()->ad_address}}<br>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>


                {{-- <div id="password_tab" class="tab-pane fade">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Change Password</h5>
                            <div class="row">
                                <div class="col-md-10 col-lg-6">
                                    <form>
                                        <div class="form-group">
                                            <label>Old Password</label>
                                            <input type="password" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>New Password</label>
                                            <input type="password" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Confirm Password</label>
                                            <input type="password" class="form-control">
                                        </div>
                                        <button class="btn btn-primary" type="submit">Save Changes</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}

            </div>
        </div>
    </div>
</div>




@endsection