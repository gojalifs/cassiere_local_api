<?php
    require_once "connection.php";

    // get all transaction data from main_transaction table
    $sql = "SELECT * FROM main_transaction";
    $result = mysqli_query($con, $sql);
    $response = array();
    while($row = mysqli_fetch_assoc($result)){
        array_push($response, array(
            "main_transaction_id" => $row['main_transaction_id'],
            "store_id" => $row['store_id'],
            "user_id" => $row['user_id'],
            "total" => $row['total'],
            "cash" => $row['cash'],
            "charge" => $row['charge'],
            "timestamp" => $row['timestamp']
        ));
    }
    echo json_encode($response);

?>