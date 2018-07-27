<?php
/**
 * Created by PhpStorm.
 * User: Phan Thông  IT
 * Date: 2018-07-27
 * Time: 4:13 PM
 */
include_once "Controller/CategoriesController.php";
$view  = new CategoriesController() ;
if(isset($_GET['editcate'])){
    $view->updateCate();
}
?>