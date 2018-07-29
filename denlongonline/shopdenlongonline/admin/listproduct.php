<?php
/**
 * Created by PhpStorm.
 * User: Phan Thông  IT
 * Date: 2018-07-29
 * Time: 6:24 AM
 */
include_once "Controller/CategoriesController.php";
$view = new CategoriesController();
if(isset($_GET['getlist'])){
    $view->getProductType();
}
?>