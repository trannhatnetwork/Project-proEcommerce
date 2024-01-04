<?php
    // $filepath = realpath(dirname(__FILE__));
    // include_once ($filepath.'/../config/dbcon.php');
    include '../config/dbcon.php';

    function getAll($table){
        global $con;
        $query = "SELECT * FROM $table";
        return $query_run = mysqli_query($con, $query);
    }

    function getByID($table, $id){
        global $con;
        $query = "SELECT * FROM $table WHERE id = '$id'";
        return $query_run = mysqli_query($con, $query);
    }

    function redirect($url, $message){
        $_SESSION['message'] = $message;
        header('Location: '.$url);
        exit(0);
    }
    function getAllOrders(){
        global $con;
        $query = "SELECT * FROM tbl_order WHERE status = '0'";
        return $query_run = mysqli_query($con, $query);
    }
    function getOrderHistory(){
        global $con;
        $query = "SELECT * FROM tbl_order WHERE status != '0'";
        return $query_run = mysqli_query($con, $query);
    }
    function checkTrackingNoValid($trackingNo){
        global $con;
        $query = "SELECT * FROM tbl_order WHERE tracking_no = '$trackingNo'";
        return mysqli_query($con, $query);
    }
?>