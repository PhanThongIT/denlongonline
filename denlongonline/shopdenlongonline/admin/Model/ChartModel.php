<?php
/**
 * Created by PhpStorm.
 * User: Phan Thông  IT
 * Date: 2018-08-02
 * Time: 1:41 PM
 */
include "DBConnect.php";

class ChartModel extends DBConnect
{
    function selectAllProduct()
    {
        $sql = "
        select COUNT(products.id) as soluong
        from products
        ";
        return $this->loadOneRow($sql);
    }

    function selectSpecialProduct()
    {
        $sql = "
        SELECT count(products.id) as soluongSpecial FROM `products` WHERE status=1
        ";
        return $this->loadOneRow($sql);
    }

    function selectSaleProduct()
    {
        $sql = "
      SELECT count(products.id) as soluongSale FROM `products` WHERE promotion_price>0
        ";
        return $this->loadOneRow($sql);
    }

    function selectNewProduct()
    {
        $sql = "
      SELECT count(products.id) as soluongNew FROM `products` WHERE new=1
        ";
        return $this->loadOneRow($sql);
    }

    function selectTopSale()
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

    function getAllQuantityPro()
    {
        $sql = "
        select sum(bill_detail.quantity) as allPro
      from   bill_detail
        ";
        return $this->loadOneRow($sql);
    }

    function selectTopPrice()
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

    function getAllPrice()
    {
        $sql = "
        select sum(bill_detail.price) as allPrice
      from   bill_detail
        ";
        return $this->loadOneRow($sql);
    }
}


?>