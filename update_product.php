<?php
    require_once "connection.php";
    // get post data using if statement
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $response = array();
        $id = $_POST['product_id'];
        $store_id = $_POST['store_id'];
        $pwd = $_POST['name'];
        $picture = $_POST['picture'];
        $price = $_POST['price'];
        $description = $_POST['description'];
        $category = $_POST['category'];
        
        // create query that update product data into product table
        $sql = "UPDATE product SET store_id = '$store_id', name = '$pwd', picture = '$picture', price = '$price', description = '$description', category = '$category' WHERE id = '$id'";
        $result = mysqli_query($con, $sql);
        if($result>0){
            echo "product updated successfully";
        } else {
            echo mysqli_error($con);
        }
    }
?>