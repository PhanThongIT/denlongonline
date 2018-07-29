<?php
/**
 * Created by PhpStorm.
 * User: Phan Thông  IT
 * Date: 2018-07-29
 * Time: 2:38 PM
 */
include "DBConnect.php";

class PostModel extends DBConnect
{
    function getListPost()
    {
        $sql = "
SELECT  posts.*
from posts
where  posts.status = 0
";
        return $this->loadMoreRows($sql);
    }


    function addPostNew($title, $content, $image, $createdate)
    {
        $sql = "
INSERT INTO `posts`( `title`, `content`, `image`, `createdate`, `status`)
VALUES ($title,$content,$image,$createdate,0)
";
        return $this->executeQuery($sql);
    }
}
