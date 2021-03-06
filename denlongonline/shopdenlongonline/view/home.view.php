<?php
$background = $data['background'];
$featuredProduct = $data['featuredProduct'];
$newProduct = $data['newProduct'];
$topSell_Price = $data['topSell_Price'];
$select_DLHA = $data['select_DLHA'];
$selecttop_Product = $data['selecttop_Product'];

?>
<!-- Home Slider Start -->
<div class="slider">
    <div class="tp-banner-container clearfix">
        <div class="tp-banner">
            <ul>
                <?php
                foreach ( $background as $item)
                {

                    ?>
                    <!-- SLIDE 1 -->
                    <li data-transition="slidehorizontal" data-slotamount="5" data-masterspeed="700">
                        <!-- MAIN IMAGE -->
                        <img src="public/source/images/slider/<?php echo $item->image?>" alt="<?php echo $item->title;?>" data-bgfit="cover"
                             data-bgposition="center center" data-bgrepeat="no-repeat">
                        <!-- LAYERS -->
                        <!-- LAYER NR. 1 -->
                        <div class="tp-caption very_big_white skewfromrightshort fadeout" data-x="center" data-y="100"
                             data-speed="500" data-start="1200"
                             data-easing="Circ.easeInOut" style=" font-size:70px; font-weight:800; color:#fe0100;">SHOP ĐÈN LỒNG
                            <span style=" color:#000;">SALE</span>
                        </div>

                        <!-- LAYER NR. 2 -->
                        <div class="tp-caption tp-caption medium_text skewfromrightshort fadeout" data-x="center"
                             data-y="165" data-hoffset="0" data-voffset="-73"
                             data-speed="500" data-start="1200" data-easing="Power4.easeOut"
                             style=" font-size:30px; font-weight:500; color:#337ab7;">
                          <strong >"Tự hào thương hiệu Việt"</strong>
                        </div>

                        <!-- LAYER NR. 3 -->
                        <div class="tp-caption customin tp-resizeme rs-parallaxlevel-0" data-x="center" data-y="210"
                             data-hoffset="0" data-voffset="98"
                             data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                             data-speed="500" data-start="1500" data-easing="Power3.easeInOut" data-splitin="none"
                             data-splitout="none"
                             data-elementdelay="0.1" data-endelementdelay="0.1" data-linktoslide="next"
                             style="border: 2px solid #fed700;border-radius: 50px; font-size:14px; background-color:#fed700; color:#333; z-index: 12; max-width: auto; max-height: auto; white-space: nowrap; letter-spacing:1px;">
                            <a href='#' class='largebtn slide1'>Xem Thêm</a>
                        </div>
                    </li>
                    <?php

                }?>


            </ul>
        </div>
    </div>
</div>

<!-- main container -->
<div class="main-container col1-layout">
    <div class="container">
        <div class="row">

            <!-- Home Tabs  -->
            <div class="col-sm-12 col-md-12 col-xs-12">
                <div class="home-tab">
                    <ul class="nav home-nav-tabs home-product-tabs">
                        <li class="active">
                            <a href="#featured" data-toggle="tab" aria-expanded="false">Sản Phẩm Nổi Bật</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#top-sellers" data-toggle="tab" aria-expanded="false">Sản Phẩm Bán Chạy</a>
                        </li>
                    </ul>
                    <div id="productTabContent" class="tab-content">
                        <div class="tab-pane active in" id="featured">
                            <div class="featured-pro">
                                <div class="slider-items-products">
                                    <div id="featured-slider" class="product-flexslider hidden-buttons">
                                        <div class="slider-items slider-width-col4">

                                            <?php
                                            foreach ($featuredProduct as $item){

                                            ?>
                                            <div class="product-item">
                                                <div class="item-inner">
                                                    <div class="product-thumbnail">
                                                        <?php
                                                        if($item->promotion_price > 0 ){
                                                        ?>
                                                        <div class="icon-sale-label sale-left">Sale</div>
                                                        <?php }?>
                                                        <?php if($item->new == 1) {?>
                                                        <div class="icon-new-label new-right">New</div>
                                                        <?php }?>
                                                        <div class="pr-img-area"> <!-- detail.php?alias=iphone-x-64gb&id=2 -->
                                                            <a title="<?php echo  $item->name;?>" href="<?=$item->url?>-<?=$item->id?>">
                                                                <figure>
                                                                    <img class="first-img" src="public/source/images/products/<?php echo $item->image?> " alt="<?php echo  $item->name?>">
                                                                    <img class="hover-img" src="public/source/images/products/<?php echo $item->image?>" alt="<?php echo  $item->name?>">
                                                                </figure>
                                                            </a>
                                                            <button id-sp="<?=$item->id?>" type="button" class="add-to-cart-mt">
                                                                <i class="fa fa-shopping-cart"></i>
                                                                <span> Thêm vào Giỏ hàng</span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="item-info">
                                                        <div class="info-inner">
                                                            <div class="item-title">
                                                                <a title="<?php echo  $item->name?>" href="<?=$item->url?>-<?=$item->id?>"><?php echo  $item->name?></a>
                                                            </div>
                                                            <div class="item-price">
                                                                <div class="price-box">
                                                                    <?php if($item->promotion_price > 0 ){?>
                                                                    <p class="special-price">
                                                                        <span class="price"> <?php echo  number_format($item->promotion_price)?> VNĐ </span>

                                                                    </p>
                                                                        <p class="old-price">
                                                                            <span class="price"><?php echo  number_format($item->price);?>  VNĐ </span>
                                                                        </p>
                                                                    <?php } else{?>
                                                                    <p class="special-price">
                                                                        <span class="price"><?php echo  number_format($item->price);?>  VNĐ </span>
                                                                    </p>
                                                                    <?php } ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php  } ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="top-sellers">
                            <div class="top-sellers-pro">
                                <div class="slider-items-products">
                                    <div id="top-sellers-slider" class="product-flexslider hidden-buttons">
                                        <div class="slider-items slider-width-col4 ">
                                            <?php
                                            foreach ($selecttop_Product as $itemTop){
                                            ?>
                                            <div class="product-item">
                                                <div class="item-inner">
                                                    <div class="product-thumbnail">
                                                        <?php
                                                        if($itemTop->promotion_price > 0 ){
                                                            ?>
                                                            <div class="icon-sale-label sale-left">Sale</div>
                                                        <?php }?>
                                                        <?php if($itemTop->new == 1) {?>
                                                            <div class="icon-new-label new-right">New</div>
                                                        <?php }?>
                                                        <div class="pr-img-area">
                                                            <a title="<?php echo  $itemTop->name;?>" href="<?=$itemTop->url?>-<?=$itemTop->id?>">
                                                                <figure>
                                                                    <img class="first-img" src="public/source/images/products/<?php echo $itemTop->image?> " alt="<?php echo  $itemTop->name?>">
                                                                    <img class="hover-img" src="public/source/images/products/<?php echo $itemTop->image?>" alt="<?php echo  $itemTop->name?>">
                                                                </figure>
                                                            </a>
                                                            <button id-sp="<?=$itemTop->id?>" type="button" class="add-to-cart-mt">
                                                                <i class="fa fa-shopping-cart"></i>
                                                                <span> Thêm vào giỏ hàng</span>
                                                            </button>
                                                        </div>

                                                    </div>
                                                    <div class="item-info">
                                                        <div class="info-inner">
                                                            <div class="item-title">
                                                                <a title="<?php echo  $itemTop->name?>" href="<?=$itemTop->url?>-<?=$itemTop->id?>"><?php echo  $itemTop->name?></a>
                                                            </div>
                                                            <div class="item-price">
                                                                <div class="price-box">
                                                                    <?php if($itemTop->promotion_price > 0 ){?>
                                                                        <p class="special-price">
                                                                            <span class="price"> <?php echo  number_format($itemTop->promotion_price)?> VNĐ </span>

                                                                        </p>
                                                                        <p class="old-price">
                                                                            <span class="price"><?php echo  number_format($itemTop->price);?>  VNĐ </span>
                                                                        </p>
                                                                    <?php } else{?>
                                                                        <p class="special-price">
                                                                            <span class="price"><?php echo  number_format($itemTop->price);?>  VNĐ </span>
                                                                        </p>
                                                                    <?php } ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                           <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- end main container -->

<!--special-products-->

<div class="container">
    <div class="special-products">
        <div class="page-header">
            <h2>Sản Phẩm Đặc Biệt</h2>
        </div>
        <div class="special-products-pro">
            <div class="slider-items-products">
                <div id="special-products-slider" class="product-flexslider hidden-buttons">
                    <div class="slider-items slider-width-col4">
                        <?php
                        foreach ($newProduct as $item){
                        ?>
                        <div class="product-item">
                            <div class="item-inner">
                                <div class="product-thumbnail">
                                    <?php if($item->promotion_price > 0 )  {?>
                                    <div class="icon-sale-label sale-left">Sale</div>
                                    <?php }?>
                                    <?php if($item->new == 1){ ?>
                                    <div class="icon-new-label new-right">New</div>
                                    <?php }?>
                                    <div class="pr-img-area">
                                        <a title="<?php echo  $item->name;?>" href="<?=$item->url?>-<?=$item->id?>">
                                            <figure>
                                                <img class="first-img" src="public/source/images/products/<?php echo  $item->image;?>" alt="<?php echo  $item->name;?>">
                                                <img class="hover-img" src="public/source/images/products/<?php echo  $item->image;?>" alt="<?php echo  $item->name;?>">
                                            </figure>
                                        </a>
                                        <button id-sp="<?=$item->id?>" class="add-to-cart-mt" type="button" >
                                            <i class="fa fa-shopping-cart"></i>
                                            <span> Thêm vào Giỏ hàng</span>
                                        </button>

                                    </div>

                                </div>
                                <div class="item-info">
                                    <div class="info-inner">
                                        <div class="item-title">
                                            <a title="<?php echo  $item->name;?>" href="<?= $item->url?>-<?=$item->id?> "><?php echo  $item->name;?></a>
                                        </div>
                                        <div class="item-content">

                                            <div class="item-price">
                                                <div class="price-box">
                                                    <?php if($item->promotion_price > 0 ){?>
                                                        <p class="special-price">
                                                            <span class="price"> <?php echo  number_format($item->promotion_price)?> VNĐ </span>

                                                        </p>
                                                        <p class="old-price">
                                                            <span class="price"><?php echo  number_format($item->price);?>  VNĐ </span>
                                                        </p>
                                                    <?php } else{?>
                                                        <p class="special-price">
                                                            <span class="price"><?php echo  number_format($item->price);?>  VNĐ </span>
                                                        </p>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php }?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- category area start -->
<div class="jtv-category-area">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-6">
                <div class="jtv-single-cat">
                    <h2 class="cat-title">TOP Giảm Giá</h2>
                    <?php
                    foreach ($topSell_Price as $topsell_price){
                    ?>
                    <div class="jtv-product jtv-cat-margin">
                        <div class="product-img">
                            <a href="<?=$topsell_price->url?>-<?=$topsell_price->id?>">
                                <img src="public/source/images/products/<?php echo $topsell_price->image?> " alt="<?php echo $topsell_price->name?> ">
                                <img class="secondary-img" src="public/source/images/products/<?php echo $topsell_price->image?>" alt="<?php echo $topsell_price->name?> "> </a>
<!--                            <img class="hover-img" src="public/source/images/products/--><?php //echo  $topsell_price->image;?><!--" alt="--><?php //echo  $topsell_price->name;?><!--">-->

                        </div>
                        <div class="jtv-product-content">
                            <h3>
                                <a href="<?=$topsell_price->url?>-<?=$topsell_price->id?>"><?php echo $topsell_price->name?></a>
                            </h3>
                            <div class="price-box">
                                <div class="item-price">
                                    <div class="price-box">
                                        <?php if($topsell_price->promotion_price > 0 ){?>
                                            <p class="special-price">
                                                <span class="price"> <?php echo  number_format($topsell_price->promotion_price)?> VNĐ </span>

                                            </p>
                                            <p class="old-price">
                                                <span " class="price"><?php echo  number_format($topsell_price->price);?>  VNĐ </span>
                                            </p>
                                        <?php } else{?>
                                            <p class="special-price">
                                                <span  class="price"><?php echo  number_format($topsell_price->price);?>  VNĐ </span>
                                            </p>


                                        <?php } ?>


                                    </div>

                                </div>
                            </div>
                            <div>

                            </div>
                            <div class="jtv-product-action">
                                <div class="jtv-extra-link">
                                    <div class="button-cart">
                                        <button id-sp="<?=$topsell_price->id?>" class="add-to-cart-mt-1">
                                            <i class="fa fa-shopping-cart"></i>
                                        </button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <div class="button-cart" style="margin-top: 10px; padding: 8px;margin-left: 100px;   ">
                        <!--                        <button  href="type.php/?denlongtruyenthong" style="text-align:center ;  margin-top: 10px; margin-left: 80px;">-->
                        <a  style="background: yellow ; text-align: center ; padding: 10px; " href="type.php?type=denlongtruyenthong"> <strong>XEM THÊM </strong></a>
                        <!--                        </button>-->
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="jtv-single-cat">
                    <h2 class="cat-title">ĐÈN LỒNG HỘI AN </h2>
<?php
foreach ($select_DLHA as $item_DLHA){
?>
                    <div class="jtv-product jtv-cat-margin">
                        <div class="product-img">
                            <a href="<?=$item_DLHA->url ?>-<?= $item_DLHA->id?>">
                                <img src="public/source/images/products/<?= $item_DLHA->image?>" alt="<?= $item_DLHA->name?>">
                                <img class="secondary-img" src="public/source/images/products/<?= $item_DLHA->image?>" alt="<?= $item_DLHA->name?>"> </a>
                        </div>
                        <div class="jtv-product-content">
                            <h3>
                                <a href="<?=$item_DLHA->url ?>-<?= $item_DLHA->id?>"><?= $item_DLHA->name?></a>
                            </h3>
                            <div class="item-price">
                                <div class="price-box">
                                    <?php if($item_DLHA->promotion_price > 0 ){?>
                                        <p class="special-price">
                                            <span class="price"> <?php echo  number_format($item_DLHA->promotion_price)?> VNĐ </span>

                                        </p>
                                        <p class="old-price">
                                            <span class="price"><?php echo  number_format($item_DLHA->price);?>  VNĐ </span>
                                        </p>
                                    <?php } else{?>
                                        <p class="special-price">
                                            <span class="price"><?php echo  number_format($item_DLHA->price);?>  VNĐ </span>
                                        </p>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="jtv-product-action">
                                <div class="jtv-extra-link">
                                    <div class="button-cart">
                                        <button id-sp="<?=$item_DLHA->id?>" class="add-to-cart-mt-1">
                                            <i class="fa fa-shopping-cart"></i>
                                        </button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <?php }?>

                    <div class="button-cart" style="margin-top: 10px; padding: 8px;margin-left: 100px;   ">
<!--                        <button  href="type.php/?denlongtruyenthong" style="text-align:center ;  margin-top: 10px; margin-left: 80px;">-->
                        <a  style="background: yellow ; text-align: center ; padding: 10px; " href="type.php?type=denlongtruyenthong"> <strong>XEM THÊM </strong></a>
<!--                        </button>-->
                    </div>

                </div>
            </div>

            <!-- service area start -->
            <div class="col-md-4 col-sm-12 col-xs-12">
                <div class="jtv-service-area">

                    <!-- jtv-single-service start -->

                    <div class="jtv-single-service">
                        <div class="service-icon">
                            <img alt="html template" src="public/source/images/customer-service-icon.png"> </div>
                        <div class="service-text">
                            <h2>24/7 customer service</h2>
                            <p>
                                <span>Call us 24/7 at 000 - 123 - 456</span>
                            </p>
                        </div>
                    </div>
                    <div class="jtv-single-service">
                        <div class="service-icon">
                            <img alt="html template" src="public/source/images/shipping-icon.png"> </div>
                        <div class="service-text">
                            <h2>free shipping worldwide</h2>
                            <p>
                                <span>On order over $199 - 7 days a week</span>
                            </p>
                        </div>
                    </div>
                    <div class="jtv-single-service">
                        <div class="service-icon">
                            <img alt="html template" src="public/source/images/guaratee-icon.png"> </div>
                        <div class="service-text">
                            <h2>money back guaratee!</h2>
                            <p>
                                <span>Send within 30 days</span>
                            </p>
                        </div>
                    </div>

                    <!-- jtv-single-service end -->

                </div>
            </div>
        </div>
    </div>
</div>
<!-- category-area end -->
