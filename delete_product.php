<?php
    require_once "connection.php";
    // get post data from product
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $response = array();
        $id = $_POST['product_id'];
                
        // create a query that delete product data from product table
        $sql = "DELETE FROM product WHERE product_id = '$id'";
        $result = mysqli_query($con, $sql);
        if($result>0){
            echo "product deleted successfully";
        } else {
            echo mysqli_error($con);
        }
    }


?>