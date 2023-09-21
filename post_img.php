<?php

   include 'dbconnect.php';

   $user_id = $_POST['user_id'];
   $pdesc = $_POST['post_desc'];



    if($_FILES['upload']){

        $src_name = $_FILES['upload'];
        
        if($src_name['size']){


            $orinal_name = $src_name['name'];
            // $fileerror=$src_name['error'];
            $filetmp = $src_name['tmp_name'];

            print_r($filetmp);

            $destination = '../images/'.$orinal_name;
            move_uploaded_file($filetmp,$destination);

        
            $sql = "INSERT INTO `tbl_post` (`user_id`,`image`, `post_desc`, `dt`)
                    VALUES ('$user_id','$orinal_name', '$pdesc', current_timestamp()	)" ;

            $res = mysqli_query($con,$sql);

            if($res == true){
                $response = 'posted';
                $sql = "Select post_count from `tbl_user`  where user_id='$user_id'  "; 
                $res = mysqli_query($con, $sql);
                if($res == true){
                    $row = mysqli_fetch_assoc($res);
                    $count = $row['post_count'];
                    $count = $count + 1;
                    $sql =  "UPDATE  `tbl_user` SET  `post_count` = $count where `tbl_user`.`id`='$user_id' " ;
                    $res = mysqli_query($con, $sql);
                }
            }
            else{
                $response = 'failed to post';
            }
                
        }
    }

    echo json_encode($response);

?>