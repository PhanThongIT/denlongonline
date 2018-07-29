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

    function findEmail($email)
    {
        $sql = "select customers.* 
            from customers 
            where customers.email = '$email'";
        return $this->loadOneRow($sql);
    }

    function insertCustomer($name, $gender, $email, $address, $phone, $note)
    {
        $sql = "
        INSERT INTO customers (name, gender, email,address , phone, note , status)
        VALUES ('$name','$gender','$email','$address','$phone','$note',0);
        ";
        return $this->executeQuery($sql);
    }

    function findCustomer($id)
    {
        $sql = "
        SELECT customers.*  
        from customers
        where  customers.id = $id
        ";
        return $this->loadOneRow($sql);
    }

    function updateCustomer($id, $name, $gender, $email, $address, $phone, $note)
    {
        $sql = "
        UPDATE customers
        SET name = '$name', gender = '$gender', email = '$email',address= '$address', phone= '$phone',note= '$note', status =0 
        WHERE id = $id; 
";
        return $this->executeQuery($sql);
    }
}

?>