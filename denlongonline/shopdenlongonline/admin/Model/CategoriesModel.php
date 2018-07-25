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
        $sql ="
        SELECT c1.name as name1, p.url as url1,  GROUP_CONCAT( c2.name,'::', c2.url) as level2
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
                GROUP BY c1.id
        ";
        return $this->loadMoreRows($sql);
    }
}
