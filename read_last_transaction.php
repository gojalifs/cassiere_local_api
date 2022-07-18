<?php
    require_once "connection.php";

    // select last main_transaction_id from main_transaction table
    $sql = "SELECT MAX(main_transaction_id) AS last_id FROM main_transaction";
    $result = mysqli_query($con, $sql) or die (mysqli_error($con));
    $row = mysqli_fetch_assoc($result);
    $last_id = $row['last_id'];

    // return last_id as json
    echo json_encode($last_id);

?>
