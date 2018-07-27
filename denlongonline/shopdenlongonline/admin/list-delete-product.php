<?php
/**
 * Created by PhpStorm.
 * User: Phan Thông  IT
 * Date: 2018-07-25
 * Time: 6:13 PM
 */
include_once "Controller/ProductController.php";
$view = new ProductController();
if(isset($_GET['listdeleted'])){
    $view->getListProductDelete();
}

?>