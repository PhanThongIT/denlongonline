<?php
/**
 * Created by PhpStorm.
 * User: Phan Thông  IT
 * Date: 2018-07-23
 * Time: 2:34 PM
 */
include_once "Controller/RegisterController.php";
$view = new RegisterController();
if (isset($_GET['register']))
{
    $view->getRegister();
}
elseif (isset($_POST['btn-Register']))
{
    $view->getRegister();
}
$view->getRegisterPage();
?>

