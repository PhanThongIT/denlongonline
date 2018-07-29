<?php
/**
 * Created by PhpStorm.
 * User: Phan Thông  IT
 * Date: 2018-07-29
 * Time: 2:59 PM
 */
include_once "DBConnect.php";

class RegisterModel extends DBConnect
{
   function findUsername($username){
       $sql = "
       select users.* 
        from users
        where users.username = '$username'
       ";
       return $this->loadOneRow($sql);
   }
   function findEmail($email){
       $sql = "
        select users.* 
        from users
        where users.email = '$email'
       ";
       return $this->loadOneRow($sql);

   }
   function insertUser( $username, $password, $fullname, $birthdate, $gender, $address, $email, $phone,  $updated_at){
       $sql = "
       INSERT INTO `users`( `username`, `password`, `fullname`, `birthdate`, `gender`, `address`, `email`, `phone`, `remember_token`, `updated_at`) 
       VALUES ('$username','$password','$fullname','$birthdate','$gender','$address','$email','$phone',NULL,'$updated_at')
       ";
       $execute = $this->executeQuery($sql);
       return $execute ? $this->getLastId() : false;
   }
    function insertRole_User($id_role,$idUser){
       $sql = "
       INSERT INTO `role_user`( `role_id`, `user_id`) 
       VALUES ($id_role,$idUser)
       ";
       return $this->executeQuery($sql);
    }

}

?>