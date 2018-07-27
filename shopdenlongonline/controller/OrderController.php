<?php
/**
 * Created by PhpStorm.
 * User: Phan Thông  IT
 * Date: 2018-07-20
 * Time: 2:38 AM
 */
include_once 'model/OrderModel.php';
include_once 'Controller.php';
include_once 'helper/Cart/Cart.php';
include_once 'helper/token/CreateToken.php';
session_start();

class OrderController extends Controller
{
    // function load View  order
    function loadViewOrder()
    {
        return $this->loadView('order', [], "Đặt hàng ");
    }

    // function Đặt hàng
    function checkOrder()
    {
        // Nhận các giá trị từ form
        $name    = $_POST['name'];
        $gender  = $_POST['gender'];
        $email   = $_POST['email'];
        $address = $_POST['address'];
        $phone   = $_POST['phone'];
        $note    = $_POST['note'];
        // INSERT Vào bảng Customers
        $model = new OrderModel();

        $idCustomer = $model->saveCustomer($name, $gender, $email, $address, $phone, $note);
        //kiểm tra xem id này có mua hàng hay không ?
        if ($idCustomer)
        {
            $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : null; //  Bật session_start() lên .
//            print_r($cart);die;
            if ($cart == null)
            {
                header('location:index.php');
                return;
            }
            // Liên kết bảng Customer với Bills qua idCustomer . INSERT  Vào bảng Bills
            //Lưu vào bảng Bills (idCustomer , date_Order ,promt_price, total_price , payment_method,note, token ,token_date,status
            $date_Order     = date('y-m-d', time()); // date_Order
            $promt_price    = $cart->totalPromtionPrice;
            $total_price    = $cart->totalPrice;
            $payment_method = "";
            $note           = "";
            $token          = create_Token();
            $token_date     = strtotime(date('Y-m-d H:i:s', time()));
            $status         = 0;
            // Thực hiện phương thức saveBills
            $saveBill = $model->saveBill($idCustomer, $date_Order, $promt_price, $total_price, $payment_method, $note, $token, $token_date, $status);
            // kiểm tra dữu liệu trả về saveBills (true, false) nếu đúng thì in ra list billDetail
            if ($saveBill)
            {
                // kiểm tra trong bill này có sản phẩm hay không ?
                // INSERT vào bảng bill_Detail ( id_bill , id_product,quantity ,price )
                foreach ($cart->items as $id => $detail_bill)
                {
                    $id_product = $id;
                    // echo $id_product;
                    $quantity = $detail_bill['qty'];
                    $price    = $detail_bill['discountPrice'];
                    // Lưu vào bảng bill_detail
                    $saveBillDetail = $model->saveDetailBills($saveBill, $id_product, $quantity, $price); // trả về true or false;
                    // kiểm tra giá trị trả về
                    //  Nếu k tồn tại thì xóa đơn hàng
                    if(!$saveBillDetail){
                        // nếu không có sane phẩm thì ROLLBACK lại

                    }


                }
            }


        }
    }

}

?>

