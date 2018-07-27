
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
        <form method="POST" >
            <div class="box-border">
                <ul>
                    <li class="row">
                        <div class="col-sm-6">
                            <label>Tên Danh Mục Sản Phẩm</label>
                            <input type="text" name="name-cate" class="input form-control" id="name-cate" required>
                        </div><!--/ [col] -->
                        <div class="col-sm-6">

                            <label class="required">Danh Mục Cấp 1 </label>
                            <select class="input form-control" name="menuparent" id="menuparent">
                                <?php
                                foreach ($menuParent as $itemSize)
                                {
                                    ?>
                                    <option value="<?= $itemSize->id ?>"><?= $itemSize->name ?>
                                    </option>
                                <?php } ?>
                                <option value="null" selected>Không Có Danh Mục Cấp 1
                                </option>
                            </select>

                        </div><!--/ [col] -->
                    </li><!--/ .row -->
                    <li class="row">
                        <div class="col-sm-12 check-url" style="text-align: center">
                            <div class="col-sm-12">
                                <label class="required">Địa Chỉ url (Không Dấu)</label>
                            </div>

                            <div class="col-sm-12">
                                <input type="text" class="input form-control" name="urlproduct" id="urlproduct"
                                       required>
                            </div>

                        </div><!--/ [col] -->

                    </li><!--/ .row -->
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
<script src="Public/source/js/jquery.js"></script>





