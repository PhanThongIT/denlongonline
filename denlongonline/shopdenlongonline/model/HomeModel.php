<?php
include_once "DBConnect.php";

class HomeModel extends DBConnect
{
    //1. function Load ảnh background cho trang Home
    function selectBackground()
    {
        $sql = "
        SELECT * FROM slide WHERE status=1
        ";
        return $this->loadMoreRows($sql);
    }

    function selectFeaturedProduct()
    {
        $sql = "SELECT p.*, u.url
                FROM products p
                INNER JOIN page_url u
                ON p.id_url = u.id
                WHERE p.status=1";
        return $this->loadMoreRows($sql);
    }

    function selectNewProduct()
    {
        $sql = "SELECT p.*, u.url
                FROM products p
                INNER JOIN page_url u
                ON p.id_url = u.id
                WHERE p.new=1
                AND status <> 1
                LIMIT 0,10";
        return $this->loadMoreRows($sql);
    }

    function selectTopSell()
    {
        $sql = "SELECT c.* , pu.url FROM products c
                INNER JOIN page_url pu
                ON c.id_url = pu.id
                WHERE  (c.promotion_price > 0)  
                ORDER BY (c.price - c.promotion_price) DESC
                LIMIT 0,3";
        return $this->loadMoreRows($sql);
    }

}

?>