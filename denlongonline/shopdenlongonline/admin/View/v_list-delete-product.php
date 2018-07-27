<?php
/**
 * Created by PhpStorm.
 * User: Phan Thông  IT
 * Date: 2018-07-25
 * Time: 6:09 PM
 */
?>
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
            <h4><?php echo $title; ?> </h4>
        </b>
    </div>
    <div class="panel-body">
        <h4 style="text-align: center;color: red;" id="status"></h4>
        <table class="table table-bordered">
            <thead style="text-align: center">
            <tr>
                <th>Mã sản phẩm</th>
                <th>Tên sản phẩm</th>
                <th>Hình</th>
                <th>Đơn giá</th>
                <th>Giá khuyến mãi</th>
                <th>SP đặc biệt</th>
                <th>Sản phẩm mới</th>
                <th>Ẩn ngoài web</th>
                <th>Tuỳ chọn</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($getlistDelete as $bills)
            {
                ?>
                <tr id="record">
                    <td id-product="<?= $bills->id ?>"><h5 style="margin-top: 35px;">SP000<?= $bills->id ?> </h5></td>
                    <td>
                        <h5 style="margin-top: 35px;"><?= $bills->name ?></h5>
                    </td>
                    <td>
                        <img style="width: 100px ; height: 80px;"
                             src="../public/source/images/products/<?php echo $bills->image ?>">
                    </td>
                    <td>
                        <h5 style="margin-top: 35px;"><?= number_format($bills->price) ?> (VNĐ)</h5>

                    </td>
                    <td>
                        <h5 style="margin-top: 35px;"><?= number_format($bills->promotion_price) ?>(VNĐ)</h5>
                    </td>
                    <td>
                        <input style="margin-top: 35px;" type="checkbox"
                               disabled <?php if ($bills->status == 1) { ?> checked <?php } ?> >
                    </td>
                    <td>
                        <input style="margin-top: 35px;" type="checkbox"
                               disabled <?php if ($bills->new == 1) { ?> checked <?php } ?>>
                    </td>
                    <td>
                        <input style="margin-top: 35px;" type="checkbox"
                               disabled <?php if ($bills->deleted == 1) { ?> checked <?php } ?>>
                    </td>
                    <td>
                        <button type="submit" style="margin-top: 10px;" class="btn btn-danger btn-sm btn-rollback"
                                id-product="<?= $bills->id ?>">Khôi phục</button>

                    </td>

                </tr>
                <?php
            }
            ?>

            </tbody>
        </table>
    </div>
</div>

<script src="Public/source/js/jquery.js"></script>
<script>
    $('.btn-rollback').click(function () {
        var idPr = $(this).attr('id-product');//get
        console.log(idPr);
        $.ajax({
            url: 'ajax-rollbackproduct.php',
            type: 'POST',
            data: {
                "idproduct": idPr,
            },
            dataType: "JSON",
            success: function (response) {
                $('#status').html(response.status);
                $('#record').remove();
            },
            error: function (error) {
                console.log(error);
            }
        })

    });
</script>