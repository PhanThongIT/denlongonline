<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <base href="http://localhost:81/denlongonline/shopdenlongonline/admin/">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="img/favicon.html">
    <title>Đăng ký tài khoản </title>
    <!-- Bootstrap core CSS -->
    <link href="Public/source/css/bootstrap.min.css" rel="stylesheet">
    <link href="Public/source/css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="Public/source/assets/font-awesome/css/font-awesome.css" rel="stylesheet"/>
    <link href="Public/source/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css"
          media="screen"/>
    <link rel="stylesheet" href="Public/source/css/owl.carousel.css" type="text/css">

    <link href="Public/source/css/style-responsive.css" rel="stylesheet"/>
    <link href="Public/source/css/login-form.css" rel="stylesheet">


    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
    <script src="Public/source/js/html5shiv.js"></script>
    <script src="Public/source/js/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<div class="container">

    <style>
        .form-signin input[type=date], .form-signin select {
            margin-bottom: 10px
        }
    </style>
    <div class="card card-container" style="max-width: 500px;">
        <h2>CẬP NHẬT THÔNG TIN</h2>
        <p id="profile-name" class="profile-name-card"></p>
        <form class="form-Update" method="post"  action="profile.php">
            <input type="text" name="username" class="form-control" placeholder=" Username" value="<?= $loadUser->username?>" required autofocus>


            <input type="text" name="fullname" class="form-control" value="<?= $loadUser->fullname?>" placeholder="Họ tên" required>
            <input type="date" name="birthdate" class="form-control" value="<?= $loadUser->birthdate?>" placeholder="Ngày sinh" required>


            <input  type="text" id ="phone" name="phone" class="form-control check-phone" value="<?= $loadUser->phone?>" placeholder="Điện thoại" required>
            <select name="gender" title="Giới tính" class="form-control">
                <option value="nữ" selected>Nữ</option>
                <option value="nam">Nam</option>
            </select>
            <input type="text" name="address" class="form-control" placeholder="Địa chỉ"  value="<?= $loadUser->address?>" required>
            <input type="email" name="email" class="form-control" value="<?= $loadUser->email?>" placeholder="Địa chỉ Email" required>

            <input type="password" name="password" class="form-control" placeholder="Mật khẩu" value="value=<?= $loadUser->password?>"   required>
            <input type="password" name="confirm_password" class="form-control" placeholder="Nhập lại mật khẩu" value=""
                   required>
            <button class="btn btn-lg btn-primary btn-block btn-Update" type="submit" name="btn-Update">CẬP NHẬT
            </button>
            <button type="reset">Tạo lại </button>
        </form><!-- /form -->

    </div><!-- /container -->
    <!-- js placed at the end of the document so the pages load faster -->
    <script src="Public/source/js/jquery.js"></script>
    <script src="Public/source/js/bootstrap.min.js"></script>

</body>
</html>
<script src="Public/source/js/jquery.js"></script>
<script>
    $(document).ready(function () {
        $('.check-phone').keyup(function () {
            var checkPhone = $('#phone').val();
            // console.log(soluong);
            if (isNaN(checkPhone) ) {
                alert("Nhập Sai dữ liệu \n Vui lòng nhập vào số.");
                $('#phone').val('');
                $('#phone').focus();
                return;
            }
            if(  checkPhone.length >11 ){
                alert("Vượt quá số ký tự cho phép");
                $('#phone').val('');
                $('#phone').focus();
                return;
            }
        });

    });
    function checkEmail() {
        var email = document.getElementById('email');
        var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if (!filter.test(email.value)) {
            alert('Nhập sai địa chỉ Email.\nExample@gmail.com');
            email.focus();
            return false;
        }
    }
</script>





