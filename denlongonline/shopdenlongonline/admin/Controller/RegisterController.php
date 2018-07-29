<?php
/**
 * Created by PhpStorm.
 * User: Phan Thông  IT
 * Date: 2018-07-29
 * Time: 2:59 PM
 */
include_once 'Model/RegisterModel.php';

class RegisterController
{
    function getRegisterPage()
    {
        include_once("View/v_register.php");
    }

    function getRegister()
    {
        // Lấy dự liệu từ form về
        // `users`(`id`, `username`, `password`, `fullname`, `birthdate`, `gender`, `address`, `email`, `phone`, `remember_token`, `updated_at`, `created_at`)
        //  $id = $_POST[''];
        $model = new RegisterModel();
        if (isset($_POST['btn-Register']))
        {
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $cofirm_pass = $_POST['confirm_password'];
            $password    = $_POST['password'];
            // kiểm tra xem password nhập có khớp nhau không
            if ($cofirm_pass === $password)
            {
                $username      = $_POST['username'];
                $checkUsername = $model->findUsername($username);
                if ($checkUsername)
                {
                    //Trùng Username
                    echo "<script>alert('Rất tiếc! username của bạn đã bị trùng. ')</script>";
                    echo "<script>window.location='register.php?register=add'</script>";
                    return;
                }
                //check Email trùng
                $email      = $_POST['email'];
                $checkEmail = $model->findEmail($email);
                if ($checkEmail)
                {
                    echo "<script>alert('Rất tiếc! email của bạn đã bị trùng. ')</script>";
                    echo "<script>window.location='register.php?register=add'</script>";
                    return;
                }
                $fullname   = $_POST['fullname'];
                $getdate    = $_POST['birthdate'];
                $birth_date = date('Y-m-d', strtotime($getdate));
                // echo $birth_date;die;
                $gender  = $_POST['gender'];
                $address = $_POST['address'];
                $phone   = $_POST['phone'];

                $update_date = date('Y-m-d H:m:s', time());
                $insert_User = $model->insertUser($username, $password, $fullname, $birth_date, $gender, $address, $email, $phone, $update_date);
                //echo "<pre>"; var_dump($insert_User); echo "</pre>"; die;
                if ($insert_User)
                {
                    //nếu tồn tại idUser tiếp tục chèn vào bảng  User_Role - Quyền khách hàng
                    //insert bảng RoleUser
                    $id_Role     = 2; //Customer
                    $insert_Role = $model->insertRole_User($id_Role, $insert_User);
                    if ($insert_Role)
                    {
                        echo "<script>alert('ĐĂNG KÝ TÀI KHOẢN THÀNH CÔNG  ')</script>";
                        echo "<script>window.location='login.php'</script>";
                        return;
                    }
                    else
                    {
                        echo "<script>alert('ĐĂNG KÝ TÀi KHOẢN THẤT BẠI  ')</script>";
                        echo "<script>window.location='register.php?register=add'</script>";
                        return;
                    }

                }
                else
                {
                    echo "<script>alert('ĐĂNG KÝ TÀi KHOẢN THẤT BẠI  ')</script>";
                    echo "<script>window.location='register.php?register=add'</script>";
                    return;
                }
            }
            else
            {
                echo "<script>alert('Password nhập không khớp nhau')</script>";
                echo "<script>window.location='register.php?register=add'</script>";
                return;
            }
//

        }
    }
    function getProfile(){

    }
}

?>