<?php
    require "connection.php";
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $response = array();
        $id = $_POST['user_id'];
                
        $sql = "DELETE FROM user WHERE id = '$id'";
        $result = mysqli_fetch_array(mysqli_query($con, $sql));
        
        if (isset($result)) {
            $response['value'] = 1;
            $response['message'] = 'Delete user succesfully';
            echo json_encode($response);
        } else {
            $response['value'] = 0;
            $response['message'] = 'Failed to delete user';
            echo json_encode($response);
        }
    }   
?>