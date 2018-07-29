<?php
/**
 * Created by PhpStorm.
 * User: Phan Thông  IT
 * Date: 2018-07-29
 * Time: 12:58 PM
 */
include_once 'Model/PostModel.php';

class PostController
{
    function getListPost()
    {
        $model    = new PostModel();
        $listPost = $model->getListPost();
        $title    = "DANH SÁCH BÀI VIẾT";
        $view     = "View/v_post.php";
        include_once 'include/admin.view.php';

    }

    function getAddPost()
    {
        $model = new PostModel();
        if (isset($_POST['btn-AddPost']))
        {

            $title      = $_POST['title'];
            $content    = $_POST['content'];
            $image      = $_FILES["image"]["error"] == 0 ? $_FILES["image"]["name"] : "";
           $createdate = date('Y-m-d');
         // $time  = strtotime(date('Y-m-d'),$createdate);
          //  echo $createdate;die;
            $status     = 0;
            $insertPost = $model->addPostNew($title, $content, $image, $createdate);
//            echo "<pre>"; var_dump($insertPost); echo "</pre>"; die;
            if ($insertPost)
            {
                if ($_FILES["image"]["error"] == 0)
                {
                    $kqa = move_uploaded_file($_FILES["image"]["tmp_name"], "public/source/images/imagesPost/$image");

                }
                echo "<script>alert('Thêm thành công bài viết')</script>";
                echo "<script>window.location='post.php?post=list'</script>";
            }
        }
        $title = "THÊM BÀI VIẾT MỚI";
        $view  = "View/v_addpost.php";
        include 'include/admin.view.php';
    }

}

?>