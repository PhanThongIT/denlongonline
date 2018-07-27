<?php
/**
 * Created by PhpStorm.
 * User: Phan Thông  IT
 * Date: 2018-07-24
 * Time: 3:24 AM
 */?>
<style>
    th {
        text-align: center;
        color: black;
    }

    td {
        text-align: center;
        color: black;
    }
</style>
<div class="panel panel-default">
    <div class="panel-heading"><b>
            <h4><?php echo $title; ?>  - DH000<?= $getBill->id?> </h4>
            <div class="col-md-6">
                <h4>Họ Và Tên: <?=  $getBill->fullname ?></h4>
                <h4>Điện Thoại: <?=  $getBill->phone ?></h4>
            </div>
            <div class="col-md-6">
                <h4>Ngày Đặt :<?= date('d-m-Y', strtotime($getBill->date_order)) ?></h4>
                <h4>Thành Tiền (Khuyến Mãi): <?=  $getBill->promt_price ?></h4>
            </div>

        </b>
    </div>
    <div class="panel-body">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Mã Sản Phẩm</th>
                <th>Tên Sản Phẩm</th>
                <th>Hình Ảnh</th>
                <th>Số lượng </th>
                <th>Đơn giá (VNĐ)</th>
                <th>Đơn giá Khuyến Mãi</th>
                <th>Note</th>

            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($getBillByID as $bills)
            {
                ?>
                <tr>
                    <td><?= $bills->id ?></td>
                    <td>
                        <?= $bills->name ?>
                    </td>
                    <td>
                        <img style="width: 100px ; height: 80px;" src="../public/source/images/products/<?php echo $bills->image ?>">
                    </td>
                    <td>
                        <?= $bills->quantity ?>
                    </td>
                    <td><?= number_format($bills->price); ?> (VNĐ)</td>
                    <td><?= number_format($bills->promotion_price );?> (VNĐ)</td>
                    <td><?= $bills->name_size; ?> ( <?= $bills->noteSize ?>)</td>

                </tr>
                <?php
            }
            ?>

            </tbody>
        </table>
    </div>
</div>

