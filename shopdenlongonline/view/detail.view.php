<?php
$related_Product = $data['getRelated_Product'];
$item_detail     = $data['get_DetailProduct'];
?>


<!-- Main Container -->
<div class="main-container col1-layout">
    <div class="container">

        <div class="row">
            <div class="col-main">
                <div class="product-view-area">
                    <div class="product-big-image col-xs-12 col-sm-5 col-lg-5 col-md-5">
                        <?php
                        if ($item_detail->promotion_price > 0)
                        {
                            ?>
                            <div class="icon-sale-label sale-left">Sale</div>
                        <?php } ?>
                        <?php
                        if ($item_detail->new == 1)
                        {
                            ?>
                            <div class="icon-new-label new-right">New</div>
                        <?php } ?>

                        <div class="large-image">
                            <a href="public/source/images/products/<?php echo $item_detail->image ?>" class="cloud-zoom"
                               id="zoom1" rel="useWrapper: false, adjustY:0, adjustX:10">
                                <img class="zoom-img"
                                     src="public/source/images/products/<?php echo $item_detail->image ?>"
                                     alt="<?php echo $item_detail->name ?>"> </a>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-7 col-lg-7 col-md-7 product-details-area">

                        <div class="product-name">
                            <h1><?php echo $item_detail->name ?></h1>
                        </div>
                        <div class="price-box">
                            <?php
                            if ($item_detail->promotion_price > 0)
                            {
                                ?>
                                <p class="special-price">
                                    <span class="price">GIÁ BÁN : <?php echo number_format($item_detail->promotion_price) ?>
                                        VNĐ </span>
                                </p>
                                <p class="old-price">
                                    <span class="price"> <?php echo number_format($item_detail->price) ?> VNĐ</span>
                                </p>
                            <?php } else { ?>
                                <p class="special-price">
                                    <span class="price"> <?php echo number_format($item_detail->price) ?> VNĐ  </span>
                                </p>
                            <?php } ?>
                        </div>

                        <div class="short-description">
                            <h2>CHI TIẾT SẢN PHẨM </h2>
                            <p><?=
                                $item_detail->detail;
                                ?>
                            </p>
                            <p>Khuyến Mãi :

                                <?php
                                if ($item_detail->promotion_price != 0)
                                {
                                    echo "$item_detail->promotion";
                                }
                                ?>
                            </p>

                        </div>

                        <div class="product-variation">
                            <form action="#" method="post">
                                <div class="cart-plus-minus">
                                    <label for="qty">Số Lượng :</label>
                                    <div class="numbers-row">
                                        <div class="dec qtybutton"
                                             onClick="document.getElementById('qty').value = parseInt(document.getElementById('qty').value) - 1;  if (document.getElementById('qty').value <= parseInt('1')) {
                                       document.getElementById('qty').value = 1 ; }">
                                            <i  class="fa fa-minus">&nbsp;</i>
                                        </div>
                                        <input type="text" class="qty" title="Qty" value="1" maxlength="12" min="1"
                                               id="qty" name="qty">

                                        <div onClick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty )) result.value++;return false;"
                                             class="inc qtybutton">
                                            <i class="fa fa-plus">&nbsp;</i>
                                        </div>
                                    </div>
                                </div>
                                <button id-product="<?=  $item_detail->id; ?>" class="button pro-add-to-cart" title="Thêm Vào Giỏ Hàng" type="button">
                                 <span>
                                  <i class="fa fa-shopping-cart"></i> THÊM VÀO GIỎ HÀNG</span>
                                </button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


<!-- Related Product Slider -->
<section class="upsell-product-area">
    <div class="container">

        <div class="row">
            <div class="col-xs-12">
                <div class="page-header">
                    <h2> SẢN PHẨM LIÊN QUAN </h2>
                </div>
                <div class="slider-items-products">
                    <div id="upsell-product-slider" class="product-flexslider hidden-buttons">
                        <div class="slider-items slider-width-col4">
                            <?php
                            foreach ($related_Product as $item_RelatedPro)
                            {
                                ?>
                                <div class="product-item">
                                    <div class="item-inner fadeInUp">
                                        <div class="product-thumbnail">
                                            <?php
                                            if ($item_RelatedPro->promotion_price > 0)
                                            {
                                                ?>
                                                <div class="icon-sale-label sale-left">Sale</div>
                                            <?php } ?>
                                            <?php
                                            if ($item_RelatedPro->new == 1)
                                            {
                                                ?>
                                                <div class="icon-new-label new-right">New</div>
                                            <?php } ?>
                                            <div class="pr-img-area">
                                                <img class="first-img"
                                                     src="public/source/images/products/<?= $item_RelatedPro->image ?>"
                                                     alt="<?= $item_RelatedPro->name ?>">
                                                <img class="hover-img"
                                                     src="public/source/images/products/<?= $item_RelatedPro->image ?>"
                                                     alt="<?= $item_RelatedPro->name ?>">
                                                <button type="button" class="add-to-cart-mt" id-sp="<?= $item_RelatedPro->id;?>">
                                                    <i class="fa fa-shopping-cart"></i>
                                                    <span> THÊM VÀO GIỎ HÀNG</span>
                                                </button>
                                            </div>

                                        </div>
                                        <div class="item-info">
                                            <div class="info-inner">
                                                <div class="item-title">
                                                    <a title="<?= $item_RelatedPro->name ?>"
                                                       href="<?= $item_RelatedPro->url ?>-<?= $item_RelatedPro->id ?>"><?= $item_RelatedPro->name ?> </a>
                                                </div>
                                                <div class="item-content">

                                                    <div class="item-price">
                                                        <div class="price-box">
                                                            <?php
                                                            if ($item_RelatedPro->promotion_price > 0)
                                                            {
                                                                ?>
                                                                <p class="special-price">
                                                                    <span class="price">GIÁ BÁN : <?php echo number_format($item_RelatedPro->promotion_price) ?>
                                                                        VNĐ </span>
                                                                </p>
                                                                <p class="old-price">
                                                                    <span class="price"> <?php echo number_format($item_RelatedPro->price) ?>
                                                                        VNĐ</span>
                                                                </p>
                                                            <?php } else { ?>
                                                                <p class="special-price">
                                                                    <span class="price"> <?php echo number_format($item_RelatedPro->price) ?>
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
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-12"style="text-align: center;" >
                    <div id="fb-root"></div>
                    <script>(function(d, s, id) {
                            var js, fjs = d.getElementsByTagName(s)[0];
                            if (d.getElementById(id)) return;
                            js = d.createElement(s); js.id = id;
                            js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.1&appId=2153520284931557&autoLogAppEvents=1';
                            fjs.parentNode.insertBefore(js, fjs);
                        }(document, 'script', 'facebook-jssdk'));</script>
                    <div class="fb-comments" data-href="https://developers.facebook.com/docs/plugins/comments#configurator" data-numposts="5"></div>                    <!-- Main Container End -->

                </div>

            </div>
        </div>
    </div>
</section>
<div id="fb-root"></div>

<script type="text/javascript" src="public/source/js/jquery.min.js"></script>

<!-- Related Product Slider End -->
<script>
    $(document).ready(function () {
        $('.qty').keyup(function () {
            var  soluong  = $('#qty').val();
            // console.log(soluong);
        if(isNaN(soluong) || soluong <= 0  || soluong >100){
            alert("Nhập sai | Phải là số, trong khoảng (0 -100)");
            $('#qty').val('');
            $('#qty').focus();
            return;
        }
        })
    })
</script>