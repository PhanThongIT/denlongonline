<?php
/**
 * Created by PhpStorm.
 * User: Phan Thông  IT
 * Date: 2018-07-20
 * Time: 2:51 AM
 */
include_once 'controller/OrderController.php';
$view  = new OrderController();
if(isset($_POST['btn-Cart'])){
    $view->checkOrder();
}
return isset($_POST['btn-Order']) ? $view->checkOrder() : $view->loadViewOrder();
?>

