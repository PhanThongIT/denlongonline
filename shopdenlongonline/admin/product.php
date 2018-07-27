<?php
/**
 * Created by PhpStorm.
 * User: Phan Thông  IT
 * Date: 2018-07-25
 * Time: 6:07 AM
 */
include_once 'Controller/ProductController.php';

$view = new ProductController();
if(isset($_GET['alias'])){
    $view->getProductByType();
}
?>

