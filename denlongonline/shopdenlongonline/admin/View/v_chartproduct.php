<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ["Loại Sản Phẩm", "Số Lượng", { role: "style" } ],
            ["SP mới", <?php echo $countNewPro->soluongNew?>, "#b87333"],
            ["SP Khuyến Mãi",<?php echo $countSalePro->soluongSale?>, "silver"],
            ["SP Đặc Biệt", <?php echo $countSpecPro->soluongSpecial?>, "gold"],
        ]);

        var view = new google.visualization.DataView(data);
        view.setColumns([0, 1,
            { calc: "stringify",
                sourceColumn: 1,
                type: "string",
                role: "annotation" },
            2]);

        var options = {
            title: "Số lượng sản phẩm theo thể loại",
            width: 900,
            height: 500,
            bar: {groupWidth: "95%"},
            legend: { position: "none" },
        };
        var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
        chart.draw(view, options);
    }
</script>
<div id="columnchart_values" style="width: 900px; height: 500px;margin-left: 200px;margin-top: 100px;"></div>