<?php
include_once 'Controller.php';
include_once 'model/HomeModel.php';

class HomeController extends Controller{

    function getHomePage(){
        $model = new HomeModel;
        $background = $model->selectBackground();
        $featuredProduct = $model->selectFeaturedProduct();
        $newProduct = $model->selectNewProduct();
        $topSell_Price =  $model->selectTopSell();
        $select_DLHA = $model->select_DenLongHoiAn();
        $selectTopProduct =  $model->selectTopProduct();
        $data=[
            'background' =>$background,
            'featuredProduct' => $featuredProduct,
            'newProduct' =>$newProduct,
            'topSell_Price'=> $topSell_Price,
            'select_DLHA' => $select_DLHA,
            'selecttop_Product'=>$selectTopProduct
        ];
        return $this->loadView('home',$data);
    }
}

?>