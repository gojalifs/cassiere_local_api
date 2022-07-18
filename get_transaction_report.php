<?php
    require_once "connection.php";

    // get data contains store_id
    if ($_SERVER['REQUEST_METHOD'] == 'GET'){
        $store_id = $_GET['store_id'];

        // create a query that join main_transaction and detail_transaction table on same main_transaction_id
        $sql = "SELECT * FROM main_transaction INNER JOIN detail_transaction
        ON main_transaction.main_transaction_id = detail_transaction.transaction_id
         WHERE main_transaction.store_id = '$store_id'";

        // get result or die
        $result = mysqli_query($con, $sql) or die (mysqli_error($con));
        $response = array();
        while($row = mysqli_fetch_assoc($result)){
            // push data to response array, column is main_transaction_id, store_id, user_id, total, cash, charge, timestamp
            array_push($response, array(
                "main_transaction_id" => $row['transaction_id'],
                "store_id" => $row['store_id'],
                "user_id" => $row['user_id'],
                "total" => $row['total'],
                "cash" => $row['cash'],
                "charge" => $row['charge'],
                "timestamp" => $row['timestamp']
            ));
            
        }
        echo json_encode($response);
    }

?>