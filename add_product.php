<?php
    require_once "connection.php";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $response = array();
        $store_id = $_POST['store'];
        $name = $_POST['name'];
        $picture = $_POST['picture'];
        $price = $_POST['price'];
        $description = $_POST['description'];
        $category = $_POST['category'];

        
        $sql = "INSERT INTO `product` (`product_id`, `store_id`, `productname`, `price`, `category`, `description`) VALUES (NULL, '$store_id', '$name', '$price', '$category', '$description');";
        $result = mysqli_query($con, $sql) or die (mysqli_error($con));
        if ($result) {
            $response['success'] = 1;
        } else {
            $response['success'] = 0;
            $response['message'] = mysqli_error($con);
            echo mysqli_error($con);
        }
        echo json_encode($response);
        
        // // make a query that insert product data into product table
        // $result = mysqli_query($con, $sql);
        // if($results>0){
	    //     echo "product added successfully";
	    // } else {
        //     echo mysqli_error($con);
        // }
    }
?>