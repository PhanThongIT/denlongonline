<?php
/**
 * Created by PhpStorm.
 * User: Phan Thông  IT
 * Date: 2018-07-27
 * Time: 8:27 PM
 */
include_once "Controller/CustomerController.php";
$view  =  new CustomerController();
if(isset($_GET['getlistCustomer'])){
    $view->getListCustomer();
}
?>