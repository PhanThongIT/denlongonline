<?php
/**
 * Created by PhpStorm.
 * User: Phan Thông  IT
 * Date: 2018-07-20
 * Time: 5:25 AM
 */
function create_Token()
{
    $rootToken = "123hjklzxcJHGFD4567890qwertyuiovbnmQZXCVBNMLKpasdfgSAWERTYUIOP";
    $token     = "";
    for ($i = 0; $i < 20; $i++)
    {
        $start = rand(0, strlen($rootToken) - 1);
        $token .= substr($rootToken , $start , 1);

    }
    return $token;
}

?>

