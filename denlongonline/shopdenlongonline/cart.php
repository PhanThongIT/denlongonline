<?php
/**
 * Created by PhpStorm.
 * User: Phan Thông  IT
 * Date: 2018-07-06
 * Time: 3:42 AM
 */
include_once 'controller/CartController.php' ;
$view  =  new CartController();
$view->loadOldCart();
?>