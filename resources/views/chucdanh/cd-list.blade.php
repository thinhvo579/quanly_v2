@extends('layouts.master')
@section('content')
                       
                        <div class="top-action mb-2">
                            {{-- Thêm phòng ban --}}
                            <div class="add-new">
                                <a href="{{ url('chucdanh/themcd') }}" target="_blank" class="btn btn-outline-primary me-2 btn-add-new"><i class="fa-solid fa-plus"></i> Thêm Chức Danh</a>
                                
                            </div>
                            {{-- - --}}
                        <div class="input-group live-search">
                            <div class="form-outline">
                                <input id="search-input-text" type="search" class="form-control" placeholder="Tìm kiếm"/>
                                
                            </div>
                           
                            </div>
                        </div>
                        
                        <div class="text-response"></div>
                        <table class="table-full-width table">
                            <thead class="thead-primary">
                                <tr>
                                    <th>STT</th>
                                    <th>Mã Chức Danh</th>
                                    <th>Tên Chức Danh</th>
                                    <th>Hành Động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($chucdanh as $cd)
                                <tr>
                                    <td>{{++$i}}</td>
                                    <td>{{$cd->ma_chuc_danh}}</td>
                                    <td>{{$cd->ten_chuc_danh}}</td>
                                    <td>
                                        <div class="actions ">
                                        <a href="{{ url('chucdanh/xemcd/'.$cd->id)}}" class="btn btn-sm bg-success-light me-2 ">
                                            <i class="feather-eye"></i>
                                        </a>
                                        <a href="{{ url('chucdanh/suacd/'.$cd->id)}}" class="btn btn-sm bg-danger-light">
                                            <i class="feather-edit"></i>
                                        </a>
                                        <a href="javascript:void(0)" class="btn btn-sm bg-danger-light xoa-cd" data-id="{{$cd->id}}" id="show-popup-confirm"  data-toggle="modal" data-target="#xoa-cd">
                                            <i class="feather-trash"></i>
                                        </a>
                                    </div>
                                </td>
                                </tr>
                                {{-- Hiển thị phòng ban --}}
                               @endforeach
                            </tbody>
                        </table>
                        {!! $chucdanh->links() !!}
                     </div>
                     
                    </div>
        
                    <!-- Content Row -->
        
                    
        
                </div>
                <!-- /.container-fluid -->
                
        
            </div>
            <!-- End of Main Content -->
            <div class="modal fade" id="xoa-cd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <button type="button" class="btn btn-danger xoa-cd-btn">Xóa</button>
                  </div>
                </div>
              </div>
            </div>
            
   @endsection