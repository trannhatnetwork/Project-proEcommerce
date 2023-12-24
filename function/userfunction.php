<?php
    
    // $filepath = realpath(dirname(__FILE__));
    // include_once ($filepath.'/../lib/database.php');
    // include_once ($filepath.'/../helpers/format.php');
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../config/dbcon.php');

    function getAllActive($table){
        global $con;
        $query = "SELECT * FROM $table WHERE status='0'";
        return $query_run = mysqli_query($con, $query);
    }

    function getSlugActive($table, $slug){
        global $con;
        $query = "SELECT * FROM $table WHERE slug='$slug' AND status='0' LIMIT 1";
        return $query_run = mysqli_query($con, $query);
    }

    function getProdByCategory($category_id){
        global $con;
        $query = "SELECT * FROM tbl_product WHERE category_id = '$category_id' AND status='0'";
        return $query_run = mysqli_query($con, $query);
    }

    function getIDActive($table, $id){
        global $con;
        $query = "SELECT * FROM $table WHERE id = '$id' AND status='0'";
        return $query_run = mysqli_query($con, $query);
    }

    function getCartItems(){
        global $con;
        $userId = $_SESSION['auth_user']['user_id'];
        $query = "SELECT c.id as cid, c.prod_id, c.prod_qty, p.id as pid, p.name, p.image, p.selling_price 
                FROM tbl_cart c, tbl_product p WHERE c.prod_id=p.id AND c.user_id = '$userId' ORDER BY c.id DESC";
        return $query_run = mysqli_query($con, $query);
    }

    function redirect($url, $message){
        $_SESSION['message'] = $message;
        header('Location:'.$url);
        exit(0);
    }
?>