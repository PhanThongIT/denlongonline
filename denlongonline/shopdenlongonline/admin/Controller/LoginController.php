<?php
/**
 * Created by PhpStorm.
 * User: Phan Thông  IT
 * Date: 2018-07-23
 * Time: 3:28 PM
 */
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include_once 'Model/SelectLogin.php';
class LoginController
{
    function getLogin()
    {
        if (isset($_POST['btn-login']))
        {
            $email       = $_POST['email'];
            $password    = $_POST['password'];
            $model       = new SelectLogin();
            $selectLogin = $model->selectLoginByEmail($email, $password);
            $this->saveLoginCustomer($email, $password, $selectLogin->role);
            if ($selectLogin->role == 'admin')
            {
                if (isset($_SESSION["fullname"]))
                {
                    $_SESSION['email'] = $email;
                    header('location:chartprice.php?chartprice=true');
                }
            }elseif($selectLogin->role == 'customer'){
                if (isset($_SESSION["fullname"]) )
                {
                    $_SESSION['email'] = $email;
                    header('location:../index.php');
                }
            }
            if (!isset($_SESSION["fullname"]))
            {

                $_SESSION["error"] = "Sai thông tin tài khoản";
                header('location:login.php');
            }

        }


    }
    function logOut(){
        session_destroy();
        header('location:login.php');
    }

    function saveLoginCustomer($email, $password, $role)
    {
        $model                = new SelectLogin();
        $selectLogin          = $model->selectLoginByEmail($email, $password);
        $_SESSION["fullname"] = $selectLogin->fullname;
        $_SESSION['password'] = $selectLogin->password;
        $_SESSION['role']     = $selectLogin->role;
//        $data =[
//            'fullname'=>$_SESSION["fullname"],
//            'password'=>$_SESSION['password'],
//            'role'=>$_SESSION['role']
//        ];
//        return $data;
    }

}


?>

