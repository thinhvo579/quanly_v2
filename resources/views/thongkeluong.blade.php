@extends('layouts.master')
@section('content')

<div class="content container-fluid">
<h5>Thống kê lương toàn cơ quan:</h5>
<form action="{{url('/tim-kiem-nhan-vien')}}" method="get">
    <div class="student-group-form">

        <div class="row">

           
            <div class="col-lg-4 col-md-6">
                <div class="form-group">
                    <select name="" id="search-pb" class="form-control">
                        <option value="" disabled selected>Phòng Ban</option>
                        <option value="all">Toàn Cơ Quan</option>
                        @foreach ($phongBan as $pb)
                        <option value="{{$pb->ma_phong_ban}}">{{$pb->ten_phong_ban}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="form-group">
                    <select name="" id="search-pb" class="form-control">
                        <option value="">Năm</option>
                        @foreach ($phongBan as $pb)
                        <option value="{{$pb->ma_phong_ban}}">{{$pb->ten_phong_ban}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="search-student-btn">
                    <button type="btn" class="btn btn-primary w-100">Thống kê</button>
                </div>
            </div>
        </div>

    </div>
</form>
</div>

@endsection