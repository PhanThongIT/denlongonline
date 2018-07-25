<?php
/**
 * Created by PhpStorm.
 * User: Phan Thông  IT
 * Date: 2018-07-23
 * Time: 10:53 PM
 */
include_once 'DBConnect.php';
class BillsModel extends DBConnect{
    function selectBillByStatus($status){
        $sql="
        select DISTINCT bills.* , customers.name as fullname,customers.phone
        from bill_detail , bills , customers 
        where customers.id = bills.id_customer AND bills.id = bill_detail.id_bill 
        AND  bills.status =$status
        ORDER by bills.id DESC
        ";
        return $this->loadMoreRows($sql);
    }
    function selectDetailBill($idBill){
        $sql = "
        select products.* , bill_detail.id_bill,bill_detail.quantity,size.name_size , size.note as noteSize
        from   bill_detail , bills , products,size
        where   bills.id =$idBill AND bill_detail.id_bill=bills.id AND products.id= bill_detail.id_product AND size.id_size = products.size
        ORDER by  bill_detail.quantity DESC
        ";
        return $this->loadMoreRows($sql);
    }
    function selectBill($idBill){
        $sql="select DISTINCT bills.* , customers.name as fullname,customers.phone
        from bill_detail , bills , customers 
        where customers.id = bills.id_customer AND bills.id = bill_detail.id_bill 
        AND  bills.id =$idBill";
        return  $this->loadOneRow($sql);

    }
    function updateStatusByIdBill($idBill,$status){
        $sql  ="
            UPDATE bills
            SET bills.status = $status 
            WHERE bills.id = $idBill
        ";
        return $this->executeQuery($sql);
    }
}

?>

