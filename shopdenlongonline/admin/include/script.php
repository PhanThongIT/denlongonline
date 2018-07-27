<?php
/**
 * Created by PhpStorm.
 * User: Phan Thông  IT
 * Date: 2018-07-23
 * Time: 5:37 PM
 */?>
<!-- js placed at the end of the document so the pages load faster -->
<script src="Public/source/js/jquery.js"></script>
<script src="Public/source/js/bootstrap.min.js"></script>
<script class="include" type="text/javascript" src="Public/source/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="Public/source/js/jquery.scrollTo.min.js"></script>
<script src="Public/source/js/jquery.nicescroll.js" type="text/javascript"></script>
<script src="Public/source/js/jquery.sparkline.js" type="text/javascript"></script>
<script src="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
<script src="Public/source/js/owl.carousel.js" ></script>
<script src="Public/source/js/jquery.customSelect.min.js" ></script>
<script src="Public/source/js/respond.min.js" ></script>

<!--right slidebar-->
<script src="Public/source/js/slidebars.min.js"></script>

<!--common script for all pages-->
<script src="Public/source/js/common-scripts.js"></script>

<!--script for this page-->
<script src="Public/source/js/sparkline-chart.js"></script>
<script src="Public/source/js/easy-pie-chart.js"></script>
<script src="Public/source/js/count.js"></script>

<script>

    //owl carousel

    $(document).ready(function() {
        $("#owl-demo").owlCarousel({
            navigation : true,
            slideSpeed : 300,
            paginationSpeed : 400,
            singleItem : true,
            autoPlay:true

        });
    });

    //custom select box

    $(function(){
        $('select.styled').customSelect();
    });

</script>
