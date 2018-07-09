<?php
/**
 * Created by PhpStorm.
 * User: Phan Thông  IT
 * Date: 2018-06-20
 * Time: 4:49 PM
 */
include_once 'DBConnect.php';

class TypeModel extends DBConnect
{
    function select_Menu_productlv1($alias, $position =0 , $qty = 9 )
    {
        $sql = "SELECT p.*,pu.url FROM products p
                INNER JOIN  page_url pu
                ON  p.id_url = pu.id
                WHERE p.id_type IN (
                    SELECT ca.id
                    FROM categories ca
                    WHERE ca.id_parent = (
                        SELECT c.id
                        FROM  categories c
                        INNER JOIN page_url ppu
                        ON ppu.id = c.id_url
                        WHERE ppu.url='$alias' ))
    ";
        if($position >= 0 &&  $qty>=0){
            $sql.=" LIMIT $position ,$qty";
        }
        return $this->loadMoreRows($sql);

    }
    function select_Menu_productlv2($alias  , $position = 0 , $qty = 9){
        $sql  = "SELECT p.* , u.url
                FROM products p 
                INNER JOIN page_url u 
                ON u.id = p.id_url
                WHERE p.id_type = (
                    SELECT c.id 
                    FROM categories c 
                    INNER JOIN page_url u 
                    ON c.id_url = u.id
                    WHERE u.url = '$alias')";

        if($position >= 0 &&  $qty > 0 ){
            $sql.=" LIMIT $position , $qty ";
        }
        return $this->loadMoreRows($sql);

    }
    function getNameMenu($alias){
        $sql = "SELECT cate.*, pu.url
                FROM categories cate
                INNER JOIN page_url pu  
                ON  cate.id_url = pu.id
                WHERE pu.url = '$alias'";
            return  $this->loadOneRow($sql);
    }
    function select_Slider(){
        $sql = "SELECT * FROM slide WHERE status=0";
       return $this->loadMoreRows($sql);
    }
    function selectAllType(){
        $sql = "
        SELECT COUNT(p.id) as soluong , c.name,pu.url
                FROM products p
                INNER JOIN categories c
                ON p.id_type = c.id
                INNER JOIN page_url pu 
                ON pu.id = c.id_url
                GROUP BY c.id
        ";
        return $this->loadMoreRows($sql) ;
    }
    function select_AllSize(){
        $sql = "SELECT  COUNT(products.id)  as soluong ,size.* 
                FROM size ,  products 
                WHERE  products.size = size.id_size
                GROUP by  size.id_size";
        return $this->loadMoreRows($sql);
    }

    function Filter_Size($id_Size){
        $sql  ="SELECT products.* , size.*, page_url.url
        FROM products , size,page_url
        WHERE products.size = size.id_size AND size.id_size = $id_Size
         AND  page_url.id = products.id_url
        ";
        return $this->loadMoreRows($sql);
    }
    function select_WrapperProduct(){
        $sql = "
        SELECT products.* , size.* , page_url.url
        FROM products , size , page_url 
        WHERE products.id_url = page_url.id AND products.size= size.id_size AND products.new =1 AND products.status = 1
        ORDER BY products.price DESC 
        LIMIT 0,5
        ";
        return $this->loadMoreRows($sql);
    }
}

?>