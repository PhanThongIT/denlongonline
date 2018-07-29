<?php
/**
 * Created by PhpStorm.
 * User: Phan Thông  IT
 * Date: 2018-07-23
 * Time: 2:39 PM
 */
//session_start();
if (isset($_SESSION["fullname"]) AND $_SESSION["role"] == 'admin')
{
    header('location:quantri.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <base href="http://localhost:81/denlongonline/shopdenlongonline/admin/">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="img/favicon.html">

    <title>Đăng Nhập</title>

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
    <?php
    if (isset($_SESSION["error"]))
    {
        echo '<script type="text/javascript">alert("Sai thông tin đăng nhập");</script>';
        unset($_SESSION["error"]);
    }
    ?>
    <div class="card card-container">
        <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->

        <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png"/>
        <p id="profile-name" class="profile-name-card"></p>
        <form id="login" class="form-signin" method="post" action="quantri.php">
            <span id="reauth-email" class="reauth-email"></span>
            <input type="email" name="email" class="form-control" placeholder="Email address" required autofocus>
            <input type="password" name="password" class="form-control" placeholder="Password" required>

            <button class="btn btn-lg btn-primary btn-block btn-signin" name="btn-login" type="submit" name="login">Đăng Nhập
            </button>
        </form><!-- /form -->
        <a href="register.php?register=add" class="forgot-password">
            Đăng ký tài khoản
        </a>
    </div><!-- /card-container -->

</div><!-- /container -->
<!-- js placed at the end of the document so the pages load faster -->
<script src="Public/source/js/jquery.js"></script>
<script src="Public/source/js/bootstrap.min.js"></script>

</body>
</html>
