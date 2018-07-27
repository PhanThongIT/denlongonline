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
                    WHERE u.url = '$alias') AND p.deleted !=1
    ";
//        if($position >= 0 &&  $qty>=0){
//            $sql.=" LIMIT $position ,$qty";
//        }
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
    function getDeleteProduct($id){
        $sql ="
             update products
            set products.deleted = 1  
            where  products.id=$id
        ";
        return $this->executeQuery($sql);
    }
    function getRollbackProduct($id){
        $sql ="
             update products
            set products.deleted = 0  
            where  products.id=$id
        ";
        return $this->executeQuery($sql);
    }

    function getListProductDelete()
    {
        $sql = "SELECT p.* , u.url
                FROM products p 
                INNER JOIN page_url u 
                ON u.id = p.id_url
                WHERE  p.deleted =1
    ";
//        if($position >= 0 &&  $qty>=0){
//            $sql.=" LIMIT $position ,$qty";
//        }
        return $this->loadMoreRows($sql);

    }
    function getNameTypeLv1(){
        $sql = "
        select categories.name , categories.id
        from  categories
        where categories.id_parent is not null
        ";
        return  $this->loadMoreRows($sql);
    }
    function getSize(){
        $sql = "
        select size.*
        from size
        ";
        return $this->loadMoreRows($sql);
    }
    function getUrlType($idType){
        $sql ="
        select page_url.url
        from  categories,page_url 
        WHERE page_url.id = categories.id_url AND categories.id = $idType
        ";
        return $this->loadOneRow($sql);
    }

    function insertUrl($url)
    {
        $sql     = "
        INSERT INTO page_url (url)
        VALUES ('$url'); 
             ";
        $execute = $this->executeQuery($sql); // trả về true or false
        return $execute ? $this->getLastId() : false;
    }
    function updateUrl($id,$url){
       $sql =" update page_url
            set page_url.url = '$url'
            where  page_url.id=$id";
       return $this->executeQuery($sql);
    }
    function insertProduct($name,$size,$price , $promt_price,$url,$detail ,$detail_promt ,$idType ,$status ,$new,$deleted, $image ){
        $sql ="
        INSERT INTO products (id_type, id_url, name, detail , price ,promotion_price,promotion ,size , image ,status , 	new  , deleted)
        VALUES ('$idType','$url','$name','$detail','$price','$promt_price','$detail_promt','$size','$image','$status','$new','$deleted'); 
        ";
        return $this->executeQuery($sql);
    }
    function updateProduct($id,$name,$size,$price , $promt_price,$url,$detail ,$detail_promt ,$idType ,$status ,$new,$deleted, $image){
        $sql = "
        UPDATE products
        SET id_type='$idType', id_url='$url', name='$name', detail='$detail' , price='$price' ,promotion_price='$promt_price',promotion='$detail_promt' ,size ='$size', image='$image' ,status ='$status', 	new='$new'  , deleted='$deleted'
        WHERE products.id=$id ; 
        ";
        return  $this->executeQuery($sql);
    }
    function getProductByID($id){
        $sql = "
        select products.*,page_url.url
        from products , categories , size , page_url
        where  products.id_type=categories.id AND products.size=size.id_size AND 
        products.id_url = page_url.id AND products.id = $id
        ";
        return $this->loadOneRow($sql);
    }
}

?>