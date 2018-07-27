<?php
/**
 * Created by PhpStorm.
 * User: Phan Thông  IT
 * Date: 2018-07-26
 * Time: 1:32 PM
 */
include_once "Controller/ProductController.php";
$view =  new ProductController();
if(isset($_GET['editproduct'])){
    $view->EditProduct();
}
?>
