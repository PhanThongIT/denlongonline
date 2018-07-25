<?php
/**
 * Created by PhpStorm.
 * User: Phan Thông  IT
 * Date: 2018-07-25
 * Time: 4:26 AM
 */
session_start();
require_once "Model/CategoriesModel.php";
class CategoriesController{
    function getMenuPage(){
        $model =  new CategoriesModel;
        $menu = $model->getMenu();
//        print_r($menu);die;
//        $viewmenu  = "View/v_menu.php";
        $_SESSION['menu'] = $menu;
//        print_r($_SESSION['menu']);die;
      include_once "include/admin.view.php";
    }
}
?>