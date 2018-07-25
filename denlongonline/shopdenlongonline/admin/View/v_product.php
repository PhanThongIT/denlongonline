<?php
/**
 * Created by PhpStorm.
 * User: Phan Thông  IT
 * Date: 2018-07-25
 * Time: 6:07 AM
 */


?>
<div class="panel panel-default">
    <div class="panel-heading"><b>
            <h4><?php echo $title; ?>   </h4>
        </b>
    </div>
    <div class="panel-body">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Mã sản phẩm</th>
                <th>Tên sản phẩm</th>
                <th>Hình</th>
                <th>Đơn giá - Giá khuyến mãi</th>
                <th>Sản phẩm đặc biệt</th>
                <th>Sản phẩm mới</th>
                <th>Ẩn ngoài web</th>
                <th>Tuỳ chọn</th>

            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($selectProductByType as $bills)
            {
                ?>
                <tr>
                    <td>SP000<?= $bills->id ?></td>
                    <td>
                        <?= $bills->name ?>
                    </td>
                    <td>
                        <img style="width: 100px ; height: 80px;" src="../public/source/images/products/<?php echo $bills->image ?>">
                    </td>
                    <td>
                        <?= number_format($bills->price) ?>
                        <?= number_format($bills->promotion_price) ?>
                    </td>
                    <td>
                        <input type="checkbox" disabled <?php if($bills->status==1){ ?> checked <?php }?> >
                    </td>
                    <td>
                        <input type="checkbox" disabled <?php if($bills->new==1){ ?> checked <?php } ?>>
                    </td>
                    <td>
                        <input type="checkbox" disabled <?php if($bills->deleted==1){ ?> checked <?php } ?>>
                    </td>
                    <td>
                        <button class="btn btn-primary btn-sm updateProduct"  data-id="<?= $bills->id ?>">Xoá</button>
                        <a href=""><button class="btn btn-default btn-sm">Sửa</button></a>
                    </td>

                </tr>
                <?php
            }
            ?>

            </tbody>
        </table>
    </div>
</div>


