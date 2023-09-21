<?php

    include 'dbconnect.php';


    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    
    $sql1 = "Select * from `tbl_user` where email='$email'";
    
    $res = mysqli_query($con,$sql1);  // //stores true or false
    $count = mysqli_num_rows($res); //count number of rows 

    if($count > 0){
      
        $row = mysqli_fetch_assoc($res);
        if($password == $row['password']){
            $response = 1;
        }
        if($password != $row['password']){
            $response = 0;
        }
    }
    else{
            $response = 00;
    }
    
    echo json_encode($response);

?>