<?php
/**
 * Created by PhpStorm.
 * User: Phan Thông  IT
 * Date: 2018-07-25
 * Time: 4:26 AM
 */
include_once 'DBConnect.php' ;
class CategoriesModel extends DBConnect{
    function getMenu(){
        $sql = "SELECT c1.name as name1, p.url as url1,  GROUP_CONCAT( c2.name,'::', c2.url) as level2
                FROM categories c1 
                LEFT JOIN (
                    SELECT c.* ,po.url
                    FROM categories c
                    INNER JOIN page_url po 
                    ON po.id = c.id_url 
                    WHERE c.id_parent IS NOT NULL ) c2
                    ON c1.id = c2.id_parent
                    INNER JOIN page_url p
                    ON p.id = c1.id_url
                     WHERE c1.id_parent is NULL
                    GROUP BY c1.id";
        return $this->loadMoreRows($sql);
    }
    function selectMenuParent(){
        $sql = "
        select categories.* 
        from categories
        where categories.id_parent is null
        ";
        return  $this->loadMoreRows($sql);
    }
   function loadMenuType(){
       $sql = "
        select categories.* ,page_url.url
        from categories,page_url
        where categories.id_url = page_url.id AND categories.id_parent is not null
        ";
       return  $this->loadMoreRows($sql);
   }
   function insertCate($nameCate , $idParent , $url){
        $sql  ="
        INSERT INTO categories(id_parent , name , id_url ,icon)
        VALUES ($idParent,'$nameCate','$url',NULL);
        ";
        return $this->executeQuery($sql);
   }
   function loadCate($idCate){
     $sql=" select categories.* 
        from categories
        where categories.id = $idCate" ;
     return $this->loadOneRow($sql);
   }
   function updateCate($idCate,$name , $id_url){
        $sql  ="
        UPDATE categories
        SET id_parent=NULL,name = '$name',id_url = '$id_url',icon=NULL
        WHERE id = $idCate ;
        ";
        return $this->executeQuery($sql);
   }
    function updateCateLevel2($idCate,$name , $id_url,$idparent){
        $sql  ="
        UPDATE categories
        SET id_parent=$idparent,name = '$name',id_url = '$id_url',icon=NULL
        WHERE id = $idCate ;
        ";
        return $this->executeQuery($sql);
    }
    function getNameUrlType($idType){
        $sql ="
        select page_url.url
        from  categories,page_url 
        WHERE page_url.id = categories.id_url AND categories.id = $idType
        ";
        return $this->loadOneRow($sql);
    }
}
