<?php
/**
 * Created by PhpStorm.
 * User: Phan Thông  IT
 * Date: 2018-06-27
 * Time: 11:23 PM
 */
include_once "controller/TypeController.php";
$view =  new TypeController();
return $view->loadSize_Ajax();
?>