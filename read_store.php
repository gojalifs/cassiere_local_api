<?php
    require "connection.php";
    
    // read data from store table, field is store_id, name, address and return it as json
    $sql = "SELECT * FROM store";
    $result = mysqli_query($con, $sql) or die(mysqli_error($con));
    $response = array();
    // read field store_id, name, address 
    while($row = mysqli_fetch_assoc($result)){
        array_push($response, array(
            "store_id" => $row['store_id'],
            "uid" => $row['uid'],
            "name" => $row['name'],
            "address" => $row['address']
        ));
    }
    if (count($response) > 0) {
        echo json_encode($response);
    } else {
        echo ("No data found". mysqli_error($con));
    }
// {
//  echo("Error description: " . mysqli_error($con));
// }

// mysqli_close($con);
    // echo json_encode($response);


?>