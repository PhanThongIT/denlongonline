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
            <div>
                <?php if (isset($_SESSION['result'])) : ?>
                    <div class="alert-danger"> <?= $_SESSION['result'] ?></div>
                <?php endif;
                unset($_SESSION['result']);
                ?>
            </div>

            <div>
                <?php
                if (isset($_SESSION['exist_mail'])) : ?>
                    <div class="alert-danger"> <?php echo $_SESSION['exist_mail'] ?></div>
                <?php endif;
                unset($_SESSION['exist_mail']);
                ?>
            </div>
            <div>
                <?php
                if (isset($Errors)) :
                    foreach ($Errors as $key => $values) : ?>
                        <div class="alert-danger"> <?php echo $values ?></div>
                    <?php
                    endforeach;
                endif;
                unset($Errors);
                ?>
            </div>
        </b>
    </div>
    <div class="panel-body">
        <h4 style="text-align: center;color: red;" id="status"></h4>
        <form method="POST">
            <div class="box-border">
                <ul>
                    <li class="row">
                        <div class="col-sm-6">
                            <label>Tên Khách Hàng </label>
                            <input type="text" name="name" class="input form-control" id="name">
                        </div><!--/ [col] -->
                        <div class="col-sm-6 check-phone">

                            <label>Điện Thoại Khách Hàng</label>
                            <input type="text" name="phone" class="input form-control" id="phone">

                        </div><!--/ [col] -->
                    </li><!--/ .row -->
                    <li class="row">

                        <div class="col-sm-6">

                            <label class="required">Giới Tính</label>
                            <select class="input form-control" name="gender" id="gender">
                                <option value="nam" selected>Nam</option>
                                <option value="nữ">Nữ</option>
                            </select>
                        </div><!--/ [col] -->
                        <div class="col-sm-6">

                            <label class="required">Email Khách Hàng</label>
                            <input type="email" name="email" class="input form-control" id="email">

                        </div><!--/ [col] -->

                    </li><!--/ .row -->

                    <li class="row">

                        <div class="col-sm-6">

                            <label class="required">Địa Chỉ Khách Hàng</label>
                            <textarea class="input form-control " cols="50" rows="3" name="address"
                                      id="promotion_price"></textarea>

                        </div><!--/ [col] -->
                        <div class="col-sm-6">
                            <label class="required">Ghi Chú Khách Hàng</label>
                            <textarea cols="50" rows="3" class="input form-control" name="note"
                                      id="detailproduct"></textarea>
                        </div><!--/ [col] -->
                    </li><!--/ .row -->


                    <li style="text-align: center">
                        <div class="col-md-12">
                            <button style="margin-top: 40px;  width: 150px " class="btn btn-success  active "
                                    type="submit" onclick="checkEmail()" name="btn-AddCustomer"><i
                                        class="fa fa-angle-double-right"></i>&nbsp;
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
            if (isNaN(checkPhone)) {
                alert("Nhập Sai dữ liệu \n Vui lòng nhập vào số.");
                $('#phone').val('');
                $('#phone').focus();
                return;
            }
            if (checkPhone.length > 11) {
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





