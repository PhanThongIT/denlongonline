<?php
/**
 * Created by PhpStorm.
 * User: Phan Thông  IT
 * Date: 2018-07-17
 * Time: 2:40 AM
 */
// Có chức năng Đưa ta tới giỏ hàng các sản phẩm đã mua
include_once 'controller/CartController.php';
$view = new CartController() ;
return $view->loadOldCart();
?>

