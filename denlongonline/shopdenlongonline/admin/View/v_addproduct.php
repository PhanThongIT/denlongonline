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
            <?php
            if (isset($data)) {
                foreach ($data as $key => $values) { ?>
              <div class="alert-danger" style="text-align: center"> <?php echo $values; ?> </div>
             <?php   }
                unset($data);
            }
            ?>
        </b>
    </div>
    <div class="panel-body">
        <h4 style="text-align: center;color: red;" id="status"></h4>
        <form method="POST" enctype="multipart/form-data">
            <div class="box-border">
                <ul>
                    <li class="row">
                        <div class="col-sm-6">
                            <label>Tên Sản Phẩm</label>
                            <input type="text" name="nameproduct" class="input form-control" id="nameproduct">
                        </div><!--/ [col] -->
                        <div class="col-sm-6">

                            <label class="required">Size</label>
                            <select class="input form-control" name="sizeproduct" id="sizeproduct">
                                <?php
                                foreach ($getSize as $itemSize) {
                                    ?>
                                    <option value="<?= $itemSize->id_size ?>"><?= $itemSize->name_size ?>
                                        (<?= $itemSize->note; ?>)
                                    </option>
                                <?php } ?>
                            </select>

                        </div><!--/ [col] -->
                    </li><!--/ .row -->


                    <li class="row">

                        <div class="col-sm-6 check-number">

                            <label class="required">Đơn Giá (Chưa khuyến mãi)</label>
                            <input class="input form-control " type="number" name="priceproduct" id="priceproduct"
                                   value="">

                        </div><!--/ [col] -->
                        <div class="col-sm-6">

                            <label class="required">Đơn Giá ( Khuyến mãi)</label>
                            <input class="input form-control check-number-promt " type="number" name="promt_product"
                                   id="promt_product">

                        </div><!--/ [col] -->

                    </li><!--/ .row -->
                    <li class="row">

                        <div class="col-sm-6">

                            <label class="required">Mô Tả Khuyến Mãi</label>
                            <textarea class="input form-control " cols="50" rows="3" name="promotion_price"
                                      id="promotion_price"></textarea>

                        </div><!--/ [col] -->
                        <div class="col-sm-6">
                            <label class="required">Mô Tả Sản Phẩm</label>
                            <textarea cols="50" rows="3" class="input form-control" name="detailproduct"
                                      id="detailproduct"></textarea>
                        </div><!--/ [col] -->
                    </li><!--/ .row -->
                    <li class="row">

                        <div class="col-sm-6">

                            <label class="required">Loại Sản Phẩm</label>
                            <select class="input form-control" name="typeproduct" id="typeproduct">
                                <?php
                                foreach ($getNameTypelv1 as $itemType) {
                                    ?>
                                    <option value="<?= $itemType->id ?>"><?= $itemType->name ?></option>
                                <?php } ?>
                            </select>
                        </div><!--/ [col] -->
                        <div class="col-sm-6">

                            <label class="required">Trạng Thái Sản Phẩm</label>
                            <select class="input form-control" name="statusproduct" id="statusproduct">
                                <option value="0">Sản Phẩm Bình Thường</option>
                                <option value="1">Sản Phẩm Đặc Biệt</option>
                            </select>

                        </div><!--/ [col] -->

                    </li><!--/ .row -->
                    <li class="row">

                        <div class="col-sm-6">

                            <label class="required">Tình Trạng Sản Phẩm</label>
                            <select class="input form-control" name="newproduct" id="newproduct">
                                <option value="0">Sản Phẩm Củ</option>
                                <option value="1" selected>Sản Phẩm Mới</option>
                            </select>
                        </div><!--/ [col] -->
                        <div class="col-sm-6 check-url">
                            <div class="col-sm-12">
                                <label class="required">Địa Chỉ url (Không Dấu)</label>
                            </div>

                            <div class="col-sm-6">
                                <input type="text" class="input form-control" name="urlproduct" id="urlproduct"
                                >
                            </div>
                            <div class="col-sm-6">
                                <input type="text" class="input form-control" name="resulturl" id="resulturl" value=""
                                       disabled>
                            </div>

                        </div><!--/ [col] -->

                    </li><!--/ .row -->

                    <li>
                        <div class="col-sm-6">
                            <label>Trạng Thái Xóa </label>
                            <select class="input form-control" name="deletedproduct" id="deletedproduct">
                                <option value="0" selected>Chưa Xóa</option>
                                <option value="1">Đã Xóa</option>
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label>Chọn hình sản phẩm</label>
                            <input style="text-align: center; " type="file" name="hinh" id="hinh" required/>
                            <div style="text-align: center" class="image-holder" id="image-holder"></div>
                        </div>
                    </li>
                    <li style="text-align: center">
                        <div class="col-md-12">
                            <button style="margin-top: 40px;  width: 150px " class="btn btn-success  active "
                                    type="submit" onclick="" name="btn-Add"><i class="fa fa-angle-double-right"></i>&nbsp;
                                <span>HOÀN TẤT </span></button>
                            <button class="btn btn-danger" type="reset" style="margin-top: 40px;  width: 150px  "> TẠO
                                LẠI
                            </button>
                        </div>
                    </li>
                </ul>
            </div>
        </form>
    </div>
</div>

<!--Script check input in add  products-->
<script src="Public/source/js/jquery.js"></script>
<script>
    $(document).ready(function () {
        $('.check-number').keyup(function () {
            var soluong = $('#priceproduct').val();

            //check number input
            if (isNaN(soluong) || soluong <= 0) {
                alert("Nhập Sai dữ liệu \n Vui lòng nhập vào số.");
                $('#priceproduct').val('');
                $('#priceproduct').focus();
                return;
            }
        });
        $('.check-number-promt').keyup(function () {
            var soluong = $('#promt_product').val();

            if (isNaN(soluong) || soluong <= 0) {
                alert("Nhập Sai dữ liệu \n Vui lòng nhập vào số.");
                $('#promt_product').val('');
                $('#promt_product').focus();
                return;
            }
        });


        $('.check-url').keyup(function () {
            var url = $('#urlproduct').val();
            var result = change_alias(url);
            var text = result.split(' ').join('');

            $('#resulturl').value(text);
        });
    })
</script>

