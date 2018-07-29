<?php
/**
 * Created by PhpStorm.
 * User: Phan Thông  IT
 * Date: 2018-07-29
 * Time: 12:58 PM
 */
include_once "Controller/PostController.php";
$view = new PostController();
if(isset($_GET['post'])){
    $view->getListPost();
}elseif(isset($_GET['addpost'])){
    $view->getAddPost();
}
?>