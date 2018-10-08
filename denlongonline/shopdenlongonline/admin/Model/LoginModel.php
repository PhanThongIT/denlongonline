<?php
include_once 'DBConnect.php';

/**
 * Class LoginModel
 */
class LoginModel extends DBConnect
{

    /**
     * Function get Login check email and password in  database
     * Table: User and UserRole
     *
     * @param $email
     * @param $password
     *
     * @return bool|mixed
     */
    function selectLoginByEmail($email, $password)
    {

        $sql = "
                select users.* , role.role
                from users , role_user, role
                where 
                users.email = '$email'
                AND users.password ='$password'
                AND  users.id = role_user.user_id 
                AND role.id = role_user.role_id
                ";

        return $this->loadOneRow($sql);
    }
}