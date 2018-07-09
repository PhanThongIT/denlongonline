<?php
/**
 * Created by PhpStorm.
 * User: Phan Thông  IT
 * Date: 2018-06-30
 * Time: 4:04 PM
 */
include_once 'controller/ContactController.php';
$view = new ContactController();
$view->contact_Mailer();
 $view->loadPageContact();
?>