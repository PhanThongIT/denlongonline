<?php
include_once "Helper/constants.php";
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
            <h4><?= $title ?></h4>
            <?php
            if ($_GET['status'] == STATUS_BILLS_NOT_APPROVAL) {
                echo TITLE_BILL_NOT_APPROVALS;
            } elseif ($_GET['status'] == STATUS_BILL_APPROVAL) {
                echo TITLE_BILL_APPROVAL;
            } elseif ($_GET['status'] == STATUS_BILLS_SEND_SUCCESS) {
                echo TITLE_BILL_SEND_SUCCESS;
            } else {
                echo TITLE_BILL_CANCEL;
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
                if ($_GET['status'] == BUTTON_HIDDEN_ON) {
                    ?>
                    <th>Tuỳ chọn</th>
                <?php } ?>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($getBillStatus as $bills) {
                ?>
                <tr id="record">
                    <td><?= CODE_BILLS . $bills->id ?></td>
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
                    if ($_GET['status'] == BUTTON_HIDDEN_ON) {
                        ?>
                        <td>
                            <button class="btn btn-primary btn-sm updateBill"
                                    type="submit" data-id="<?= $bills->id; ?>">Đã giao
                            </button>
                            <button class="btn btn-default btn-sm cancelBill" type="submit"
                                    data-idHuy="<?= $bills->id; ?>">Huỷ
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

    </div>
</div>

<?php
/**
 * AJAX and JQUERY CHECK Bills
 * get status with bills and chaged status bills
 * status changed bills status with Button.
 *
 * STATUS BILL
 * status bills not approval : 0;
 * status bills approval : 1
 * status bills send success : 2
 * status bills send fail : 3
 */
?>
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
                    $('#record').remove();
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