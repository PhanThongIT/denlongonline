<?php
/**
 * Created by PhpStorm.
 * User: Phan Thông  IT
 * Date: 2018-06-30
 * Time: 4:04 PM
 */
include_once 'Controller.php';
include_once 'model/ContactModel.php';
include_once 'helper/mailer/mailer.php';
session_start();
class ContactController extends Controller{
    function loadPageContact(){
        $data= [

        ];
        return $this->loadView('contact',$data , "Liên Hệ");
    }
    function contact_Mailer(){
        if(isset($_POST['btn-sendmail']))
        {
            $xuongdong = '<br>';
            $name      = $_POST['name'];
            $email     = $_POST['email'];
            $phone     = $_POST['phone'];
            $subject   = $_POST['subject'];
            $message   = $_POST['message'];
            $content   = 'Họ và tên : '.$name.$xuongdong.'Email :'.$email .$xuongdong.'Số Điện Thoại: '.$phone.$xuongdong.'Nội Dung :'.$message.$xuongdong;
            $t = sendMail($email , $subject,$content);
            if($t == true){
                $_SESSION['success'] = "GỬI THƯ THÀNH CÔNG !SHOP CẢM ƠN Ý KIẾN ĐÓNG GÓP CỦA BẠN";
                return ;
            }else{
                $_SESSION['error'] = "GỬI THƯ KHÔNG ĐƯỢC! VUI LÒNG KIỂM TRA THÔNG TIN ";
                return;
            }
                }
    }
}

?>