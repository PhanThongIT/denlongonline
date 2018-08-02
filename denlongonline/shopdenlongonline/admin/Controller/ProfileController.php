<?php
/**
 * Created by PhpStorm.
 * User: Phan Thông  IT
 * Date: 2018-07-30
 * Time: 6:08 AM
 */
include_once 'Model/ProfileModel.php';
include_once 'Model/RegisterModel.php';
@session_start();

class ProfileController
{
    function getProfilePage()
    {

        $email    = $_SESSION['email'];
        $model    = new ProfileModel();
        $loadUser = $model->selectUser($email);
        //   echo "<pre>";
//        var_dump($loadUser);
//        echo "</pre>";
//        die;
        include_once 'View/v_editprofile.php';
    }

    function editProfile()
    {

        $model        = new RegisterModel();
        $modelProfile = new ProfileModel();

        $oldEmail  = $_SESSION['email'];
        $checkUser = $modelProfile->selectUser($oldEmail);
        $idUser    = $checkUser->id;

        if (isset($_POST['btn-Update']))
        {
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $cofirm_pass = $_POST['confirm_password'];
            $password    = $_POST['password'];
            // echo "<pre>"; var_dump($password); echo "</pre>"; die;
            // kiểm tra xem password nhập có khớp nhau không
            if ($cofirm_pass === $password)
            {
                $username = $_POST['username'];
                //check Email trùng và check Update Email
                $email = $_POST['email'];
                if ($oldEmail === $email)
                {

                    $fullname   = $_POST['fullname'];
                    $getdate    = $_POST['birthdate'];
                    $birth_date = date('Y-m-d', strtotime($getdate));
                    // echo $birth_date;die;
                    $gender  = $_POST['gender'];
                    $address = $_POST['address'];
                    $phone   = $_POST['phone'];

                    $update_date = date('Y-m-d H:m:s', time());
                    // Gọi hàm insert User
//                    echo $update_date ;
//                    echo $phone;die;
                    $checkUpdateUser = $modelProfile->updateUser($idUser, $username, $password, $fullname, $birth_date, $gender, $address, $email, $phone, $update_date);
                    if ($checkUpdateUser)
                    {
                        session_destroy();
                        echo "<script>alert('Cập nhật thành công 1 . Vui lòng đăng nhập! ')</script>";
                        echo "<script>window.location='login.php'</script>";
                        return;
                    }
                    else
                    {
                        echo "<script>alert('Cập nhật thông tin không thành công1 !! ')</script>";
                        echo "<script>window.location='profile.php?profile=user'</script>";
                        return;
                    }
                }
                else
                {
                    $checkEmail = $model->findEmail($email);
                    if ($checkEmail)
                    {
                        echo "<script>alert('Rất tiếc! email của bạn đã bị trùng. ')</script>";
                        echo "<script>window.location='profile.php?profile=user'</script>";
                        return;
                    }
                    $fullname   = $_POST['fullname'];
                    $getdate    = $_POST['birthdate'];
                    $birth_date = date('Y-m-d', strtotime($getdate));
                    // echo $birth_date;die;
                    $gender          = $_POST['gender'];
                    $address         = $_POST['address'];
                    $phone           = $_POST['phone'];
                    $update_date     = date('Y-m-d H:m:s', time());
                    $checkUpdateUser = $modelProfile->updateUser($idUser, $username, $password, $fullname, $birth_date, $gender, $address, $email, $phone, $update_date);
                    if ($checkUpdateUser)
                    {
                        session_destroy();
                        echo "<script>alert('Cập nhật thành công . Vui lòng đăng nhập! ')</script>";
                        echo "<script>window.location='login.php'</script>";
                        return;
                    }
                    else
                    {
                        echo "<script>alert('Cập nhật thông tin  thành công2 !! ')</script>";
                        echo "<script>window.location='login.php'</script>";
                        return;
                    }
                }

            }
            else
            {
                echo "<script>alert('Password nhập không khớp nhau')</script>";
                echo "<script>window.location='profile.php?profile=user'</script>";
                return;
            }
//

        }

    }
}

?>