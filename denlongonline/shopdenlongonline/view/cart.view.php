<?php
/**
 * Created by PhpStorm.
 * User: Phan Thông  IT
 * Date: 2018-07-06
 * Time: 3:36 AM
 */
//print_r($data);die;
?>

<section class="main-container col1-layout">
    <div class="main container">
        <div class="col-main">
            <div class="cart">

                <div class="page-content page-order">
                    <div class="page-title">
                        <h2>GIỎ HÀNG CỦA BẠN </h2>
                    </div>


                    <div class="order-detail-content">
                        <div class="table-responsive">
                            <table class="table table-bordered cart_summary">
                                <thead>
                                <tr>
                                    <th class="cart_product">Hình Ảnh</th>
                                    <th>Tên Sản Phẩm</th>
                                    <th>Đơn Giá</th>
                                    <th>Số Lượng</th>
                                    <th>Tổng Tiền</th>
                                    <th class="action"><i class="fa fa-trash-o"></i></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach ($data->items as $key => $sp)
                                {

                                    ?>
                                    <tr id="item-cart-<?= $sp['item']->id ?>">
                                        <td class="cart_product"><a
                                                    href="<?= $sp['item']->url ?>-<?= $sp['item']->id ?>"><img
                                                        src="public/source/images/products/<?= $sp['item']->image ?>"
                                                        alt="Product"></a></td>
                                        <td class="cart_description"><p class="product-name"><a
                                                        href="<?= $sp['item']->url ?>-<?= $sp['item']->id ?>"><?= $sp['item']->name; ?> </a>
                                            </p>
                                            <small><a href="<?= $sp['item']->url ?>-<?= $sp['item']->id ?>">Color :
                                                    Blue</a></small>
                                            <br>
                                            <small><a href="<?= $sp['item']->url ?>-<?= $sp['item']->id ?>">Size
                                                    :<?= $sp['item']->name_size; ?></a></small>
                                        </td>
                                        <td class="price">
                                            <?php if ($sp['item']->promotion_price != $sp['item']->price) : ?>
                                                <span><?= number_format($sp['item']->promotion_price) ?> VNĐ</span>
                                                <br>
                                                <del style="color:darkgrey"><?= number_format($sp['item']->price) ?>
                                                    VNĐ
                                                </del>
                                            <?php else : ?>
                                                <span><?= number_format($sp['item']->price) ?> VNĐ</span>
                                            <?php endif ?>
                                        </td>


                                        <td class="qty"><input class="form-control input-sm" type="text"
                                                               value="<?= number_format($sp['qty']); ?>"></td>
                                        <td><span class="price"> <?php echo number_format($sp['discountPrice']) ?> VNĐ
                                        </td>

                                        <td style="cursor: pointer" class="delete-item-cart"
                                            id-item="<?php echo $sp['item']->id ?>"><a><i class="icon-close"></i></a>
                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td colspan="2" rowspan="2"></td>
                                    <td colspan="3">Đơn giá gốc (chưa khuyến mãi)</td>
                                    <td colspan="2" class="totalPrice"><?= number_format($data->totalPrice) ?>(VNĐ)
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3"><strong>Tổng thanh toán</strong></td>
                                    <td colspan="2"><strong
                                                class="promtPrice"><?= number_format($data->totalPromtionPrice) ?>
                                            (VNĐ)</strong></td>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="cart_navigation"><a class="continue-btn" href="index.php"><i
                                        class="fa fa-arrow-left"> </i>&nbsp;
                                TIẾP TỤC MUA SẮM</a>
                            <a class="checkout-btn" href="#"><i class="fa fa-check"></i>
                                ĐI ĐẾN ĐẶT HÀNG </a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript" src="public/source/js/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        // Xử lý việc xóa 1 item product
        $('.delete-item-cart').click(function () {
            var idItem = $(this).attr('id-item');
            // console.log(idItem);
            $.ajax({
                url: "cart.php",
                type: "POST",
                data: {
                    'idProduct': idItem,
                    'method': "delete" // tự tạo phương thức xóa- sữa bằng cách send qua chuỗi
                },
                dataType:"json",
                success: function (res) {
                    $('#item-cart-'+idItem).hide(1000);
                    //cập nhật lại giá tiền tổng
                    $('.totalPrice').html(res.price + 'VNĐ');
                    $('.promtPrice').html(res.totalPromt_Price + 'VNĐ');
                },
                error: function (error) {
                    console.log(error);
                }
            })

        });
    })

</script>
