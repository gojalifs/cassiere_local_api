<?php
    require_once "connection.php";
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $uid = $_POST['uid'];
        $sql = "SELECT * FROM store WHERE uid = '$uid'";
    
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
            echo("error is " . mysqli_error($con));
        }
    }


?>