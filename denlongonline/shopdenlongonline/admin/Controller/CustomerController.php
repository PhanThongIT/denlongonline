<?php
require_once "Model/CustomerModel.php";
include_once "Helper/constants.php";

session_start();

/**
 * Class CustomerController
 */
class CustomerController
{


    function getListCustomer()
    {

        $model = new CustomerModel();

        //get date from Model
        $getListCustomer = $model->getListCustomer();

        // set view and title
        $title = TITLE_LIST_CUSTOMERS;
        $view = "View/v_list-Customer.php";
        include(DIRECTORY_ADMIN_VIEW);

    }

    function deleteCustomer()
    {
        //get data from form with method POST
        $idCustomer = $_POST['idCustomer'];
        $nameCustomer = $_POST['nameCustomer'];

        //get data from Model
        $model = new CustomerModel();
        $deleteCustomer = $model->deleteCustomer($idCustomer);

        //check Exist Customer
        if ($deleteCustomer) {
            echo json_encode([
                'status' => MESSAGE_DELETE_SUCCESS
            ]);
        } else {
            echo json_encode([
                'status' => MESSAGE_DELETE_FAIL
            ]);
        }
    }

    function rollBackCustomer()
    {

        //get date from form
        $idCustomer = $_POST['idCustomer'];
        $nameCustomer = $_POST['nameCustomer'];

        //get data from Model
        $model = new CustomerModel();
        $deleteCustomer = $model->rollBackCustomer($idCustomer);

        //check Rollback customers Exist
        if ($deleteCustomer) {
            echo json_encode([
                'status' => MESSAGE_ROLLBACK_CUSTOMSER_SUCCESS
            ]);
        } else {
            echo json_encode([
                'status' => MESSAGE_ROLLBACK_CUSTOMER_FAIL
            ]);
        }
    }

    function getListDeleteCustomer()
    {
        // get data from Model
        $model = new CustomerModel();
        $getListCustomer = $model->getListCustomerDel();

        //set view and title
        $title = TITLE_LIST_CUSTOMERS;
        $view = "View/v_list-delete-customer.php";
        include(DIRECTORY_ADMIN_VIEW);
    }

    function addCustomer()
    {

        // get data from Model
        $model = new CustomerModel();

        // Arrays Errors get Empty data
        $Errors = [];

        // check submit button AddCustomer with method POST
        if (isset($_POST['btn-AddCustomer'])) {

            if (empty($_POST['email'])) {
                $Errors[] = MESSAGE_NOT_NULL_EMAIL . "\n";
            }
            $email = $_POST['email'];
            $checkEmail = $model->findEmail($email);

            //check Exist Email in database
            if ($checkEmail) {
                // Mail Exist
                $_SESSION['exist_mail'] = MESSAGE_EXIST_EMAIL;
                echo "<script>window.location='addcustomer.php?addcustomer=add'</script>";
                return;
            } else {

                // Check empty data
                if (empty($_POST['name'])) {
                    $Errors[] = MESSAGE_NOT_NULL_NAME . "\n";
                }

                if (empty($_POST['address'])) {
                    $Errors[] = MESSAGE_NOT_NULL_ADDRESS . "\n";
                }

                if (empty($_POST['phone'])) {
                    $Errors[] = MESSAGE_NOT_NULL_PHONE . "\n";
                }

                if (empty($_POST['note'])) {
                    $Errors[] = MESSAGE_NOT_NULL_NOTE . "\n";
                }

                // Mail not Exist and get data from form
                $name = $_POST['name'];
                $gender = $_POST['gender'];
                $address = $_POST['address'];
                $phone = $_POST['phone'];
                $note = $_POST['note'];

                //get functon from Model
                $insertCustomer = $model->insertCustomer($name, $gender, $email, $address, $phone, $note);

                //check Exist Customer is true and allow insert
                if ($insertCustomer) {
                    $_SESSION['result'] = MESSAGE_ADD_CUSTOMER_SUCCESS;
                    echo "<script>window.location='addcustomer.php?addcustomer=add'</script>";
                    return;
                } else {

                    $_SESSION['result'] = MESSAGE_ADD_CUSTOMER_FAIL;
                    echo "<script>window.location='addcustomer.php?addcustomer=add'</script>";
                    return;
                }
            }
        }

        // set view and title
        $title = TITLE_ADD_CUSTOMER;
        $view = "View/v_addcustomer.php";
        include(DIRECTORY_ADMIN_VIEW);
    }

    function editCustomer()
    {
        // get data from form with  method GET
        $getIDCustomer = $_GET['id'];
        //get data from Model
        $model = new CustomerModel();
        $checkCustomer = $model->findCustomer($getIDCustomer);

        //check button submit with method POST
        if (isset($_POST['btn-EditCustomer'])) {
            $email = $_POST['email'];

            //check email exist in database
            if ($checkCustomer->email == $email) {

                //True. get data from form
                $name = $_POST['name'];
                $gender = $_POST['gender'];
                $address = $_POST['address'];
                $phone = $_POST['phone'];
                $note = $_POST['note'];

                // call function updateCustomers in Model
                $updateCustomer = $model->updateCustomer(
                    $getIDCustomer,
                    $name,
                    $gender,
                    $email,
                    $address,
                    $phone,
                    $note
                );

                //check Update customer success/fail and show messages
                if ($updateCustomer) {

                    $_SESSION['success'] = MESSAGE_UPDATE_CUSTOMER_SUCCESS;
                    echo "<script>window.location='list-customers.php?getlistCustomer=Customer'</script>";
                    return;
                } else {
                    $_SESSION['success'] = MESSAGE_UPDATE_CUSTOMER_FAIL;
                    echo "<script>window.location='list-customers.php?getlistCustomer=Customer'</script>";
                    return;

                }
            } else {

                $checkEmail = $model->findEmail($email);

                // Check mail Exist
                if ($checkEmail) {

                    echo "<script>alert(" . MESSAGE_EXIST_EMAIL . ")</script>";
                    echo "<script>window.location='list-customers.php?getlistCustomer=Customer'</script>";
                    return;

                } else {

                    //get data from  form with  method POST
                    $name = $_POST['name'];
                    $gender = $_POST['gender'];
                    $address = $_POST['address'];
                    $phone = $_POST['phone'];
                    $note = $_POST['note'];

                    //get function from Model
                    $updateCustomer = $model->updateCustomer(
                        $getIDCustomer,
                        $name,
                        $gender,
                        $email,
                        $address,
                        $phone,
                        $note
                    );

                    // check update success/ fail and show messages
                    if ($updateCustomer) {

                        echo "<script>alert(" . MESSAGE_UPDATE_CUSTOMER_SUCCESS . ")</script>";
                        echo "<script>window.location='list-customers.php?getlistCustomer=Customer'</script>";
                        return;

                    } else {

                        echo "<script>alert(" . MESSAGE_UPDATE_CUSTOMER_FAIL . ")</script>";
                        echo "<script>window.location='list-customers.php?getlistCustomer=Customer'</script>";
                        return;

                    }
                }

            }
        }
        $title = TITLE_EDIT_CUSTOMER;
        $view = "View/v_editcustomer.php";
        include(DIRECTORY_ADMIN_VIEW);

    }
}

?>