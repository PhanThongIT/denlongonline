<?php
/**
 * Created by PhpStorm.
 * User: Phan Thông  IT
 * Date: 2018-08-02
 * Time: 5:15 PM
 */
include "Controller.php";
class AboutUsController extends Controller{
    function getPageAboutUs(){
        $this->loadView('aboutus',[],"Giới Thiệu");
    }
}
?>