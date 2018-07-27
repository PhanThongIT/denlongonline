<?php
/**
 * Created by PhpStorm.
 * User: Phan Thông  IT
 * Date: 2018-07-25
 * Time: 6:06 AM
 */
include_once "Model/ProductModel.php";
include_once "Helper/String/trimUrl.php";

class ProductController
{
    function getProductByType()
    {
        $alias               = $_GET['alias'];
        $model               = new ProductModel();
        $selectProductByType = $model->select_Menu_productlv1($alias);
        $getNameMenu         = $model->getNameMenu($alias);
        $title               = "DANH SÁCH SẢN PHẨM THEO THỂ LOẠI " .$getNameMenu->name;
        $view                = "View/v_product.php";
        include("include/admin.view.php");
    }

    function deleteProduct()
    {
        $idProduct     = $_POST['idproduct'];
        $model         = new ProductModel();
        $deleteProduct = $model->getDeleteProduct($idProduct);
        if ($deleteProduct)
        {
            echo json_encode([
                'status' => "ĐÃ XÓA SẢN PHẨM THÀNH CÔNG!"
            ]);
        }
        else
        {
            echo json_encode([
                'status' => "XÓA SẢN PHẨM THẤT BẠI"
            ]);
        }

    }

    function getListProductDelete()
    {
        $alias         = $_GET['listdeleted'];
        $model         = new ProductModel();
        $getlistDelete = $model->getListProductDelete($alias);
//        print_r($getlistDelete);die;
//        $getNameMenu  = $model->getNameMenu($alias);
        $title = "DANH SÁCH SẢN PHẨM ĐÃ BỊ XÓA ";
        $view  = "View/v_list-delete-product.php";
        include("include/admin.view.php");
    }

    function rollbackProduct()
    {
        $idProduct       = $_POST['idproduct'];
        $model           = new ProductModel();
        $rollBackProduct = $model->getRollbackProduct($idProduct);
        if ($rollBackProduct)
        {
            echo json_encode([
                'status' => "ĐÃ KHÔI PHỤC TRẠNG THÁI SẢN PHẨM THÀNH CÔNG "
            ]);
        }
        else
        {
            echo json_encode([
                'status' => "KHÔI PHỤC SẢN PHẨM THẤT BẠI"
            ]);
        }

    }

    function AddProduct()
    {


        $model          = new ProductModel();
        $getNameTypelv1 = $model->getNameTypeLv1();
        $getSize        = $model->getSize();
        if (isset($_POST['btn-Add']))
        {
            $url          = $_POST['urlproduct'];
            $preg_Url     = utf8convert($url);
            $lowerUrl     = strtolower(str_replace(' ', '', $preg_Url));
            $check_Id_Url = $model->insertUrl($lowerUrl);
            if ($check_Id_Url)
            {
                $name         = $_POST['nameproduct'];
                $size         = $_POST['sizeproduct'];
                $price        = $_POST['priceproduct'];
                $promt_price  = $_POST['promt_product'];
                $detail       = $_POST['detailproduct'];
                $detail_promt = $_POST['promotion_price'];
                $idType       = $_POST['typeproduct'];
                $status       = $_POST['statusproduct'];
                $new          = $_POST['newproduct'];

                $deleted       = $_POST['deletedproduct'];
                $image         = $_FILES["hinh"]["error"] == 0 ? $_FILES["hinh"]["name"] : "";
                $getUrlType    = $model->getUrlType($idType);
                $insertProduct = $model->insertProduct($name, $size, $price, $promt_price, $check_Id_Url, $detail, $detail_promt, $idType, $status, $new, $deleted, $image);
                if ($insertProduct)
                {
                    if ($_FILES["hinh"]["error"] == 0)
                    {
                        $kqa = move_uploaded_file($_FILES["hinh"]["tmp_name"], "../Public/source/images/products/$image");

                    }
                    echo "<script>alert('Thêm thành công Sản phẩm')</script>";
                    echo "<script>window.location='product.php?alias=$getUrlType->url'</script>";


                }
            }
            // lấy tất cả các thuộc tính

        }
        $title = "THÊM SẢN PHẨM LỒNG ĐÈN ";
        $view  = "View/v_AddProduct.php";
        include_once("include/admin.view.php");
    }

    function EditProduct()
    {
        $model          = new ProductModel();
        $getNameTypelv1 = $model->getNameTypeLv1();
        $getSize        = $model->getSize();
        $idProduct      = $_GET['editproduct'];
        if ($idProduct)
        {
            $getProductByID = $model->getProductByID($idProduct);
            if (isset($_POST['btn-Edit']))
            {
                $url          = $_POST['urlproduct'];
                $preg_Url     = utf8convert($url);
                $lowerUrl     = strtolower(str_replace(' ', '', $preg_Url));
                $check_Id_Url = $model->updateUrl($getProductByID->id_url, $lowerUrl);
                $name         = $_POST['nameproduct'];
                $size         = $_POST['sizeproduct'];
                $price        = $_POST['priceproduct'];
                $promt_price  = $_POST['promt_product'];
                $detail       = $_POST['detailproduct'];
                $detail_promt = $_POST['promotion_price'];
                $idType       = $_POST['typeproduct'];
                $status       = $_POST['statusproduct'];
                $new          = $_POST['newproduct'];
                $deleted       = $_POST['deletedproduct'];
                $image         = $_FILES["hinh"]["error"] == 0 ? $_FILES["hinh"]["name"] : "";
                $getUrlType    = $model->getUrlType($idType);
                //updateProduct($id,$name,$size,$price , $promt_price,$url,$detail ,$detail_promt ,$idType ,$status ,$new,$deleted, $image)
                $updateProduct = $model->updateProduct($getProductByID->id,$name, $size, $price, $promt_price, $getProductByID->id_url, $detail, $detail_promt, $idType, $status, $new, $deleted, $image);
                if ($updateProduct)
                {
                    if ($_FILES["hinh"]["error"] == 0)
                    {
                        $kqa = move_uploaded_file($_FILES["hinh"]["tmp_name"], "../Public/source/images/products/$image");

                    }
                    echo "<script>alert('Sửa thành công Sản phẩm')</script>";
                    echo "<script>window.location='product.php?alias=$getUrlType->url'</script>";


                }
            }
        }
        $title = "SỬA SẢN PHẨM ĐÈN LỒNG ";
        $view  = "View/v_EditProduct.php";
        include("include/admin.view.php");
    }
}

?>

