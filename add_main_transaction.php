<?php
    require_once "connection.php";
    
    // get post data that contains main_transaction_id, user_id, store_id, total, cash, charge, timestamp
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $main_transaction_id = $_POST['main_transaction_id'];
        $user_id = $_POST['user_id'];
        $store_id = $_POST['store_id'];
        $total = $_POST['total'];
        $cash = $_POST['cash'];
        $charge = $_POST['charge'];
        $timestamp = $_POST['timestamp'];

        // create a query that insert main_transaction data into main_transaction table
        $sql = "INSERT INTO main_transaction ('main_transaction_id', 'user_id', 'store_id', 'total', 'cash', 'charge', 'timestamp') VALUES ('$main_transaction_id', '$user_id', '$store_id', '$total', '$cash', '$charge', '$timestamp')";
        $result = mysqli_query($con, $sql);
        if($result>0){
            echo "main_transaction inserted successfully";
        } else {
            echo mysqli_error($con);
        }     
    }

?>