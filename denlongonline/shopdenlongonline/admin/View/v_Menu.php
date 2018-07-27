<?php
/**
 * Created by PhpStorm.
 * User: Phan Thông  IT
 * Date: 2018-07-26
 * Time: 3:15 PM
 */?>
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
                <li><a href="addproduct.php?addproduct=name">Thêm Mới Sản Phẩm</a></li>
                <li><a href="product_list.html">Sản Phẩm Khuyến mãi</a></li>
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
                <i class="fa fa-sitemap"></i>
                <span>Danh Mục Sản Phẩm</span>
            </a>
            <ul class="sub">
                <?php
                foreach ($menu as $m)
                {
                    if ($m->level2 != '')
                    {

                        ?>

                        <li class="sub-menu">
                            <a class="product-by-type" id-type="<?= $m->url1; ?>" id="idType" href="product.php?alias=<?= $m->url1; ?>"><?= $m->name1 ?></a>
                            <ul class="sub">
                                <?php
                                $arrlv2 = explode(',', $m->level2);
                                foreach ($arrlv2 as $lv2)
                                {
                                    $arr = explode('::', $lv2);
                                    ?>
                                    <li><a href="product.php?alias=<?= $arr[1] ?>"><?= $arr[0] ?> </a></li>
                                    <?php
                                }
                                ?>
                            </ul>
                        </li>
                    <?php }
                    else
                    {
                        ?>
                        <li><a   href="product.php?alias=<?= $m->url1;?>"><?= $m->name1; ?></a></li>
                    <?php }
                } ?>
            </ul>
        </li>
        <!--multi level menu end-->

    </ul>
    <!-- sidebar menu end-->
</div>
