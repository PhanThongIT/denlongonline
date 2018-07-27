<?php
/**
 * Created by PhpStorm.
 * User: Phan Thông  IT
 * Date: 2018-07-23
 * Time: 6:00 PM
 */
ini_set("display_errors",1); // Khởi tạo biến lỗi
@session_start();
include_once 'Controller/LoginController.php';
$view  = new LoginController();
if(isset($_GET['alias'])){
    $view->logOut();
}
 $view->getLogin();
?>


