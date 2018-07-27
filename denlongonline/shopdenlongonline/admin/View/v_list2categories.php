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
                        <a href="editcategories-lv2.php?editcate-lv2=<?= $bills->id; ?>">
                            <button style="margin-top: 10px;" class="btn btn-lock btn-sm" name="edit-Cate-lv2">Sửa Danh Mục</button>
                        </a>
                        <button class="btn btn-default btn-sm delete-Cate"  type="submit" delete-DM="<?= $bills->id; ?>">Xóa Danh Mục
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
<script>
    $(document).ready(function () {
        $('.delete-Cate').click(function () {
            var idCate =  $(this).attr('delete-DM');
            //    console.log(idCate);
            $.ajax( {
                url:"delete-Cate-lv1.php",
                type:"POST",
                data:{
                    'idCatelv1':idCate,
                },
                dataType:"JSON",
                success:function (res) {

                },
                error:function (error) {
                    console.log(error);
                }
            })
        })
    })
</script>

