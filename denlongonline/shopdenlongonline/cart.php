<?php
/**
 * Created by PhpStorm.
 * User: Phan Thông  IT
 * Date: 2018-07-06
 * Time: 3:42 AM
 */
include_once 'controller/CartController.php' ;
$view  =  new CartController();
if(isset($_POST['method']) && $_POST['method'] == "delete"){
   return  $view->remove_Item_Cart();
}elseif(isset($_POST['method']) &&  $_POST['method'] == "update"){
    return  $view->update_Item_Quantity();
}else{
    return $view->addProduct_To_Cart();
}

?>