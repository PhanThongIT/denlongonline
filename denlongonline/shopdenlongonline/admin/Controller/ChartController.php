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
    /**
     * function getChartProductPage
     *
     * get data from tables Products, Bills, Details Bill
     */
    function getChartProductPage()
    {
        $model = new ChartModel();

        // get data from Model.
        $countAllPro = $model->selectAllProduct();
        $countNewPro = $model->selectNewProduct();
        $countSalePro = $model->selectSaleProduct();
        $countSpecPro = $model->selectSpecialProduct();

        //set view, title
        $title = "THỐNG KÊ LOẠI SẢN PHẨM TRONG SHOP";
        $view = "View/v_chartproduct.php";
        include "include/admin.view.php";
    }

    /**
     * function getChartTopBill
     *
     * get data from tables Products, Bills, Details Bill
     */
    function getChartTopBill()
    {
        $model = new ChartModel();

        // Call data from Model
        $topBill = $model->selectTopSale();
        $getAllPro = $model->getAllQuantityPro();

        // set view and title.
        $title = "THỐNG KÊ SỐ LƯỢNG SẢN PHẨM BÁN ĐƯỢC";
        $view = "View/v_charttopsale.php";
        include "include/admin.view.php";
    }

    /**
     * function getChartPricePage
     *
     * get data from tables Products, Bills, Details Bill
     */
    function getChartPricePage()
    {
        $model = new ChartModel();

        //get data from Model
        $getTopPrice = $model->selectTopPrice();
        $getAllPrice = $model->getAllPrice();

        //set view and title.
        $title = "THỐNG KÊ DOANH THU THEO SẢN PHẨM";
        $view = "View/v_charttopprice.php";
        include "include/admin.view.php";
    }

}