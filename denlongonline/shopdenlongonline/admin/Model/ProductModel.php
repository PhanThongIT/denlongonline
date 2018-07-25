<?php
/**
 * Created by PhpStorm.
 * User: Phan Thông  IT
 * Date: 2018-07-25
 * Time: 6:07 AM
 */
include_once 'DBConnect.php';

class ProductModel extends DBConnect
{
    function select_Menu_productlv1($alias)
    {
        $sql = "SELECT p.* , u.url
                FROM products p 
                INNER JOIN page_url u 
                ON u.id = p.id_url
                WHERE p.id_type = (
                    SELECT c.id 
                    FROM categories c 
                    INNER JOIN page_url u 
                    ON c.id_url = u.id
                    WHERE u.url = '$alias')
    ";
//        if($position >= 0 &&  $qty>=0){
//            $sql.=" LIMIT $position ,$qty";
//        }
        return $this->loadMoreRows($sql);

    }
}

?>