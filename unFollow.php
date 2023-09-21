<?php

    // for clicking on follow back button //

   include 'dbconnect.php';

    $user_id = $_POST['user_id'];
    $friend_id = $_POST['friend_id'];



    // **** for calculating following ***/

        $sql = "Select following_count from `tbl_user`  where `id`='$user_id'  "; 
        $res = mysqli_query($con, $sql);
        if($res == true){
            $row = mysqli_fetch_assoc($res);
            $count = $row['following_count'];
            $count = $count - 1;
            $sql =  "UPDATE  `tbl_user` SET  `following_count` = $count where `id`='$user_id' " ;
            $res = mysqli_query($con, $sql);

            $response = 1 ;
        }
        else{
            $response = 0 ;
        }

    
    //**** for calculating follower ***/
        $sql = "Select follower_count from `tbl_user`  where `id`='$friend_id'  "; 
        $res = mysqli_query($con, $sql);
        if($res == true){
            $row = mysqli_fetch_assoc($res);
            $count = $row['follower_count'];
            $count = $count - 1;
            $sql =  "UPDATE  `tbl_user` SET  `follower_count` = $count where `id`='$friend_id' " ;
            $res = mysqli_query($con, $sql);

            $response = 1 ;
        }
        else{
            $response = 0 ;
        }
        
   
        //*** for deleting follow status */
        $sql = " SELECT * FROM `tbl_following` WHERE `user_id`='$user_id' and `friend_id`='$friend_id' ";   //it means user is unfollow that friend
        $res = mysqli_query($con, $sql);

        if($res == true){
            $row = mysqli_fetch_assoc($res);
            $iid = $row['id'];
            //if($row == 1){
                $sql = " DELETE FROM `tbl_following` WHERE `id`='$iid' ";   //it means user is unfollow that friend
                $res = mysqli_query($con, $sql);
                // $response
           // }
        }

       
        
    //if second friend follows then set status as 0    
        $sql = " SELECT * FROM `tbl_following` WHERE `user_id`='$friend_id' and `friend_id`='$user_id' ";   //it means user is unfollow that friend

        $res = mysqli_query($con, $sql);
        if($res == true){
            $row = mysqli_fetch_assoc($res);
           // if($row == 1){
                $sql =  "UPDATE  `tbl_following` SET  `status` = 0 where `user_id`='$friend_id' and  `friend_id`='$user_id' " ;
           // }
        }

        echo json_encode($response);
    
?>