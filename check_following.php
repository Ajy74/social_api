<?php

//code for fetching following list//

   include 'dbconnect.php';

    $user_id = $_POST['user_id'];
   
    //*** for storing following id of friend */
        $sql = "SELECT * FROM `tbl_following` where user_id = '$user_id'";
        $res = mysqli_query($con, $sql);
        $count = mysqli_num_rows($res);

        if($count > 0){
            while ($row = mysqli_fetch_array($res)) {
                $id = $row['friend_id'];

                $sql1 = "SELECT * FROM `tbl_user` where `id`=$id ";
                $res1 = mysqli_query($con, $sql1);
                if($res1 == true){
                    while ($row1 = mysqli_fetch_array($res1)){
                        $data[] = $row1;
                    }
                }
            }

            // $following[] = [ "following_number" => "$count"];

            // echo json_encode($following);
            // echo "\n";
            echo json_encode($data);
        }
        else{
            $data1[] = ["nothing found"];
            echo json_encode($data1);
        }

        
?>