<?php
/**
 * Created by PhpStorm.
 * User: Phan Thông  IT
 * Date: 2018-07-28
 * Time: 3:34 PM
 */?>
<?php
/**
 * Created by PhpStorm.
 * User: Phan Thông  IT
 * Date: 2018-07-27
 * Time: 10:58 PM
 */?>
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
            <h4 style="text-align:center ;font-size: 20px ;color: black"><?php echo $title; ?> </h4>
        </b>
    </div>
    <div class="panel-body">
        <h4 style="text-align: center;color: red;" id="status"></h4>
        <form method="POST" >
            <div class="box-border">
                <ul>
                    <li class="row">
                        <div class="col-sm-6">
                            <label>Tên Khách Hàng </label>
                            <input type="text" name="name" class="input form-control" id="name" value="<?= $checkCustomer->name;?>" required>
                        </div><!--/ [col] -->
                        <div class="col-sm-6 check-phone">

                            <label>Điện Thoại Khách Hàng</label>
                            <input type="text" name="phone" class="input form-control" id="phone" value="<?= $checkCustomer->phone;?>" required>

                        </div><!--/ [col] -->
                    </li><!--/ .row -->
                    <li class="row">

                        <div class="col-sm-6">

                            <label class="required">Giới Tính</label>
                            <select class="input form-control" name="gender" id="gender">
                                <option value="nam" selected>Nam </option>
                                <option value="nữ">Nữ</option>
                            </select>
                        </div><!--/ [col] -->
                        <div class="col-sm-6">

                            <label class="required">Email Khách Hàng</label>
                            <input type="email" name="email" class="input form-control" value="<?= $checkCustomer->email;?>" id="email" required>

                        </div><!--/ [col] -->

                    </li><!--/ .row -->

                    <li class="row">

                        <div class="col-sm-6">

                            <label class="required">Địa Chỉ Khách Hàng</label>
                            <textarea class="input form-control " cols="50" rows="3"  name="address"
                                      id="promotion_price" required><?= $checkCustomer->address;?></textarea>

                        </div><!--/ [col] -->
                        <div class="col-sm-6">
                            <label class="required">Ghi Chú Khách Hàng</label>
                            <textarea cols="50" rows="3" class="input form-control"  name="note"
                                      id="detailproduct" required><?= $checkCustomer->note;?></textarea>
                        </div><!--/ [col] -->
                    </li><!--/ .row -->


                    <li style="text-align: center">
                        <div class="col-md-12">
                            <button style="margin-top: 40px;  width: 150px " class="btn btn-success  active "
                                    type="submit" onclick="checkEmail()" name="btn-EditCustomer"><i class="fa fa-angle-double-right"></i>&nbsp;
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
<script src="Public/source/js/jquery.js"></script>
<script>
    $(document).ready(function () {
        $('.check-phone').keyup(function () {
            var checkPhone = $('#phone').val();
            // console.log(soluong);
            if (isNaN(checkPhone) ) {
                alert("Nhập Sai dữ liệu \n Vui lòng nhập vào số.");
                $('#phone').val('');
                $('#phone').focus();
                return;
            }
            if(  checkPhone.length >11 ){
                alert("Vượt quá số ký tự cho phép");
                $('#phone').val('');
                $('#phone').focus();
                return;
            }
        });

    });
    function checkEmail() {
        var email = document.getElementById('email');
        var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if (!filter.test(email.value)) {
            alert('Nhập sai địa chỉ Email.\nExample@gmail.com');
            email.focus();
            return false;
        }
    }
</script>






