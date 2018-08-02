<?php
if (session_status() == PHP_SESSION_NONE)
{
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">


<head>
    <!-- Basic page needs -->
    <meta charset="utf-8">
    <!--[if IE]>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <![endif]-->
    <base href="http://localhost:81/denlongonline/shopdenlongonline/">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?= $title ?> </title>
    <base href="http://localhost:81/denlongonline/shopdenlongonline/">
    <meta name="description"
          content="best template, template free, responsive theme, fashion store, responsive theme, responsive html theme, Premium website templates, web templates, Multi-Purpose Responsive HTML5 Template">
    <meta name="keywords"
          content="bootstrap, ecommerce, fashion, layout, responsive, responsive template, responsive template download, responsive theme, retail, shop, shopping, store, Premium website templates, web templates, Multi-Purpose Responsive HTML5 Template"
    />

    <!-- Mobile specific metas  -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon  -->
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">

    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=PT+Sans:400,700italic,700,400italic' rel='stylesheet'
          type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Arimo:400,400italic,700,700italic' rel='stylesheet'
          type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Dosis:400,300,200,500,600,700,800' rel='stylesheet'
          type='text/css'>

    <!-- CSS Style -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="public/source/css/bootstrap.min.css">

    <!-- font-awesome & simple line icons CSS -->
    <link rel="stylesheet" type="text/css" href="public/source/css/font-awesome.css" media="all">
    <link rel="stylesheet" type="text/css" href="public/source/css/simple-line-icons.css" media="all">

    <!-- owl.carousel CSS -->
    <link rel="stylesheet" type="text/css" href="public/source/css/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="public/source/css/owl.theme.css">

    <!-- animate CSS  -->
    <link rel="stylesheet" type="text/css" href="public/source/css/animate.css" media="all">

    <!-- flexslider CSS -->
    <link rel="stylesheet" type="text/css" href="public/source/css/flexslider.css">

    <!-- jquery-ui.min CSS  -->
    <link rel="stylesheet" type="text/css" href="public/source/css/jquery-ui.css">

    <!-- Revolution Slider CSS -->
    <link rel="stylesheet" type="text/css" href="public/source/css/revolution-slider.css">

    <!-- style CSS -->
    <link rel="stylesheet" type="text/css" href="public/source/css/style.css" media="all">


</head>

<body class="shop_grid_page">
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
    your browser</a> to improve your experience.</p>
<![endif]-->
<!-- mobile menu -->
<div id="mobile-menu">
    <ul>
        <li>
            <a href="index.php" class="home1">Home</a>
        </li>
        <li>
            <a href="contact_us.html">Contact us</a>
        </li>
        <li>
            <a href="about_us.html">About us</a>
        </li>
        <li>
            <a href="blog_full_width.html">Blog</a>
        </li>
    </ul>
</div>
<!-- end mobile menu -->
<div id="page">
    <!-- Header -->
    <header>
        <div class="header-container">
            <div class="header-top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-7 col-sm-7 hidden-xs">
                            <!-- Default Welcome Message -->
                            <div class="welcome-msg "><strong>Shop Đèn Lồng Online </strong> Xin Chào</div>
                            <span class="phone hidden-sm">Liên hệ: <strong>0971325547 - 0934 724 923 </strong> </span>

                        </div>

                        <!-- top links -->
                        <div class="headerlinkmenu col-lg-5 col-md-5 col-sm-4 col-xs-12">
                            <div class="links">
                                <?php
                                if (!isset($_SESSION['fullname']))
                                {
                                    ?>
                                    <div class="myaccount">
                                        <a title="My Account" href="account_page.html">
                                            <i class="fa fa-user"></i>
                                            <span class="hidden-xs">My Account</span>
                                        </a>
                                    </div>
                                    <div class="login">
                                        <a href="admin/login.php">
                                            <i class="fa fa-unlock-alt"></i>
                                            <span class="hidden-xs">Đăng Nhập</span>
                                        </a>
                                    </div>
                                    <?php
                                }
                                else
                                {
                                    ?>
                                    <div>
                                        <a title="<?php echo $_SESSION['fullname'] ?>">
                                            <span class="hidden-xs">Chào, <h6> <?php echo $_SESSION['fullname'] ?></h6> </span>
                                        </a>
                                        <a title="<?php echo "profile" ?>" href="admin/profile.php?profile=user">
                                            <span class="hidden-xs">My Profile</span>
                                        </a>

                                        <a title="<?php echo "logOut" ?>" href="admin/quantri.php?alias=logout">
                                            <span class="hidden-xs">Đăng Xuất </span>
                                        </a>


                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-sm-3 col-md-3 col-xs-12">
                        <!-- Header Logo -->
                        <div class="logo">
                            <a title="e-commerce" href="index.php">
                                <img alt="responsive theme logo" src="http://denlongviet.vn/wp-content/uploads/2018/03/den-long-viet-stie-logo.png">
                            </a>
                        </div>
                        <!-- End Header Logo -->
                    </div>
                    <div class="col-xs-9 col-sm-6 col-md-6">
                        <!-- Search -->

                        <div class="top-search">
                            <div id="search">
                                <form>
                                    <div class="input-group">
                                        <select class="cate-dropdown hidden-xs" name="category_id">
                                            <option>Tìm Kiếm</option>
                                            <option>Đèn Lồng Hội An</option>
                                            <option>Đèn Hoa Sen</option>
                                            <option>Đèn Gỗ</option>
                                        </select>
                                        <input type="text" class="form-control" placeholder="Search" name="search">
                                        <button class="btn-search" type="button">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- End Search -->
                    </div>
                    <!-- top cart -->

                    <div class="col-lg-3 col-xs-3 top-cart">
                        <div class="top-cart-contain">
                            <?php
                            if(isset($_SESSION['cart'])){
                            ?>
                            <div class="mini-cart">
                                <div  class="basket dropdown-toggle">

                                    <a href="mycart.php">
                                        <div class="cart-icon">
                                            <i class="fa fa-shopping-cart"></i>
                                        </div>
                                        <div class="shoppingcart-inner hidden-xs">
                                            <span>Giỏ hàng của bạn</span>
                                        </div>
                                    </a>

                                </div>

                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- end header -->

    <!-- Navbar -->
    <nav>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-4">
                    <div class="mm-toggle-wrap">
                        <div class="mm-toggle">
                            <i class="fa fa-align-justify"></i>
                        </div>
                        <span class="mm-label">Sản Phẩm</span>
                    </div>
                    <div class="mega-container visible-lg visible-md visible-sm">
                        <div class="navleft-container">
                            <div class="mega-menu-title">
                                <h3>Thể Loại</h3>
                            </div>
                            <div class="mega-menu-category">
                                <ul class="nav">
                                    <?php foreach ($menu as $m): ?>
                                        <?php if ($m->level2 != ''): ?>
                                            <li>
                                                <a href="<?= $m->url1 ?>">
                                                    <i class="icon fa fa-clock-o fa-fw"></i> <?= $m->name1 ?></a>
                                                <div class="wrap-popup column1">
                                                    <div class="popup">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <ul class="nav">
                                                                    <?php

                                                                    $arrLevel2 = explode(',', $m->level2);
                                                                    foreach ($arrLevel2 as $level2):
                                                                        $arr = explode('::', $level2);
                                                                        ?>
                                                                        <li>
                                                                            <a href="<?= $arr[1] ?>">
                                                                                <span><?= $arr[0] ?></span>
                                                                            </a>
                                                                        </li>
                                                                    <?php endforeach ?>

                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        <?php else: ?>
                                            <li class="nosub">
                                                <a href="<?= $m->url1 ?>">
                                                    <i class="icon fa fa-clock-o fa-fw"></i> <?= $m->name1 ?></a>
                                            </li>
                                        <?php endif ?>
                                    <?php endforeach ?>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-9 col-sm-8">
                    <div class="mtmegamenu">
                        <ul>
                            <li class="mt-root demo_custom_link_cms">
                                <div class="mt-root-item">
                                    <a href="index.php">
                                        <div class="title title_font">
                                            <span class="title-text">Trang Chủ</span>
                                        </div>
                                    </a>
                                </div>
                            </li>
                            <li class="mt-root">
                                <div class="mt-root-item">
                                    <a href="contact.php">
                                        <div class="title title_font">
                                            <span class="title-text">Liên Hệ</span>
                                        </div>
                                    </a>
                                </div>
                            </li>
                            <li class="mt-root">
                                <div class="mt-root-item">
                                    <a href="aboutus.php">
                                        <div class="title title_font">
                                            <span class="title-text">Giới Thiệu</span>
                                        </div>
                                    </a>
                                </div>
                            </li>
                            <li class="mt-root">
                                <div class="mt-root-item">
                                    <a href="setting.php">
                                        <div class="title title_font">
                                            <span class="title-text">Hướng Dẫn</span>
                                        </div>
                                    </a>
                                </div>
                            </li>
                            <li class="mt-root demo_custom_link_cms">
                                <div class="mt-root-item">
                                    <a href="post.php">
                                        <div class="title title_font">
                                            <span class="title-text">Bài Viết</span>
                                        </div>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <!-- end nav -->

    <?php include_once "$view.view.php"; ?>

    <!-- Modal -->
    <div id="cartModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-body">
                    <h5 style="text-align: center ;color: green">THÊM THÀNH CÔNG SẢN PHẨM VÀO GIỎ HÀNG </h5>
                    <h5 style="text-align: center">
                        <i style="color: red;">Thông Tin Sản Phẩm</i>
                        </br>

                        Tên:<i class="name-res">...</i>
                    </h5>
                    <h6 style="text-align: center"><a style="font-size: 20px;color: red;" href="mycart.php">Xem giỏ
                            hàng</a></h6>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>


    <!-- Footer -->

    <footer>
        <div class="footer-newsletter">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-sm-7">
                        <form id="newsletter-validate-detail" method="post" action="#">
                            <h3 class="hidden-sm">LIÊN HỆ VỚI CHÚNG TÔI </h3>
                            <div class="newsletter-inner">
                                <input class="newsletter-email" name='Email' placeholder='Enter Your Email'/>
                                <button class="button subscribe" type="submit" title="Subscribe">Subscribe</button>
                            </div>
                        </form>
                    </div>
                    <div class="social col-md-4 col-sm-5">
                        <ul class="inline-mode">
                            <li class="social-network fb">
                                <a title="Connect us on Facebook" target="_blank" href="https://www.facebook.com/">
                                    <i class="fa fa-facebook"></i>
                                </a>
                            </li>
                            <li class="social-network googleplus">
                                <a title="Connect us on Google+" target="_blank" href="https://plus.google.com/">
                                    <i class="fa fa-google-plus"></i>
                                </a>
                            </li>

                            <li class="social-network instagram">
                                <a title="Connect us on Instagram" target="_blank" href="https://instagram.com/">
                                    <i class="fa fa-instagram"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-4 col-xs-12 col-lg-3">
                    <div class="footer-logo">
                        <a href="index.php">
                            <!--                           // <img src="public/source/images/products/hoi-an-in-hinh-toi.png" alt="fotter logo">-->
                            <h3> SHOP ĐÈN LỒNG ONLINE </h3>
                        </a>
                    </div>
                    <h3>"TỰ HÀO BẢN SẮC DÂN TỘC"</h3>
                    <div class="footer-content">
                        <div class="email">
                            <i class="fa fa-envelope"></i>
                            <p>phanthongit13@gmail.com</p>
                        </div>
                        <div class="phone">
                            <i class="fa fa-phone"></i>
                            <p>0971 32 55 47 </p>
                        </div>
                        <div class="address">
                            <i class="fa fa-map-marker"></i>
                            <p><strong>CHI NHÁNH 1: </strong> 97 Man Thiện - Phường Hiệp Phú - Quận 9 - TP.HCM</p>
                            <i class="fa fa-map-marker"></i>
                            <p><strong>CHI NHÁNH 2:</strong> 198 Nam Hòa - Phước Long A - Quận 9 - TP.HCM</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3 col-xs-12 col-lg-3 collapsed-block">
                    <div class="footer-links">
                        <h3 class="links-title">THÔNG TIN
                            <a class="expander visible-xs" href="#TabBlock-1">+</a>
                        </h3>
                        <div class="tabBlock" id="TabBlock-1">
                            <ul class="list-links list-unstyled">
                                <li>
                                    <a href="#s">Thông Tin Giao Hàng</a>
                                </li>
                                <li>
                                    <a href="#">Giảm Giá </a>
                                </li>
                                <li>
                                    <a href="sitemap.html">Tìm Trên Bản Đồ</a>
                                </li>
                                <li>
                                    <a href="#">Chính Sách Bảo Mật</a>
                                </li>
                                <li>
                                    <a href="faq.html">FAQs</a>
                                </li>
                                <li>
                                    <a href="#">Điều Khoản - Điều Kiện </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3 col-xs-12 col-lg-3 collapsed-block">
                    <div class="footer-links">
                        <h3 class="links-title">TÙY CHỌN
                            <a class="expander visible-xs" href="#TabBlock-3">+</a>
                        </h3>
                        <div class="tabBlock" id="TabBlock-3">
                            <ul class="list-links list-unstyled">
                                <li>
                                    <a href="sitemap.html"> Bản Đồ Trang Web </a>
                                </li>
                                <li>
                                    <a href="#">Trang Chủ</a>
                                </li>
                                <li>
                                    <a href="#">Sản Phẩm</a>
                                </li>
                                <li>
                                    <a href="about_us.html">Liên Hệ</a>
                                </li>
                                <li>
                                    <a href="contact_us.html">Bài Viết</a>
                                </li>
                                <li>
                                    <a href="#">My Orders</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-2 col-xs-12 col-lg-3 collapsed-block">
                    <div class="footer-links">
                        <h3 class="links-title">Service
                            <a class="expander visible-xs" href="#TabBlock-4">+</a>
                        </h3>
                        <div class="tabBlock" id="TabBlock-4">
                            <ul class="list-links list-unstyled">
                                <li>
                                    <a href="account_page.html">Account</a>
                                </li>
                                <li>
                                    <a href="wishlist.html">Wishlist</a>
                                </li>
                                <li>
                                    <a href="shopping_cart.html">Shopping Cart</a>
                                </li>
                                <li>
                                    <a href="#">Return Policy</a>
                                </li>
                                <li>
                                    <a href="#">Special</a>
                                </li>
                                <li>
                                    <a href="#">Lookbook</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-coppyright">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-xs-12 coppyright"> Copyright © 2018 MyStore. Edit by
                        <a href="https://www.facebook.com/huongnguyen.nh"> Phan Văn Thông </a>. All Rights Reserved.
                    </div>
                    <div class="col-sm-6 col-xs-12">
                        <div class="payment">
                            <ul>
                                <li>
                                    <a href="#">
                                        <img title="Visa" alt="Visa" src="public/source/images/visa.png">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img title="Paypal" alt="Paypal" src="public/source/images/paypal.png">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img title="Discover" alt="Discover" src="public/source/images/discover.png">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img title="Master Card" alt="Master Card"
                                             src="public/source/images/master-card.png">
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <a href="#" class="totop"> </a>
</div>

<!-- End Footer -->

<!-- JS -->

<!-- jquery js -->
<script type="text/javascript" src="public/source/js/jquery.min.js"></script>

<!-- bootstrap js -->
<script type="text/javascript" src="public/source/js/bootstrap.min.js"></script>

<!-- owl.carousel.min js -->
<script type="text/javascript" src="public/source/js/owl.carousel.min.js"></script>

<!-- bxslider js -->
<script type="text/javascript" src="public/source/js/jquery.bxslider.js"></script>

<!-- flexslider js -->
<script type="text/javascript" src="public/source/js/jquery.flexslider.js"></script>


<!-- megamenu js -->
<script type="text/javascript" src="public/source/js/megamenu.js"></script>
<script type="text/javascript">
    /* <![CDATA[ */
    var mega_menu = '0';

    /* ]]> */
</script>

<!-- jquery.mobile-menu js -->
<script type="text/javascript" src="public/source/js/mobile-menu.js"></script>

<!--jquery-ui.min js -->
<script type="text/javascript" src="public/source/js/jquery-ui.js"></script>

<!-- main js -->
<script type="text/javascript" src="public/source/js/main.js"></script>

<!-- countdown js -->
<script type="text/javascript" src="public/source/js/countdown.js"></script>

<!--cloud-zoom js -->
<script type="text/javascript" src="public/source/js/cloud-zoom.js"></script>
<?php if ($view == 'home'): ?>
    <!-- Slider Js -->
    <script type="text/javascript" src="public/source/js/revolution-slider.js"></script>

    <!-- Revolution Slider -->
    <script type="text/javascript">
        $(document).ready(function () {
            $('.tp-banner').revolution(
                {
                    delay: 9000,
                    startwidth: 1170,
                    startheight: 530,
                    hideThumbs: 10,

                    navigationType: "bullet",
                    navigationStyle: "preview1",

                    hideArrowsOnMobile: "on",

                    touchenabled: "on",
                    onHoverStop: "on",
                    spinner: "spinner4"
                });
        });
    </script>
<?php endif ?>
<script>
    // Xử lý ajax từ trang Detail sản phẩm

    //Xử lý ajax  từ trang product  // hOME

    $(document).ready(function () {
        $('.add-to-cart-mt').click(function () {
            var id_Product = $(this).attr('id-sp');
            // Xử lý ajax truyền qya controller

            //console.log(id_Product);
            $.ajax({
                url: 'cart.php',
                type: "POST",
                data: {
                    'id_Cart_Product': parseInt(id_Product)
                },
                success: function (res) {
                    //Show ra bảng thông báo thêm sản phẩm
                    $('.name-res').html(res);
                    $('#cartModal').modal('show');
                },
                error: function (error) {
                    console.log(error);

                }

            })
        });
        $('.add-to-cart-mt-1').click(function () {
            var id_Product = $(this).attr('id-sp');
            // Xử lý ajax truyền qya controller

            //console.log(id_Product);
            $.ajax({
                url: 'cart.php',
                type: "POST",
                data: {
                    'id_Cart_Product': parseInt(id_Product)
                },
                success: function (res) {
                    //Show ra bảng thông báo thêm sản phẩm
                    $('.name-res').html(res);
                    $('#cartModal').modal('show');
                },
                error: function (error) {
                    console.log(error);

                }

            })
        });
    });
    // xỬ LÝ CHO trang  Detail khi kèm theo là số lượng và id của sản phẩm
    $('.pro-add-to-cart').click(function () {
        var idProduct = $(this).attr('id-product');
        var quantity = $('#qty').val();

        // console.log(idProduct);
        console.log(quantity);
        $.ajax({
            url: "cart.php",
            type: "POST",
            data: {
                'qty': parseInt(quantity),
                'id_Cart_Product': parseInt(idProduct)
            },
            success: function (response) {
                $('.name-res').html(response);
                $('#cartModal').modal('show');
                $('#qty').val(1);
            },
            error: function (error) {
                console.log(error);
            }
        })
    })

</script>

</body>


</html>