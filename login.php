<?php
    require "connection.php";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $response = array();
        $id = $_POST['email'];
        $pwd = $_POST['password'];

        $check = "SELECT * FROM user WHERE email = '$id' and password = '$pwd'";
        $result = (mysqli_query($con, $check)) or die(mysqli_error($con));
        

        if (isset($result)) {
            // read field user_id, store_id, name, email, password, is_admin, is_owner
            while($row = mysqli_fetch_assoc($result)){
                array_push($response, array(
                    "user_id" => $row['user_id'],
                    "store_id" => $row['store_id'],
                    "name" => $row['username'],
                    "email" => $row['email'],
                    "phone" => $row['phone'],
                    "password" => $row['password'],
                    "is_admin" => $row['is_admin'],
                    "is_owner" => $row['is_owner']
                ));
            }
            echo json_encode($response);
        } else {
            array_push($response, array(
                "status" => "failed"
            ));
            // $response['value'] = 0;
            // $response['message'] = 'Login anda gagal';
            echo mysqli_error($con);
        }
    }

?>