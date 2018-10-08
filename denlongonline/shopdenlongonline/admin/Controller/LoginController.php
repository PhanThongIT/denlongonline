<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once "Model/LoginModel.php";
include_once "Helper/constants.php";

class LoginController
{

    /**
     * GetLogin with button submit / method POST
     */
    function getLogin()
    {

        // check btnSubmit with  method POST
        if (isset($_POST['btn-login'])) {

            //get username and password with method POST
            $email = $_POST['email'];
            $password = $_POST['password'];

            // get function from model
            $model = new LoginModel();

            //Check and save data to Database
            $selectLogin = $model->selectLoginByEmail(
                $email,
                $password
            );

            //check Exist login
            if (!$selectLogin) {
                $_SESSION["error"] = MESSAGE_LOGIN_FAIL;
                header('location:login.php');
            }

            $this->saveLoginCustomer(
                $email,
                $password,
                $selectLogin->role);

            // check Role admin/Customers
            if ($selectLogin->role == 'admin') {
                if (isset($_SESSION["fullname"])) {
                    $_SESSION['email'] = $email;
                    header('location:chartprice.php?chartprice=true');
                }
            } elseif ($selectLogin->role == 'customer') {
                if (isset($_SESSION["fullname"])) {
                    $_SESSION['email'] = $email;
                    header('location:../index.php');
                }
            }

            // check fullname .
            if (!isset($_SESSION["fullname"])) {

                $_SESSION["error"] = MESSAGE_LOGIN_FAIL;
                header('location:login.php');
            }

        }
    }

    /**
     * function  LogOut.
     */
    function logOut()
    {

        // unset session with login username and password
        session_destroy();
        header('location:login.php');
    }

    /**
     * @param $email
     * @param $password
     * @param $role
     */
    function saveLoginCustomer($email, $password, $role)
    {
        // get function from Model
        $model = new LoginModel();
        $selectLogin = $model->selectLoginByEmail($email, $password);

        //get data from SESSION
        if ($selectLogin) {
            $_SESSION["fullname"] = $selectLogin->fullname;
            $_SESSION['password'] = $selectLogin->password;
            $_SESSION['role'] = $selectLogin->role;
        }


    }

}


