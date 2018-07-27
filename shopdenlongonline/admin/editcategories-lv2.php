<?php
/**
 * Created by PhpStorm.
 * User: Phan Thông  IT
 * Date: 2018-07-27
 * Time: 5:21 PM
 */
include "Controller/CategoriesController.php";
$view  = new CategoriesController();
if(isset($_GET['editcate-lv2'])){
   $view->updateCateLevel2();
}
?>

