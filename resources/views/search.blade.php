@extends('layouts.master')
@section('content')
                       
                        <div class="top-action mb-2">
                            {{-- Thêm phòng ban --}}
                            <div class="add-new">
                                <a href="{{ url('phongban/themphongban') }}" target="_blank" class="btn btn-outline-primary me-2 btn-add-new"><i class="fa-solid fa-plus"></i> Thêm Phòng Ban</a>
                            </div>
                            {{-- - --}}
                        <div class="input-group live-search">
                            <div class="form-outline">
                                {{-- <input id="search-input-text" type="search" class="form-control" placeholder="Tìm kiếm"/> --}}
                                <form method="get" action="{{ route('search.result') }}" class="form-inline mr-auto">
                                    <input type="text" name="tim_kiem" value="" class="form-control col-sm-8"  placeholder="Tìm kiếm..." aria-label="Search">
                                    <button class="btn aqua-gradient btn-rounded btn-sm my-0 waves-effect waves-light" type="submit">Tìm kiếm</button>
                                  </form>
                            </div>
                           
                            </div>
                        </div>
                        
                        <div class="text-response"></div>
                        <table class="table-full-width table">
                            <thead class="thead-primary">
                                <tr>
                                    <th>STT</th>
                                    <th>Mã Phòng Ban</th>
                                    <th>Tên Phòng Ban</th>
                                    <th>Hành Động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($result as $pb)
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
                                        <a href="javascript:void(0)" class="btn btn-sm bg-danger-light xoa-phong-ban" data-id="{{$pb->id}}" id="show-popup-confirm"  data-toggle="modal" data-target="#xoa-phong-ban">
                                            <i class="feather-trash"></i>
                                        </a>
                                    </div>
                                </td>
                                </tr>
                                {{-- Hiển thị phòng ban --}}
                               @endforeach
                            </tbody>
                        </table>
                        {!! $result->links() !!}
                     </div>
                     
                    </div>
        
                    <!-- Content Row -->
        
                    
        
                </div>
                <!-- /.container-fluid -->
                
        
            </div>
            <!-- End of Main Content -->
        
            
            
        </div>
        <!-- End of Content Wrapper -->


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
        {{-- <div class="modal-body">
          Xác nhận xóa
        </div> --}}
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
          <button type="button" class="btn btn-danger xoa-pb-btn">Xóa</button>
        </div>
      </div>
    </div>
  </div>

   @endsection