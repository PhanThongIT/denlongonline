<?php
/**
 * Created by PhpStorm.
 * User: Phan Thông  IT
 * Date: 2018-07-25
 * Time: 10:06 PM
 */
include_once "Controller/ProductController.php";
$view  =  new ProductController();
if(isset($_GET['addproduct'])){
    $view->AddProduct();
}
?>

