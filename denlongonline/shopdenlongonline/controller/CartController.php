<?php
/**
 * Created by PhpStorm.
 * User: Phan Thông  IT
 * Date: 2018-07-06
 * Time: 2:55 AM
 */
include_once 'Controller.php';
include_once 'helper/Cart/Cart.php';
session_start();
class CartController extends Controller
{
    function loadOldCart()
    {
        //function LoadOldcart có chức năng load tất cả các sản phẩm đã  mua trước đó vào giỏ hàng
        // Kiểm tra dựa vào session
            $oldCart = isset($_SESSION['cart']) ? $_SESSION['cart'] : null ;
            $cart = new Cart($oldCart) ;
          return $this->loadView('cart' , $cart , "Giỏ Hàng");
    }
}

?>