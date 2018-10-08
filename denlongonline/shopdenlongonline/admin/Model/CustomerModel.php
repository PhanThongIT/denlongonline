<?php
/**
 * Created by PhpStorm.
 * User: Phan Thông  IT
 * Date: 2018-07-27
 * Time: 8:28 PM
 */
include "DBConnect.php";
include_once "Helper/constants.php";

/**
 * Class CustomerModel
 */
class CustomerModel extends DBConnect
{

    /**
     * @return array|bool
     */
    function getListCustomer()
    {
        $sql = "
            select customers.*
            from customers
            where customers.status = 0
            ";

        return $this->loadMoreRows($sql);
    }

    /**
     * @return array|bool
     */
    function getListCustomerDel()
    {
        $sql = "
            select customers.*
            from customers
            where customers.status = 1
            ";

        return $this->loadMoreRows($sql);
    }

    /**
     * @param $id
     * @return bool
     */
    function deleteCustomer($id)
    {
        $sql = "
            UPDATE customers
            SET customers.status =1
            WHERE customers.id = $id 
        ";

        return $this->executeQuery($sql);
    }

    /**
     * @param $id
     * @return bool
     */
    function rollBackCustomer($id)
    {
        $sql = "
            UPDATE customers
            SET customers.status =0
            WHERE customers.id = $id 
        ";

        return $this->executeQuery($sql);
    }

    /**
     * @param $email
     * @return bool|mixed
     */
    function findEmail($email)
    {
        $sql = "
            select customers.* 
            from customers 
            where customers.email = '$email'
            ";

        return $this->loadOneRow($sql);
    }

    /**
     * @param $name
     * @param $gender
     * @param $email
     * @param $address
     * @param $phone
     * @param $note
     *
     * @return bool
     */
    function insertCustomer(
        $name,
        $gender,
        $email,
        $address,
        $phone,
        $note
    )
    {

        //set default customers is not delete with flag
        $deleteFlag = DELETE_FLAG_OFF;

        // queries string.
        $sql = "
        INSERT INTO customers (
         name,
         gender, 
         email, 
         address, 
         phone, 
         note , 
         status
         )
        VALUES (
        '$name', 
        '$gender', 
        '$email', 
        '$address',
        '$phone',
        '$note',
        $deleteFlag
        );
        ";

        return $this->executeQuery($sql);
    }

    /**
     * @param $id
     * @return bool|mixed
     */
    function findCustomer($id)
    {
        $sql = "
        SELECT customers.*  
        from customers
        where  customers.id = $id
        ";

        return $this->loadOneRow($sql);
    }

    /**
     * @param $id
     * @param $name
     * @param $gender
     * @param $email
     * @param $address
     * @param $phone
     * @param $note
     *
     * @return bool
     */
    function updateCustomer(
        $id,
        $name,
        $gender,
        $email,
        $address,
        $phone,
        $note
    )
    {
        // set delete flag is OFF\
        $flagDelete = DELETE_FLAG_OFF;

        $sql = "
        UPDATE customers
        SET 
            name = '$name',
            gender = '$gender',
            email = '$email', 
            address= '$address', 
            phone= '$phone', 
            note= '$note', 
            status = $flagDelete
        WHERE id = $id; 
";
        return $this->executeQuery($sql);
    }
}

?>