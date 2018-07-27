<?php
/**
 * Created by PhpStorm.
 * User: Phan Thông  IT
 * Date: 2018-07-27
 * Time: 8:28 PM
 */
include "DBConnect.php";

class CustomerModel extends DBConnect
{
    function getListCustomer()
    {
        $sql = "
            select customers.*
            from customers
            where customers.status = 0
";
        return $this->loadMoreRows($sql);
    }
    function getListCustomerDel()
    {
        $sql = "
            select customers.*
            from customers
            where customers.status = 1
";
        return $this->loadMoreRows($sql);
    }

    function deleteCustomer($id)
    {
        $sql = "
        UPDATE customers
    SET customers.status =1
    WHERE customers.id = $id 
        ";
        return $this->executeQuery($sql);
    }

    function rollBackCustomer($id)
    {
        $sql = "
        UPDATE customers
    SET customers.status =0
    WHERE customers.id = $id 
        ";
        return $this->executeQuery($sql);
    }
}

?>