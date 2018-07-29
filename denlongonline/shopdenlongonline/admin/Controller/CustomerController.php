<?php
/**
 * Created by PhpStorm.
 * User: Phan Thông  IT
 * Date: 2018-07-27
 * Time: 8:27 PM
 */
include_once "Model/CustomerModel.php";

class CustomerController
{
    function getListCustomer()
    {
        $model           = new CustomerModel();
        $getListCustomer = $model->getListCustomer();
        // print_r($getListCustomer);die;
        $title = "DANH SÁCH KHÁCH HÀNG";
        $view  = "View/v_list-Customer.php";
        include('include/admin.view.php');
    }

    function deleteCustomer()
    {
        $idCustomer   = $_POST['idCustomer'];
        $nameCustomer = $_POST['nameCustomer'];
//        echo $nameCustomer;die;
        $model          = new CustomerModel();
        $deleteCustomer = $model->deleteCustomer($idCustomer);
        if ($deleteCustomer)
        {
//                echo json_encode(array([
//                    'status'=>"CẬP NHẬT TRẠNG THÁI XÓA KHÁCH HÀNG THÀNH CÔNG   "
//                ]));
            echo json_encode([
                'status' => "CẬP NHẬT XÓA KHÁCH HÀNG " . $nameCustomer . " THÀNH CÔNG"
            ]);
        }
        else
        {
            echo json_encode([
                'status' => "CẬP NHẬT XÓA KHÁCH HÀNG " . $nameCustomer . "THẤT BẠI"
            ]);
        }
//        $view = "View/v_list-Customer.php";
//        include('include/admin.view.php');
    }

    function rollBackCustomer()
    {
        $idCustomer   = $_POST['idCustomer'];
        $nameCustomer = $_POST['nameCustomer'];
//        echo $nameCustomer;die;
        $model          = new CustomerModel();
        $deleteCustomer = $model->rollBackCustomer($idCustomer);
        if ($deleteCustomer)
        {
            echo json_encode([
                'status' => "KHÔI PHỤC XÓA KHÁCH HÀNG " . $nameCustomer . " THÀNH CÔNG"
            ]);
        }
        else
        {
            echo json_encode([
                'status' => "KHÔI PHỤC XÓA KHÁCH HÀNG " . $nameCustomer . "THẤT BẠI"
            ]);
        }
    }

    function getListDeleteCustomer()
    {
        $model           = new CustomerModel();
        $getListCustomer = $model->getListCustomerDel();
        // print_r($getListCustomer);die;
        $title = "DANH SÁCH KHÁCH HÀNG";
        $view  = "View/v_list-delete-customer.php";
        include('include/admin.view.php');
    }

    function addCustomer()
    {
        // Xử lý dữ liệu
        $model = new CustomerModel();
        // POST data từ Client về
        if (isset($_POST['btn-AddCustomer']))
        {
            $email      = $_POST['email'];
            $checkEmail = $model->findEmail($email);
//            echo $email;
            //  print_r($checkEmail);die;
//            die;

            if ($checkEmail)
            {
                // Mail trùng
                echo "<script>alert('Email của bạn bị trùng - Vui lòng kiểm tra lại')</script>";
                echo "<script>window.location='addcustomer.php?addcustomer=add'</script>";
                return;
            }
            else
            {
                $name           = $_POST['name'];
                $gender         = $_POST['gender'];
                $address        = $_POST['address'];
                $phone          = $_POST['phone'];
                $note           = $_POST['note'];
                $insertCustomer = $model->insertCustomer($name, $gender, $email, $address, $phone, $note);
                if ($insertCustomer)
                {
                    echo "<script>alert('THÊM KHÁCH HÀNG THÀNH CÔNG ')</script>";
                    echo "<script>window.location='addcustomer.php?addcustomer=add'</script>";
                    return;
                }
                else
                {
                    echo "<script>alert('THÊM KHÁCH HÀNG THẤT BẠI!')</script>";
                    echo "<script>window.location='addcustomer.php?addcustomer=add'</script>";
                    return;
                }
            }
//           echo "<pre>"; var_dump($name); echo "</pre>"; die;
        }
        // view
        $title = "THÊM MỚI KHÁCH HÀNG ";
        $view  = "View/v_addcustomer.php";
        include("include/admin.view.php");
    }

    function editCustomer()
    {
        $model         = new CustomerModel();
        $getIDCustomer = $_GET['id'];
        $checkCustomer = $model->findCustomer($getIDCustomer);
        // echo "<pre>"; var_dump($checkCustomer); echo "</pre>"; die;
        if (isset($_POST['btn-EditCustomer']))
        {
            $email      = $_POST['email'];
           // $checkEmail = $model->findEmail($checkCustomer->email);
//            echo $email;
            //  print_r($checkEmail);die;
//            die;
            if ($checkCustomer->email == $email )
            {
                $name           = $_POST['name'];
                $gender         = $_POST['gender'];
                $address        = $_POST['address'];
                $phone          = $_POST['phone'];
                $note           = $_POST['note'];
                $updateCustomer = $model->updateCustomer($getIDCustomer, $name, $gender, $email, $address, $phone, $note);
                if ($updateCustomer)
                {
                    echo "<script>alert('CẬP NHẬT KHÁCH HÀNG THÀNH CÔNG ')</script>";
                    echo "<script>window.location='list-customers.php?getlistCustomer=Customer'</script>";
                    return;
                }
                else
                {
                    echo "<script>alert('CẬP NHẬT KHÁCH HÀNG THẤT BẠI ')</script>";
                    echo "<script>window.location='list-customers.php?getlistCustomer=Customer'</script>";
                    return;

                }
            }
            else
            {
                $checkEmail = $model->findEmail($email);
                if ($checkEmail)
                {
                    // Mail trùng
                    echo "<script>alert('Email của bạn bị trùng - Vui lòng kiểm tra lại')</script>";
                    echo "<script>window.location='list-customers.php?getlistCustomer=Customer'</script>";
                    return;
                }
                else
                {
                    $name           = $_POST['name'];
                    $gender         = $_POST['gender'];
                    $address        = $_POST['address'];
                    $phone          = $_POST['phone'];
                    $note           = $_POST['note'];
                    $updateCustomer = $model->updateCustomer($getIDCustomer, $name, $gender, $email, $address, $phone, $note);
                    if ($updateCustomer)
                    {
                        echo "<script>alert('CẬP NHẬT KHÁCH HÀNG THÀNH CÔNG ')</script>";
                        echo "<script>window.location='list-customers.php?getlistCustomer=Customer'</script>";
                        return;
                    }
                    else
                    {
                        echo "<script>alert('CẬP NHẬT KHÁCH HÀNG THẤT BẠI ')</script>";
                        echo "<script>window.location='list-customers.php?getlistCustomer=Customer'</script>";
                        return;

                    }
                }

            }
        }
        $title = "CHỈNH SỬA KHÁCH HÀNG";
        $view  = "View/v_editcustomer.php";
        include("include/admin.view.php");

    }
}

?>