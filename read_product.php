<?php

    require_once "connection.php";

    //  create query that read all product data from product table
    $sql = "SELECT * FROM product INNER JOIN store ON product.store_id = store.uid WHERE product.store_id = '$_GET[store]'";
    $result = mysqli_query($con, $sql);
    $response = array();
    while($row = mysqli_fetch_assoc($result)){
        array_push($response, array(
            "id" => $row['product_id'],
            "store_id" => $row['store_id'],
            "name" => $row['productname'],
            "price" => $row['price'],
            "category" => $row['category']
        ));
    }
    echo json_encode($response);

?>