

<?php
/**
 * Created by PhpStorm.
 * User: Phan Thông  IT
 * Date: 2018-07-25
 * Time: 10:24 PM
 */ ?>
<style>
    li {
        margin-top: 20px;
    }

    label {
        font-size: 17px;
        color: black;
        text-align: center;
    }

</style>
<div class="panel panel-default">
    <div class="panel-heading"><b>
            <h4 style="font-size: 20px ;color: black"><?php echo $title; ?> </h4>
        </b>
    </div>
    <div class="panel-body">
        <h4 style="text-align: center;color: red;" id="status"></h4>
        <form method="post" enctype="multipart/form-data" style="text-align: center">
            <fieldset>
                <p>
                    <label>Tiêu đề bài viết</label>
                    <input class="text-input small-input kiemtra" data_error="Nhập tiêu đề bài viết" type="text" id="tieu_de" name="title" />
                </p>
<p>
                    <label>Nội dung chi tiết</label>
                    <textarea name="content" cols="50" rows="5" class="text-input large-input ckeditor" id="large-input"></textarea>
                </p>
                <p>
                    <label>Chọn hình sản phẩm</label>
                    <input type="file" name="image" id="image" />
                <div class="image-holder" id="image-holder"></div>
                </p>

                <p>
                    <input class="button" type="submit" value="Cập nhật" name="btn-AddPost" />
                    <input class="button" type="button" value="Bỏ qua" onclick="window.location='baiviet.php'" />
                </p>
            </fieldset>
            <div class="clear"></div>
            <!-- End .clear -->

        </form>
    </div>
</div>
<script src="Public/source/js/jquery.js"></script>




