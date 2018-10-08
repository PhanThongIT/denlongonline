<?php
session_start();
if (isset($_SESSION["fullname"]) AND isset($_SESSION['email']) AND $_SESSION["role"] == 'admin') {
    header('location:quantri.php');
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <base href="http://localhost:8080/denlongonline/denlongonline/shopdenlongonline/admin/">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="img/favicon.html">

    <title>Đăng Nhập</title>

    <!-- Bootstrap core CSS -->
    <link href="Public/source/css/bootstrap.min.css" rel="stylesheet">
    <link href="Public/source/css0/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="Public/source/assets/font-awesome/css/font-awesome.css" rel="stylesheet"/>
    <link href="Public/source/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css"
          media="screen"/>
    <link rel="stylesheet" href="Public/source/css/owl.carousel.css" type="text/css">

    <link href="Public/source/css/style-responsive.css" rel="stylesheet"/>
    <link href="Public/source/css/login-form.css" rel="stylesheet">

    <script src="Public/source/js/html5shiv.js"></script>
    <script src="Public/source/js/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<div class="container">

    <div class="card card-container">

        <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png"/>
        <p id="profile-name" class="profile-name-card"></p>
        <?php
        if (isset($_SESSION["error"])) { ?>
            <div class="alert-danger" style="text-align: center"> <?= $_SESSION["error"] ?></div>
            <?php unset($_SESSION["error"]);
        }
        ?>
        <form id="login" class="form-signin" method="post" action="quantri.php">
            <span id="reauth-email" class="reauth-email"></span>
            <input type="email" name="email" class="form-control" placeholder="Email address" required autofocus>
            <input type="password" name="password" class="form-control" placeholder="Password" required>

            <button class="btn btn-lg btn-primary btn-block btn-signin" name="btn-login" type="submit" name="login">Đăng
                Nhập
            </button>
        </form><!-- /form -->
        <a href="register.php?register=add" class="forgot-password">
            Đăng ký tài khoản
        </a>
        <br>
        <a href="../index.php" class="btn-Back">
            Trở về trang chủ Trang Chủ
        </a>

    </div><!-- /card-container -->

</div><!-- /container -->

<script src="Public/source/js/jquery.js"></script>
<script src="Public/source/js/bootstrap.min.js"></script>

</body>
</html>
