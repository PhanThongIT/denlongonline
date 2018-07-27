<?php
/**
 * Created by PhpStorm.
 * User: Phan Thông  IT
 * Date: 2018-06-30
 * Time: 4:04 PM
 */ ?>

<!-- Main Container -->
<section class="main-container col1-layout">
    <div class="main container">
        <div class="row">
            <section class="col-main col-sm-12">

                <div id="contact" class="page-content page-contact">
                    <div class="page-title">
                        <h2>LIÊN HỆ VỚI CHÚNG TÔI </h2>
                    </div>
                    <div id="message-box-conact"><h2 style="text-align: center">"SHOP ĐÈN LỒNG ONLINE ! XIN CHÀO" </h2>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6" id="contact_form_map">
                            <h3 class="page-subheading">"SỰ HÀI LÒNG CỦA BẠN - LÀ DANH DỰ CỦA CHÚNG TÔI" "</h3>
                            <p>Shop Đèn Lồng Online tự hào là đơn vị kinh doanh Đèn Lồng uy tín tại Việt Nam.
                                PHương châm của chúng tôi "NGƯỜI VIỆT DÙNG HÀNG VIỆT " . Đảm bảo chất lượng trên từng
                                sản phẩm của chúng tôi.
                                Mang lại cho khách hàng sự tin tưởng khi mua hàng tại Shop của chúng tôi .</p>
                            <br/>
                            <h4 style="text-align: center">LIÊN HỆ CHÚNG TÔI QUA FACEBOOK</h4>
                            <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2F%C4%90%C3%88N-L%E1%BB%92NG-Online-185185508822795%2F%3Fmodal%3Dadmin_todo_tour&tabs=timeline&width=530px&height=200px&small_header=true&adapt_container_width=true&hide_cover=false&show_facepile=true&appId"
                                    width="530px" height="200px" style="border:none;overflow:hidden" scrolling="no"
                                    frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                            <br/>
                            <h4 style="text-align: center">ĐỊA CHỈ CỦA CHÚNG TÔI </h4>
                            <ul class="store_info">
                                <li><i class="fa fa-home"></i>198 Nam Hòa- Phước Long A - Quận 9</li>
                                <li><i class="fa fa-phone"></i>LH Mua Hàng : <strong style="color:red"> 0971 32 55
                                        47</strong></li>
                                <li><i class="fa fa-phone"></i>Tư vấn(24/7):<strong style="color:red"> 0934 724
                                        923</strong></li>
                                <li><i class="fa fa-envelope"></i>Email: <span>phanthongit13@gmail.com</a></span></li>
                            </ul>
                        </div>
                        <div class="col-sm-6">
                            <h3 class="page-subheading">LIÊN HỆ QUA EMAIL</h3>
                            <?php
                            // Kiểm tra việc thực hiện send mai có thành công không ?
                            if (isset($_SESSION['success']))
                            {
                                ?>
                                <div class="alert-success">
                                    <?php
                                    echo "<h4> " . $_SESSION['success']."</h4>";
                                    unset($_SESSION['success']);
                                    ?>
                                </div><?php
                            }
                            ?>
                            <?php
                            if(isset($_SESSION['error'])){?>
                                <div class="alert-danger">
                                    <?php
                                    echo "<h4> " . $_SESSION['error']."</h4>";
                                    unset($_SESSION['error']);
                                    ?>
                                </div>
                            <?php  }
                            ?>

                            <form method="post" action="contact.php" class="contact-form-box">
                                <div class="form-selector">
                                    <label>HỌ VÀ TÊN </label>
                                    <input type="text" name="name" class="form-control input-sm" id="name" required/>
                                </div>
                                <div class="form-selector">
                                    <label>EMAIL</label>
                                    <input type="text" name="email" class="form-control input-sm" id="email" required/>
                                </div>
                                <div class="form-selector">
                                    <label>SỐ ĐIỆN THOẠI</label>
                                    <input type="number" name="phone" class="form-control input-sm" id="phone" required/>
                                </div>
                                <div class="form-selector">
                                    <label>CHỦ ĐỀ</label>
                                    <textarea class="form-control input-sm" name="subject" rows="5"
                                              id="subject" required></textarea>
                                </div>
                                <div class="form-selector">
                                    <label>TIN NHẮN</label>
                                    <textarea class="form-control input-sm" rows="10" name="message"
                                              id="message" required></textarea>
                                </div>

                                <div class="form-selector">
                                    <button name="btn-sendmail" class="button" type="submit"><i class="fa fa-send"></i>&nbsp;
                                        <span>GỬI THƯ</span></button>
                                    <button type="reset" class="button" name="reset" id="reset">Tạo lại</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <h3 style="text-align: center;">TÌM CHÚNG TÔI TRÊN BẢN ĐỒ </h3>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.792915948573!2d106.76043411362592!3d10.82715376121877!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3175265313eda971%3A0xcae3ed0f494398b4!2zMTk4IE5hbSBIw7JhLCBQaMaw4bubYyBMb25nIEEsIFF14bqtbiA5LCBI4buTIENow60gTWluaCwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1530432494457"
                            width="1140" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
            </section>
            </br>
        </div>
    </div>
</section>
<!-- Main Container End -->
