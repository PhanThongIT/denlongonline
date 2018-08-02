<?php
/**
 * Created by PhpStorm.
 * User: Phan Thông  IT
 * Date: 2018-07-30
 * Time: 6:08 AM
 */
include_once 'DBConnect.php';

class ProfileModel extends DBConnect
{
    function selectUser($email)
    {
        $sql = "
        SELECT * FROM `users`
        where users.email='$email'
        ";
        return $this->loadOneRow($sql);
    }

    function updateUser($idUser,$username, $password, $fullname, $birth_date, $gender, $address, $email, $phone, $update_date)
    {
        $sql = "
        UPDATE `users` SET  username='$username',password='$password',fullname='$fullname',
        birthdate='$birth_date',gender='$gender',address='$address',email='$email',phone='$phone',
        remember_token=NULL,updated_at='$update_date',created_at='$update_date' 
        WHERE id= $idUser
        ";
        $this->executeQuery($sql);
    }
}

?>