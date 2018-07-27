<?php
/**
 * Created by PhpStorm.
 * User: Phan Thông  IT
 * Date: 2018-07-25
 * Time: 4:26 AM
 */
//if (session_status() == PHP_SESSION_NONE)
//{
session_start();
//}
include_once("Model/CategoriesModel.php");
include_once("Model/ProductModel.php");
include_once("Helper/String/trimUrl.php");

class CategoriesController
{
    function getMenuPage()
    {
        $model = new CategoriesModel;
        $menu  = $model->getMenu();
//        print_r($menu);die;
//        $viewmenu  = "View/v_menu.php";
        $_SESSION['menu'] = $menu;
        //
//       $viewmenu = "include/admin.view.php";
        include("include/admin.view.php");
    }

    function selectMenuParent()
    {
        $model            = new CategoriesModel();
        $modelUrl         = new ProductModel();
        $selectMenuParent = $model->selectMenuParent();
        //  $getUrlCategories = $modelUrl->getUrlType($selectMenuParent->id_url);
        $title = "DANH MỤC THỂ LOẠI SẢN PHẨM CẤP 1";
        $view  = "View/v_list1categories.php";
        include("include/admin.view.php");
    }

    function selectMenuType()
    {
        $model     = new CategoriesModel();
        $checkMenu = $model->loadMenuType();
        $title     = "DANH MỤC THỂ LOẠI SẢN PHẨM CẤP 2";
        $view      = "View/v_list2categories.php";
        include("include/admin.view.php");
    }

    function addCategories()
    {
        $model      = new CategoriesModel();
        $model1     = new ProductModel();
        $menuParent = $model->selectMenuParent();
        if (isset($_POST['btn-Add']))
        {
            $name    = $_POST['name-cate'];
            $url     = $_POST['urlproduct'];
            $parrent = $_POST['menuparent'];

            //Xử lý Url
            $preg_Url = utf8convert($url);
            $lowerUrl = strtolower(str_replace(' ', '', $preg_Url));
            // Xử lý menu Cấp 1
            if ($parrent == 'null')
            {
                $check_Id_Url = $model1->insertUrl($lowerUrl);
                $parrent      = null;
                $checkInsert  = $model->insertCate($name, $parrent, $check_Id_Url);
                if ($checkInsert)
                {
                    echo "<script>alert('THÊM THÀNH CÔNG  THỂ LOẠI')</script>";
                    echo "<script>window.location='listlv1-categories.php?addcategories=add'</script>";
                }
                else
                {
                    echo "<script>alert('THÊM THẤT  BẠI  THỂ LOẠI')</script>";
                    echo "<script>window.location='listlv1-categories.php?addcategories=add'</script>";
                }
            }
            if ($parrent != 'null')
            {
                $check_Id_Url = $model1->insertUrl($lowerUrl);
                $checkInsert  = $model->insertCate($name, $parrent, $check_Id_Url);
                if ($checkInsert)
                {
                    echo "<script>alert('THÊM THÀNH CÔNG  THỂ LOẠI')</script>";
                    echo "<script>window.location='listlv1-categories.php?addcategories=add'</script>";
                }
                else
                {
                    echo "<script>alert('THÊM THẤT BẠI  THỂ LOẠI')</script>";
                    echo "<script>window.location='listlv1-categories.php?addcategories=add'</script>";
                }
            }


        }

        $title = "THÊM DANH MỤC SẢN PHẨM ";
        $view  = "View/v_addcategories.php";
        include("include/admin.view.php");
    }

    function updateCate()
    {
        $idCate = $_GET['editcate'];

        $model    = new CategoriesModel();
        $modelPro = new ProductModel();

        $loadCate = $model->loadCate($idCate);
        $loadUrl  = $modelPro->getUrlType($loadCate->id_url);
        if (isset($_POST['btn-EditCate']))
        {
            $nameCate = $_POST['name-cate'];
            $url      = $_POST['urlproduct'];
            $preg_Url = utf8convert($url);
            $lowerUrl = strtolower(str_replace(' ', '', $preg_Url));
//            echo $nameCate;
//            echo $lowerUrl; die;
            $updateUrl  = $modelPro->updateUrl($loadCate->id_url, $lowerUrl);
            $updateCate = $model->updateCate($loadCate->id, $nameCate, $loadCate->id_url);
            if ($updateCate)
            {
                echo "<script>alert('CHỈNH SỬA THÀNH CÔNG  THỂ LOẠI')</script>";
                echo "<script>window.location='listlv1-categories.php?list1categories=lv1'</script>";
            }
            else
            {
                echo "<script>alert('CHỈNH SỬA THẤT THỂ LOẠI')</script>";
                echo "<script>window.location='listlv1-categories.php?list1categories=lv1'</script>";
            }
        }

        $title = "SỬA DANH MỤC -THỂ LOẠI ";
        $view  = "View/v_edit-cate.php";
        include("include/admin.view.php");
    }
    function updateCateLevel2(){

        $idCate = $_GET['editcate-lv2'];

        $model    = new CategoriesModel();
        $modelCate = new ProductModel();

        $loadCate = $model->loadCate($idCate);

      //  $loadUrl  = $model->getNameUrlType($loadCate->id_url);
//       echo $loadCate->id_url;
//       echo  $idCate;
//       var_dump($loadUrl);die;
        if (isset($_POST['btn-EditCate-lv2']))
        {
            $nameCate = $_POST['name-cate'];
            $url      = $_POST['urlproduct'];
            $preg_Url = utf8convert($url);
            $lowerUrl = strtolower(str_replace(' ', '', $preg_Url));
//            echo $nameCate;
//            echo $lowerUrl; die;
            $updateUrl  = $modelCate->updateUrl($loadCate->id_url, $lowerUrl);
            $updateCate = $model->updateCateLevel2($loadCate->id, $nameCate, $loadCate->id_url,$loadCate->id_parent);
            if ($updateCate)
            {
                echo "<script>alert('CHỈNH SỬA THÀNH CÔNG  THỂ LOẠI')</script>";
                echo "<script>window.location='listlv1-categories.php?list2categories=lv2'</script>";
            }
            else
            {
                echo "<script>alert('CHỈNH SỬA THẤT THỂ LOẠI')</script>";
                echo "<script>window.location='listlv1-categories.php?list2categories=lv2'</script>";
            }
        }
        $title = "SỬA DANH MỤC -THỂ LOẠI  CẤP 2";
        $view  = "View/v_edit-cate-lv2.php";
        include("include/admin.view.php");


    }

}

?>