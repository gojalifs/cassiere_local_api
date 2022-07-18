<?php
    //define the constanta
    define('HOST','localhost');
    define('USER','root');
    define('PASS','');
    define('DB','cassiere');

    //connection to database
    $con = mysqli_connect(HOST,USER,PASS,DB) or die (mysqli_connect_error());
    
?>