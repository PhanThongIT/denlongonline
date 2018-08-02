<?php
/**
 * Created by PhpStorm.
 * User: Phan Thông  IT
 * Date: 2018-08-02
 * Time: 5:59 PM
 */
include "controller/PostController.php";
$view =  new PostController();
$view->loadPagePost();
?>