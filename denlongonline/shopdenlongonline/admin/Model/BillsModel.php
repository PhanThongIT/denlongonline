<?php
include_once 'DBConnect.php';
include_once "Helper/constants.php";

/**
 * Class BillsModel
 */
class BillsModel extends DBConnect
{

    /**
     * @param $status
     * @return array|bool
     */
    function selectBillByStatus($status)
    {
        $sql = "
        select DISTINCT bills.* , customers.name as fullname,customers.phone
        from bill_detail , bills , customers 
        where customers.id = bills.id_customer AND bills.id = bill_detail.id_bill 
        AND  bills.status =$status
        ORDER by bills.id DESC
        ";

        return $this->loadMoreRows($sql);
    }

    /**
     * @param $idBill
     * @return array|bool
     */
    function selectDetailBill($idBill)
    {
        $sql = "
        select products.* , bill_detail.id_bill,bill_detail.quantity,size.name_size , size.note as noteSize
        from   bill_detail , bills , products,size
        where   bills.id =$idBill AND bill_detail.id_bill=bills.id AND products.id= bill_detail.id_product AND size.id_size = products.size
        ORDER by  bill_detail.quantity DESC
        ";

        return $this->loadMoreRows($sql);
    }

    /**
     * @param $idBill
     * @return bool|mixed
     */
    function selectBill($idBill)
    {
        $sql = "
        select DISTINCT bills.* , customers.name as fullname,customers.phone
        from bill_detail , bills , customers 
        where customers.id = bills.id_customer 
        AND bills.id = bill_detail.id_bill 
        AND  bills.id =$idBill";

        return $this->loadOneRow($sql);

    }

    /**
     * @param $idBill
     * @param $status
     * @return bool
     */
    function updateStatusByIdBill($idBill, $status)
    {
        $sql = "
            UPDATE bills
            SET bills.status = $status 
            WHERE bills.id = $idBill
        ";
        return $this->executeQuery($sql);
    }
}

?>

