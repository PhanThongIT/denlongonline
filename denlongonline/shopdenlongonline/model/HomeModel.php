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

    function select_DenLongHoiAn()
    {
        $sql = "SELECT products.* , page_url.url
        FROM  products , page_url 
        WHERE products.id_url = page_url.id
        GROUP BY products.price DESC
        LIMIT 0,3
    ";
        return $this->loadMoreRows($sql);
    }

    function selectTopProduct()
    {
        $sql = "
        SELECT p.*, u.url, sum(d.quantity) as qty
                FROM products p 
                INNER JOIN bill_detail d 
                ON p.id = d.id_product
                INNER JOIN page_url u 
                ON u.id = p.id_url
                GROUP BY d.id_product
                ORDER BY qty DESC
              
        ";
        return $this->loadMoreRows($sql);
    }

}

?>