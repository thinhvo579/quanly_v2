@extends('layouts.master')
@section('content')
<div>
    @if (session()->has('flash_message'))
    <p class="flash-message">{{session()->get('flash_message')}}</p>
    @endif
</div>
<div class="content container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col">
                <h3 class="page-title">Danh Sách Phòng Ban</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/')}}">Trang Chủ</a></li>
                    <li class="breadcrumb-item active">Danh Sách Phòng Ban</li>
                </ul>
            </div>
        </div>
    </div>
    <form action="{{url('/tim-kiem-phong-ban')}}" method="get">
        <div class="student-group-form">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="form-group">
                        <input type="text" class="form-control" name="mpb" placeholder="Tìm kiếm theo mã phòng ...">
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="form-group">
                        <input type="text" class="form-control" name="tenpb" placeholder="Tìm kiếm theo tên ...">
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="form-group">
                        <input type="text" class="form-control" name="sdtpb" placeholder="Tìm kiếm theo số điện thoại ...">
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="search-student-btn">
                        <button type="btn" class="btn btn-primary w-100">Tìm kiếm</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                
                <div class="card-body">
                    <a href="{{asset('phongban/themphongban')}}" class="btn btn-block btn-outline-primary add-new">Thêm Phòng Ban</a>
                    <div class="table-responsive">
                        <table class="datatable table table-stripped" id="myTable">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Mã Phòng Ban</th>
                                    <th>Tên Phòng Ban</th>
                                    <th>Hành Động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($phongBan as $pb)
                                    <tr>
                                        <td>{{++$i}}</td>
                                        <td>{{$pb->ma_phong_ban}}</td>
                                        <td>{{$pb->ten_phong_ban}}</td>
                                        <td>
                                            <div class="actions ">
                                                <a href="{{ url('phongban/xempb/'.$pb->id)}}" class="btn btn-sm bg-success-light me-2 ">
                                                    <i class="feather-eye"></i>
                                                </a>
                                                <a href="{{ url('phongban/suaphongban/'.$pb->id)}}" class="btn btn-sm bg-danger-light">
                                                    <i class="feather-edit"></i>
                                                </a>
                                                <a href="javascript:void(0)" class="btn btn-sm bg-danger-light xoa-phong-ban" data-id="{{$pb->id}}" id="show-popup-confirm" data-toggle="modal" data-target="#xoa-phong-ban">
                                                    <i class="feather-trash"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    {{-- Hiển thị phòng ban --}}
                                @endforeach
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="xoa-phong-ban" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Xác nhận xóa</h5>
                <input type="text" value="" id="id_del" hidden>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="message-cd"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                <button type="button" class="btn btn-danger xoa-pb-btn">Xóa</button>
            </div>
        </div>
    </div>
</div>

@endsection