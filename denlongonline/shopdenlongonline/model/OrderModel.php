<?php
/**
 * Created by PhpStorm.
 * User: Phan Thông  IT
 * Date: 2018-07-20
 * Time: 2:37 AM
 */
include_once 'DBConnect.php';
class OrderModel extends DBConnect{
    //function chức năng thêm dữ liệu vào bảng Customer
    function saveCustomer($name, $gender , $email , $address, $phone ,$note){
        $sql ="INSERT  INTO  customers(name , gender ,email , address,phone , note)
                VALUES ('$name','$gender','$email','$address','$phone','$note')";
        $execute = $this->executeQuery($sql); // trả về true or false
        return $execute ? $this->getLastId() : false;

    }
    function saveBill($id_customer, $date_order , $promt_price,$total ,$payment_method, $note, $token , $token_date, $status){
        $sql = "INSERT  INTO  bills(id_customer ,date_order, promt_price,total,payment_method,note, token,token_date,status)
        VALUES  ('$id_customer','$date_order','$promt_price','$total','$payment_method','$note','$token','$token_date','$status')";
        $execute = $this->executeQuery($sql);
        return $execute ? $this->getLastId() : false;
    }
    function saveDetailBills($id_bill,$id_product , $quantity ,$price){
        $sql="INSERT INTO bill_detail(id_bill, 	id_product ,quantity  , price )
              VALUES ('$id_bill','$id_product','$quantity','$price')";
        $execute = $this->executeQuery($sql);
        return  $execute ? $this->getLastId() : false;
    }
    function deleteCustomer($idCustomer){
        $sql = "DELETE FROM customers
                WHERE id = $idCustomer ";
        return $this->executeQuery($sql);
    }
}
?>

