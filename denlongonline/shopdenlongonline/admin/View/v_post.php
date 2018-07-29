<?php
/**
 * Created by PhpStorm.
 * User: Phan Thông  IT
 * Date: 2018-07-29
 * Time: 1:00 PM
 */

?>
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
                <th>Mã Bài viết</th>
                <th>Tiêu đề</th>
                <th>Hình ảnh</th>
                <th>Ngày tạo</th>

            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($listPost as $bills)
            {
                ?>
                <tr>
                    <td>PO000-<?= $bills->id ?></td>
                    <td><?= $bills->title ?></td>
                    <td>
                        <?= $bills->content ?>
                    </td>
                    <td>
                        <?= $bills->createdate ?>
                    </td>
                    <td>
                        <a href="editcategories-lv2.php?editcate-lv2=<?= $bills->id; ?>">
                            <button style="margin-top: 10px;" class="btn btn-lock btn-sm" name="edit-Cate-lv2">Sữa Bài Viết</button>
                        </a>
                        <button class="btn btn-default btn-sm delete-Cate"  type="submit" delete-DM="<?= $bills->id; ?>">Xóa Bài Viết
                        </button>
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




