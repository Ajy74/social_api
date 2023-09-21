<?php 

    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "socialdb"; //database ka name

    $con = mysqli_connect($server,$username,$password,$database);

    if(!$con){
        die("connection failed due to: ". mysqli_connect_error());
    }

?>