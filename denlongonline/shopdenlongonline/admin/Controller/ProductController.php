<?php
/**
 * Created by PhpStorm.
 * User: Phan Thông  IT
 * Date: 2018-07-25
 * Time: 6:06 AM
 */
include_once "Model/ProductModel.php";
include_once "Helper/String/trimUrl.php";
include_once "Helper/constants.php";

class ProductController
{

    /**
     * function getProductByType
     *
     */
    function getProductByType()
    {
        //get Model and alias with method GET
        $alias = $_GET['alias'];

        $model = new ProductModel();

        // get Data from Model
        $selectProductByType = $model->select_Menu_productlv1($alias);
        $getNameMenu = $model->getNameMenu($alias);

        //set title and view
        $title = TITLE_GET_PRODUCT_BY_TYPES . $getNameMenu->name;
        $view = "View/v_product.php";
        include(DIRECTORY_ADMIN_VIEW);
    }

    function deleteProduct()
    {
        //get id products
        $idProduct = $_POST['idproduct'];

        //get data from Model
        $model = new ProductModel();
        $deleteProduct = $model->getDeleteProduct($idProduct);

        //check exist product
        if ($deleteProduct) {
            echo json_encode([
                'status' => MESSAGE_DELETE_SUCCESS
            ]);
        } else {
            echo json_encode([
                'status' => MESSAGE_DELETE_FAIL
            ]);
        }

    }

    function getListProductDelete()
    {
        //get alias with method GET
        $alias = $_GET['listdeleted'];

        $model = new ProductModel();

        // get data from function of Model
        $getlistDelete = $model->getListProductDelete($alias);

        //setting view
        $title = TITLE_LIST_PRODUCT_DELETE;
        $view = "View/v_list-delete-product.php";
        include(DIRECTORY_ADMIN_VIEW);
    }

    function rollbackProduct()
    {
        //get id with method POST
        $idProduct = $_POST['idproduct'];

        //get data from Model
        $model = new ProductModel();
        $rollBackProduct = $model->getRollbackProduct($idProduct);

        //check exist Product and show messages
        if ($rollBackProduct) {
            echo json_encode([
                'status' => ROLLBACK_STATUS_PRODUCT_SUCCESS
            ]);
        } else {
            echo json_encode([
                'status' => ROLLBACK_STATUS_PRODUCT_FAIL
            ]);
        }

    }

    function AddProduct()
    {

        $model = new ProductModel();

        //get data from Model
        $getNameTypelv1 = $model->getNameTypeLv1();
        $getSize = $model->getSize();

        // check submit button with method POST
        if (isset($_POST['btn-Add'])) {

            // get alias product with method POST
            $url = $_POST['urlproduct'];
            $pregUrl = utf8convert($url);
            $lowerUrl = strtolower(str_replace(' ', '', $pregUrl));
            $checkIdUrl = $model->insertUrl($lowerUrl);

            if ($checkIdUrl) {

                //get conditions with method POST
                $name = $_POST['nameproduct'];
                $size = $_POST['sizeproduct'];
                $price = $_POST['priceproduct'];
                $promtPrice = $_POST['promt_product'];
                $detail = $_POST['detailproduct'];
                $detailPromt = $_POST['promotion_price'];
                $idType = $_POST['typeproduct'];
                $status = $_POST['statusproduct'];
                $new = $_POST['newproduct'];
                $deleted = $_POST['deletedproduct'];
                $image = $_FILES["hinh"]["error"] == 0 ? $_FILES["hinh"]["name"] : "";

                // get data from Model
                $getUrlType = $model->getUrlType($idType);
                $insertProduct = $model->insertProduct(
                    $name,
                    $size,
                    $price,
                    $promtPrice,
                    $checkIdUrl,
                    $detail,
                    $detailPromt,
                    $idType,
                    $status,
                    $new,
                    $deleted,
                    $image
                );

                //check insert exist
                if ($insertProduct) {
                    if ($_FILES["hinh"]["error"] == 0) {
                        $kqa = move_uploaded_file($_FILES["hinh"]["tmp_name"],
                            "../Public/source/images/products/$image");

                    }

                    //Show message success and redirect
                    echo "<script>alert(" . MESSAGE_ADD_PRODUCT_SUCCESS .")</script>";
                    echo "<script>window.location='product.php?alias=$getUrlType->url'</script>";


                }
            }
        }

        // set title and view
        $title = TITLE_ADD_PRODUCT;
        $view = "View/v_addproduct.php";
        include(DIRECTORY_ADMIN_VIEW);
    }

    function EditProduct()
    {
        $model = new ProductModel();

        // get id product with  method GET
        $idProduct = $_GET['editproduct'];

        //get data from Model
        $getNameTypelv1 = $model->getNameTypeLv1();
        $getSize = $model->getSize();

        //check exist Product
        if ($idProduct) {
            $getProductByID = $model->getProductByID($idProduct);

            //check exist submit btn Edit.
            if (isset($_POST['btn-Edit'])) {

                // get alias product with method POST
                $url = $_POST['urlproduct'];
                $pregUrl = utf8convert($url);
                $lowerUrl = strtolower(str_replace(' ', '', $pregUrl));
                $checkIdUrl = $model->updateUrl(
                    $getProductByID->id_url,
                    $lowerUrl
                );

                // set data input from form
                $name = $_POST['nameproduct'];
                $size = $_POST['sizeproduct'];
                $price = $_POST['priceproduct'];
                $promtPrice = $_POST['promt_product'];
                $detail = $_POST['detailproduct'];
                $detailPromt = $_POST['promotion_price'];
                $idType = $_POST['typeproduct'];
                $status = $_POST['statusproduct'];
                $new = $_POST['newproduct'];
                $deleted = $_POST['deletedproduct'];
                $image = $_FILES["hinh"]["error"] == 0 ? $_FILES["hinh"]["name"] : "";

                //get function from Model.
                $getUrlType = $model->getUrlType($idType);
                $updateProduct = $model->updateProduct(
                    $getProductByID->id,
                    $name,
                    $size,
                    $price,
                    $promtPrice,
                    $getProductByID->id_url,
                    $detail,
                    $detailPromt,
                    $idType,
                    $status,
                    $new,
                    $deleted,
                    $image
                );

                // Check update Product and create directory with images.
                if ($updateProduct) {
                    if ($_FILES["hinh"]["error"] == 0) {
                        $kqa = move_uploaded_file($_FILES["hinh"]["tmp_name"],
                            "../Public/source/images/products/$image");
                    }

                    // Show messages edit success.
                    echo "<script>alert(" . MESSAGE_EDIT_PRODUCT_SUCCESS . ")</script>";
                    echo "<script>window.location='product.php?alias=$getUrlType->url'</script>";
                }
            }
        }

        //set title and view.
        $title = TITLE_EDIT_PRODUCT;
        $view = "View/v_EditProduct.php";
        include(DIRECTORY_ADMIN_VIEW);
    }
}

?>

