<?php
/**
 * Created by PhpStorm.
 * User: Phan Thông  IT
 * Date: 2018-06-20
 * Time: 4:52 PM
 */
include_once 'controller/DetailController.php';
$view  = new DetailController();
return $view->getDetailPage();

?>