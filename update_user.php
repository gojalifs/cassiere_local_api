<!-- update user -->
<?php
    require_once 'connection.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $response = array();
        $id = $_POST['user_id'];
        $pwd = $_POST['password'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $store_id = $_POST['store_id'];
        
        // create query that update user data into user table
        $sql = "UPDATE user SET password = '$pwd', name = '$name', email = '$email', phone = '$phone', store_id = '$store_id' WHERE id = '$id'";
        $result = mysqli_query($con, $sql);
        if($result>0){
            echo "user updated successfully";
        } else {
            echo mysqli_error($con);
        }
        
    }   
?>