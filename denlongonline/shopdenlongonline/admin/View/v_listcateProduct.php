<?php
/**
 * Created by PhpStorm.
 * User: Phan Thông  IT
 * Date: 2018-07-29
 * Time: 6:29 AM
 */

?>
<?php
/**
 * Created by PhpStorm.
 * User: Phan Thông  IT
 * Date: 2018-07-27
 * Time: 10:34 AM
 */?>
<?php
/**
 * Created by PhpStorm.
 * User: Phan Thông  IT
 * Date: 2018-07-26
 * Time: 4:27 PM
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
            <h4><?php echo $title; ?> </h4>
        </b>
    </div>
    <div class="panel-body">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Mã Danh Mục</th>
                <th>Tên Danh Mục</th>
                <th>Tùy Chọn</th>

            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($checkMenu as $bills)
            {
                ?>
                <tr>
                    <td>DM000-<?= $bills->id ?></td>
                    <td><?= $bills->name ?></td>
                    <td>
                        <a href="product.php?alias=<?= $bills->url; ?>">
                            <button style="margin-top: 10px;" class="btn btn-lock btn-sm" name="view-Pro">Xem Sản Phẩm</button>
                        </a>

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



