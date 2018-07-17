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
            $cart = new Cart($oldCart);
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
        $oldCart = isset($_SESSION['cart']) ? $_SESSION['cart'] : null ;
        // Khởi tạo giỏ hàng bằng phương thức add sản phẩm
        $cart = new Cart($oldCart) ;
//        var_dump($cart);die;
        $cart->add_Item_Cart($product,$soluong);
        // Khởi tạo session cart
        $_SESSION['cart'] = $cart;

       // var_dump( $_SESSION['cart']);die;
        echo $cart->items[$idProduct]['item']->name;
        echo "</br>";

        echo " Kích Thước : Size " ;
        echo $cart->items[$idProduct]['item']->name_size;
        echo "</br>";
        if($soluong > 1){
            echo " Số lượng : ".$soluong ;
            echo "</br>";
        }
        if($cart->items[$idProduct]['item']->promotion_price != 0  )
        {
            echo " Giá bán Lẻ : ";
            echo $cart->items[$idProduct]['item']->promotion_price;
            echo "(VNĐ)";
        }else{
            echo " Giá bán Lẻ: ";
            echo $cart->items[$idProduct]['item']->price;
            echo "    (VNĐ)";
        }
    }
    function remove_Item_Cart(){
        // Lấy id của item cần xóa
        $idProduct = $_POST['idProduct'];
        // kiểm tra xem giỏ hàng tồn tại chưa
        $oldCart = isset($_SESSION['cart']) ? $_SESSION['cart'] : null;
        // Load sản phẩm củ
        $cart = new Cart($oldCart); // Khởi tạo giỏ hàng với các sản phẩm củ
        // THực hiện việc xóa Product khỏi giỏ hàng
        $cart->delete_Product($idProduct);
        $_SESSION['cart'] = $cart; //  Tạo SESSION  cho giỏ hàng
        // Chuyển thành JSON để cập nhật lại giỏ hàng
      echo  json_encode([
            'qty'=>$cart->totalQty,
            'price'=>number_format($cart->totalPrice),
            'totalPromt_Price'=>number_format($cart->totalPromtionPrice)
            ]);
       // print_r($_SESSION['cart']);

    }
}

?>