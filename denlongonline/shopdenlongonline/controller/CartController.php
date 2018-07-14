<?php
/**
 * Created by PhpStorm.
 * User: Phan Thông  IT
 * Date: 2018-07-06
 * Time: 2:55 AM
 */
include_once 'Controller.php';
include_once 'helper/Cart/Cart.php';
include_once 'model/DetailModel.php';
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
    //function add Product  vào giỏ hàng
    function addProduct_To_Cart(){

        // Nhận id của sản phẩm bằng phương thức POST
       $idProduct = $_POST['id_Cart_Product'];
        // Truy vấn dữ liệu dựa vào id của sản phẩm
        // kiểm tra xem số lượng
        $soluong  = isset($_POST['qty']) ? (int) $_POST['qty'] : 1;
        $model = new DetailModel();
        $product = $model->findProductByID($idProduct);
      // var_dump($product);die;
        // Kiểm tra xem giỏ hàng có sản phẩm chưa ?
        $oldCart = isset($_POST['cart']) ? $_POST['cart'] : null ;
        // Khởi tạo giỏ hàng bằng phương thức add sản phẩm
        $cart = new Cart($oldCart) ;
        $cart->add_Item_Cart($product,$soluong);
        // Khởi tạo session cart
        $_SESSION['cart'] = $cart;
       // var_dump( $_SESSION['cart']);die;
        echo $cart->items[$idProduct]['item']->name;
        echo "</br>";

        echo " Kích Thước : Size " ;
        echo $cart->items[$idProduct]['item']->name_size;
        echo "</br>";
        if($cart->items[$idProduct]['item']->promotion_price != 0)
        {
            echo " Giá bán : ";
            echo $cart->items[$idProduct]['item']->promotion_price;
            echo "(VNĐ)";
        }else{
            echo " Giá bán: ";
            echo $cart->items[$idProduct]['item']->price;
            echo "    (VNĐ)";
        }


    }
}

?>