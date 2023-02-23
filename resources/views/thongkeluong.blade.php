@extends('layouts.master')
@section('content')

<div class="content container-fluid">
<h5>Thống kê lương toàn cơ quan:</h5>
<form action="{{url('/thongkeluong1')}}" method="get" id="thongkeluong">
    <div class="student-group-form">

        <div class="row">

           
            <div class="col-lg-4 col-md-6">
                <div class="form-group">
                    <select name="" id="salary-pb" class="form-control" required>
                        <option value="" disabled selected>Phòng Ban</option>
                        <option value="0">Toàn Cơ Quan</option>
                        @foreach ($phongBan as $pb)
                        <option value="{{$pb->ma_phong_ban}}">{{$pb->ten_phong_ban}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="form-group">
                    <select name="" id="salary-nam" class="form-control">
                        <option value=""  disabled selected>Năm</option>
                        {{-- <input type="text" name="nam" id="year-salary"> --}}
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
            <div class="col-lg-2">
                <div class="search-student-btn">
                    <button type="btn" class="btn btn-primary w-100">Thống kê</button>
                </div>
            </div>
        </div>
        <div class="row">
            <h5 id="text-result"></h5>
        </div>

    </div>
</form>
</div>

@endsection