<?php
/**
 * Created by PhpStorm.
 * User: Phan Thông  IT
 * Date: 2018-07-23
 * Time: 4:37 PM
 */
//if(isset($_SESSION['menu'])){
//    print_r($_SESSION['menu']);
//}
//if (session_status() == PHP_SESSION_NONE) {
//    session_start();
//}

?>

<!DOCTYPE html>
<html lang="en">

<?php
include "header.php";
?>
<body>

<section id="container">
    <?php
    include 'topheader.php';
    ?>
    <!--sidebar start-->
    <aside>

<!--        --><?php
//        if(isset($viewmenu)){
//            include ("$viewmenu");
//        }
//        ?>
        <div id="sidebar" class="nav-collapse ">
            <!-- sidebar menu start-->
            <ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a class="active" href="index.html">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class=" fa fa-envelope"></i>
                        <span>Quản lý đơn hàng </span>
                    </a>
                    <ul class="sub">
                        <li><a id="0" href="bills.php?status=0">Đơn hàng chưa xác nhận</a></li>
                        <li><a id="1" href="bills.php?status=1">Đơn hàng đã xác nhận</a></li>
                        <li><a id="2" href="bills.php?status=2">Đơn hàng đã hoàn tất</a></li>
                        <li><a id="3" href="bills.php?status=3">Đơn hàng bị hủy</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class=" fa fa-envelope"></i>
                        <span> Danh Mục Sản Phẩm </span>
                    </a>
                    <ul class="sub">
                        <li><a id="level1" href="listlv1-categories.php?list1categories=lv1">Danh Mục Sản Phẩm Cấp 1 </a></li>
                        <li><a id="level1" href="listlv1-categories.php?list2categories=lv2">Danh Mục Sản Phẩm Cấp 2 </a></li>
                        <li><a id="level1" href="listlv1-categories.php?addcategories=add">Thêm Danh Mục Sản Phẩm</a></li>
                    </ul>
                </li>

                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class=" fa fa-bar-chart-o"></i>
                        <span>Charts</span>
                    </a>
                    <ul class="sub">
                        <li><a href="morris.html">Quản Lý Bài Viết</a></li>
                        <li><a href="chartjs.html">Quản Lý Khách Hàng</a></li>
                        <li><a href="flot_chart.html">Quản Lý Sản Phẩm</a></li>
                        <li><a href="xchart.html">xChart</a></li>
                    </ul>
                </li>

                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-shopping-cart"></i>
                        <span>Quản Lý Sản Phẩm</span>
                    </a>
                    <ul class="sub">
                        <li><a href="listproduct.php?getlist=list"> Sản Phẩm Theo Loại</a></li>
                        <li><a href="addproduct.php?addproduct=name">Thêm Mới Sản Phẩm</a></li>

                        <li><a href="product_details.html">Sản Phẩm Giảm Giá</a></li>
                        <li><a href="product_details.html">Sản Phẩm TOP</a></li>
                        <li><a href="list-delete-product.php?listdeleted=delete">Sản Phẩm Đã Xóa</a></li>
                    </ul>
                </li>
                <li>
                    <a href="google_maps.html">
                        <i class="fa fa-map-marker"></i>
                        <span>Google Maps </span>
                    </a>
                </li>

                <!--multi level menu start-->

                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class=" fa fa-envelope"></i>
                        <span>Quản Lý Khách Hàng </span>
                    </a>
                    <ul class="sub">

                        <li><a id="1" href="list-customers.php?getlistCustomer=Customer">Danh Sách Khách Hàng</a></li>
                        <li><a id="2" href="addcustomer.php?addcustomer=add">Thêm Mới Khách hàng</a></li>
                        <li><a id="3" href="get-delete-customer.php?listcustomer=list">Khách Hàng Đã Xóa</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class=" fa fa-envelope"></i>
                        <span>Quản Lý Bài Viết </span>
                    </a>
                    <ul class="sub">

                        <li><a id="1" href="post.php?post=list">Danh Sách Bài viết</a></li>
                        <li><a id="2" href="post.php?addpost=add">Thêm Mới Bài Viết</a></li>

                    </ul>
                </li>

                <!--multi level menu end-->

            </ul>
            <!-- sidebar menu end-->
        </div>


    </aside>
    <!--sidebar end-->
    <?php
    include 'content.php';
    ?>
    <!--footer start-->

    <!--footer end-->
</section>

<?php
include 'script.php';
?>


</body>
</html>

<script type="text/javascript" src="Public/source/js/jquery.min.js"></script>
<!--<script>-->
<!--    $(document).ready(function () {-->
<!--        $('.product-by-type').click(function () {-->
<!--            var idType = $(this).attr('id-type');-->
<!--            console.log(idType);-->
<!--            $.ajax({-->
<!--                url: "product.php",-->
<!--                type:"POST",-->
<!--                data:{-->
<!--                    'idtype':idType-->
<!--                },-->
<!--                success:function(response){-->
<!--                    -->
<!--                },-->
<!--                error:function () {-->
<!---->
<!--                }-->
<!--            })-->
<!--        })-->
<!---->
<!--    });-->
<!--</script>-->
