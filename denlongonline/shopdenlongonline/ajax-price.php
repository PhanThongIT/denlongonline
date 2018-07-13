<?php
/**
 * Created by PhpStorm.
 * User: Phan Thông  IT
 * Date: 2018-07-13
 * Time: 2:58 AM
 */
include_once 'controller/TypeController.php';
$view = new TypeController();
return $view->loadPrice_Ajax();
?>

