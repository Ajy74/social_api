<?php

//code for fetching follower list//

   include 'dbconnect.php';

    $user_id = $_POST['user_id'];
   
    //*** for storing following id of friend */
        $sql = "SELECT `friend_id` FROM `tbl_following` where `user_id`= '$user_id' and `status`=1 ";
        $res = mysqli_query($con, $sql);
        $count = mysqli_num_rows($res);

        if($count > 0){
            while ($row = mysqli_fetch_array($res)) {
                $id = $row['friend_id'];

                $sql1 = "SELECT * FROM `tbl_user` where `id`=$id ";   //have to change query
                $res1 = mysqli_query($con, $sql1);
                if($res1 == true){
                    while ($row1 = mysqli_fetch_array($res1)){
                        $data[] = $row1;
                    }
                }
            }

            // $follower[] = [ "follower_number" => "$count"];

            // echo json_encode($follower);
            // echo "\n";

            echo json_encode($data);
        }
        else{
            $data1[] = ["nothing found"];
            echo json_encode($data1);
        }

        
?>