
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>QUẢN LÝ NHÂN SỰ - Tạo Tài Khoản</title>

    <!-- Custom fonts for this template-->
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.css">
    
<link rel="stylesheet" href="/layout/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="{{ URL::to('assets/plugins/feather/feather.css') }}">
<link href="/layout/backend/css/ql-main.css" rel="stylesheet">
<meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body class="bg-gradient-primary">
    <div>
        @if (session()->has('flash_message'))
        <p class="flash-message">{{session()->get('flash_message')}}</p>
        @endif
    </div>
    <div class="main-wrapper login-body">
        <div class="login-wrapper">
            <div class="container">
                <div class="loginbox">
                    <div class="login-right">
                        <div class="login-right-wrap">
                            <h1>Tạo Tài Khoản</h1>
                            <p class="account-subtitle">Vui lòng điền đầy đủ thông tin người dùng</p>

                            <form action="{{route('register')}}" method="POST" id="register_user">
                                @csrf
                                <div class="form-group">
                                    <label>Họ Tên <span class="login-danger">*</span></label>
                                    <input class="form-control" type="text" name="name" id="user_username" autocomplete="off">
                                    <span class="profile-views"><i class="fas fa-user-circle"></i></span>
                                </div>
                                <div class="form-group">
                                    <label>Email <span class="login-danger">*</span></label>
                                    <input class="form-control" type="text" name="email" id="user_email" autocomplete="off">
                                    <span class="profile-views"><i class="fas fa-envelope"></i></span>
                                </div>
                                <div class="form-group">
                                    <label>Mật Khẩu <span class="login-danger">*</span></label>
                                    <input class="form-control pass-input" type="text" name="password" id="user_password" autocomplete="off">
                                    <span class="profile-views feather-eye toggle-password"></span>
                                </div>
                                <div class="form-group">
                                    <label>Nhập lại mật khẩu <span class="login-danger">*</span></label>
                                    <input class="form-control pass-confirm" type="text" name="password-confirm" id="user_password_confirm" autocomplete="off">
                                    <span class="profile-views feather-eye reg-toggle-password"></span>
                                </div>
                                <div class=" dont-have">Bạn đã có tài khoản? <a href="{{route('login')}}">Đăng Nhập</a></div>
                                <div class="form-group mb-0">
                                    <button class="btn btn-primary btn-block" type="submit">Tạo Tài Khoản</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="overlay">
        <div class="cv-spinner">
          <span class="spinner"></span>
        </div>
     </div>
        <div class="modal" id="ignismyModal" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label=""><span>×</span></button>
                     </div>
					
                    <div class="modal-body">
                       
						<div class="thank-you-pop">
							<img src="http://goactionstations.co.uk/wp-content/uploads/2017/03/Green-Round-Tick.png" alt="">
							<h1>Thank You!</h1>
							<p>Tạo tài khoản đăng nhập thành công</p>
                            <a href="{{route('login')}}" class="btn btn-block btn-outline-success">Đăng Nhập</a>
 						</div>
                         
                    </div>
					
                </div>
            </div>
     </div>
    <!-- Bootstrap core JavaScript-->
    <script src="/layout/backend/vendor/jquery/jquery.min.js"></script>
    <script src="/layout/bootstrap/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function(){
    $('#register_user').submit(function(e){
        e.preventDefault();
        $('#overlay').show();
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
       var user_username = $('#user_username').val();
       var user_email = $('#user_email').val();
       var user_password = $('#user_password').val();
       var user_password_confirm = $('#user_password_confirm').val();
if(user_username && user_email&&user_password&user_password_confirm&&user_password==user_password_confirm){
    $.ajax({
            type: "POST",
            url: $(this).attr('action'),
            data: { _token: CSRF_TOKEN, 
                user_username: $('#user_username').val(),
                user_email: $('#user_email').val(),
                user_password: $('#user_password').val(),
                user_password_confirm: $('#user_password_confirm').val()
            },
            dataType: "json",
            success: function(response) {
                    console.log(response);
                   if(response.code == '200'){
                        setTimeout(function () {
                            $("#overlay").hide();
                        }, 400);
                        $('#user_username').val('');
                        $('#user_email').val('');
                        $('#user_password').val('');
                        $('#user_password_confirm').val('');
                        $('#ignismyModal').modal('show');
                   }
                   else{
                    $('#ignismyModalError').modal('show');
                   }
                },   
                error: (error) => {
                     console.log(JSON.stringify(error));
                }        
        });
}else{
    setTimeout(function () {
                        $("#overlay").hide();
                    }, 400);
                     
}
    });
});
if ($(".toggle-password").length > 0) {
    $(document).on("click", ".toggle-password", function () {
      $(this).toggleClass("feather-eye feather-eye-off");
      var input = $(".pass-input");
      if (input.attr("type") == "password") {
        input.attr("type", "text");
      } else {
        input.attr("type", "password");
      }
    });
  }
  if ($(".reg-toggle-password").length > 0) {
    $(document).on("click", ".reg-toggle-password", function () {
      $(this).toggleClass("feather-eye feather-eye-off");
      var input = $(".pass-confirm");
      if (input.attr("type") == "password") {
        input.attr("type", "text");
      } else {
        input.attr("type", "password");
      }
    });
  }
    </script>
</body>

</html>