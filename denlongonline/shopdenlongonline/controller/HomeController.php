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
        $data=[
            'background' =>$background,
            'featuredProduct' => $featuredProduct,
            'newProduct' =>$newProduct,
            'topSell_Price'=> $topSell_Price
        ];
        return $this->loadView('home',$data);
    }
}

?>