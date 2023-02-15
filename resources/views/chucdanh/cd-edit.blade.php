
@extends('layouts.master')
@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row align-items-center">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">Chỉnh Sửa Chức Sanh</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('chucdanh')}}">Chức Danh</a></li>
                            <li class="breadcrumb-item active">Chỉnh Sửa Chức Sanh</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card comman-shadow">
                    <div class="card-body">
                        <form  action="{{ url('chucdanh/suacd/' .$chucDanh->id) }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <h5 class="form-title student-info">Thông Tin Chức Danh <span><a
                                                href="javascript:;"><i
                                                    class="feather-more-vertical"></i></a></span></h5>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Mã Chức Danh <span class="login-danger">*</span></label>
                                        <input class="form-control" type="text" id="ma_chuc_danh" name="ma_chuc_danh" value="{{$chucDanh->ma_chuc_danh}}" placeholder="Mã Chức Danh">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Tên Phòng Ban <span class="login-danger">*</span></label>
                                        <input class="form-control" type="text" id="ten_chuc_danh" name="ten_chuc_danh" value="{{$chucDanh->ten_chuc_danh}}" placeholder="Tên Chức Danh">
                                    </div>
                                </div>
                                
                                
                                <div class="col-12 col-sm-12">
                                    <div class="form-group local-forms">
                                        <label>Thông tin </label>
                                        <textarea class="form-control" id="mo_ta" name="mo_ta"
                                            placeholder="Nhập nội dung...">{{$chucDanh->mo_ta}}</textarea>
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
