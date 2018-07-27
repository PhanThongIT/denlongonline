<?php
/**
 * Created by PhpStorm.
 * User: Phan Thông  IT
 * Date: 2018-06-25
 * Time: 4:55 PM
 */
include_once 'controller/TypeController.php';
$view  = new TypeController() ;
return $view->load_Product_Ajax();


?>

