<?php
/**
 * Created by PhpStorm.
 * User: Phan Thông  IT
 * Date: 2018-07-27
 * Time: 8:30 PM
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
    <div class="panel-heading" style="text-align: center"><b>
            <h4><?php echo $title; ?></h4>
        </b>


    </div>

    <div class="panel-body">
        <div style="text-align: center">
            <h4 style="color: red ; text-align: center" id="status-delete"></h4>
        </div>
        <!--        <form method="POST">-->
        <table class="table table-bordered">
            <thead>
            <!--            //id  name gender email address phone note -->
            <tr>
                <th>Mã Khách hàng</th>
                <th>Tên khách hàng</th>
                <th>Giới tính</th>
                <th>Email</th>
                <th>Địa chỉ</th>
                <th>Điện thoại</th>
                <th>Ghi Chú</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($getListCustomer as $bills)
            {
                ?>
                <!--            //id  name gender email address phone note -->
                <tr id="record-<?= $bills->id ?>">
                    <td>KH000-<?= $bills->id ?></td>
                    <td>
                        <?= $bills->name ?>

                    </td>
                    <td>
                        <?= $bills->gender ?>
                    </td>
                    <td>
                        <?= $bills->email ?>
                    </td>
                    <td><?= $bills->address; ?> (VNĐ)</td>
                    <td><?= $bills->phone; ?> (VNĐ)</td>
                    <td><?= $bills->note; ?></td>
                    <td>
                        <a href="editcustomer.php?id=<?= $bills->id; ?>">
                            <button style="margin-top: 10px;" class="btn btn-lock btn-sm btn-Edit">Sửa </button>
                        </a>
                        <button class="btn btn-default btn-sm delete-Customer" type="submit"
                                data-name="<?= $bills->name ?>" data-idHuy="<?= $bills->id; ?>">Xóa
                        </button>
                    </td>

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
<!--//Xử lý ajax xóa 1 khách hàng khỏi danh sách-->
<script>
    $(document).ready(function () {
        $('.delete-Customer').click(function () {
            var idCustomer = $(this).attr('data-idHuy');
            var nameCustomer = $(this).attr('data-name');
            console.log(idCustomer);
            $.ajax({
                url: "delete-customer.php",
                type: "POST",
                data: {
                    'idCustomer': idCustomer,
                    'nameCustomer':nameCustomer
                },
                dataType: "JSON",
                success: function (response) {
                  //  print(response);
                    $("#status-delete").html(response.status);
                    $("#record-" + idCustomer).remove();
                },
                error: function (error) {
                    console.log(error);
                }
            })
        })

    });
</script>
