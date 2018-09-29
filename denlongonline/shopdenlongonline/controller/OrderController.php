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
include_once 'helper/mailer/MailCheckout.php';
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
                    if (!$saveBillDetail)
                    {
                        // nếu không có sane phẩm thì xóa Bill và xóa Khách hàng
                        $model->deleteCustomer($idCustomer);
                        $model->deleteBill($saveBill);
                        $model->deleteBillDetail($saveBill);
                        echo "<script>alert('LƯU ĐƠN HÀNG THẤT BẠI ')</script>";
                        echo "<script>window.location='checkout.php'</script>";
                        return;
                    }
                }
                // send mail kèm 1 token adtive lên gmail
                // tạo ra 1 đường dẫn trên url
                $linkActive = "http://localhost:8080/denlongonline/denlongonline/shopdenlongonline/$token/$token_date";
                $subject    = "XÁC NHẬN ĐƠN HÀNG - DH000$saveBill";
                $content    = "<did>Chào bạn, $name!</did>
                            <div>SỰ HÀI LÒNG CỦA BẠN LÀ DANH DỰ CỦA CHÚNG TÔI - SHOP ĐÈN LỒNG ONLINE</b>.
                            <br></div>
                            <div>Thời gian đặt mua hàng :$date_Order</b>.
                            <br></div>
                            <div>Cảm ơn bạn đã đặt hàng, tổng tiền thanh toán là: <b>" . number_format($promt_price) . " vnđ</b>.
                            <br></div>
                            <div>Vui lòng chọn vào <a href='$linkActive'>đây</a> để xác nhận đơn hàng.</div>";

                // Gọi mailcheckout để send mail lên cho người  mua

                sendMail($email, $name, $subject, $content);
                unset($_SESSION['cart']);
                echo "<script>alert('GỬI THÀNH CÔNG ! VUI LÒNG XÁC NHẬN ĐƠN HÀNG ')</script>";
                echo "<script>window.location='order.php'</script>";
                return;

            }
            else
            {
                // Nếu k tồn tại idBill thì xóa  khách hàng
                $model->deleteCustomer($idCustomer);
                echo "<script>alert('XÁC NHẬN ĐƠN HÀNG THẤT BẠI ')</script>";
                echo "<script>window.location='order.php'</script>";
                return;
            }
        }
        else
        {
            echo "<script>alert('XÁC NHẬN ĐƠN HÀNG THẤT BẠI ')</script>";
            echo "<script>window.location='order.php'</script>";
            return;
        }
    }

    function ActiveOrder()
    {
        $token   = $_GET['token'];
        $oldTime = $_GET['time'];
        $nowTime = strtotime(date('Y-m-d H:i:s', time()));
        if ($nowTime - $oldTime <= 86400 * 3)
        {
            $model = new OrderModel();
            $bill  = $model->findBillByToken($token);
            if ($bill)
            {
                //update status
                //print_r($bill);die;
                $model->updateStatusBill($bill->id);
               // $_SESSION['success'] = "Cảm ơn bạn đã xác nhận, chúng tôi sẽ liên lạc trong ít phút";
                echo "<script>alert('CẢM ƠN BẠN ĐÃ XÁC NHẬN ĐƠN HÀNG ! SHOP ĐÈN LỒNG ONLINE SẼ LIÊN HỆ VỚI BẠN ')</script>";
               // echo "<script>window.location='http://localhost:81/denlongonline/shopdenlongonline/order.php'</script>";
                return;
            }
            else
            {
                echo "<script>alert('XÁC NHẬn ĐƠN HÀNG LỖI ! VUI LÒNG KIỂM TRA ')</script>";
               // echo "<script>window.location='http://localhost:81/denlongonline/shopdenlongonline/order.php'</script>";
                return;
            }
        }
        else
        {
            echo "<script>alert('QUÁ THỜI GIAN XÁC NHẬN ĐƠN HÀNG  ')</script>";
       //echo "<script>window.location='http://localhost:81/denlongonline/shopdenlongonline/order.php'</script>";
            return;
        }
        header("location:http://localhost:81/denlongonline/shopdenlongonline/order.php");
    }


}

?>

