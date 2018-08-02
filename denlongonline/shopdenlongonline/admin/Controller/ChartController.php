<?php
/**
 * Created by PhpStorm.
 * User: Phan Thông  IT
 * Date: 2018-08-02
 * Time: 1:40 PM
 */
include "Model/ChartModel.php";

class ChartController
{
    function getChartProductPage()
    {
        $model        = new ChartModel();
        $countAllPro  = $model->selectAllProduct(); //all sản phẩm
        $countNewPro  = $model->selectNewProduct();
        $countSalePro = $model->selectSaleProduct();
        $countSpecPro = $model->selectSpecialProduct();
        // print_r( $countAllPro);die;
        $title = "THỐNG KÊ LOẠI SẢN PHẨM TRONG SHOP";
        $view  = "View/v_chartproduct.php";
        include "include/admin.view.php";
    }

    function getChartTopBill()
    {
        $model     = new ChartModel();
        $topBill   = $model->selectTopSale();
        $getAllPro = $model->getAllQuantityPro();
        $title     = "THỐNG KÊ SỐ LƯỢNG SẢN PHẨM BÁN ĐƯỢC";
        $view      = "View/v_charttopsale.php";
        include "include/admin.view.php";
    }

    function getChartPricePage()
    {
        $model      = new ChartModel();
        $getTopPrice = $model->selectTopPrice();
        $getAllPrice =$model->getAllPrice();
        //echo "<pre>"; var_dump($getTopSale); echo "</pre>"; die;
        $title      = "THỐNG KÊ DOANH THU THEO SẢN PHẨM";
        $view       = "View/v_charttopprice.php";
        include "include/admin.view.php";
    }

}