<?php

include_once 'Controller/ProductController.php';

/**
 * Routes with method GET
 */
$view = new ProductController();
if(isset($_GET['alias'])){
    $view->getProductByType();
}
?>

