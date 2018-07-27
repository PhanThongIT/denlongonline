<?php
/**
 * Created by PhpStorm.
 * User: Phan Thông  IT
 * Date: 2018-07-27
 * Time: 8:27 PM
 */
include_once "Model/CustomerModel.php";

class CustomerController
{
    function getListCustomer()
    {
        $model           = new CustomerModel();
        $getListCustomer = $model->getListCustomer();
        // print_r($getListCustomer);die;
        $title = "DANH SÁCH KHÁCH HÀNG";
        $view  = "View/v_list-Customer.php";
        include('include/admin.view.php');
    }

    function deleteCustomer()
    {
        $idCustomer   = $_POST['idCustomer'];
        $nameCustomer = $_POST['nameCustomer'];
//        echo $nameCustomer;die;
        $model          = new CustomerModel();
        $deleteCustomer = $model->deleteCustomer($idCustomer);
        if ($deleteCustomer)
        {
//                echo json_encode(array([
//                    'status'=>"CẬP NHẬT TRẠNG THÁI XÓA KHÁCH HÀNG THÀNH CÔNG   "
//                ]));
            echo json_encode([
                'status' => "CẬP NHẬT XÓA KHÁCH HÀNG " . $nameCustomer . " THÀNH CÔNG"
            ]);
        }
        else
        {
            echo json_encode([
                'status' => "CẬP NHẬT XÓA KHÁCH HÀNG " . $nameCustomer . "THẤT BẠI"
            ]);
        }
//        $view = "View/v_list-Customer.php";
//        include('include/admin.view.php');
    }

    function rollBackCustomer()
    {
        $idCustomer   = $_POST['idCustomer'];
        $nameCustomer = $_POST['nameCustomer'];
//        echo $nameCustomer;die;
        $model          = new CustomerModel();
        $deleteCustomer = $model->rollBackCustomer($idCustomer);
        if ($deleteCustomer)
        {
            echo json_encode([
                'status' => "KHÔI PHỤC XÓA KHÁCH HÀNG " . $nameCustomer . " THÀNH CÔNG"
            ]);
        }
        else
        {
            echo json_encode([
                'status' => "KHÔI PHỤC XÓA KHÁCH HÀNG " . $nameCustomer . "THẤT BẠI"
            ]);
        }
    }

    function getListDeleteCustomer()
    {
        $model           = new CustomerModel();
        $getListCustomer = $model->getListCustomerDel();
        // print_r($getListCustomer);die;
        $title = "DANH SÁCH KHÁCH HÀNG";
        $view  = "View/v_list-delete-customer.php";
        include('include/admin.view.php');
    }
    function addCustomer(){

    }
}

?>