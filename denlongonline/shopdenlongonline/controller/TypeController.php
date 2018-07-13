<?php
/**
 * Created by PhpStorm.
 * User: Phan Thông  IT
 * Date: 2018-06-20
 * Time: 4:49 PM
 */
include_once 'Controller.php';
include_once 'model/TypeModel.php';
include_once 'helper/Pagination.php';

class TypeController extends Controller
{

    function getTypePage()
    {
        $alias = isset($_GET['type']) ? $_GET['type'] : ''; // lấy Alias trên url
        $page  = isset($_GET['page']) && $_GET['page'] > 0 && is_numeric($_GET['page']) ? $_GET['page'] : 1; //  xử lý pager khi  bằng 1 thì không show ra số trang
//        print_r($alias);
//        print_r($page);die;
        $qty      = 9;
        $pageShow = 5;
        $position = ($page - 1) * $qty;

        if ($alias == '')
        {
            header("location:404.php");
            return;
        }
        // Xử lý Menu Cha và menu con
        $model      = new TypeModel();
        $slider     = $model->select_Slider();
        $getAllType = $model->selectAllType();
        $getAllSize = $model->select_AllSize();
        $loadSliderProduct_Sale_New = $model->select_WrapperProduct();
       // $selectMaxPrice = $model->selectMaxPrice();
        //$product  = $model->select_Menu_productlv1($alias , $position,$qty);
        $type_Menu     = $model->getNameMenu($alias);
        $product       = $model->select_Menu_productlv2($alias, $position, $qty);
        $total_Product = count($model->select_Menu_productlv2($alias, -1, -1));
        if (count($product) == 0)
        { // Nếu không có menu con
            $product       = $model->select_Menu_productlv1($alias, $position, $qty);
            $total_Product = count($model->select_Menu_productlv1($alias, -1, -1));
        }
        // Xử lý phân trang
        $pagination = new Pagination($total_Product, $page, $qty, $pageShow);
        $pager      = $pagination->showPagination();

        $data = [
            'slider'   => $slider,
            'product'  => $product,
            'typeName' => $type_Menu->name,
            'pager'    => $pager,
            'allType'  => $getAllType,
            'getAllSize'=>$getAllSize,
            'getNew_Sale'=>$loadSliderProduct_Sale_New,
          //  'selectMaxPrice'=>$selectMaxPrice
        ];
        return $this->loadView('type', $data, 'Sản Phẩm');
    }

    function load_Product_Ajax()
    {
        $alias               = $_GET['alias'];
        $model               = new TypeModel();
        $select_Product_Ajax = $model->select_Menu_productlv2($alias, -1, -1);
        $data                = [
            'product' => $select_Product_Ajax,
            'alias'   => $alias
        ];
        return $this->loadViewAjax('categories-ajax', $data);
    }
    function loadSize_Ajax(){
        $id_Size = $_POST['idSize'];
        $model =  new TypeModel();
        $filter_SizeProduct=$model->Filter_Size($id_Size);
        $data = [
            'filter_SizeProduct'=>$filter_SizeProduct,
            'id_Size'=> $id_Size
        ];
       // return $this->loadView('type' , $d*ata);
       return $this->loadViewAjax('ajax-allsize',$data);
    }
    function loadPrice_Ajax(){
        $minPrice = $_POST['minPrice'];
        $maxPrice  = $_POST['maxPrice'];
        $model =  new TypeModel();
        $selectPrice = $model->selectMaxPrice($minPrice , $maxPrice);
        $data = [
            'minPrice'=>$minPrice ,
            'maxPrice'=> $maxPrice,
            'selectPrice'=>$selectPrice
        ];
        return  $this->loadViewAjax('ajax-price' ,$data);
    }
}


?>