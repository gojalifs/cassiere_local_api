<?php
    require_once "connection.php";
    // get all data from table user 
    // $sql = "SELECT * FROM user where store_id = '$_GET[store]'";
    $sql = "SELECT * FROM user INNER JOIN store ON user.store_id = store.uid WHERE user.store_id = '$_GET[store]'";
    $result = mysqli_query($con, $sql) or die(mysqli_error($con));
    $response = array();
    // read field user_id, store_id, name, email, password, is_admin, is_owner and return into json
    while($row = mysqli_fetch_assoc($result)){
        array_push($response, array(
            "user_id" => $row['user_id'],
            "store_id" => $row['store_id'],
            "name" => $row['username'],
            "email" => $row['email'],
            "phone" => $row['phone'],
            "password" => $row['password'],
            "isAdmin" => $row['is_admin'],
            "isOwner" => $row['is_owner']
        ));
    }
    echo json_encode($response);

?>