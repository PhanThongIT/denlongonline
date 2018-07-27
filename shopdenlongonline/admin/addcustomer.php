<?php
/**
 * Created by PhpStorm.
 * User: Phan Thông  IT
 * Date: 2018-07-27
 * Time: 10:59 PM
 */
include "Controller/CustomerController.php";
$view  =  new CustomerController();
if(isset($_GET['addcustomer'])){
    $view ->addCustomer();
}
?>