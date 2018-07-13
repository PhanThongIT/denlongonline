<?php
/**
 * Created by PhpStorm.
 * User: Phan Thông  IT
 * Date: 2018-06-20
 * Time: 4:34 PM
 */
include_once 'DBConnect.php';

class DetailModel extends DBConnect
{
    function getDetail_Product($alias, $id)
    {
        $sql = " SELECT p.*  , pu.url
            FROM products p 
            INNER JOIN page_url pu 
            ON pu.id = p.id_url 
            WHERE pu.url ='$alias' 
            AND p.id = $id";
        return $this->loadOneRow($sql);

    }

    function getRelated_Product($idType, $id)
    {
        // Sản phẩm  khác liên quán tới sản phẩm đã chọn
        $sql = "SELECT p.*  , pu.url
                FROM products p 
                INNER JOIN page_url pu 
                ON pu.id = p.id_url 
                WHERE  p.id_type = $idType
                AND p.id != $id ";
        return $this->loadMoreRows($sql);
    }
    function findProductByID($idProduct){
        $sql ="SELECT products.*  ,  size.name_size ,page_url.url
                FROM products , size,page_url 
                WHERE  products.size = size.id_size AND products.id = $idProduct AND page_url.id =  products.id_url";
        return $this->loadOneRow($sql);
    }
}

?>