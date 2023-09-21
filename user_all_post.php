<?php

   include 'dbconnect.php';

    $user_id = $_POST['user_id'];
    // $forimg = $_POST['img'];  //for fetching only image (should paas in 0/1)
    // $forall = $_POST['details'];  //for fetching all details (should paas in 0/1)


    // if($forimg == 1){

    //     $sql = "Select image from `tbl_post` ORDER BY DESC where user_id='$user_id'  ";  //in descending oreder 

    //     $res = mysqli_query($con, $sql);

    //     while ($row = mysqli_fetch_array($res)) {
    //         $data[] = $row;
    //     }
    
    //     echo json_encode($data);

    // }

    // if($forall == 1){

        $sql = "SELECT * from `tbl_post` INNER JOIN tbl_user ON tbl_post.user_id = tbl_user.id where user_id='$user_id'  ORDER BY `tbl_post`.`pid` DESC  ";  //in descending oreder
        
        $res = mysqli_query($con, $sql);

        while ($row = mysqli_fetch_array($res)) {
            $data[] = $row;
        }
    
        echo json_encode($data);

   // }

?>