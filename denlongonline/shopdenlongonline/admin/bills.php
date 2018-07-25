<?php
/**
 * Created by PhpStorm.
 * User: Phan Thông  IT
 * Date: 2018-07-24
 * Time: 12:35 AM
 */
include_once 'Controller/BillsController.php';
$view =  new BillsController();
if(isset($_GET['status'])){
    $view->getBillsByStatus();
}elseif (isset($_POST['idbill']) && isset($_POST['statusGiaoHang'])){
    $view->getUpdateBill();
}elseif (isset($_POST['idbill']) && isset($_POST['statusHuy'])){
    $view->cancelBill();
}

?>