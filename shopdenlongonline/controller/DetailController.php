<?php
/**
 * Created by PhpStorm.
 * User: Phan Thông  IT
 * Date: 2018-06-20
 * Time: 4:34 PM
 */
include_once 'Controller.php';
include_once 'model/DetailModel.php';

class DetailController extends Controller
{
    function getDetailPage()
    {
        $alias             = $_GET['alias'];
        $id                = $_GET['id'];
        $model             = new DetailModel();
        $get_DetailProduct = $model->getDetail_Product($alias, $id);
        // Lấy id_Type để xử lý  phần sản phẩm liên quan
        $idType             = $get_DetailProduct->id_type;
        $getRelated_Product = $model->getRelated_Product($idType, $id);

        if ($get_DetailProduct == '')
        {
            header("location:404.php");
        }
        $data = [
            'get_DetailProduct'  => $get_DetailProduct,
            'getRelated_Product' => $getRelated_Product
        ];
        return $this->loadView('detail', $data, "CHI TIẾT");
           }
}

?>