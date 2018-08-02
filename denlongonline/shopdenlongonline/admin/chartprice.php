<?php
/**
 * Created by PhpStorm.
 * User: Phan Thông  IT
 * Date: 2018-08-02
 * Time: 3:12 PM
 */
include "Controller/ChartController.php";
$view =  new ChartController();
if(isset($_GET['chartprice'])){
    $view->getChartPricePage();
}
?>