<?php
/**
 * Created by PhpStorm.
 * User: Phan Thông  IT
 * Date: 2018-07-23
 * Time: 3:17 PM
 */
include_once 'DBConnect.php';
class SelectLogin extends DBConnect{
    function selectLoginByEmail($email , $password){
        $sql = "select users.* , role.role
                from users , role_user, role
                where users.email = '$email' AND users.password ='$password'
                AND  users.id = role_user.user_id AND role.id = role_user.role_id";
        return  $this->loadOneRow($sql);
    }
}
?>