
@extends('layouts.master')
@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row align-items-center">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">Chỉnh Sửa Phòng Ban</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{asset('phongban')}}">Danh Sách Phòng Ban</a></li>
                            <li class="breadcrumb-item active">Chỉnh Sửa Phòng Ban</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card comman-shadow">
                    <div class="card-body">
                        <form  action="{{ url('phongban/suaphongban/' .$phongban->id) }}" method="POST" id="suapb">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <h5 class="form-title student-info">Student Information <span><a
                                                href="javascript:;"><i
                                                    class="feather-more-vertical"></i></a></span></h5>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Mã Phòng Ban <span class="login-danger">*</span></label>
                                        <input class="form-control" type="text" id="mapb" name="ma_phong_ban" value="{{$phongban->ma_phong_ban}}" placeholder="Mã Phòng Ban">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Tên Phòng Ban <span class="login-danger">*</span></label>
                                        <input class="form-control" type="text" id="tenpb" name="ten_phong_ban" value="{{$phongban->ten_phong_ban}}" placeholder="Tên Phòng Ban">
                                    </div>
                                </div>
                                
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Số điện thoại </label>
                                        <input class="form-control" type="text" id="sdtpb" name="sdt_pb" value="{{$phongban->sdt_pb}}" placeholder="Số điện thoại">
                                    </div>
                                </div>
                                
                                <div class="col-12 col-sm-12">
                                    <div class="form-group local-forms">
                                        <label>Thông tin </label>
                                        <textarea class="form-control" id="thongtin_pb" name="thongtin_pb"
                                            placeholder="Nhập nội dung...">{{$phongban->thongtin_pb}}</textarea>
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
<script>

</script>
@endsection
