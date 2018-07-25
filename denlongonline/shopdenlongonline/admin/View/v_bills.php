<div class="panel panel-default">
    <div class="panel-heading"><b>
            <h4><?php echo $title; ?></h4>
            <?php
            if ($_GET['status'] == 0)
            {
                echo "ĐƠN HÀNG CHƯA THANH TOÁN";
            }
            elseif ($_GET['status'] == 1)
            {
                echo "ĐƠN HÀNG ĐÃ XÁC NHẬN";
            }
            elseif ($_GET['status'] == 2)
            {
                echo "ĐƠN HÀNG ĐÃ GIAO";
            }
            else
            {
                echo "ĐƠN HÀNG BỊ HỦY";
            }
            ?>

        </b>

    </div>

    <div class="panel-body">
        <div>
            <h4 style="color: red ; text-align: center" id="status"></h4>
        </div>
        <!--        <form method="POST">-->
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Mã đơn hàng</th>
                <th>Tên khách hàng - SĐT</th>
                <th>Ngày đặt</th>
                <th>Sản phẩm (Số lượng)</th>
                <th>Tổng tiền(chưa giảm)</th>
                <th>Tổng tiền thanh toán</th>
                <th>Note</th>
                <?php
                if ($_GET['status'] == 1)
                {
                    ?>
                    <th>Tuỳ chọn</th>
                <?php } ?>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($getBillStatus as $bills)
            {
                ?>
                <tr id="record">
                    <td>DH000<?= $bills->id ?></td>
                    <td>
                        <?= $bills->fullname ?>
                        <br>
                        <?= $bills->phone ?>
                    </td>
                    <td>
                        <?= date('d-m-Y', strtotime($bills->date_order)) ?>
                    </td>
                    <td>
                        <a style="color: red ; text-align: center; " id="<? $bills->id; ?>"
                           href="detailbills.php?idBill=<?= $bills->id; ?>">Chi tiết Đơn hàng</a>
                    </td>
                    <td><?= number_format($bills->total); ?> (VNĐ)</td>
                    <td><?= number_format($bills->promt_price); ?> (VNĐ)</td>
                    <td><?= $bills->note; ?></td>
                    <?php
                    if ($_GET['status'] == 1)
                    {
                        ?>
                        <td>
                            <button class="btn btn-primary btn-sm updateBill"
                                    type="submit" data-id="<?= $bills->id; ?>">Đã giao
                            </button>
                            <button class="btn btn-default btn-sm cancelBill"  type="submit" data-idHuy="<?= $bills->id; ?>">Huỷ
                            </button>
                        </td>
                        <?php
                    }
                    ?>
                </tr>
                <?php
            }
            ?>

            </tbody>
        </table>
        <!--        </form>-->
    </div>
</div>
<script src="Public/source/js/jquery.js"></script>
<script>
    $(document).ready(function () {
        $('.updateBill').click(function () {
            var idBill = $(this).attr('data-id');//get
            console.log(idBill);
            $.ajax({
                url: 'bills.php',
                type: 'POST',
                data: {
                    "idbill": idBill,
                    "statusGiaoHang": 2
                },
                dataType: "JSON",
                success: function (response) {
                    $('#status').html(response.status);
                    $('#record').hide(1000);
                },
                error: function (error) {
                    console.log(error);

                }
            })

        });
        $('.cancelBill').click(function () {
            var idBill = $(this).attr('data-idHuy');//get
            console.log(idBill);
            $.ajax({
                url: 'bills.php',
                type: 'POST',
                data: {
                    "idbill": idBill,
                    "statusHuy": 3
                },
                dataType: "JSON",
                success: function (response) {
                    $('#status').html(response.status);
                    $('#record').hide(1000);
                },
                error: function (error) {
                    console.log(error);

                }
            })

        });

    })
</script>