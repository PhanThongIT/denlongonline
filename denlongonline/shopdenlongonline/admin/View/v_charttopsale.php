<?php
/**
 * Created by PhpStorm.
 * User: Phan Thông  IT
 * Date: 2018-08-02
 * Time: 2:51 PM
 */?>
<html>
<head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load("current", {packages:["corechart"]});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Tên Sản Phẩm', 'Số Lượng'],
                <?php
                foreach ($topBill as $item){
                ?>
                ['<?= $item->name ?>',     <?= $item->qty?>],
               <?php }?>
            ]);

            var options = {
                title: 'THỐNG KÊ SẢN PHẨM BÁN CHẠY THEO SỐ LƯỢNG (TỔNG SỐ LƯỢNG <?php echo  $getAllPro->allPro?>)',
                pieHole: 0.4,
            };

            var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
            chart.draw(data, options);
        }
    </script>
</head>
<body>
<div id="donutchart" style="width: 900px; height: 500px; margin-left: 200px;margin-top: 100px;"></div>
</body>
</html>
