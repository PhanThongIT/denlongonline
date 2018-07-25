<?php
/**
 * Created by PhpStorm.
 * User: Phan Thông  IT
 * Date: 2018-07-25
 * Time: 6:06 AM
 */
include_once "Model/ProductModel.php";
class ProductController{
    function getProductByType(){
        $alias = $_GET['alias'];
        $model = new ProductModel();
        $selectProductByType = $model->select_Menu_productlv1($alias);
        $title="DANH SÁCH SẢN PHẨM THEO THỂ LOẠI:";
        $view  = "View/v_product.php";
        include ("include/admin.view.php");
    }

}
?>

