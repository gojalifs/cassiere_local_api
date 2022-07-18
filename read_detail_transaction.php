<?php
    require_once "connection.php";

    // get all data from detail_transaction table
    $sql = "SELECT * FROM detail_transaction";
    $result = mysqli_query($con, $sql);
    $response = array();
    while($row = mysqli_fetch_assoc($result)){
        array_push($response, array(
            "detail_transaction_id" => $row['detail_transaction_id'],
            "main_transaction_id" => $row['main_transaction_id'],
            "product_id" => $row['product_id'],
            "quantity" => $row['quantity'],
            "subtotal" => $row['subtotal']
        ));
    }
    echo json_encode($response);

?>