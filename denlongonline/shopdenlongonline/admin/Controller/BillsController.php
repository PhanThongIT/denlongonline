<?php
@session_start();

include_once 'Model/BillsModel.php';
include_once 'Model/CategoriesModel.php';
include_once "Helper/constants.php";

/**
 * Class BillsController
 */
class BillsController
{

    /**
     * function get Bill with table: Bills and DetailBills
     */
    function getBillsByStatus()
    {
        //get data from form
        $idStatus = $_GET['status'];

        // get function with Model
        $model = new BillsModel();
        $getBillStatus = $model->selectBillByStatus($idStatus);

        //set title and view.
        $title = TITLE_LIST_BILLS;
        $view = "View/v_bills.php";
        include(DIRECTORY_ADMIN_VIEW);

    }

    /**
     * function get Update status bills
     */
    function getUpdateBill()
    {
        // get data from form
        $status = $_POST['statusGiaoHang'];
        $idBill = $_POST['idbill'];

        // get function with  Model
        $model = new BillsModel();
        $getUpdateStatus = $model->updateStatusByIdBill($idBill, $status);

        // Check Exist Bills and show messages
        if ($idBill != false) {
            if ($getUpdateStatus) {
                echo json_encode([
                    'status' => MESSAGE_BILL_UPDATE_SUCCESS,
                ]);
            } else {
                echo json_encode([
                    'status' => MESSAGE_BILL_UPDATE_FAIL,
                ]);
            }
        }
    }

    /**
     * function cancel Bills with Orders fail
     */
    function cancelBill()
    {
        // get data from from with  method POST
        $status = $_POST['statusHuy'];
        $idBill = $_POST['idbill'];

        // get function from Model
        $model = new BillsModel();
        $getUpdateStatus = $model->updateStatusByIdBill($idBill, $status);

        //Check Exist Bills and show messages
        if ($idBill != false) {
            if ($getUpdateStatus) {
                echo json_encode([
                    'status' => MESSAGE_BILL_CANCEL_SUCCESS,
                ]);
            } else {
                echo json_encode([
                    'status' => MESSAGE_BILL_CANCEL_FAIL,
                ]);
            }
        }
    }

    /**
     * function get list detail products
     */
    function getDetailBillByIDBill()
    {
        // get data from form
        $idBill = $_GET['idBill'];

        // get function from Model
        $model = new BillsModel();
        $getBillByID = $model->selectDetailBill($idBill);
        $getBill = $model->selectBill($idBill);

        //set title and view.
        $title = TITLE_DETAIL_BILLS;
        $view = "View/v_detailbills.php";
        include(DIRECTORY_ADMIN_VIEW);
    }
}

?>