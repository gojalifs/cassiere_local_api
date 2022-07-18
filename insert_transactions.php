<?php
require_once "connection.php";
// get post data contains store_id, transaction_id, user_id, store_id, total, cash, charge, timestamp, detail_id, product_id, quantity, subtotal
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $store_id = $_POST['store_id'];
    // $transaction_id = $_POST['transaction_id'];
    $user_id = $_POST['user_id'];
    $total = $_POST['total'];
    $cash = $_POST['cash'];
    $charge = $_POST['charge'];
    $timestamp = $_POST['timestamp'];
    // $detail_id = $_POST['detail_id'];
    // $product_id = $_POST['product_id'];
    // $quantity = $_POST['quantity'];
    // $subtotal = $_POST['subtotal'];
    $detail_array = $_POST['detail'];

    $detailDecoded = json_decode($detail_array);
    
    // create a query insert into main_transaction table
    $sql_main = "INSERT INTO main_transaction (`store_id`, `user_id`, `total`, `cash`, `charge`, `timestamp`) VALUES ('$store_id', '$user_id', '$total', '$cash', '$charge', '$timestamp')";
    
    // create for each loop to insert into detail_transaction table
    

    $result_main = mysqli_query($con, $sql_main) or die (mysqli_error($con));
    if( $result_main ){
        echo "main transaction added successfully";
        foreach ($detailDecoded as $detail) {
            $transaction_id = $detail->transactionId;
            $product_id = $detail->productId;
            $quantity = $detail->quantity;
            $subtotal = $detail->subTotal;
            $sql = "INSERT INTO detail_transaction (`transaction_id`, `product_id`, `quantity`, `subtotal`) VALUES ('$transaction_id', '$product_id', '$quantity', '$subtotal')";
            
        $result = mysqli_multi_query($con, $sql) or die (mysqli_error($con));
        }
        if ($result) {
            echo "detail transaction added successfully";
            $response['success'] = 1;
        } else {
            echo json_encode(mysqli_error($con));
        }
    }
    // create multiple query result
    

    
    
    // $age = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43");
    // foreach($age as $x => $val) {
    // echo "$x = $val<br>";
    // }


}


?>