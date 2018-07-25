<?php
/**
 * Created by PhpStorm.
 * User: Phan Thông  IT
 * Date: 2018-07-23
 * Time: 10:53 PM
 */
@session_start();
include_once 'Model/BillsModel.php';

class BillsController
{
    function getBillsByStatus()
    {
        $idStatus = $_GET['status'];

//        echo $idBill;die;
        $model         = new BillsModel();
        $getBillStatus = $model->selectBillByStatus($idStatus);


        $title = "Quản Lý Đơn Hàng";
        $view  = "View/v_bills.php";
        include('include/admin.view.php');
    }

    function getUpdateBill()
    {

        $status          = $_POST['statusGiaoHang'];
        $idBill          = $_POST['idbill'];
        $model           = new BillsModel();
        $getUpdateStatus = $model->updateStatusByIdBill($idBill, $status);
        if ($idBill != false)
        {
            if ($getUpdateStatus)
            {
                echo json_encode([
                    'status' => "CẬP NHẬT TRẠNG THÁI GIAO HÀNG THÀNH CÔNG",
                ]);
            }
            else
            {
                echo json_encode([
                    'status' => "THẤT BẠI KHI CẬP NHẬT",
                ]);
            }
        }
    }

    function cancelBill()
    {
        $status          = $_POST['statusHuy'];
        $idBill          = $_POST['idbill'];
        $model           = new BillsModel();
        $getUpdateStatus = $model->updateStatusByIdBill($idBill, $status);
        if ($idBill != false)
        {
            if ($getUpdateStatus)
            {
                echo json_encode([
                    'status' => "HỦY ĐƠN HÀNG THÀNH CÔNG ",
                ]);
            }
            else
            {
                echo json_encode([
                    'status' => "HỦY ĐƠN HÀNG THẤT BẠI ",
                ]);
            }
        }
    }

    function getDetailBillByIDBill()
    {
        $idBill      = $_GET['idBill'];
        $model       = new BillsModel();
        $getBillByID = $model->selectDetailBill($idBill);
        $getBill     = $model->selectBill($idBill);


//       print_r($getBillByID);die;
        $title = "Chi Tiết Đơn hàng";
        $view  = "View/v_detailbills.php";
        include('include/admin.view.php');
    }
}

?>