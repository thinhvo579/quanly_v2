
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
                        <h3 class="page-title">Thêm Phòng Ban</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="students.html">Phòng Ban</a></li>
                            <li class="breadcrumb-item active">Thêm Phòng Ban</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card comman-shadow">
                    <div class="card-body">
                        <form  action="{{ route('phongban.them') }}" method="POST" id="thempb">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <h5 class="form-title student-info">Thông Tin Phòng Ban <span><a
                                                href="javascript:;"><i
                                                    class="feather-more-vertical"></i></a></span></h5>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Mã Phòng Ban <span class="login-danger">*</span></label>
                                        <input class="form-control" type="text" id="mapb" name="ma_phong_ban" placeholder="Mã Phòng Ban" required>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Tên Phòng Ban <span class="login-danger">*</span></label>
                                        <input class="form-control" type="text" id="tenpb" name="ten_phong_ban" placeholder="Tên Phòng Ban" required>
                                    </div>
                                </div>
                                
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Số điện thoại </label>
                                        <input class="form-control" type="text" id="sdtpb" name="sdt_pb" placeholder="Số điện thoại" required>
                                    </div>
                                </div>
                                
                                <div class="col-12 col-sm-12">
                                    <div class="form-group local-forms">
                                        <label>Thông tin </label>
                                        <textarea class="form-control" id="thongtin_pb" name="thongtin_pb"
                                            placeholder="Nhập nội dung..."></textarea>
                                    </div>
                                </div>
                                
                                <div class="col-12">
                                    <div class="pb-submit">
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
