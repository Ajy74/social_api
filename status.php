<?php

    include 'dbconnect.php';


    $user_id = $_POST['user_id'];
    $friend_id = $_POST['friend_id'];

    $sql = "SELECT * FROM `tbl_following` where `user_id`='$user_id' and `friend_id`='$friend_id' ";
    
    $res = mysqli_query($con, $sql);
    if($res == true){
        $count = mysqli_num_rows($res);
        if($count ==1)
            $response1 =1;
        else
            $response1 = 0;
    }
   

    $sql = "SELECT * FROM `tbl_following` where `user_id`='$friend_id' and `friend_id`='$user_id' ";

    $res = mysqli_query($con, $sql);
    if($res == true){
        $count = mysqli_num_rows($res);
        if($count ==1)
             $response2 = 1;
        else
             $response2 = 0;
    }
    


    if($response1 ==1 && $response2 == 1)
        $response = 1;   //both are following each other
    if($response1 ==1 && $response2 == 0)
        $response = 1;   //only current user follow
    if($response1 ==0 && $response2 == 1)
        $response = 0;   //current user  not follow that user
    if($response1 ==0 && $response2 == 0)
        $response = -1;

    
    echo json_encode($response);

?>