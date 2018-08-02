<?php
/**
 * Created by PhpStorm.
 * User: Phan Thông  IT
 * Date: 2018-08-02
 * Time: 3:23 PM
 */ ?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load("current", {packages: ['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ["Element", "Density", {role: "style"}],
            <?php
            foreach ($getTopPrice as $item){
            ?>
            ["<?php echo $item->name?>", <?php echo ($item->price*$item->qty)?>, "#b123<?php echo rand(11,90)?>"],
            <?php } ?>
        ]);

        var view = new google.visualization.DataView(data);
        view.setColumns([0, 1,
            {
                calc: "stringify",
                sourceColumn: 1,
                type: "string",
                role: "annotation"
            },
            2]);

        var options = {
            title: "THỐNG KÊ DOANH THU THEO SẢN PHẨM - TỔNG TIỀN : <?php echo number_format( $getAllPrice->allPrice) ?> (VNĐ)",
            width: 900,
            height: 700,
            bar: {groupWidth: "95%"},
            legend: {position: "none"},
        };
        var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
        chart.draw(view, options);
    }
</script>
<div id="columnchart_values" style="width: 900px; height: 300px;"></div>
