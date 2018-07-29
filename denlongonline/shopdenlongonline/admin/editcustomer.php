<?php
/**
 * Created by PhpStorm.
 * User: Phan Thông  IT
 * Date: 2018-07-28
 * Time: 3:35 PM
 */
include_once "Controller/CustomerController.php";
$view  =  new CustomerController();
if(isset($_GET['id'])){
    $view->editCustomer();
}
?>


