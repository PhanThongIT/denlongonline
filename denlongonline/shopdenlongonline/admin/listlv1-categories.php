<?php
/**
 * Created by PhpStorm.
 * User: Phan Thông  IT
 * Date: 2018-07-26
 * Time: 4:27 PM
 */
include_once "Controller/CategoriesController.php";
$view   =  new CategoriesController();
if(isset($_GET['list1categories'])){
    $view->selectMenuParent();
}elseif(isset($_GET['list2categories'])){
    $view->selectMenuType();
}elseif(isset($_GET['addcategories'])){
    $view->addCategories();
}

?>