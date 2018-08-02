<?php
/**
 * Created by PhpStorm.
 * User: Phan Thông  IT
 * Date: 2018-07-30
 * Time: 6:07 AM
 */
include_once "Controller/ProfileController.php";
$view  = new ProfileController();
 if(isset($_GET['profile'])){
     $view->getProfilePage();
 }
 if(isset($_POST['btn-Update'])){
     $view->editProfile();
 }
$view->getProfilePage();

?>