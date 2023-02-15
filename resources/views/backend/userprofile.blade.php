
<!DOCTYPE html>
<html lang="en">

<head>

@include('backend.head')

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('sidebar.sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column  col-xl-10 col-md-10">

            <!-- Main Content -->
            <div id="content">
        
                <!-- Topbar -->
                @include('backend.topbar')
                <!-- End of Topbar -->
        
                <!-- Begin Page Content -->
                <div class="container-fluid">
        
                    <!-- Page Heading -->
                    <div class="main-content d-sm-flex align-items-center justify-content-between mb-2">
                        <h1 class=" mb-0 text-gray-800 first-title-main"></h1>
                        {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
                    </div>
        
                    <!-- Content Row -->
                    <div class="row">
        
                        <div class="col-xl-12">
                            <div class="userprofile">
                                <div class="">
                                    <label for="user-name">Tên người dùng</label>
                                    <input type="text" name="" id="user-name" value="{{Auth::user()->name}}">
                                </div>
                                <div class="">
                                    <label for="user-email">Tên đăng nhập:</label>
                                    <span>{{Auth::user()->email}}</span>
                                </div>
                                <div>
                                    <img src="{{Auth::user()->profile_pic}}" alt="" width="150px" height="150px" style="background-size: cover;object-fit: cover;">
                                    <input type="file" id="img" name="img" accept="image/*">
                                </div>
                            </div>
                        </div>
                     
                    </div>
        
                    <!-- Content Row -->
        
                    
        
                </div>
                <!-- /.container-fluid -->
                
        
            </div>
            <!-- End of Main Content -->
           

              </div>
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Quản lý nhân sự 2023</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->
            <div class="text-response"></div>
        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Xác nhận</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Bạn có muốn đăng xuất khỏi tài khoản <b>{{Auth::user()->email}}</b> không ?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Hủy</button>
                    <a class="btn btn-primary" href="/logout">Đăng xuất</a>
                </div>
            </div>
        </div>
    </div>

    <div id="overlay">
        <div class="cv-spinner">
          <span class="spinner"></span>
        </div>
    </div>
</body>
@include('backend.footer')

</html>