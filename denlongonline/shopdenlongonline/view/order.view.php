<?php
/**
 * Created by PhpStorm.
 * User: Phan Thông  IT
 * Date: 2018-07-20
 * Time: 2:51 AM
 */ ?>
<section class="main-container col2-right-layout">
    <div class="main container">
        <div class="row">
            <div class="col-main col-sm-12 col-xs-12">
                <div class="page-content checkout-page">
                    <div class="page-title">
                        <h2>ĐẶT HÀNG </h2>
                    </div>
                    <form method="POST">
                        <div class="box-border">
                            <ul>
                                <li class="row">
                                    <div class="col-sm-6">
                                        <label for="name">Họ Tên</label>
                                        <input type="text" name="name" class="input form-control" id="name" required>
                                    </div><!--/ [col] -->
                                    <div class="col-sm-6">
                                        <label for="email_address" class="required">Địa chỉ Email</label>
                                        <input type="email" class="input form-control" name="email" id="email_address" required>
                                    </div><!--/ [col] -->
                                </li><!--/ .row -->


                                <li class="row">

                                    <div class="col-sm-6">

                                        <label for="phone-number" class="required">Số Điện Thoại</label>
                                        <input class="input form-control check-phone" type="text" name="phone" id="phone-number" required>

                                    </div><!--/ [col] -->

                                    <div class="col-sm-6">
                                        <label class="required">Giới Tính</label>
                                        <select class="input form-control" name="gender" id="gender" >
                                            <option value="nam">Nam</option>
                                            <option value="nữ">Nữ</option>
                                            <option value="other">Khác...</option>
                                        </select>
                                    </div><!--/ [col] -->
                                </li><!--/ .row -->
                                <li class="row">
                                    <div class="col-xs-12">

                                        <label for="address" class="required">Địa Chỉ</label>
                                        <textarea  class="input form-control" name="address" id="address" required> </textarea>

                                    </div><!--/ [col] -->

                                </li><!-- / .row -->
                                <li class="row">
                                    <div class="col-xs-12">

                                        <label for="note" class="required">Ghi Chú</label>
                                        <textarea  class="input form-control" name="note" id="note" required> </textarea>

                                    </div><!--/ [col] -->

                                </li><!-- / .row -->

                                <li>
                                    <button class="button" type="submit" name="btn-Order"><i class="fa fa-angle-double-right"></i>&nbsp;
                                        <span>HOÀN TẤT </span></button>
                                </li>
                            </ul>
                        </div>
                    </form>
                    <div>
                        <h5 id="thongbao"></h5>
                    </div>


                </div>

            </div>
        </div>

</section>
<!-- Main Container End -->
<script type="text/javascript" src="public/source/js/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        $('.check-phone').keyup(function () {
            var  checkPhone = $('#phone-number').val();
         //   console.log(checkPhone);
            if(isNaN(checkPhone)){
                alert('Nhập Sai số Điện Thoại');
                $('#phone-number').focus();
                $('#phone-number').val('');
                return ;
            }
        })


    });
</script>


