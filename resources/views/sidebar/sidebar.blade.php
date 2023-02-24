<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion col-md-2 col-xl-2" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{url('/')}}">
        {{-- <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div> --}}
        <div class="sidebar-brand-text mx-3">QUẢN LÝ</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="submenu">
        <a href="#" class="subdrop"><i class="feather-user"></i> <span> Nhân Viên</span> <span class="menu-arrow"></span></a>
        <ul style="display: block;">
        <li><a href="{{ url('nhanvien') }}"><i class="feather-chevron-right"></i> Danh sách CBNV</a></li>
        <li><a href="{{route('nhanvien.them')}}" class=""><i class="feather-chevron-right"></i> Thêm Mới</a></li>
        <li><a href="{{url('/nhanvien/bangluong')}}"><i class="feather-chevron-right"></i> Quản lý tiền lương</a></li>
        </ul>
    </li>

    <li class="submenu">
        <a href="#" class="subdrop"><i class="feather-folder"></i></i> <span> Phòng Ban</span> <span class="menu-arrow"></span></a>
        <ul style="display: block;">
        <li><a href="{{ url('phongban') }}"><i class="feather-chevron-right"></i> Danh sách</a></li>
        <li><a href="{{ route('phongban.them') }}" class=""><i class="feather-chevron-right"></i> Thêm Mới</a></li>
        </ul>
    </li>
    <li class="submenu">
        <a href="#" class="subdrop"><i class="feather-folder"></i> <span> Chức Danh</span> <span class="menu-arrow"></span></a>
        <ul style="display: block;">
        <li><a href="{{ url('chucdanh') }}"><i class="feather-chevron-right"></i> Danh sách</a></li>
        <li><a href="{{ url('chucdanh/themcd') }}" class=""><i class="feather-chevron-right"></i> Thêm Mới</a></li>
        </ul>
    </li>
    <li class="submenu">
        <a href="#" class="subdrop"><i class="feather-pie-chart"></i> <span> Thống Kê</span> <span class="menu-arrow"></span></a>
        <ul style="display: block;">
        <li><a href="{{ url('thongkeluong') }}"><i class="feather-chevron-right"></i>Tiền Lương</a></li>
       
        </ul>
    </li>

    
    



</ul>