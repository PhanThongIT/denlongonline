<?php
/**
 * Created by PhpStorm.
 * User: Phan Thông  IT
 * Date: 2018-08-02
 * Time: 5:59 PM
 */
include "Controller.php";
class PostController extends Controller{
    function loadPagePost(){
        $this->loadView("post",[],"BÀI VIẾT");
    }
}
?>