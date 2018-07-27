<?php
$product = $data['product'];
$alias = $data['alias'];

?>


<div class="new-<?php echo $alias ?>">
    <?php
    foreach ($product as $item){
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
                                                    <button type="button" class="add-to-cart-mt">
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
    <?php
    }
    ?>