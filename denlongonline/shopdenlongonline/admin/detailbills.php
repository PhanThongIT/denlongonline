<?php
/**
 * Created by PhpStorm.
 * User: Phan Thông  IT
 * Date: 2018-07-24
 * Time: 3:25 AM
 */
include_once "Controller/BillsController.php";
$view = new BillsController();
if(isset($_GET['idBill'])){
$view->getDetailBillByIDBill();

}

?>
