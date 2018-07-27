<?php
/**
 * Created by PhpStorm.
 * User: Phan Thông  IT
 * Date: 2018-07-25
 * Time: 5:10 PM
 */
include_once "Controller/ProductController.php";
$view =  new ProductController();
if(isset($_POST['idproduct'])){
    $view->deleteProduct();
}
?>