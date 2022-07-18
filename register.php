<?php

    //import connection database file
    require_once "connection.php";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        //get the value
        
        $store = $_POST['store_id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $pass = $_POST['password'];
        $isAdmin = $_POST['isAdmin'];
        $isOwner = $_POST['isOwner'];

        // insert data into user table
        $sql = "INSERT INTO user (store_id, name, email, phone, password, is_admin, is_owner) VALUES ('$store', '$name', '$email', '$phone', '$pass', '$isAdmin', '$isOwner')";
        $result = mysqli_query($con, $sql) or die ('eeror'.mysqli_error($con));
        if ($result > 0) {
            echo json_encode('success');
        } else {
            echo "error";
            echo mysqli_error($con);
        }
    }

     
?>
