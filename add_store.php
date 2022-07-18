<?php
    require "connection.php";
    // get post data that contains name, address
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = $_POST['store'];
        $name = $_POST['name'];
        $address = $_POST['address'];
        
        // create a query that insert store data into store table
        $sql = "INSERT INTO store (uid, name, address) VALUES ('$id', '$name', '$address')";
        $result = mysqli_query($con, $sql) or die (mysqli_error($con));
        $response = array();
        if($result){
            array_push($response, array(
                "status" => "success",
                "message" => "Store added successfully"
            ));
        } else {
            // array_push($response, array(
            //     "status" => "error",
            //     "message" => "Store not added"
            // ));
            echo("error is " . mysqli_error($con));
        }
        echo json_encode($response);
        
    }

?>