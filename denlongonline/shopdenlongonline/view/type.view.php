<?php
/**
 * Created by PhpStorm.
 * User: Phan Thông  IT
 * Date: 2018-06-20
 * Time: 4:46 PM
 *
 */
$slider             = $data['slider'];
$product            = $data['product'];
$allType            = $data['allType'];
$nameType           = $data['typeName'];
$allSize            = $data['getAllSize'];
$getNew_Sale_Sldier = $data['getNew_Sale'];

//print_r($allSize);die;
?>

<!-- Main Container -->
<div class="main-container col2-left-layout" xmlns="http://www.w3.org/1999/html">
    <div class="container">
        <div class="row">
            <div class="col-main col-sm-9 col-xs-12 col-sm-push-3">
                <div class="category-description std">
                    <div class="slider-items-products">
                        <div id="category-desc-slider" class="product-flexslider hidden-buttons">
                            <div class="slider-items slider-width-col1 owl-carousel owl-theme">

                                <!-- Item -->
                                <?php foreach ($slider as $_itemslider) { ?>
                                    <div class="item">
                                        <a href="index.php">
                                            <img alt="<?php echo $_itemslider->title ?>"
                                                 src="public/source/images/slider/<?php echo $_itemslider->image ?>">
                                        </a>
                                        <div class="inner-info">
                                            <div class="cat-img-title">
                                                <span><?php echo $_itemslider->title ?></span>
                                                <h2 class="cat-heading">
                                                    <div class="layered-Category">
                                                        <h2 class="saider-bar-title">Categories</h2>
                                                        <strong>SHOP ĐÈN LỒNG ONLINE</strong>
                                                </h2>
                                                <p>"TỰ HÀO BẢN SẮC VIỆT "</p>
                                                <a class="info" href="index.php">LIÊN HỆ NGAY</a>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                                <!-- End Item -->
                            </div>
                        </div>
                    </div>
                </div>

                <div class="shop-inner">
                    <div class="page-title">
                        <h2><?php
                            echo $nameType;
                            ?></h2>
                    </div>

                    <div class="product-grid-area">
                        <ul class="products-grid">
                            <?php
                            foreach ($product as $item)
                            {

                                ?>
                                <li class="item col-lg-4 col-md-4 col-sm-6 col-xs-6 ">

                                    <div class="product-item">
                                        <div class="item-inner">
                                            <div class="product-thumbnail">
                                                <?php
                                                if ($item->promotion_price > 0)
                                                {
                                                    ?>
                                                    <div class="icon-sale-label sale-left">Sale</div>
                                                    <?php
                                                }
                                                ?>
                                                <?php
                                                if ($item->new == 1)
                                                {
                                                    ?>
                                                    <div class="icon-new-label new-right">New</div>
                                                <?php } ?>
                                                <div class="pr-img-area">
                                                    <a title="<?php echo $item->name ?>"
                                                       href="<?php echo $item->url ?>-<?php echo $item->id ?>">
                                                        <figure>
                                                            <img class="first-img"
                                                                 src="public/source/images/products/<?php echo $item->image ?>"
                                                                 alt="<?php echo $item->name ?>">
                                                            <img class="hover-img"
                                                                 src="public/source/images/products/<?php echo $item->image ?>"
                                                                 alt="<?php echo $item->name ?>">
                                                        </figure>
                                                    </a>
                                                    <button type="button" class="add-to-cart-mt " id-sp="<?= $item->id;?>>
                                                        <i class="fa fa-shopping-cart"></i>
                                                        <span> THÊM VÀO GIỎ HÀNG </span>
                                                    </button>
                                                </div>

                                            </div>
                                            <div class="item-info">
                                                <div class="info-inner">
                                                    <div class="item-title">
                                                        <a title="<?php echo $item->name ?> "
                                                           href="<?php echo $item->url ?>-<?php echo $item->id ?>"><?php echo $item->name ?></a>
                                                    </div>
                                                    <div class="item-content">

                                                        <div class="item-price">
                                                            <div class="price-box">
                                                                <?php
                                                                if ($item->promotion_price > 0)
                                                                {
                                                                    ?>
                                                                    <p class="special-price">
                                                                        <span class="price"> <?php echo number_format($item->promotion_price) ?>
                                                                            VNĐ </span>
                                                                    </p>
                                                                    <p class="old-price">
                                                                        <span class="price"> <?php echo number_format($item->price) ?>
                                                                            VNĐ</span>
                                                                    </p>
                                                                <?php } else { ?>
                                                                    <p class="special-price">
                                                                        <span class="price"> <?php echo number_format($item->price) ?>
                                                                            VNĐ  </span>
                                                                    </p>
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            <?php } ?>
                        </ul>

                    </div>

                    <div class="pagination-area ">
                        <ul>
                            <?php
                            echo $data['pager'];
                            ?>


                        </ul>
                    </div>

                </div>


            </div>

            <aside class="sidebar col-sm-3 col-xs-12 col-sm-pull-9">
                <div class="block category-sidebar">
                    <div class="sidebar-title">
                        <h3>Categories</h3>
                    </div>
                    <ul class="product-categories">
                        <li class="cat-item current-cat cat-parent">
                            <a href="shop_grid.html">Women</a>
                            <ul class="children">
                                <li class="cat-item cat-parent">
                                    <a href="shop_grid.html">
                                        <i class="fa fa-angle-right"></i>&nbsp; Accessories</a>
                                    <ul class="children">
                                        <li class="cat-item">
                                            <a href="shop_grid.html">
                                                <i class="fa fa-angle-right"></i>&nbsp; Dresses</a>
                                        </li>
                                        <li class="cat-item cat-parent">
                                            <a href="shop_grid.html">
                                                <i class="fa fa-angle-right"></i>&nbsp; Handbags</a>
                                            <ul style="display: none;" class="children">
                                                <li class="cat-item">
                                                    <a href="shop_grid.html">
                                                        <i class="fa fa-angle-right"></i>&nbsp; Beaded Handbags</a>
                                                </li>
                                                <li class="cat-item">
                                                    <a href="shop_grid.html">
                                                        <i class="fa fa-angle-right"></i>&nbsp; Sling bag</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="cat-item cat-parent">
                                    <a href="shop_grid.html">
                                        <i class="fa fa-angle-right"></i>&nbsp; Handbags</a>
                                    <ul class="children">
                                        <li class="cat-item">
                                            <a href="shop_grid.html">
                                                <i class="fa fa-angle-right"></i>&nbsp; backpack</a>
                                        </li>
                                        <li class="cat-item">
                                            <a href="shop_grid.html">
                                                <i class="fa fa-angle-right"></i>&nbsp; Beaded Handbags</a>
                                        </li>
                                        <li class="cat-item">
                                            <a href="shop_grid.html">
                                                <i class="fa fa-angle-right"></i>&nbsp; Fabric Handbags</a>
                                        </li>
                                        <li class="cat-item">
                                            <a href="shop_grid.html">
                                                <i class="fa fa-angle-right"></i>&nbsp; Sling bag</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="cat-item">
                                    <a href="shop_grid.html">
                                        <i class="fa fa-angle-right"></i>&nbsp; Jewellery</a>
                                </li>
                                <li class="cat-item">
                                    <a href="shop_grid.html">
                                        <i class="fa fa-angle-right"></i>&nbsp; Swimwear</a>
                                </li>
                            </ul>
                        </li>
                        <li class="cat-item cat-parent">
                            <a href="shop_grid.html">Men</a>
                            <ul class="children">
                                <li class="cat-item cat-parent">
                                    <a href="shop_grid.html">
                                        <i class="fa fa-angle-right"></i>&nbsp; Dresses</a>
                                    <ul class="children">
                                        <li class="cat-item">
                                            <a href="shop_grid.html">
                                                <i class="fa fa-angle-right"></i>&nbsp; Casual</a>
                                        </li>
                                        <li class="cat-item">
                                            <a href="shop_grid.html">
                                                <i class="fa fa-angle-right"></i>&nbsp; Designer</a>
                                        </li>
                                        <li class="cat-item">
                                            <a href="shop_grid.html">
                                                <i class="fa fa-angle-right"></i>&nbsp; Evening</a>
                                        </li>
                                        <li class="cat-item">
                                            <a href="shop_grid.html">
                                                <i class="fa fa-angle-right"></i>&nbsp; Hoodies</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="cat-item">
                                    <a href="shop_grid.html">
                                        <i class="fa fa-angle-right"></i>&nbsp; Jackets</a>
                                </li>
                                <li class="cat-item">
                                    <a href="shop_grid.html">
                                        <i class="fa fa-angle-right"></i>&nbsp; Shoes</a>
                                </li>
                            </ul>
                        </li>
                        <li class="cat-item">
                            <a href="shop_grid.html">Electronics</a>
                        </li>
                        <li class="cat-item">
                            <a href="shop_grid.html">Furniture</a>
                        </li>
                        <li class="cat-item">
                            <a href="shop_grid.html">KItchen</a>
                        </li>
                    </ul>
                </div>
                <div class="block shop-by-side">
                    <div class="sidebar-bar-title">
                        <h3>Shop By</h3>
                    </div>
                    <div class="block-content">
                        <p class="block-subtitle">Shopping Options</p>
                        <div class="layered-Category">
                            <h2 class="saider-bar-title"> THỂ LOẠI - SẢN PHẨM </h2>
                            <div class="layered-content">
                                <ul class="check-box-list">
                                    <?php
                                    foreach ($allType as $value_Type)
                                    {
                                        ?>
                                        <li>
                                            <input type="checkbox" class="typedenlong" id="<?= $value_Type->url ?>" >
                                            <label class="cate-list" for="<?= $value_Type->url ?>">
                                                <span class="button"></span><?= $value_Type->name ?>
                                                <span class="count">(<?= $value_Type->soluong ?>)</span>
                                            </label>
                                        </li>
                                    <?php } ?>

                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="block product-price-range ">
                    <div class="sidebar-bar-title">
                        <h3>LỌC SẢN PHẨM</h3>
                    </div>
                    <div class="block-content">
                        <div class="slider-range">

                            <ul class="check-box-list">
                                <p style="color:black ; font-size: 14px; margin-left: 20px; "><strong> GIÁ BÁN<strong></strong></p>
                                <li>
                                    <input type="checkbox" class="pricedenlong" id="0-250000" >
                                    <label class="cate-list" for="0-250000">
                                        <span class="button"></span>0- 250.000 (VNĐ)
                                    </label>
                                </li>
                                <li>
                                    <input type="checkbox" class="pricedenlong" id="250000-500000" >
                                    <label class="cate-list" for="250000-500000">
                                        <span class="button"></span> 250.000 - 500.000 (VNĐ)
                                    </label>
                                </li>
                                <li>
                                    <input type="checkbox" class="pricedenlong" id="500000-1000000" >
                                    <label class="cate-list" for="500000-1000000">
                                        <span class="button"></span> 500.000 - 1.000.000 (VNĐ)
                                    </label>
                                </li>





                            </ul>
                        <br>
                            <ul class="check-box-list">
                                <p style="color:black ; font-size: 14px; margin-left: 20px; "><strong> KÍCH THƯỚC(SIZE)
                                        <strong></strong></p>
                                <?php
                                foreach ($allSize as $item_Size)
                                {
                                    ?>
                                    <li>
                                        <input type="checkbox" class="sizedenlong" id="<?= $item_Size->id_size ?>">
                                        <label class="size-list" for="<?= $item_Size->id_size ?>">
                                            <span class="button"></span><?= $item_Size->name_size ?>
                                            (<?php echo $item_Size->note ?>)
                                            <span class="count">(<?= $item_Size->soluong ?>)</span>
                                        </label>
                                    </li>
                                <?php } ?>

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="block sidebar-cart">
                    <div class="sidebar-bar-title">
                        <h3>My Cart</h3>
                    </div>
                    <div class="block-content">
                        <p class="amount">There are
                            <a href="shopping_cart.html">2 items</a> in your cart.</p>
                        <ul>
                            <li class="item">
                                <a href="shopping_cart.html" title="Sample Product" class="product-public/source/image">
                                    <img src="public/source/images/products/img07.jpg" alt="Sample Product ">
                                </a>
                                <div class="product-details">
                                    <div class="access">
                                        <a href="#" title="Remove This Item" class="remove-cart">
                                            <i class="icon-close"></i>
                                        </a>
                                    </div>
                                    <p class="product-name">
                                        <a href="shopping_cart.html">Lorem ipsum dolor sit amet Consectetur</a>
                                    </p>
                                    <strong>1</strong> x
                                    <span class="price">$19.99</span>
                                </div>
                            </li>
                            <li class="item last">
                                <a href="#" title="Sample Product" class="product-public/source/image">
                                    <img src="public/source/images/products/img08.jpg" alt="Sample Product">
                                </a>
                                <div class="product-details">
                                    <div class="access">
                                        <a href="#" title="Remove This Item" class="remove-cart">
                                            <i class="icon-close"></i>
                                        </a>
                                    </div>
                                    <p class="product-name">
                                        <a href="shopping_cart.html">Consectetur utes anet adipisicing elit</a>
                                    </p>
                                    <strong>1</strong> x
                                    <span class="price">$8.00</span>
                                    <!--access clearfix-->
                                </div>
                            </li>
                        </ul>
                        <div class="summary">
                            <p class="subtotal">
                                <span class="label">Cart Subtotal:</span>
                                <span class="price">$27.99</span>
                            </p>
                        </div>
                        <div class="cart-checkout">
                            <button class="button button-checkout" title="Submit" type="submit">
                                <i class="fa fa-check"></i>
                                <span>Checkout</span>
                            </button>
                        </div>
                    </div>
                </div>


                <div class="block special-product">
                    <div class="sidebar-bar-title">
                        <h3>SẢN PHẨM ĐẶC BIỆT</h3>
                    </div>
                    <div class="block-content">
                        <ul>
                            <?php
                            foreach ($getNew_Sale_Sldier as $item_Product)
                            {
                                ?>
                                <li class="item">
                                    <div class="products-block-left">
                                        <a href="<?php echo $item_Product->url ?>-<?php echo $item_Product->id ?>"
                                           title="<?= $item_Product->name ?>"
                                           class="product-image">
                                            <img href="<?php echo $item_Product->url ?>-<?php echo $item_Product->id ?>"
                                                 src="public/source/images/products/<?= $item_Product->image ?>"
                                                 alt="<?= $item_Product->name ?> ">
                                        </a>
                                    </div>
                                    <div class="products-block-right">
                                        <p class="product-name">
                                            <a href="<?php echo $item_Product->url ?>-<?php echo $item_Product->id ?>"><?= $item_Product->name ?></a>
                                        </p>
                                        <div class="item-price">
                                            <div class="price-box">
                                                <?php
                                                if ($item_Product->promotion_price > 0)
                                                {
                                                    ?>
                                                    <p class="special-price">
                                                                        <span class="price"> <?php echo number_format($item_Product->promotion_price) ?>
                                                                            VNĐ </span>
                                                    </p>
                                                    <p class="old-price">
                                                                        <span class="price"> <?php echo number_format($item_Product->price) ?>
                                                                            VNĐ</span>
                                                    </p>
                                                <?php } else { ?>
                                                    <p class="special-price">
                                                                        <span class="price"> <?php echo number_format($item_Product->price) ?>
                                                                            VNĐ  </span>
                                                    </p>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            <?php } ?>
                        </ul>
                        <a class="link-all" href="index.php">Xem Hết</a>
                    </div>
                </div>


            </aside>
        </div>
    </div>
</div>
<!-- Main Container End -->
<script type="text/javascript" src="public/source/js/jquery.min.js"></script>
<script>
    // Xử lý Ajax cho việc load thêm danh mục thể loại
    $(document).ready(function () {
       // var tenkhongdau = $(this).attr('id');
        $('input:checkbox[class=typedenlong]').click(function () {
            // lấy tên không dấu
            var tenkhongdau = $(this).attr('id');
            console.log(tenkhongdau);
            $.ajax({
                url: "ajax-categories.php",
                type: "GET",
                data: {
                    'alias': tenkhongdau
                },
                success: function (response) {
                    if ($('#exist').length != 0) {
                        if ($('.new-' + tenkhongdau).length === 0) {
                            $('.products-grid').append(response);
                        } else {
                            var checked = document.querySelectorAll('input[type=checkbox]:checked');
                            if (checked.length === 0) {
                                location.reload(true);
                            } else {
                                $('.new-' + tenkhongdau).remove();
                            }
                        }
                    } else {
                        $('.products-grid').attr('id', 'exist');
                        $('.products-grid').html(response);//replace
                    }

                }
                ,
                error: function (error) {
                    console.log(error);
                }
            })
        })
    });

    $(document).ready(function () {
        $('input:checkbox[class=sizedenlong]').click(function () {
            var id_Size = $(this).attr('id');
           // console.log(id_Size);
            // Xử Lý Ajax
            $.ajax({
                url: "ajax-allsize.php",
                type: "POST",
                data: {
                    'idSize': id_Size
                },
                success: function (response) {
                    // Xử lý  phần  dữ liệu trên checkbox
                    if ($('#exist').length != 0) {
                        if ($('.size-' + id_Size).length === 0) {
                            $('.products-grid').append(response); // Add item vào giỏ hàng

                        } else {
                            var checkSize = document.querySelectorAll('input[type=checkbox]:checked');
                            if (checkSize.length === 0) {
                                location.reload();

                            } else {
                                $('.size-' + id_Size).remove(); //nếu chưa click checkbox 2 lần thì remove các đối tượng theo ajax


                            }
                        }
                    } else {
                        $('.products-grid').attr('id', 'exist');
                        $('.products-grid').html(response); // lặp lại
                    }
                },
                error: function (error) {
                    console.log(error);
                }

            })
        })


    });
    $(document).ready(function () {
        $('input:checkbox[class=pricedenlong]').click(function () {
            var rangePrice = $(this).attr('id');
            // xử lý tách chuỗi để kiếm ra min max trong khoảng id

          var arrayPrice =  rangePrice.split('-',2);
          var minPrice = parseInt(arrayPrice[0]);
          var maxPrice = parseInt(arrayPrice[1]);
            // console.log(maxPrice);
          // Kiêm tra tính hợp lệ

            // Xử Lý Ajax
            $.ajax({
                url: "ajax-price.php",
                type: "POST",
                data: {
                    'minPrice':minPrice,
                    'maxPrice':maxPrice
                },
                success: function (response) {
                    // Xử lý  phần  dữ liệu trên checkbox
                    if ($('#exist').length != 0) {
                        if ($('.price-' + minPrice+'-'+maxPrice).length === 0) {
                            $('.products-grid').append(response); // Add item vào giỏ hàng
                        } else {
                            var checkPrice = document.querySelectorAll('input[type=checkbox]:checked');
                          //  console.log(checkPrice);
                            if (checkPrice.length === 0) {
                                location.reload();

                            } else {
                                $('.price-' + minPrice+'-'+maxPrice).remove(); //nếu chưa click checkbox 2 lần thì remove các đối tượng theo ajax


                            }
                        }
                    } else {
                        $('.products-grid').attr('id', 'exist');
                        $('.products-grid').html(response); // lặp lại
                    }
                },
                error: function (error) {
                    console.log(error);
                }

            })
        })


    });



</script>