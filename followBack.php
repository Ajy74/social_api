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
            $count = $count + 1;
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
            $count = $count + 1;
            $sql =  "UPDATE  `tbl_user` SET  `follower_count` = $count where `id`='$friend_id' " ;
            $res = mysqli_query($con, $sql);

            $response = 1 ;
        }
        else{
            $response = 0 ;
        }
        
    //*** for updating status of followback as 1 */
        $sql = " UPDATE `tbl_following` SET `status`=1 where `friend_id`='$user_id' ";   //it means both are follow each other
        $res = mysqli_query($con, $sql);

    //*** for inserting following of followBacker user */    
        $sql = " INSERT INTO `tbl_following` (`user_id`, `friend_id`, `status`, `dt`) VALUES ('$user_id', '$friend_id', '1', current_timestamp()) ";   //it means both are follow each other
        $res = mysqli_query($con, $sql);

        echo json_encode($response);
    
?>