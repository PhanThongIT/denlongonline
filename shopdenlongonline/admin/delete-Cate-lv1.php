<?php
/**
 * Created by PhpStorm.
 * User: Phan Thông  IT
 * Date: 2018-07-26
 * Time: 5:15 PM
 */
include_once "Controller/CategoriesController.php";
$view  =  new CategoriesController();
if(isset($_POST['idCatelv1'])){
$view->deleteCatelv1();
}
?>