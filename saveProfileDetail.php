<?php

    include 'dbconnect.php'; 

        $user_id = trim($_POST['id']);
        $name = trim($_POST['name']);
        $bio = trim($_POST['bio']);

        $sql = "UPDATE `tbl_user` SET  `ori_name` = '$name', `bio` = '$bio' where `id`=$user_id ";   

        $res = mysqli_query($con, $sql);
        if($res == true){
        $response['message'] = '1';
        }
        else{
            $response['message'] = '0';
        }
 
  
    
    
    echo json_encode($response);

?>