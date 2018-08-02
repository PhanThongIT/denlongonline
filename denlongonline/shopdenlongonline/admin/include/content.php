<?php
/**
 * Created by PhpStorm.
 * User: Phan Thông  IT
 * Date: 2018-07-23
 * Time: 5:42 PM
 */ ?>
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <div class="panel panel-body">

            <section class="content">
                <?php
                if (isset($view))
                {
                    include("$view");
                }
                ?>

            </section>
        </div>
    </section>
</section>
<!--main content end-->
