<?php

    include 'dbconnect.php';

    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $mobile = 0;
    $following_count = 0;
    $follower_count = 0;
  
    
    $sql1 = "Select * from `tbl_user` where email='$email'";
    $res = mysqli_query($con,$sql1);  // //stores true or false
    $count = mysqli_num_rows($res); //count number of rows 

    if($count >0){
        $response = 00; 
    }
    else{
        $sql2 = "INSERT INTO `tbl_user` (`name`, `email`, `password`, `mobile`,`following_count`,`follower_count`,`dt`)
         VALUES ('$name', '$email', '$password', '$mobile',$following_count,$follower_count, current_timestamp()	)";
        $res = mysqli_query($con,$sql2);  //stores true or false

        if($res == true)
            $response = 1;
        else
            $response = 0;        
    }

    echo json_encode($response);

?>