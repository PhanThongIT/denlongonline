<?php
/**
 * Created by PhpStorm.
 * User: Phan Thông  IT
 * Date: 2018-08-02
 * Time: 6:20 PM
 */
include "Controller.php";
class SettingController extends Controller{
    function getSettingPage(){
        $this->loadView("setting",[], "HƯỚNG DẪN");
    }
}
?>