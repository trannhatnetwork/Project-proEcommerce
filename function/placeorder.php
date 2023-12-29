<?php
    session_start();
    include '../config/dbcon.php';
    // requ 'authcode.php';
    include 'userfunction.php';

    if(isset($_SESSION['auth'])){
        if(isset($_POST['placeOrderBtn'])){
            $name = mysqli_real_escape_string($con, $_POST['name']);
            $email = mysqli_real_escape_string($con, $_POST['email']);
            $phone = mysqli_real_escape_string($con, $_POST['phone']);
            $pincode = mysqli_real_escape_string($con, $_POST['pincode']);
            $address = mysqli_real_escape_string($con, $_POST['address']);
            $payment_mode = mysqli_real_escape_string($con, $_POST['payment_mode']);
            // $payment_id = mysqli_real_escape_string($con, $_POST['payment_id']);

            if($name == "" || $email == "" || $phone == "" || $pincode == "" || $address == "" ){
                $_SESSION['message'] = "All fields are mandatory";
                header('Location: ../checkout.php');
                exit(0);
            } 

            $userId = $_SESSION['auth_user']['user_id'];
            $query = "SELECT c.id as cid, c.prod_id, c.prod_qty, p.id as pid, p.name, p.image, p.selling_price 
                FROM tbl_cart c, tbl_product p WHERE c.prod_id=p.id AND c.user_id = '$userId' ORDER BY c.id DESC";
            $query_run = mysqli_query($con, $query);
            
            $totalPrice = 0;
            foreach ($query_run as $citem ){
                $totalPrice += $citem['selling_price'] * $citem['prod_qty'];
            }
            // $tracking_no = $_SESSION['auth_user']['user_name'].rand(1111, 9999).substr($phone, 2);
            $tracking_no = "phpEcommer".rand(1111, 9999).substr($phone, 2);
            $user_id = $_SESSION['auth_user']['user_id'];

            $insert_query = "INSERT INTO tbl_order (tracking_no, user_id, name, email, phone, address, pincode, total_price, payment_mode)
                VALUES ('$tracking_no', '$userId', '$name', '$email', '$phone', '$address', '$pincode', '$totalPrice', '$payment_mode')";
            $insert_query_run = mysqli_query($con, $insert_query);

            if($insert_query_run){
                $order_id = mysqli_insert_id($con);
                foreach ($query_run as $citem){
                    $prod_id = $citem['prod_id'];
                    $prod_qty = $citem['prod_qty'];
                    $price = $citem['selling_price'];

                    $insert_item_query = "INSERT INTO tbl_order_item (order_id, prod_id, qty, price ) 
                        VALUES ('$order_id', '$prod_id', '$prod_qty', '$price')";
                    $insert_items_query_run = mysqli_query($con, $insert_item_query);

                    //cap nhat lai so luong san pham 
                    $product_query = "SELECT * FROM tbl_product WHERE id = '$prod_id' LIMIT 1";
                    $product_query_run = mysqli_query($con, $product_query);

                    $productData = mysqli_fetch_array($product_query_run);
                    $current_qty = $productData['qty'];

                    $new_qty = $current_qty - $prod_qty; //cap nhan lai so luong san pham con ton tai trong kho

                    $updateQty_query = "UPDATE tbl_product SET qty = '$new_qty' WHERE id = '$prod_id'";
                    $updateQty_query_run = mysqli_query($con, $updateQty_query);

                }

                $deleteCartQuery = "DELETE FROM tbl_cart WHERE user_id = '$userId'";
                $deleteCartQuery_run = mysqli_query($con, $deleteCartQuery);

                $_SESSION['message'] = "Order placed successfully";
                header('Location:../my-orders.php');
                die();
               
            }
        }
    }else{
        header('Location: ../index.php');
    }
?>