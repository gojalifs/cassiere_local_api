<?php
    require_once "connection.php";

    // get post data that contain transaction_id, product_id, quantity, subtotal
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $transaction_id = $_POST['transaction_id'];
        $product_id = $_POST['product_id'];
        $quantity = $_POST['quantity'];
        $subtotal = $_POST['subtotal'];
        
        // create a query that insert detail_transaction data into detail_transaction table
        $sql = "INSERT INTO detail_transaction ('transaction_id', 'product_id', 'quantity', 'subtotal') VALUES ('$transaction_id', '$product_id', '$quantity', '$subtotal')";
        $result = mysqli_query($con, $sql);
        if($result>0){
            echo "detail_transaction inserted successfully";
        } else {
            echo mysqli_error($con);
        }

    }
?>